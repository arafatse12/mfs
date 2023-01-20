<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {

	public $data;

   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->load->model('admin_model', 'admin');
        $this->load->model('home_model', 'home');
        $this->data['module']    = 'privacy';
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
	
	public function privacy()
	{
		$this->data['privacy_policy'] = $this->db->get_where('page_content', array('page_route'=>'privacy-policy','status'=>1))->result_array();
		$langs = !empty($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
        $this->data['privacy_language'] = $this->home->get_privacy_languages($langs);
		$this->data['page'] = 'privacy';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}
	public function faq()
	{
		$this->data['pages']=$this->admin->getting_faq_list();
		$this->data['page'] = 'faq';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}
	public function help()
	{
		$this->data['help'] = $this->db->get_where('page_content', array('page_route'=>'help','status'=>1))->row();
		$langs = !empty($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
        $this->data['help_language'] = $this->home->get_help_languages($langs);
		$this->data['page'] = 'help';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}

	public function cookiesPolicy() {
		$this->data['cookies_policy'] = $this->db->get_where('page_content', array('page_route'=>'cookie-policy','status'=>1))->row();
		$langs = !empty($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
        $this->data['cookie_language'] = $this->home->get_cookie_languages($langs);
		$this->data['page'] = 'cookies-policy';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}

	/** To get and display privacy policy content */
	public function privacy_app()
	{
		
		$this->data['privacy_policy'] = $this->db->get_where('page_content', array('page_route'=>'privacy-policy','status'=>1))->result_array();
		$this->data['page'] = 'privacy-app';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'] . '/'.$this->data['module'] . '/' . $this->data['page']);
	}

	public function pages_details($slug){
        $slug = rawurldecode($slug);
        $this->data['posts'] = $this->home->get_pages_details($slug);
        $this->data['page'] = 'pages_details';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');

    }
   
}

