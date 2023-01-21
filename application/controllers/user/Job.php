<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	public $data;

   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'job';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('home_model','home');

        
        
    }

	
	public function index()
	{
		
		 $this->data['page'] = 'job';
	     $this->data['category']=$this->home->get_category();
	     $this->data['services']=$this->home->get_service();
         $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/template');
	}
	
	public function job()
	{
		
		 $this->data['page'] = 'job';
         $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/template');
    }
    public function insert_contact()
	{
		
		$query = $this->db->query("select * from system_settings WHERE status = 1");
		$result = $query->result_array();
		$mail_config='';
		$email_address='';
		$smtp_email_address='';
		$tomail='';
		foreach ($result as $res) {
			if($res['key'] == 'mail_config'){
				$mail_config = $res['value'];
			} 
			if($res['key'] == 'email_address'){
				$email_address = $res['value'];
			} 

			if($res['key'] == 'smtp_email_address'){
				$smtp_email_address = $res['value'];
			}

		}
		
		if($mail_config=='smtp')
		{
			$tomail=$smtp_email_address;
		}
		else
		{
			$tomail=$email_address;
		}
		
		 $table_datas['name']=$this->input->post('name');
		 $table_datas['email']=$this->input->post('email');
		 $table_datas['address']=$this->input->post('address');
		 $table_datas['phone']=$this->input->post('phone');
		 $result=$this->db->insert('apply_job', $table_datas);
		 if ($result) {
            $this->data['user'] = $this->session->userdata();

            $body = $this->load->view('user/email/contact_form', $table_datas, true);
            $phpmail_config = settingValue('mail_config');
            if (isset($phpmail_config) && !empty($phpmail_config)) {
                if ($phpmail_config == "phpmail") {
                    $from_email = settingValue('email_address');
                } else {
                    $from_email = settingValue('smtp_email_address');
                }
            }
            $this->load->library('email');
            if (!empty($from_email) && isset($from_email)) {
                $mail = $this->email
                        ->from($from_email)
                        ->to($tomail)
                        ->subject('User Contact Form Details')
                        ->message($body)
                        ->send();
            }			

            $message = 'Mail Sent Successfully';
            $this->session->set_flashdata('success_message', $message);
			  echo 1;
        } else {
            $message = 'Sorry, something went wrong';
            $this->session->set_flashdata('error_message', $message);
			echo 0;
        }
		 
	} 

	/** To get and display terms and conditions content */
    public function contact_app()
    {
        $this->data['page'] = 'contact-app';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/'.$this->data['module'] . '/' . $this->data['page']);
    }
   
}
