<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $data;

    public function __construct() 
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']    = 'user';
        $this->data['module']   = 'categories';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('categories_model','categories');
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
    
	public function subcategories($cat_slug)
	{
        $cat_slugid = $this->db->select('id')->where('category_slug',$cat_slug)->get('categories')->row_array();
        //echo '<pre>'; print_r($cat_slugid); exit;
        $cat_id = $cat_slugid['id'];
		$conditions['returnType'] = 'count';
		$conditions['where'] = array('c.category'=>$cat_id); 

        //echo '<pre>'; print_r($cat_slugid); exit;
        $totalRec = $this->categories->get_subcategory($conditions);
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['link_func']   = 'getData';
        $config['loading']     = '<img src="'.base_url().'assets/img/loader.gif" alt="" />';
        $config['base_url']    = base_url('categories/ajaxPaginationSubCategoryData/'.$cat_id); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage
        );
		$conditions['where'] = array('c.category'=>$cat_id); 

         $this->data['page'] = 'subcategory';
		 $this->data['cat_name'] = $this->categories->get_category_name($cat_id);
	     $this->data['category'] = $this->categories->get_subcategory($conditions);
	     $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/template');
	}
	
	public function index()
	{
		$conditions['returnType'] = 'count'; 
        $totalRec = $this->categories->get_category($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['link_func']      = 'getData';
        $config['loading']='<img src="'.base_url().'assets/img/loader.gif" alt="" />';
        $config['base_url']    = base_url('categories/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        );

        $this->data['page'] = 'index';
        $this->data['category']=$this->categories->get_category($conditions);
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
	}

	function ajaxPaginationData(){ 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->categories->get_category($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList';
        $config['link_func']      = 'getData'; 
        $config['loading']='<img src="'.base_url().'assets/img/loader.gif" alt="" />';
        $config['base_url']    = base_url('categories/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'start' => $offset, 
            'limit' => $this->perPage 
        ); 
         
        // Load the data list view 
         $this->data['page'] = 'ajax_category';
	     $this->data['category']=$this->categories->get_category($conditions);
         
	     $this->load->vars($this->data);
		 $this->load->view($this->data['theme'].'/'.$this->data['module'].'/'.$this->data['page']);
    } 

    function ajaxPaginationSubCategoryData($cat_id){ 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $conditions['where'] = $cat_id; 
        $totalRec = $this->categories->get_subcategory($conditions); 
        
        $cat_name = $this->categories->get_category_name($cat_id); 
        // Pagination configuration 
        $config['target']      = '#dataList';
        $config['link_func']      = 'getData'; 
        $config['loading']='<img src="'.base_url().'assets/img/loader.gif" alt="" />';
        $config['base_url']    = base_url('categories/ajaxPaginationSubCategoryData/'.$cat_id); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'start' => $offset, 
            'limit' => $this->perPage 
        ); 
         
        // Load the data list view 
         $this->data['page'] = 'ajax_subcategory';
         $this->data['subcategory']=$this->categories->get_subcategory_data($conditions);
         
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/'.$this->data['module'].'/'.$this->data['page']);
    } 
	
}
