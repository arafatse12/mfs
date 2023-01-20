<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public $data;

    public function __construct() {

        parent::__construct();
		$this->load->model('admin_model','admin');
		$this->load->model('common_model','common_model');
        $this->data['theme'] = 'admin';
        $this->data['model'] = 'categories';
        $this->data['base_url'] = base_url();
        $this->load->helper('custom_language');
        /*$lang = !empty($this->session->userdata('lang'))?$this->session->userdata('lang'):'en';
        $this->data['language_content'] = get_admin_languages($lang);*/

        //Get Language Keywords from content lang file
        $langs = !empty($this->session->userdata('lang'))?$this->session->userdata('lang'):'en';
        $lang = $this->db->get_where('language', array('language_value'=>$langs))->row()->language;
        $this->data['language_content'] = $this->lang->load('content', strtolower($lang), true);
        $this->language = $this->lang->load('content', strtolower($lang), true);

        $this->session->keep_flashdata('error_message');
        $this->session->keep_flashdata('success_message');
        $this->load->helper('user_timezone_helper');
        $this->data['user_role'] = $this->session->userdata('role');
    }

    public function index() {
        redirect(base_url('categories'));
    }

    public function categories() {
		$this->common_model->checkAdminUserPermission(2);
        $this->data['page'] = 'categories';
        $this->data['list_filter'] = $this->admin->categories_list();

        if ($this->input->post('form_submit')) {
            $this->common_model->checkAdminLogin();
            extract($_POST);
            $category = $this->input->post('category');
            $from_date = $this->input->post('from');
            $to_date = $this->input->post('to');
            $this->data['list'] = $this->admin->categories_list_filter($category, $from_date, $to_date);
        } else {
            $this->data['list'] = $this->admin->categories_list();
        }


        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function add_categories() {
		$this->common_model->checkAdminUserPermission(2);
        if ($this->input->post('form_submit')) {
            $this->common_model->checkAdminLogin();
                removeTag($this->input->post());
                $uploaded_file_name = '';
                if (isset($_FILES) && isset($_FILES['category_image']['name']) && !empty($_FILES['category_image']['name'])) {

                   
                    $uploaded_file_name = $_FILES['category_image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/category_images/', 'category_image', time() . $filename);

                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                       
                        $uploaded_file_name = $upload_sts['data']['file_name'];

                        if (!empty($uploaded_file_name)) {
                           
                            $image_url = 'uploads/category_images/' . $uploaded_file_name;
                            $table_data['thumb_image'] = $this->image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name);
                            $table_data['category_image'] = $this->image_resize(381, 286, $image_url, $uploaded_file_name);
                        }
                    }
                }

                if (isset($_FILES) && isset($_FILES['category_mobile_icon']['name']) && !empty($_FILES['category_mobile_icon']['name'])) {
                    $uploaded_file_name = $_FILES['category_mobile_icon']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/category_images/', 'category_mobile_icon', time() . $filename);
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/category_images/' . $uploaded_file_name;
                            $table_data['category_mobile_icon'] = $this->image_resize(60, 60, $image_url, 'ic_' . $filename);
                        }
                    }

                }
               
                $table_data['category_name'] = strip_tags($this->input->post('category_name_28'));
                $table_data['category_slug'] =preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('category_slug'));
                $table_data['status'] = 1;
                $table_data['is_featured'] = $this->input->post('is_featured');
                $table_data['created_at'] = date('Y-m-d H:i:s');

                $check = $this->check_category_name();
                if(!$check){
                    $this->session->set_flashdata('error_message', 'Category name already exist');
                    redirect(base_url() . "add-category");
                }else{
                    $this->db->insert('categories', $table_data);
                    $last_id = $this->db->insert_id();
                    $this->admin->add_category_name($last_id);

                    $ret_id = $this->db->insert_id();
                    if (!empty($ret_id)) { 
                        if($this->input->post('is_featured') == 1) {
                            $featured_cat = settingValue('featured_categories');
                            $featured_cat_exp = explode(',', $featured_cat);
                            $featured_cat_exp[] = $last_id;
                            $featured_cat_list = implode(',', $featured_cat_exp);
                            $table_datas['value'] = $featured_cat_list;
                            $this->db->where('key', 'featured_categories');
                            $this->db->update('system_settings', $table_datas);
                        }
                        $this->session->set_flashdata('success_message', 'Category added successfully');
                    
                    } else {
                        $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                        redirect(base_url() . "add-category");
                    }   
            }
            redirect(base_url() . "categories");
        }


        $this->data['page'] = 'add_categories';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit_categories($id) {
		$this->common_model->checkAdminUserPermission(2);

        if ($this->input->post('form_submit')) {
            $this->common_model->checkAdminLogin();
                removeTag($this->input->post());

                $uploaded_file_name = '';
                if (isset($_FILES) && isset($_FILES['category_image']['name']) && !empty($_FILES['category_image']['name'])) {
                    $uploaded_file_name = $_FILES['category_image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/category_images/', 'category_image', time() . $filename);

                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];

                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/category_images/' . $uploaded_file_name;
                            $table_data['thumb_image'] = $this->image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name);
                            $table_data['category_image'] = $this->image_resize(381, 286, $image_url, $uploaded_file_name);
                        }
                    }
                }

                if (isset($_FILES) && isset($_FILES['category_mobile_icon']['name']) && !empty($_FILES['category_mobile_icon']['name'])) {
                    $uploaded_file_name = $_FILES['category_mobile_icon']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/category_images/', 'category_mobile_icon', time() . $filename);
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/category_images/' . $uploaded_file_name;
                            $table_data['category_mobile_icon'] = $this->image_resize(60, 60, $image_url, 'ic_' . $uploaded_file_name);
                        }
                    }
                }


                $id = $this->input->post('category_id');
                $table_data['category_name'] = $this->input->post('category_name_28');
                $table_data['category_slug'] =preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('category_slug'));
                $table_data['is_featured'] =$this->input->post('is_featured');
                $table_data['status'] = 1;
                $this->db->where('id', $id);
                if ($this->db->update('categories', $table_data)) {

                    $this->admin->update_category_name($id);

                    $featured_cat = settingValue('featured_categories');
                    $featured_cat_exp = explode(',', $featured_cat);
                    if($this->input->post('is_featured') == 1) {
                        $featured_cat_exp[] = $id;
                        $featured_cat_list = implode(',', $featured_cat_exp);
                    } else {
                        foreach ($featured_cat_exp as $key => $value)
                          if ($value == $id) unset($featured_cat_exp[$key]);
                        $featured_cat_list = implode(',', $featured_cat_exp);
                    }
                    $table_datas['value'] = $featured_cat_list;
                    $this->db->where('key', 'featured_categories');
                    $this->db->update('system_settings', $table_datas);

                    $this->session->set_flashdata('success_message', 'Category updated successfully');
                    redirect(base_url() . "categories");
                } else {
                    $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                    redirect(base_url() . "categories");
                }
        }


        $this->data['page'] = 'edit_categories';
        $this->data['categories'] = $this->admin->categories_details($id);
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function image_resize($width = 0, $height = 0, $image_url, $filename) {

        $source_path = base_url() . $image_url;
        list($source_width, $source_height, $source_type) = getimagesize($source_path);
        switch ($source_type) {
            case IMAGETYPE_GIF:
                $source_gdim = imagecreatefromgif($source_path);
                break;
            case IMAGETYPE_JPEG:
                $source_gdim = imagecreatefromjpeg($source_path);
                break;
            case IMAGETYPE_PNG:
                $source_gdim = imagecreatefrompng($source_path);
                break;
        }

        $source_aspect_ratio = $source_width / $source_height;
        $desired_aspect_ratio = $width / $height;

        if ($source_aspect_ratio > $desired_aspect_ratio) {
            /*
             * Triggered when source image is wider
             */
            $temp_height = $height;
            $temp_width = (int) ($height * $source_aspect_ratio);
        } else {
            /*
             * Triggered otherwise (i.e. source image is similar or taller)
             */
            $temp_width = $width;
            $temp_height = (int) ($width / $source_aspect_ratio);
        }

        /*
         * Resize the image into a temporary GD image
         */

        $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
        imagecopyresampled(
                $temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height
        );

        /*
         * Copy cropped region from temporary image into the desired GD image
         */

        $x0 = ($temp_width - $width) / 2;
        $y0 = ($temp_height - $height) / 2;
        $desired_gdim = imagecreatetruecolor($width, $height);
        imagecopy(
                $desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $width, $height
        );

        /*
         * Render the image
         * Alternatively, you can save the image in file-system or database
         */
        $filename_without_extension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $image_url = "uploads/category_images/" . $filename_without_extension . "_" . $width . "_" . $height . "." . $extension;

        imagepng($desired_gdim, $image_url);

        return $image_url;

        /*
         * Add clean-up code here
         */
    }

    public function check_category_name() {
        $category_name =strip_tags($this->input->post('category_name_28'));
        $id = $this->input->post('category_id');
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->where('replace(category_name," ","")=replace("' . $category_name . '"," ","")');

            $this->db->where('id !=', $id);
            $this->db->where('status', 1);
            $this->db->from('categories');
            $result = $this->db->get()->num_rows();
        } else {
            $this->db->select('*');
			$this->db->where('status', 1);
            $this->db->where('replace(category_name," ","")=replace("' . $category_name . '"," ","")');
            $this->db->from('categories');
            $result = $this->db->get()->num_rows();
        }

        if ($result > 0) {
            $isAvailable = FALSE;
        } else {
            $isAvailable = TRUE;
        }
        // echo json_encode(
        //         array(
        //             'valid' => $isAvailable
        // ));
        return $isAvailable;
    }

    public function delete_category() {
		$this->common_model->checkAdminUserPermission(2);
        $this->common_model->checkAdminLogin();
            $id = $this->input->post('category_id');
            $table_data['status'] = 0;
                $this->db->where('id', $id);
                if ($this->db->update('categories', $table_data)) {
    				$this->db->where('category', $id);
    				$query1 = $this->db->get('subcategories');
    				$result = $query1->result_array(); 
    				$this->db->where('category', $id);
                    if ($this->db->update('subcategories', $table_data)) {
                        for($i=0;$i<$query1->num_rows();$i++) {
                            $this->db->where('subcategory', $result[$i]['id']);
                            $this->db->update('services', $table_data);
                        }
                        $this->db->where('category', $id);
                        $this->db->update('services', $table_data);
    					$this->session->set_flashdata('success_message', 'Category,Sub-category and Services deleted successfully');
    					echo 1;
                    }
                    else {
                        $this->session->set_flashdata('success_message', 'Category deleted successfully'); 
                         echo 1;
                    }
                
            } else {
                $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
               echo 0;
            }
    }

    public function subcategories() {
		 $this->common_model->checkAdminUserPermission(3);
        $this->data['page'] = 'subcategories';
        $this->data['model'] = 'subcategories';

        if ($this->input->post('form_submit')) {
            $this->common_model->checkAdminLogin();
            extract($_POST);
            $category = $this->input->post('category');
            $subcategory = $this->input->post('subcategory');
            $from_date = $this->input->post('from');
            $to_date = $this->input->post('to');
            $this->data['list'] = $this->admin->subcategory_filter($category, $subcategory, $from_date, $to_date);
        } else {
            $this->data['list'] = $this->admin->subcategories_list();
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function add_subcategories() {
		 $this->common_model->checkAdminUserPermission(3);

        if ($this->input->post('form_submit')) {
            $this->common_model->checkAdminLogin();
                removeTag($this->input->post());
                $image_url = '';
                $uploaded_file_name = '';
                if (isset($_FILES) && isset($_FILES['subcategory_image']['name']) && !empty($_FILES['subcategory_image']['name'])) {
                    $uploaded_file_name = $_FILES['subcategory_image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/subcategory_images/', 'subcategory_image', time() . $filename);
                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/subcategory_images/' . $uploaded_file_name;
                            $table_data['subcategory_image'] = $this->subimage_resize(381, 286, $image_url, $filename);
                        }
                    }
                }
                $table_data['subcategory_name'] = $this->input->post('subcategory_name_28');
                $table_data['subcategory_slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('subcategory_slug'));
                $table_data['category'] = $this->input->post('category');
                $table_data['subcategory_image'] = ($image_url)?$image_url:'';
                $table_data['created_at'] = date('Y-m-d H:i:s');
                $table_data['status'] = 1;

               // $this->db->insert('subcategories', $table_data);
                //echo $this->db->last_query(); exit;
               // echo "<pre>";print_r($_POST);exit;
                $check = $this->check_subcategory_name();
                if(!$check){
                    $this->session->set_flashdata('error_message', 'Sub Category name already exist');
                    redirect(base_url() . "add-subcategory");
                }else{
                    if ($this->db->insert('subcategories', $table_data)) {
                        $last_id = $this->db->insert_id();
                        $this->admin->add_subcategory_name($last_id);
                        $this->session->set_flashdata('success_message', 'Sub Category added successfully');
                        redirect(base_url() . "subcategories");
                    } else {
                        $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                        redirect(base_url() . "add-subcategory");
                    }
                }
        }


        $this->data['page'] = 'add_subcategories';
        $this->data['model'] = 'subcategories';
        $this->data['categories'] = $this->admin->categories_list();
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit_subcategories($id) {
		 $this->common_model->checkAdminUserPermission(3);
        if ($this->input->post('form_submit')) {
            $this->common_model->checkAdminLogin();
                removeTag($this->input->post());
                if(!empty($this->input->post('category'))) {
                    $img_id = $this->db->select('id, subcategory_image')->get_where('subcategories', array('id'=>$this->input->post('subcategory_id')))->row();
                    $image_url = $img_id->subcategory_image;
                } else {
                    $uploaded_file_name = '';
                }
                    $uploaded_file_name = '';
                if (isset($_FILES) && isset($_FILES['subcategory_image']['name']) && !empty($_FILES['subcategory_image']['name'])) {

                    $uploaded_file_name = $_FILES['subcategory_image']['name'];
                    $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                    $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                    $this->load->library('common');
                    $upload_sts = $this->common->global_file_upload('uploads/subcategory_images/', 'subcategory_image', time() . $filename);

                    if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                        $uploaded_file_name = $upload_sts['data']['file_name'];
                        if (!empty($uploaded_file_name)) {
                            $image_url = 'uploads/subcategory_images/' . $uploaded_file_name;
                            $table_data['subcategory_image'] = $this->subimage_resize(381, 286, $image_url, $filename);
                        }
                    }
                }
                $id = $this->input->post('subcategory_id');
                //$table_data['subcategory_name'] = $this->input->post('subcategory_name');
                $table_data['subcategory_slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('subcategory_slug'));
                $table_data['subcategory_image'] = $image_url;
                $table_data['category'] = $this->input->post('category');
                $table_data['status'] = 1;
                $this->db->where('id', $id);
                if ($this->db->update('subcategories', $table_data)) {
                    $this->admin->update_subcategory_name($id);
                    $this->session->set_flashdata('success_message', 'Sub Category updated successfully');
                    redirect(base_url() . "subcategories");
                } else {
                    $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                    redirect(base_url() . "subcategories");
                }
        }
        $this->data['page'] = 'edit_subcategories';
        $this->data['model'] = 'subcategories';
        $this->data['subcategories'] = $this->admin->subcategories_details($id);
        $this->data['categories'] = $this->admin->categories_list();
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function subimage_resize($width = 0, $height = 0, $image_url, $filename) {

        $source_path = base_url() . $image_url;
        list($source_width, $source_height, $source_type) = getimagesize($source_path);
        switch ($source_type) {
            case IMAGETYPE_GIF:
                $source_gdim = imagecreatefromgif($source_path);
                break;
            case IMAGETYPE_JPEG:
                $source_gdim = imagecreatefromjpeg($source_path);
                break;
            case IMAGETYPE_PNG:
                $source_gdim = imagecreatefrompng($source_path);
                break;
        }

        $source_aspect_ratio = $source_width / $source_height;
        $desired_aspect_ratio = $width / $height;

        if ($source_aspect_ratio > $desired_aspect_ratio) {
            /*
             * Triggered when source image is wider
             */
            $temp_height = $height;
            $temp_width = (int) ($height * $source_aspect_ratio);
        } else {
            /*
             * Triggered otherwise (i.e. source image is similar or taller)
             */
            $temp_width = $width;
            $temp_height = (int) ($width / $source_aspect_ratio);
        }

        /*
         * Resize the image into a temporary GD image
         */

        $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
        imagecopyresampled(
                $temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height
        );

        /*
         * Copy cropped region from temporary image into the desired GD image
         */

        $x0 = ($temp_width - $width) / 2;
        $y0 = ($temp_height - $height) / 2;
        $desired_gdim = imagecreatetruecolor($width, $height);
        imagecopy(
                $desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $width, $height
        );

        /*
         * Render the image
         * Alternatively, you can save the image in file-system or database
         */
        $filename_without_extension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
        $image_url = "uploads/subcategory_images/" . $filename_without_extension . "_" . $width . "_" . $height . ".jpg";
        imagejpeg($desired_gdim, $image_url);

        return $image_url;

        /*
         * Add clean-up code here
         */
    }

    public function check_subcategory_name() {
        $category = $this->input->post('category');
        $subcategory_name = $this->input->post('subcategory_name_28');
        $id = $this->input->post('subcategory_id');
        if (!empty($id)) {
            $this->db->select('*');
            $this->db->where('category', $category);
            $this->db->where('replace(subcategory_name," ","")=replace("' . $subcategory_name . '"," ","")');
            $this->db->where('id !=', $id);
            $this->db->where('status', 1);
            $this->db->from('subcategories');
            $result = $this->db->get()->num_rows();
        } else {
            $this->db->select('*');
            $this->db->where('category', $category);
            $this->db->where('replace(subcategory_name," ","")=replace("' . $subcategory_name . '"," ","")');
            $this->db->where('status', 1);
            $this->db->from('subcategories');
            $result = $this->db->get()->num_rows();
        }
        if ($result > 0) {
            $isAvailable = FALSE;
        } else {
            $isAvailable = TRUE;
        }
        return $isAvailable;
        
        // echo json_encode(
        //         array(
        //             'valid' => $isAvailable
        // ));
    }

    public function delete_subcategory() {
		$this->common_model->checkAdminUserPermission(3);
        $this->common_model->checkAdminLogin();
            $id = $this->input->post('category_id');
            $table_data['status'] = 0;
            $this->db->where('id', $id);
                    if ($this->db->update('subcategories', $table_data)) {
                            $this->db->where('subcategory', $id);
                            $this->db->update('services', $table_data);
            $this->session->set_flashdata('success_message', 'Sub-category and Services deleted successfully');
            echo 1;
            } else {
                $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
               echo 1;
            }

    }
     public function get_subcategory() {
        $category_id = $this->input->post('category_id');
        if(!empty($category_id)) {
            $subcategory = $this->db->select('id,subcategory_name')->get_where('subcategories', array('category'=>$category_id))->result();
        } else {
            $subcategory = $this->db->select('id,subcategory_name')->get('subcategories')->result();
        }

        echo json_encode($subcategory); exit;
    }

    public function getServiceTitle() {
        $category_id = $this->input->post('category_id');
        $subcategory_id = $this->input->post('subcategory_id');
        if(!empty($category_id) && !empty($subcategory_id)) {
            
            $services = $this->db->select('id,service_title')->get_where('services', array('category'=>$category_id, 'subcategory'=>$subcategory_id))->result();
        } else if(!empty($subcategory_id)) {
            $services = $this->db->select('id,service_title')->get_where('services', array('subcategory'=>$subcategory_id))->result();
        } else {
            $services = $this->db->select('id,service_title')->get('services')->result();
        }

        echo json_encode($services); exit;
    }

    public function update_categories(){
        $id=$this->input->post('user_id');
        $status=$this->input->post('is_featured');
        $table_data['is_featured'] = $status;
        $this->db->where('id',$id);
        if($this->db->update('categories',$table_data)){
            $featured_cat = settingValue('featured_categories');
            $featured_cat_exp = explode(',', $featured_cat);
            if($status == 1) {
                $featured_cat_exp[] = $id;
                $featured_cat_list = implode(',', $featured_cat_exp);
            } else {
                foreach ($featured_cat_exp as $key => $value)
                  if ($value == $id) unset($featured_cat_exp[$key]);
                $featured_cat_list = implode(',', $featured_cat_exp);
            }
            $table_datas['value'] = $featured_cat_list;
            $this->db->where('key', 'featured_categories');
            $this->db->update('system_settings', $table_datas);
              
            echo "success";
        } else {
          echo "error";
        }
  }

}
