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

         $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
         $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

         $this->currency= settings('currency');

         $this->load->library('ajax_pagination'); 
         $this->perPage = 12;
         
         $default_language_select = default_language();

        if ($this->session->userdata('user_select_language') == '') {
            $this->data['user_selected'] = $default_language_select['language_value'];
        } else {
            $this->data['user_selected'] = $this->session->userdata('user_select_language');
        }

        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        $this->data['active_language'] = $active_lang = active_language();

        $lg = custom_language($this->data['user_selected']);

        $this->data['default_language'] = $lg['default_lang'];

        $this->data['user_language'] = $lg['user_lang'];

        $this->user_selected = (!empty($this->data['user_selected'])) ? $this->data['user_selected'] : 'en';

        $this->default_language = (!empty($this->data['default_language'])) ? $this->data['default_language'] : '';

        $this->user_language = (!empty($this->data['user_language'])) ? $this->data['user_language'] : '';
        
        
        
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
    public function insert_job()
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
		 $table_datas['position']=$this->input->post('position');
		 $table_datas['message']=$this->input->post('message');
       
         if (isset($_FILES) && isset($_FILES['image_file']['name']) && !empty($_FILES['image_file']['name'])) {
            if(!is_dir('uploads/jobs')) {
                mkdir('/uploads/jobs/', 0777, TRUE);
            }
            $uploaded_file_name = $_FILES['image_file']['name'];
            
            $uploaded_file_name_arr = explode('.', $uploaded_file_name);
            $filename = $uploaded_file_name;
            $this->load->library('common');
            $upload_sts = $this->common->global_file_upload('uploads/jobs/', 'image_file', time() . $filename);
          
            if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                $uploaded_file_name = $upload_sts['data']['file_name'];

                if (!empty($uploaded_file_name)) {
                    $image_url = 'uploads/jobs/' . $uploaded_file_name;
                    
                    $table_datas['upload_cv'] = $image_url;
                    // $input['image_small'] = $this->image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name);
                    // $input['image_default'] = $this->image_resize(381, 286, $image_url, $uploaded_file_name);
                }
            }
        }
		//  $table_datas['upload_cv']=$this->input->post('upload_cv');
		 $result=$this->db->insert('apply_job', $table_datas);
         return $result;
		//  if ($result) {
        //     $this->data['user'] = $this->session->userdata();

        //     $body = $this->load->view('user/email/oute', $table_datas, true);
        //     $phpmail_config = settingValue('mail_config');
        //     if (isset($phpmail_config) && !empty($phpmail_config)) {
        //         if ($phpmail_config == "phpmail") {
        //             $from_email = settingValue('email_address');
        //         } else {
        //             $from_email = settingValue('smtp_email_address');
        //         }
        //     }
        //     $this->load->library('email');
        //     if (!empty($from_email) && isset($from_email)) {
        //         $mail = $this->email
        //                 ->from($from_email)
        //                 ->to($tomail)
        //                 ->subject('User Contact Form Details')
        //                 ->message($body)
        //                 ->send();
        //     }			

        //     $message = 'Mail Sent Successfully';
        //     $this->session->set_flashdata('success_message', $message);
		// 	  echo 1;
        // } else {
        //     $message = 'Sorry, something went wrong';
        //     $this->session->set_flashdata('error_message', $message);
		// 	echo 0;
        // }
		 
	} 

	/** To get and display terms and conditions content */
    public function contact_app()
    {
        $this->data['page'] = 'contact-app';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/'.$this->data['module'] . '/' . $this->data['page']);
    }

      public function delete_job_apply()
  {
     
    $id=$this->input->post('job_apply_id');
    var_dump($id);

      $this->db->where('id', $id);
      $this->db->delete('apply_job');

    $this->session->set_flashdata('success_message','Job deleted successfully');    
    redirect(base_url()."job-apply");   
    
  
    
  }

    
   
}