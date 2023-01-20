<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';


class Flutterwave extends CI_Controller {
	public function __construct() { 
		parent::__construct(); 
                error_reporting(0);
		$this->data['base_url'] = base_url();
		$this->session->keep_flashdata('error_message');
		$this->session->keep_flashdata('success_message');
		$this->load->helper('user_timezone_helper');
		$this->load->model('api_model','api');
        $this->load->model('admin_model','admin');

	}

	public function paymentprocess(){

     
        $flutter_apikey =  $this->db->where('status','1')->get('flutterwave_gateway')->row_array();
    
         
        $curl = curl_init();

        $customer_email = $_POST['email'];
        $amount = $_POST['gross_amount'];  
        $redirect_url =  $_POST['return_url'];  

        // echo $redirect_url;
        // exit;
        $currency = "NGN";
        $txref = "rave" . uniqid(); // ensure you generate unique references per transaction.
// get your public key from the dashboard.
        $PBFPubKey = $flutter_apikey['public_key']; 
        // $redirect_url = "https://fltwvapp.herokuapp.com/status.php"; // Set your own redirect URL


        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'amount'=>$amount,
            'customer_email'=>$customer_email,
            'currency'=>$currency,
            'txref'=>$txref,
            'PBFPubKey'=>$PBFPubKey,
            'redirect_url'=>$redirect_url,
        ]),
        CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "cache-control: no-cache"
        ],
        ));

        $response = curl_exec($curl);
        // echo $response;
       
        $err = curl_error($curl);

        if($err){
        // there was an error contacting the rave API
            die('Curl returned error: ' . $err);
        }

        $transaction = json_decode($response);

        // print_r($transaction->status);
        // exit;
if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// if ($transaction->status=="success") {
   
   
//         $this->session->set_flashdata('success_message','Amount Added to Wallet Successfully');
//         redirect(base_url().'user-wallet');
   
// } else {
    
//     $message= 'Something Went in Server End';
//     $this->session->set_flashdata('error_message',$message);
// }

// redirect to page so User can pay

header('Location: ' . $transaction->data->link);


}

}