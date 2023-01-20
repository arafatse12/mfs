<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

	public $data;

   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'terms';
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
		
		 $this->data['page'] = 'index';
	     $this->data['category']=$this->home->get_category();
	     $this->data['services']=$this->home->get_service();
         $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/template');
	}
	
	public function terms()
	{
		$this->data['terms'] = $this->db->get_where('page_content', array('page_route'=>'terms-service','status'=>1))->result_array();
        $langs = !empty($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
        $this->data['terms_language'] = $this->home->get_terms_languages($langs);
		$this->data['page'] = 'terms_conditions';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}

    /** To get and display terms and conditions content */
    public function terms_conditions_app()
    {
        $this->data['terms'] = $this->db->get_where('page_content', array('page_route'=>'terms-service','status'=>1))->result_array();
        $this->data['page'] = 'terms_conditions_app';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/'.$this->data['module'] . '/' . $this->data['page']);
    }
   
}
