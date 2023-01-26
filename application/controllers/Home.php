<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        error_reporting(0);
        $this->data['theme'] = 'user';
        $this->data['module'] = 'home';
        $this->data['page'] = '';
        $this->data['base_url'] = base_url();
        $this->load->model('home_model', 'home');
        $this->load->helper('common');

        $this->user_latitude = (!empty($this->session->userdata('user_latitude'))) ? $this->session->userdata('user_latitude') : '';
        $this->user_longitude = (!empty($this->session->userdata('user_longitude'))) ? $this->session->userdata('user_longitude') : '';

        $this->currency = settingValue('currency');
        $this->load->library('ajax_pagination');
        $this->perPage = 12;
        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->helper('form');

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

    public function index() {
        $this->data['page'] = 'index';
        $this->data['category'] = $this->home->get_category();
        $this->data['featured_category'] = $this->home->get_featured_category();
        $this->data['services'] = $this->home->get_service();
        $this->data['top_rating_services'] = $this->home->get_top_rating_service();
        $this->data['placholder_img'] = $this->db->get_where('system_settings', array('key'=>'service_placeholder_image'))->row()->value;
        $lang_id = $this->db->get_where('language', array('language_value'=>$this->user_selected))->row()->id;
        $this->data['blogs'] = $this->home->get_all_blogs($lang_id,3);
        $langs = !empty($this->session->userdata('user_select_language'))?$this->session->userdata('user_select_language'):'en';
        $this->data['home_banner_language'] = $this->home->get_home_languages($langs);
        $this->data['home_popularsea_language'] = $this->home->get_homepopular_languages($langs);
        $this->data['home_featured_language'] = $this->home->get_featured_languages($langs);
        $this->data['home_latest_language'] = $this->home->get_latest_languages($langs);
        $this->data['home_popular_language'] = $this->home->get_popular_languages($langs);
        $this->data['home_featured_ser_language'] = $this->home->get_featured_ser_languages($langs);
        $this->data['home_how_it_language'] = $this->home->get_how_it_languages($langs);
        $this->data['home_step_1_language'] = $this->home->get_step_1_languages($langs);
        $this->data['home_step_2_language'] = $this->home->get_step_2_languages($langs);
        $this->data['home_step_3_language'] = $this->home->get_step_3_languages($langs);
        $this->data['home_blog_language'] = $this->home->get_blog_languages($langs);
        $this->data['home_down_language'] = $this->home->get_down_languages($langs);
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function contact() {

        $this->data['page'] = 'contact';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }
  
    public function setlocation()
    {
        $post = $this->input->post();		
        $this->session->set_userdata('latitude',$post['latitude']);
        $this->session->set_userdata('longitude',$post['longitude']);
        $this->session->set_userdata('address',$post['address']);
        $this->session->set_userdata('distance',$post['distance']);
		$this->session->set_userdata('user_latitude',$post['latitude']);
        $this->session->set_userdata('user_longitude',$post['longitude']);
        $this->session->set_userdata('user_distance',$post['distance']);
		$this->session->set_userdata('user_address',$post['address']);
		$location = explode(',', $_POST['address']);
		$city_count = $this->db->like('name', $location[0], 'after')->from('city')->count_all_results();
		$this->session->set_userdata('current_location', $location[0]);
    }

    public function clearlocation()
    {
        $this->session->set_userdata('latitude','');
        $this->session->set_userdata('longitude','');
        $this->session->set_userdata('address','');
        $this->session->set_userdata('distance','');
		$this->session->set_userdata('user_latitude','');
        $this->session->set_userdata('user_longitude','');
        $this->session->set_userdata('user_distance','');
		$this->session->set_userdata('user_address','');	
    }

    public function pages($param)
    {
        $param                    = rawurldecode(utf8_decode($param));
        $query                    = $this->db->query("SELECT footer_submenu.*,footer_menu.title FROM `footer_submenu` INNER JOIN footer_menu ON footer_menu.id = footer_submenu.`footer_menu` WHERE `footer_submenu` = '$param'; ");
        $this->data['list']       = $query->row_array();
        $this->data['module']     = 'pages';
        $this->data['page']       = 'page';
        $this->data['page_title'] = $param;
        $this->load->vars($this->data);
        $this->load->view('user/template');
    }

    public function services() {
        $conditions['returnType'] = 'count';
        $inputs = array();

        if (!empty($this->uri->segment('2'))) {

            $category_name =  $this->uri->segment('2');

            $category = $this->home->get_category_id($category_name);
            //print_r($category);exit;
            $inputs['categories'] = $category;
            $this->data['category_id'] = $category;
        }
		if (!empty($this->uri->segment('3'))) {

            $subcategory_name = $this->uri->segment('3');

            $subcategory = $this->home->get_subcategory_id($subcategory_name);

            $inputs['subcategories'] = $subcategory;
            $this->data['subcategory_id'] = $subcategory;
        }

        if (isset($_POST) && !empty($_POST)) { 
            $inputs['price_range'] = $this->input->post('price_range');
            $inputs['sort_by'] = $this->input->post('sort_by');
            $inputs['common_search'] = $this->input->post('common_search');
            $inputs['categories'] = $this->input->post('categories');
            $inputs['service_latitude'] = ($this->input->post('user_latitude'))?$this->input->post('user_latitude'):$this->session->userdata('user_latitude');
            $inputs['service_longitude'] = ($this->input->post('user_longitude'))?$this->input->post('user_longitude'):$this->session->userdata('user_longitude');
            $inputs['user_address'] = ($this->input->post('user_address'))?$this->input->post('user_address'):$this->session->userdata('address');
            $inputs['distance'] = ($this->session->userdata('distance'))?$this->session->userdata('distance'):'';
            $inputs['current_location'] = ($this->session->userdata('current_location'))?$this->session->userdata('current_location'):'';
        }

        $totalRec = $this->home->get_all_service($conditions, $inputs);

        // Pagination configuration 
        $config['target'] = '#dataList';
        $config['link_func'] = 'getData';
        $config['loading'] = '<img src="' . base_url() . 'assets/img/loader.gif" alt="" />';
        $config['base_url'] = base_url('home/ajaxPaginationData');
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config);

        // Get records 

        $conditions = array(

        );

        $this->data['module'] = 'services';
        $this->data['page'] = 'index';
        $cat = $inputs['categories'];
        $query1 = $this->db->query("select * from services  where category = '$cat'");

        $this->data['service'] = $query1->result_array();
        $totalRec = $query1->num_rows();
        $this->data['count'] = $totalRec;
        $this->data['category'] = $this->home->get_category();
		if (!empty($this->uri->segment('2'))) {
			$this->data['subcategory'] = $this->home->get_subcategory($category);
		}else{
			$this->data['subcategory'] = array();
		}
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function featured_services() {
        $conditions['returnType'] = 'count';
        $inputs = array();
        if (!empty($this->uri->segment('2'))) {
            $category_name = str_replace('-', ' ', $this->uri->segment('2'));
            $category = $this->home->get_category_id($category_name);
            $inputs['categories'] = $category;
            $this->data['category_id'] = $category;
        }

        if (isset($_POST) && !empty($_POST)) {
            $inputs['price_range'] = $this->input->post('price_range');
            $inputs['sort_by'] = $this->input->post('sort_by');
            $inputs['common_search'] = $this->input->post('common_search');
            $inputs['categories'] = $this->input->post('categories');
            $inputs['service_latitude'] = $this->input->post('user_latitude');
            $inputs['service_longitude'] = $this->input->post('user_longitude');
        }

        $totalRec = $this->home->get_all_service($conditions, $inputs);

        // Pagination configuration 
        $config['target'] = '#dataList';
        $config['link_func'] = 'getData';
        $config['loading'] = '<img src="' . base_url() . 'assets/img/loader.gif" alt="" />';
        $config['base_url'] = base_url('home/ajaxPaginationData');
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config);

        // Get records 

        $conditions = array(
            'limit' => $this->perPage
        );

        $this->data['module'] = 'services';
        $this->data['page'] = 'index';
        $this->data['service'] = $this->home->get_all_service($conditions, $inputs);
        $this->data['count'] = $totalRec;
        $this->data['category'] = $this->home->get_category();
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function all_services() {
        extract($_POST);
        $conditions['returnType'] = 'count';
        $inputs['min_price'] = $min_price;
        $inputs['max_price'] = $max_price;
        $inputs['sort_by'] = $this->input->post('sort_by');
        $inputs['common_search'] = $this->input->post('common_search');
        $inputs['categories'] = $this->input->post('categories');
		$inputs['subcategories'] = $this->input->post('subcategories');
        $inputs['service_latitude'] = $this->input->post('service_latitude');
        $inputs['service_longitude'] = $this->input->post('service_longitude');
        $inputs['user_address'] = $this->input->post('user_address');

        $totalRec = $this->home->get_all_service($conditions, $inputs);

        // Pagination configuration 
        $config['target'] = '#dataList';
        $config['link_func'] = 'getData';
        $config['loading'] = '<img src="' . base_url() . 'assets/img/loader.gif" alt="" />';
        $config['base_url'] = base_url('home/ajaxPaginationData');
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config);

        // Get records 

        $conditions = array(

        );
        $this->data['module'] = 'services';
        $this->data['page'] = 'ajax_service';
        $this->data['service'] = $this->home->get_all_service($conditions, $inputs);
        $result['count'] = count($this->home->get_all_service($conditions, $inputs));
        $result['service_details'] = $this->load->view($this->data['theme'] . '/' . $this->data['module'] . '/' . $this->data['page'], $this->data, TRUE);
        echo json_encode($result);
    }

    function ajaxPaginationData() {
        // Define offset 
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        // Get record count 
        $conditions['returnType'] = 'count';
        $totalRec = $this->home->get_all_service($conditions);

        // Pagination configuration 
        $config['target'] = '#dataList';
        $config['link_func'] = 'getData';
        $config['loading'] = '<img src="' . base_url() . 'assets/img/loader.gif" alt="" />';
        $config['base_url'] = base_url('home/ajaxPaginationData');
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config);

        // Get records 
        $conditions = array(
            'start' => $offset,
            'limit' => $this->perPage
        );

        // Load the data list view 
        $this->data['module'] = 'services';
        $this->data['page'] = 'ajax_service';
        $this->data['service'] = $this->home->get_all_service($conditions);
        $result['count'] = $totalRec;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/' . $this->data['module'] . '/' . $this->data['page']);
    }

    public function service_preview() {

        if (isset($_GET['sid']) && !empty($_GET['sid'])) {
            extract($_GET);
            $inputs = array();
            $inputs['id'] = $_GET['sid'];

            $this->data['module'] = 'service_preview';
            $this->data['page'] = 'index';
            $this->data['service'] = $service = $this->home->get_service_details($inputs);
            $this->load->model('service_model', 'service');
            $this->data['service_image'] = $this->service->service_image($service['id']);
            $this->data['service_offered'] = $this->db->where('service_id', $service['id'])->from('service_offered')->get()->result_array();
            $this->data['popular_service'] = $this->home->popular_service($service);
            if (!empty($service['id'])) {
                $this->views($this->data['service']);
            }
            $this->load->vars($this->data);
            $this->load->view($this->data['theme'] . '/template');
        } else {
            redirect(base_url());
        }
    }

    public function service_preview_new($url) {
            $lasturl = rawurldecode($url);
        // if (isset($_GET['sid']) && !empty($_GET['sid'])) {
            extract($_GET);
            $inputs = array();
            $inputs['url'] = $lasturl;
            $this->data['module'] = 'service_preview';
            $this->data['page'] = 'index';
            $this->data['service'] = $service = $this->home->get_service_details_new($inputs);
            $this->load->model('service_model', 'service');
            $this->data['service_image'] = $this->service->service_image($service['id']);
            $this->data['service_offered'] = $this->db->where('service_id', $service['id'])->from('service_offered')->get()->result_array();
            $this->data['popular_service'] = $this->home->popular_service($service);
            if (!empty($service['id'])) {
                $this->views($this->data['service']);
            }
            $this->load->vars($this->data);
            $this->load->view($this->data['theme'] . '/template');
        // } else {
        //     redirect(base_url());
        // }
    }

    private function views($inputs) {
        $service_id = $inputs['id'];
        $user_id = rand(1, 100);

        $this->db->select('id');
        $this->db->from('views');
        $this->db->where('user_id', $user_id);
        $this->db->where('service_id', $service_id);
        $check_views = $this->db->count_all_results();

        $this->db->select('id');
        $this->db->from('services');
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $service_id);
        $check_self_gig = $this->db->count_all_results();

        if ($check_views == 0 && $check_self_gig == 0) {
            $this->db->insert('views', array('user_id' => $user_id, 'service_id' => $service_id));

            $this->db->set('total_views', 'total_views+1', FALSE);
            $this->db->where('id', $service_id);
            $this->db->update('services');
        }
    }

    public function get_common_search_value() {
        if (isset($_GET['term'])) {
            $search_value = $_GET['term'];
            $this->db->select("s.service_title,s.service_location,s.service_offered,c.category_name");
            $this->db->from('services s');
            $this->db->join('categories c', 'c.id = s.category', 'LEFT');
            $this->db->where("s.status = 1");
            $this->db->group_start();
            $this->db->like('s.service_title', $search_value);
            $this->db->or_like('s.service_location', $search_value);
            $this->db->or_like('c.category_name', $search_value);
            $this->db->group_end();
            $result = $this->db->get()->result_array();
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = ucfirst($row['service_title']);
                $arr_result[] = ucfirst($row['category_name']);

                echo json_encode($arr_result);
            }
        }
    }

    public function user_dashboard() {
        $this->data['page'] = 'user_dashboard';
        $this->data['category'] = $this->home->get_category();
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function add_service() {

        $this->data['page'] = 'add_service';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function user_bookings() {
        $this->data['page'] = 'user_bookings';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function user_notifications() {
        $this->data['page'] = 'user_notifications';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function user_favourites() {
        $this->data['page'] = 'user_favourites';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function user_settings() {
        $this->data['page'] = 'user_settings';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function user_reviews() {
        $this->data['page'] = 'user_reviews';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function user_chats() {
        $this->data['page'] = 'user_chats';
        $this->data['server_name'] = settingValue('server_name');
        $this->data['port_no'] = settingValue('port_no');
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function prof_services() {
        $this->data['page'] = 'prof_services';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function prof_service_detail() {
        $this->data['page'] = 'prof_service_detail';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function prof_packages() {
        $this->data['page'] = 'prof_packages';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function set_location() {
        $details = array('user_address' => $this->input->post('address'),
            'user_latitude' => $this->input->post('latitude'),
            'user_longitude' => $this->input->post('longitude'));
        $this->session->set_userdata($details);
    }

    public function current_location() {
        if (!empty($_POST['location'])) {
            $location = explode(',', $_POST['location']);
            $city_count = $this->db->like('name', $location[0], 'after')->from('city')->count_all_results();
            if ($city_count >= 1) {
                $this->session->set_userdata('current_location', $location[0]);
                echo 1;
            } else {
                echo 2;
            }
        }
    }

    public function clear_all_noty() {
        if (!empty($_POST['id'])) {
            $user_type = $this->session->userdata('usertype');
            $res = $this->db->where('receiver=', $_POST['id'])->update('notification_table', ['status' => 0]);
            if ($res == true) {
                echo json_encode(['success' => true, 'msg' => 'cleared']);
                exit;
            } else {
                echo json_encode(['success' => false, 'msg' => 'not cleared']);
                exit;
            }
        }
    }

    public function clear_all_chat() {
        if (!empty($_POST['id'])) {
            $user_type = $this->session->userdata('usertype');
            $res = $this->db->where('receiver_token=', $_POST['id'])->update('chat_table', ['read_status' => 1]);
            if ($res == true) {
                echo json_encode(['success' => true, 'msg' => 'cleared']);
                exit;
            } else {
                echo json_encode(['success' => false, 'msg' => 'not cleared']);
                exit;
            }
        }
    }

    //User Favorites
    public function user_favorite_data()
    {
        $id = $this->input->post('id');
        $user_id = $this->input->post('userid');
        $status = $this->input->post('status');
        $provider_id = $this->input->post('provider');
        $service_id = $this->input->post('service');
        if($id) {
            $where = array('id'=>$id,'user_id'=>$user_id, 'provider_id'=>$provider_id, 'service_id'=>$service_id);    
        }else {
            $where = array('user_id'=>$user_id, 'provider_id'=>$provider_id, 'service_id'=>$service_id);
        }

        $getdata = $this->db->where($where)->select('id,status')->get('user_favorite')->row_array();
        if(!$getdata) {
            $data = array("user_id" => $user_id, "user_id" => $user_id, "provider_id" => $provider_id, "service_id" => $service_id, "status" => $status);
            if($this->db->insert('user_favorite', $data)) {
                echo json_encode(['status'=>true,'status2'=>"ins",'msg'=>"Favorite added Successfully!"]);
            }else{
                echo json_encode(['status'=>false,'msg'=>"Someting went wrong on server end.."]);    
            }
        }else{
            if($this->db->where($where)->update('user_favorite', ['status' => $status])) {
                if($status == "0") {
                    echo json_encode(['status'=>true,'status2'=>"upd",'msg'=>"Favorite removed Successfully."]);
                }
                if($status == 1) {
                    echo json_encode(['status'=>true,'status2'=>"ups",'msg'=>"Favorite added successfully!"]);
                }
            }
        }

    }

    //Block/Unblock by User/Provider
    public function block_unblock_data()
    {
        $id = $this->input->post('id');
        $blockedById = $this->input->post('blockedById');
        $blockedStatus = $this->input->post('blockedStatus');
        $blockedId = $this->input->post('blockedId');
        $usertType = $this->input->post('usertType');
        $blockedReason = $this->input->post('reason');

        //blocked providers by user
        if($usertType == 1) {
            if($id) {
                $where = array('id'=>$id,'blocked_by_id'=>$blockedById, 'blocked_id'=>$blockedId);    
            }else {
                $where = array('blocked_by_id'=>$blockedById, 'blocked_id'=>$blockedId);
            }

            $getdata = $this->db->where($where)->select('id,status')->get('blocked_providers')->row_array();
            if(count($getdata)==0) {
                $data = array("blocked_by_id" => $blockedById, "blocked_id" => $blockedId, "status" => $blockedStatus, 'blocked_reason'=> $blockedReason);
                if($this->db->insert('blocked_providers', $data)) {
                    echo json_encode(['status'=>true,'status2'=>"ins",'msg'=>"Report Request Sent Successflly."]);
                }else{
                    echo json_encode(['status'=>false,'msg'=>"Someting went wrong on server end.."]);    
                }
            }else{
                if($this->db->where($where)->update('blocked_providers', ['status' => $blockedStatus,'blocked_reason'=> $blockedReason])) {
                    if($blockedStatus == "0") {
                        echo json_encode(['status'=>true,'status2'=>"upd",'msg'=>"UnReported Successfully."]);
                    }
                    if($blockedStatus == 2) {
                        echo json_encode(['status'=>true,'status2'=>"ups",'msg'=>"Report Request Sent Successfully."]);
                    }
                }
            }
        }
        //blocked users by provider
        if($usertType == 2) {
            if($id) {
                $where = array('id'=>$id,'blocked_by_id'=>$blockedById, 'blocked_id'=>$blockedId);    
            }else {
                $where = array('blocked_by_id'=>$blockedById, 'blocked_id'=>$blockedId);
            }

            $getdata = $this->db->where($where)->select('id,status')->get('block_user_provider')->row_array();
            if(count($getdata)==0) {
                $data = array("blocked_by_id" => $blockedById, "blocked_id" => $blockedId, "status" => $blockedStatus, 'blocked_reason'=> $blockedReason);
                if($this->db->insert('block_user_provider', $data)) {
                    echo json_encode(['status'=>true,'status2'=>"ins",'msg'=>"Report Request Sent Successfully."]);
                }else{
                    echo json_encode(['status'=>false,'msg'=>"Someting went wrong on server end.."]);    
                }
            }else{
                if($this->db->where($where)->update('block_user_provider', ['status' => $blockedStatus,'blocked_reason'=> $blockedReason])) {
                    if($blockedStatus == "0") {
                        echo json_encode(['status'=>true,'status2'=>"upd",'msg'=>"UnReported Successfully."]);
                    }
                    if($blockedStatus == 2) {
                        echo json_encode(['status'=>true,'status2'=>"ups",'msg'=>"Report Request Sent Successfully."]);
                    }
                }
            }
        }

    }

    public function ajaxSearch()
    {
      if ($this->input->post('service_title')){

        $stmt =  $this->home->fetch_data($this->input->post('service_title'));
      }
       echo $stmt;

    }

    public function paysolutionapi() {
        $this->data['paymentdata'] = $this->input->get();
        $this->data['page'] = 'paysolution';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function admin_login() {
        $admin_details = $this->db->get_where('administrators', array('role'=> 1))->row_array();
        $session_data = array( 
          'id' => $admin_details['user_id'],
          'chat_token' => $admin_details['token'],
          'name'  => $admin_details['username'], 
          'email'     => $admin_details['email'], 
          'usertype' => 'admin'
        ); 
        $this->session->set_userdata($session_data); 
        redirect(base_url());
    }

    //midtranspay

    public function midtranspay() {
        $pay_data = $_REQUEST;
        
        // print_r($this->session->userdata);exit;
        // echo "<pre>";print_r($pay_data);
        $orderid=$pay_data['order_id'];
        $apisecret = settingValue('midtrans_secret_apikey');
        $url1 = "https://api.sandbox.midtrans.com/v2/$orderid/status";
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url1,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type:application/json',
                            'Accept:application/json',
                            'Authorization: Basic '.base64_encode($apisecret.':'),
                        ),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } 

                    $result1 = json_decode($response);
                    //echo "<pre>";print_r($result1);exit;

        $amount = $this->session->userdata('gross_amount');
        
        //Wallet - Paysolution
        if($pay_data['status_code'] == '200') {
           
            $user  = $this->db->where('email', $this->session->userdata('email'))->get('users')->row_array();
            // $amount        = $result1->gross_amount;
         
            $user_id       = $user['id'];
            $user_name     = $user['name'];
            $user_token    = $user['token'];
            $currency_type = $user['currency_code'];
            $usertType     = $user['type'];
        if($usertType == '2') {
           
           $wallet = $this->db->where('user_provider_id', $user_id)->where('type', 2)->get('wallet_table')->row_array();
            $wallet_amt = $wallet['wallet_amt'];

            $history_pay['token']=$user_token;
            $history_pay['user_provider_id']=$user_id;
            $history_pay['currency_code']= $user['currency_code'];
            $history_pay['credit_wallet'] = $amount;
            $history_pay['debit_wallet'] = 0;
            $history_pay['type']='1';
            $history_pay['transaction_id']= $pay_data['order_id'];
            $history_pay['paid_status']='1';
            $history_pay['total_amt']=$amount;
            if($wallet_amt){
                $current_wallet = $wallet_amt+$amount;
            }else{
                $current_wallet = $amount;
            }

            
           
            $history_pay['current_wallet']=$wallet_amt;
            $history_pay['avail_wallet'] = $current_wallet;
            $history_pay['reason']='Wallet Amount Added';
            $history_pay['payment_type']='midtrans';
            $history_pay['created_at']=date('Y-m-d H:i:s');
            // print_r($history_pay);
            if($this->db->insert('wallet_transaction_history',$history_pay)){
                          
                    $this->db->where('user_provider_id', $user_id)->update('wallet_table', array(
                    'currency_code' => $user['currency_code'],
                    'wallet_amt' => $current_wallet
                ));                                            
            }
            if($this->db->affected_rows() > 0) {
                echo 1;
            } else {
                echo 0;
            }
            redirect(base_url('user-wallet'));
         }

         else {
            //Subscription - Midtrans
            $new_details = array();
            $stripe = array();
           /* $plan_id = explode('_', $pay_data['productdetail']);
            $subscription_id = $plan_id[1];*/
            
               $subscription_id =$this->db->query("SELECT * FROM `subscription_fee` WHERE `fee`LIKE '%$amount%'");
             //echo $this->db->last_query();  exit;

                $sub_data = $subscription_id->result_array();
            // echo $this->db->last_query();  exit;
         // echo "<pre>";  print_r($sub_data);exit;
           $subid=$sub_data[0]['id'];


            $user  = $this->db->where('email', $this->session->userdata('email'))->get('providers')->row_array();
            $user_id       = $user['id'];

            $this->db->select('duration');
            $record = $this->db->get_where('subscription_fee',array('id'=>$subid))->row_array();
               
            if(!empty($record)) {
                $duration = $record['duration'];
                $days = 30;
                switch ($duration) {
                    case 1:
                       $days = 30;
                        break;
                    case 2:
                       $days = 60;
                       break;
                    case 3:
                       $days = 90;
                       break;
                    case 6:
                       $days = 180;
                       break;
                    case 12:
                       $days = 365;
                       break;
                    case 24:
                       $days = 730;
                       break;

                    default:
                       $days = 30;
                       break;
                }

                $subscription_date = date('Y-m-d H:i:s');
                $expiry_date_time =  date('Y-m-d H:i:s',strtotime(date("Y-m-d  H:i:s", strtotime($subscription_date)) ." +".$days."days"));

               $new_details['subscriber_id'] = $stripe['subscriber_id'] = $user_id;
               $new_details['subscription_id'] = $stripe['subscription_id'] = $subid;
               $new_details['subscription_date'] = $stripe['subscription_date'] = $subscription_date;
               $new_details['expiry_date_time'] = $expiry_date_time;
               $new_details['type']=1;  
                     $this->db->where('subscriber_id', $user_id);
               $count = $this->db->count_all_results('subscription_details');
               if($count == 0){
                    $this->db->insert('subscription_details', $new_details);
                    $this->db->insert('subscription_details_history', $new_details);
                    $stripe['sub_id'] = $this->db->insert_id();

                } else {
                    $this->db->where('subscriber_id', $user_id);
                    $this->db->update('subscription_details', $new_details);
                    $this->db->insert('subscription_details_history', $new_details);
                    $this->db->where('subscriber_id', $user_id);
                    $details_sub = $this->db->get('subscription_details')->row_array();
                    $stripe['sub_id'] = $subid;
                }
                $stripe['tokenid'] = $user['token'];
                $stripe['payment_details'] = 'midtrans';
                $this->db->insert('subscription_payment', $stripe);
                if($this->db->affected_rows() > 0) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
            redirect(base_url('provider-subscription'));
        }
     }else{
        redirect(base_url());
     }
    }

    //Flutterwave payment gateway

    public function flutterwave_payment_post()
    {
        $pay_data = $_REQUEST;
    
        $orderid=$pay_data['transaction_id'];
        $public_key = settingValue('flutter_apikey');
        $apisecret = settingValue('flutter_secret_apikey');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/" . $orderid . "/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer " . $apisecret
            ),
        ));
        $curlResponse = curl_exec($curl);
        curl_close($curl);
        $responseObj = json_decode($curlResponse);

        $amount =$responseObj->data->amount;
         
        if(!empty($responseObj) && isset($responseObj->status) && $responseObj->status == 'success' ) {
           
    
            $user  = $this->db->where('email', $this->session->userdata('email'))->get('users')->row_array();
     
            $user_id       = $user['id'];
            $user_name     = $user['name'];
            $user_token    = $user['token'];
            $currency_type = $user['currency_code'];
            $usertType     = $user['type'];
        if($usertType == '2') {
     
           $wallet = $this->db->where('user_provider_id', $user_id)->where('type', 2)->get('wallet_table')->row_array();
            $wallet_amt = $wallet['wallet_amt'];

            $history_pay['token']=$user_token;
            $history_pay['user_provider_id']=$user_id;
            $history_pay['currency_code']= $user['currency_code'];
            $history_pay['credit_wallet'] = $amount;
            $history_pay['debit_wallet'] = 0;
            $history_pay['type']='1';
            $history_pay['transaction_id']= $pay_data['transaction_id'];
            $history_pay['paid_status']='1';
            $history_pay['total_amt']=$amount;
            if($wallet_amt){
        
                $current_wallet = $wallet_amt+$amount;
            }else{
               
                $current_wallet = $amount;
            }
        
            $history_pay['current_wallet']=$wallet_amt;
            $history_pay['avail_wallet'] = $current_wallet;
            $history_pay['reason']='Wallet Amount Added';
            $history_pay['payment_type']='flutterwave';
            $history_pay['created_at']=date('Y-m-d H:i:s');
          
            if($this->db->insert('wallet_transaction_history',$history_pay)){
                          
                    $this->db->where('user_provider_id', $user_id)->update('wallet_table', array(
                    'currency_code' => $user['currency_code'],
                    'wallet_amt' => $current_wallet
                ));                                            
            }
            if($this->db->affected_rows() > 0) {
                echo 1;
            } else {
                echo 0;
            }
            redirect(base_url('user-wallet'));
         }

         else {
            
            //Subscription - Flutter
            $new_details = array();
            $stripe = array();
           /* $plan_id = explode('_', $pay_data['productdetail']);
            $subscription_id = $plan_id[1];*/
            
               $subscription_id =$this->db->query("SELECT * FROM `subscription_fee` WHERE `fee`LIKE '%$amount%'");
               $sub_data = $subscription_id->result_array();
         
          $subid=$sub_data[0]['id'];


            $user  = $this->db->where('email', $this->session->userdata('email'))->get('providers')->row_array();
            $user_id       = $user['id'];

            $this->db->select('duration');
            $record = $this->db->get_where('subscription_fee',array('id'=>$subid))->row_array();
               
            if(!empty($record)) {
                $duration = $record['duration'];
                $days = 30;
                switch ($duration) {
                    case 1:
                       $days = 30;
                        break;
                    case 2:
                       $days = 60;
                       break;
                    case 3:
                       $days = 90;
                       break;
                    case 6:
                       $days = 180;
                       break;
                    case 12:
                       $days = 365;
                       break;
                    case 24:
                       $days = 730;
                       break;

                    default:
                       $days = 30;
                       break;
                }

                $subscription_date = date('Y-m-d H:i:s');
                $expiry_date_time =  date('Y-m-d H:i:s',strtotime(date("Y-m-d  H:i:s", strtotime($subscription_date)) ." +".$days."days"));

               $new_details['subscriber_id'] = $stripe['subscriber_id'] = $user_id;
               $new_details['subscription_id'] = $stripe['subscription_id'] = $subid;
               $new_details['subscription_date'] = $stripe['subscription_date'] = $subscription_date;
               $new_details['expiry_date_time'] = $expiry_date_time;
               $new_details['paid_status'] ='1';
               $new_details['type']=1;  
                     $this->db->where('subscriber_id', $user_id);
               $count = $this->db->count_all_results('subscription_details');
               if($count == 0){
                    $this->db->insert('subscription_details', $new_details);
                    $this->db->insert('subscription_details_history', $new_details);
                    $stripe['sub_id'] = $this->db->insert_id();

                } else {
                    $this->db->where('subscriber_id', $user_id);
                    $this->db->update('subscription_details', $new_details);
                    $this->db->insert('subscription_details_history', $new_details);
                    $this->db->where('subscriber_id', $user_id);
                    $details_sub = $this->db->get('subscription_details')->row_array();
                    $stripe['sub_id'] = $subid;
                }
                $stripe['tokenid'] = $user['token'];
                $stripe['payment_details'] = 'flutterwave';
                $this->db->insert('subscription_payment', $stripe);
                if($this->db->affected_rows() > 0) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
            redirect(base_url('provider-subscription'));
        }
     }else{
       
        redirect(base_url());
     }
    }




} //Class end.

/*1. admin_function.js
2. Admin_model.php
3. categories controller.php
4. Footer.php
5. service_list.php 
6. subcategories.php
7. service_model.php
8. service_details.php
9. Booking controller.php
10. payment_list.php
11. ratingtypecontroller.php*/