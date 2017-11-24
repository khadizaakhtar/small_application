<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->model('blog_model');
        $this->load->model('business_model'); 
        $this->load->model('option');
    }

    public function index() {
        $data = array();
        $data['title'] = "home";
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();
        $data['latest_one'] = $this->user_model->select_latest_one_company();
        $data['latest_company'] = $this->user_model->select_latest_company();
        $data['latest_company_offset_four'] = $this->user_model->select_latest_company_offset_four();
        $data['recent_blog_post'] = $this->blog_model->select_all_recent_published_post();
        $data['last_four_blog_post'] = $this->blog_model->select_recent_four_published_post();
        $data['maincontent'] = $this->load->view('user/home/home_content', $data, true);

        $this->load->view('includes/font_header', $data);
        $this->load->view('includes/main_slider', $data);
        $this->load->view('includes/slider', $data);
        $this->load->view('home', $data);
        $this->load->view('includes/font_footer');
    }

    public function show_post_by_id() {
    if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
        $data = array();
        $data['title'] = "Post By Id";
        $category_id = $this->uri->segment(2);
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();
        $data['latest_one'] = $this->user_model->select_latest_one_company();
        $data['latest_company'] = $this->user_model->select_latest_company();
        $data['latest_company_offset_four'] = $this->user_model->select_latest_company_offset_four();
        $data['show_company'] = $this->user_model->select_company_info_by_id($category_id);
        $data['show_company2'] = $this->user_model->select_company2_info_by_id($category_id);
        $data['maincontent'] = $this->load->view('user/home/company_content', $data, true);

        $this->load->view('includes/font_header', $data);
        $this->load->view('includes/main_slider', $data);
        $this->load->view('includes/slider', $data);
        $this->load->view('home', $data);
        $this->load->view('includes/font_footer');
    }

 public function business_listing() {
        if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
        $data = array();
        $userid = $this->uri->segment(2);
        $data['member_info'] = $this->option->get_by_id('user', 'user_id', $userid);
        $data['company_info'] = $this->option->get_company_by_id('company_info', 'user_id', $userid);
        $this->load->view('includes/font_header');
        $this->load->view('user/business_listing', $data);
        $this->load->view('includes/font_footer');
    }
    
 Public function view_multiple_image(){
     if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
     $company_id = $this->uri->segment(2);
     $data['company_images'] = $this->option->FetchData('company_images', 'company_id='.$company_id);
     //print_r($data); die();
     $this->load->view('includes/font_header');
        $this->load->view('user/view_multiple_image', $data);
        $this->load->view('includes/font_footer');

  }

 public function update_company_main_image(){
    if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
    $company_id = $this->uri->segment(2);
    $image_id = $this->uri->segment(3);
    $update = $this->user_model->update_main_image($company_id,$image_id);
    if($update == true){
       redirect('view_multiple_image/'.$company_id);
     }

 } 

  

 public function delete_company_image(){
    if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
    $company_id = $this->uri->segment(2);
    $image_id = $this->uri->segment(3); 
    $delete= $this->user_model->delete_company_image($image_id);
    if($delete== true){
       redirect('view_multiple_image/'.$company_id);
     }
 }

 public function delete_company_by_user(){
    if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
     $company_id = $this->uri->segment(2);
     $delete= $this->user_model->delete_company_by_user($company_id);
    if($delete == true){
       redirect('business_listing/'.$this->session->userdata('userid'));
     }
  }   

 public function upload_multiple_image() {
       
        $data = array();
        $data['title'] = "upload multiple image";
        $company_id = $this->uri->segment(2);
        $this->load->view('includes/font_header');
        $this->load->view('user/upload_multiple_image', $data);
        $this->load->view('includes/font_footer');
    }

    public function save_image() {
        $data = array();
        $data['title'] = "save image";
        $company_id = $this->uri->segment(2);
        $file_element_name = 'file';

        if (!empty($_FILES)) {

            $config['upload_path'] = './multi_img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 1024 * 1024 * 80;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            $this->upload->initialize($config);
            if (!$this->upload->do_upload($file_element_name)) {
                echo 'mona';
                $data['error'] = $this->upload->display_errors();
            } else {
                
                $data = $this->upload->data();
                $info['company_id'] = $company_id;
                $info['images'] = $data['file_name'];
                
                $this->db->insert('company_images', $info);
                redirect('save_image/'.$company_id);

            }
        }
    }


    public function show_company() {
        $data = array();
        $data['title'] = "Show Company";
        $value = $this->uri->segment(2);

       
        $category_id = $this->uri->segment(3);
        $data['spot_info'] = $this->blog_model->select_spot_info($category_id);
        $this->load->library('pagination');
        $data['total_rows'] = $this->user_model->count_all_company($category_id);
        $config['base_url'] = base_url() . 'show_company/highestrate/' . $category_id;
        $config['total_rows'] = $data['total_rows'];
        //print_r($data['total_rows']);die();
        
        $config['per_page'] = 10;
        if ($this->uri->segment(4)) {
            $page = ($this->uri->segment(4));
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $config['per_page'];
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['uri_segment'] = 4;
        if ($value == 'recentfirst') {
            $data['all_company'] = $this->user_model->select_all_company_info_by_id($category_id, $config['per_page'], $start);
        }
        if ($value == 'highestrate') {
            $data['all_company'] = $this->user_model->select_all_company_info_by_id_for_highestrate($category_id, $config['per_page'], $start);
        }
        if ($value == 'alfabetically') {
            $data['all_company'] = $this->user_model->select_all_company_info_by_id_for_alfabeticaly($category_id, $config['per_page'], $start);
        }
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['rate'] = $value;
        $this->load->view('includes/font_header', $data);
        $this->load->view('includes/slider', $data);
        $this->load->view('user/show_company', $data);
        $this->load->view('includes/font_footer', $data);
    }
    
 public function edit_listing() {
        $data = array();
        $company_id = $this->uri->segment(2);
        $data['city'] = $this->option->FetchData('city', '');
        $data['categories'] = $this->option->FetchData('tbl_category', 'parent=0');
        $data['result'] = $this->business_model->select_company_by_company_id($company_id);
        $this->load->view('includes/font_header');
        $this->load->view('user/edit_business_listing', $data);
        $this->load->view('includes/font_footer');
    }

public function update_listing() {
        $data = array();
        $company_id = $this->uri->segment(2);
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('company_description', 'company_description', 'required');
        $this->form_validation->set_rules('company_address', 'company_address', 'required');
        $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('city_id', 'city_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $company_id = $this->uri->segment(2);
            $data = array();
            $data['title'] = "Edit Listing";
            $data['city'] = $this->option->FetchData('city', '');
            $data['categories'] = $this->option->FetchData('tbl_category', 'parent=0');
            $data['result'] = $this->business_model->select_company_by_company_id($company_id);
            $this->load->view('includes/font_header');
            $this->load->view('user/edit_business_listing', $data);
            $this->load->view('includes/font_footer');
        } else {
            $data = array();
            $date = time();
            $country_code = $this->input->post('country_code');
            $data['company_name'] = $this->input->post('company_name', true);
            $data['category_id'] = $this->input->post('category_id', true);
            $data['sub_category_id'] = $this->input->post('sub_category_id', true);
            $data['email'] = $this->input->post('email', true);
            $data['company_description'] = $this->input->post('company_description', true);
            $data['company_address'] = $this->input->post('company_address', true);
            $data['mobile_number'] = $country_code . $this->input->post('mobile_number', true);
            $data['phone_number'] = $this->input->post('phone_number', true);
            $data['fax'] = $this->input->post('fax', true);
            $data['city_id'] = $this->input->post('city_id', true);
            $data['company_website'] = $this->input->post('company_uri', true);
            $data['facebook_link'] = $this->input->post('facebook_uri', true);
            $data['twitter_link'] = $this->input->post('twitter_uri', true);
            $data['date_create'] = $date;
            $this->business_model->update_business_listing($data, $company_id);
            $data['city'] = $this->option->FetchData('city', '');
            $data['categories'] = $this->option->FetchData('tbl_category', 'parent=0');
            $data['result'] = $this->business_model->select_company_by_company_id($company_id);
            $this->load->view('includes/font_header');
            $this->load->view('user/edit_business_listing', $data);
            $this->load->view('includes/font_footer');
        }
    }

    public function register() {

        if ($this->input->post('access_level') == 0) {
            $this->form_validation->set_rules('firstname', 'firstname', 'required|trim');
            $this->form_validation->set_rules('lastname', 'lastname', 'required|trim');
        } else {
            $this->form_validation->set_rules('business_name', 'business_name', 'required|trim');
        }
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.user_mail]');
        $this->form_validation->set_rules('password', 'password', 'required|matches[re_pass]|trim');
        $this->form_validation->set_rules('re_pass', 'Retype password', 'required|trim');
        $this->form_validation->set_rules('terms', 'terms', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['slider_category'] = $this->user_model->select_some_category();
            $data['slider_category2'] = $this->user_model->select_some_category2();

            $this->load->view('includes/font_header', $data);
            $this->load->view('includes/main_slider', $data);
            $this->load->view('includes/slider', $data);
            $this->load->view('registration', $data);
            $this->load->view('includes/font_footer');
        } else {

            $password = $this->input->post('password');
            $md5_password = md5($password);

            if ($this->input->post('access_level') == 0) {
                $data['last_name'] = strip_tags($this->input->post('lastname'));
                $data['first_name'] = strip_tags($this->input->post('firstname'));
            } else {
                $data['business_name'] = strip_tags($this->input->post('business_name'));
            }
            $data['user_name'] = strip_tags($this->input->post('username'));
            $data['user_mail'] = strip_tags($this->input->post('email'));
            $data['access_level'] = $this->input->post('access_level');
            $data['terms'] = $this->input->post('terms');
            $data['password'] = $md5_password;
            //print_r($data); die();
            $registration = $this->user_model->insert($data);
            if ($registration == true) {
                $this->session->set_flashdata("success", "Registration completed. Please Login");
            } else {
                $this->session->set_flashdata("failed", "Registration failed. Please try again");
            }
            redirect('joinnow');
        }
    }

   public function login() {

        $json = array();
        $data = array();
        $data['email'] = $this->input->post('email', true);
        $data['password'] = md5($this->input->post('password', true));         //print_r($data);die();
        $result = $this->user_model->userlogin($data);
        if($result == 1){
            $json['success'] = 'success';
        }else{
            $json['success'] = 'failed';
        }
        echo json_encode($json);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function user_settings() {

        if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
        $data = array();
        $userid = $this->uri->segment(2);
        $data['user_info'] = $this->option->get_by_id('user', 'user_id', $userid);
        //print_r($data);die();
        $this->load->view('includes/font_header');
        $this->load->view('user/user_settings', $data);
        $this->load->view('includes/font_footer');
    }

    public function update_settings() {
        if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
        $userid = $this->uri->segment(2);

         if ($this->session->userdata('usertype') == 0) {
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
         } else {
        $this->form_validation->set_rules('business_name', 'business_name', 'required');
         }

        $this->form_validation->set_rules('user_mail', 'user_mail', 'required');
        $this->form_validation->set_rules('user_name', 'user_name', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data = array();
            $data['user_info'] = $this->option->get_by_id('user', 'user_id', $userid);
            //print_r($data);die();
            $this->load->view('includes/font_header');
            $this->load->view('user/user_settings', $data);
            $this->load->view('includes/font_footer');
        } else {
            $data = array();
            if ($this->session->userdata('usertype') == 0) {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
             }else{
            $data['business_name'] = $this->input->post('business_name');
              }
            $data['user_mail'] = $this->input->post('user_mail');
            $data['user_name'] = $this->input->post('user_name');
            // echo 123; exit;

            $password = $this->input->post('password');
                $re_pass = $this->input->post('re_pass');
                if ((!empty($password)) && $password == $re_pass) {
                    $data['password'] = md5($password);
                    $update = $this->option->update_data('user', $data, 'user_id', $userid);  //$tablename,$data,$fieldname,$id
                } else if((!empty($password)) && $password != $re_pass){
                    $this->session->set_flashdata('failed', 'Confirm password not match!!!');
                    redirect('user_settings/' . $userid);
                } else if (empty($password)){
                    $update = $this->option->update_data('user', $data, 'user_id', $userid);  //$tablename,$data,$fieldname,$id
                }
                
             //echo $update; exit;  
            if (isset($_FILES['user_image']) && !empty($_FILES['user_image']['name'])) {
                $icon = $_FILES['user_image']['name'];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("user_image");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->option->update_data_using_set('user_id',$userid,'user_image',$icon,'user'); //$where_fieldname,$where_id,$set_fieldname,$set_id,$tablename
                    if ($update == true) {
                        $this->session->set_flashdata('success', 'Successfully updated');
                        redirect('user_settings/' . $userid);
                    }
                }
            }
            $this->session->set_flashdata('success', 'Successfully updated');
           redirect('user_settings/' . $userid);
        }
    }
    
    public function user_activities(){
        
          if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
        $data = array();
        $userid = $this->uri->segment(2);
        $data['user_info'] = $this->option->get_by_id('user', 'user_id', $userid);
        $data['count_review'] = $this->user_model->count_review_by_id($userid); 
        //print_r($data);die();
        $this->load->view('includes/font_header');
        $this->load->view('user/user_activities', $data);
        $this->load->view('includes/font_footer');
    }

    /* Start Khadiza */

    public function check_user_email() {
        $this->load->view('enter_email');
    }

    public function check_email_address() {
        $email = $this->input->post('user_email', true);
        $result = $this->admin_model->check_email_address_info($email);
        if (count($result) > 0) {
            $userid = $result->user_id;
            $code = rand(100, 999);
            $result2 = $this->admin_model->update_postcode_by_userid($userid, $code);
            $subject = "Subject Goes Here";
            $email = $result->user_mail;
            $url = base_url() . 'user_controller/forgot_password/?code=' . $code;
            $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "Hello , $email
             We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore this email,
             Click Following Link To Reset Your Password
             <a href='.$url.'>click here to reset your password</a>
            thank you :)
       ";
            //echo $message;
            mail($email, $subject, $headers, $message);
        } else {
            $this->redirect('user/check_user_email');
        }
    }

    public function forgot_password() {
        $code = $_GET['code'];
        $check_code = $this->admin_model->check_code_for_reset_password($code);
        if ($check_code > 0) {
            $this->load->view('user_update_password', $code);
        } else {
            echo 'your post code is invalid!';
        }
    }

    public function update_forgot_password() {
        $password = $this->input->post('password', true);
        $retype_password = $this->input->post('retype_password', true);
        $code = $this->input->post('code', true);
        $this->retype_password = $_POST['retype_password'];
        $data = array(
            'password' => $this->input->post('password', true),
            'retype_password' => $this->input->post('retype_password', true),
        );
        if ($data['password'] == $data['retype_password']) {
            $update_result = $this->admin_model->update_forgot_password_info($data, $code);
        } else {
            echo 0;
        }
        die();
    }
    
    
        public function search() {

        //start only category
        $rate = $this->uri->segment(2);
        if (($this->uri->segment(3) == 'category') && ($this->uri->segment(4) != '') && $this->uri->segment(5)!='') { 
            //echo 'cat';
            $category_id = $this->uri->segment(4);
            $city = '';
            $name= '';
            $page = $this->uri->segment(5);
            $total_rows = $this->user_model->count_all_company($category_id);
           // $base_url = base_url() . 'search/' . 'category/' . $category_id;
           $base_url = base_url() . 'search/'.$rate.'/' . 'category/' . $category_id;
            
        } elseif ($this->input->post('category') && !$this->input->post('city') && !$this->input->post('name')) { 
            //echo 'cat_else';
            $category_id = $category_id = $this->input->post('category'); 
            $city = '';
            $name= '';
            $page = 1;
            $total_rows = $this->user_model->count_all_company($category_id);
            $base_url = base_url() . 'search/'.$rate.'/' . 'category/' . $category_id;
        }
        
        //end only category

        //start only city
         elseif (($this->uri->segment(3) == 'city') && ($this->uri->segment(4) != '') && $this->uri->segment(5)!='') { 
            //echo 'city';
            $city = $this->uri->segment(4);
            $category_id = '';
            $name= '';
            $page = $this->uri->segment(5);
            $total_rows = $this->user_model->count_all_company_by_city($city);
            $base_url = base_url() . 'search/'.$rate.'/' . 'city/' . $city;
            
        } elseif($this->input->post('city') && !$this->input->post('category') && !$this->input->post('name')) { 
            //echo 'city_else';
            $city = $this->input->post('city'); 
            $category_id = '';
            $name= '';
            $page =1;
            $total_rows = $this->user_model->count_all_company_by_city($city); 
            $base_url = base_url() . 'search/'.$rate.'/' . 'city/' . $city;
        }
        //end only city
        
       // start only name 
        elseif (($this->uri->segment(3) == 'name') && ($this->uri->segment(4) != '') && ($this->uri->segment(5)!='city' || $this->uri->segment(6)!='cat')) { 
            //echo 'name';
            $city = '';
            $category_id = '';
            $name = $this->uri->segment(4);
            $page = $this->uri->segment(5);
            $total_rows = $this->user_model->count_all_company_by_name($name);
            $base_url = base_url() . 'search/'.$rate.'/' . 'name/' . $name;
            
        } elseif($this->input->post('name') && !$this->input->post('category') && !$this->input->post('city')) { 
            //echo 'name_else';
            $city = ''; 
            $category_id = '';
            $name = $this->input->post('name'); 
            $page = 1;
            $total_rows = $this->user_model->count_all_company_by_name($name); 
            $base_url = base_url() . 'search/'.$rate.'/' . 'name/' . $name;
        }
        //end only name 
        
        //start only category and city
        elseif ((($this->uri->segment(5) != 'cat') || ($this->uri->segment(5) != 'city')) && (($this->uri->segment(3) == 'cat_city'))) {
            //echo 'cat_city';
            $category_id = $this->uri->segment(4);
            $city = $this->uri->segment(5);
            $name = '';
            $page = $this->uri->segment(6);
            
            $total_rows = $this->user_model->count_all_company_by_city_and_category($category_id, $city);
            $base_url = base_url() . 'search/'.$rate.'/'.'cat_city/'. $category_id . '/' . $city;
        } elseif($this->input->post('city') && $this->input->post('category') && !$this->input->post('name')) { 
            //echo 'cat_city_else';
            $city = $this->input->post('city'); 
            $category_id = $this->input->post('category');
            $name = '';
            $page = 1;
            $total_rows = $this->user_model->count_all_company_by_city_and_category($category_id, $city);
            $base_url = base_url() . 'search/'.$rate.'/'.'cat_city/'. $category_id . '/' . $city;
        }
        //end only category and city
        
        //start only category and name
        elseif ((($this->uri->segment(3) == 'co_name') && ($this->uri->segment(5) == 'cat')) && ($this->uri->segment(7) != '')) {
            //echo 'cat_name';
            $category_id = $this->uri->segment(6);
            $name = $this->uri->segment(4);
            $city = '';
            $page = $this->uri->segment(7);
            
            $total_rows = $this->user_model->count_all_company_by_name_and_category($category_id, $name);
            $base_url = base_url() . 'search/' .$rate.'/'.'co_name/'. $name .'/'. 'cat/' . $category_id;
        } elseif(!$this->input->post('city') && $this->input->post('category') && $this->input->post('name')) { 
            //echo 'cat_name_else';
            $city = ''; 
            $category_id = $this->input->post('category');
            $name = $this->input->post('name');
            $page = 1;
            $total_rows = $this->user_model->count_all_company_by_name_and_category($category_id, $name);
            $base_url = base_url() . 'search/' .$rate.'/'.'co_name/'. $name .'/'. 'cat/' . $category_id;
        }
       //start only category and name
        
       //start only city and name
        elseif ((($this->uri->segment(3) == 'co_name') && ($this->uri->segment(5) == 'city')) && ($this->uri->segment(7) != '')) {
            //echo 'city_name';
            $category_id = '';
                   
            $name = $this->uri->segment(4);
            $city = $this->uri->segment(6);
            $page = $this->uri->segment(7);
            
            $total_rows = $this->user_model->count_all_company_by_name_and_city($city, $name);
            $base_url = base_url() . 'search/'.$rate.'/' .'co_name/'. $name .'/'. 'city/' . $city;
        } elseif($this->input->post('city') && !$this->input->post('category') && $this->input->post('name')) { 
          //echo 'city_name_else';
            $city = $this->input->post('city');
            $category_id = '';
            $name = $this->input->post('name');
            $page = 1;
            $total_rows = $this->user_model->count_all_company_by_name_and_city($city, $name);
            $base_url = base_url() . 'search/'.$rate.'/' .'co_name/'. $name .'/'. 'city/' . $city;
        }
       //start only city and name
       
        
        //start search by city, category, name
        
        elseif ((($this->uri->segment(3) != 'category') && ($this->uri->segment(3) != 'city') && ($this->uri->segment(3) != 'name') && ($this->uri->segment(3) != 'co_name') && ($this->uri->segment(3) != '')) && ($this->uri->segment(4) != '') && ($this->uri->segment(5) != '') && ($this->uri->segment(6) != '')) {
          //echo 'cat_city_name';
            $category_id = $this->uri->segment(3);
            $city = $this->uri->segment(4);
            $name = $this->uri->segment(5);
            
            $page = $this->uri->segment(6);
            
            $total_rows = $this->user_model->count_all_company_by_city_and_category_and_name($category_id,$city,$name);
            $base_url = base_url() . 'search/'.$rate.'/' . $category_id . '/' . $city .'/'. $name;
        } elseif($this->input->post('city') && $this->input->post('category') && $this->input->post('name')) { 
            //echo 'cat_city_name_else';
            $city = $this->input->post('city'); 
            $category_id = $this->input->post('category');
            $name = $this->input->post('name');
            $page = 1;
            
            $total_rows = $this->user_model->count_all_company_by_city_and_category_and_name($category_id,$city,$name);
           $base_url = base_url() . 'search/'.$rate.'/' . $category_id . '/' . $city .'/'. $name;
        }
        
        //end search by city, category, name
        //echo 'page'.$page.'city'.$city.'cat'.$category_id;
        //echo $total_rows;exit;
        $data = array();
        //$value = 'highestrate';
        $this->load->library('pagination');
        
        $data['total_rows'] = $total_rows;

        $config['base_url'] = $base_url;


        $config['total_rows'] = $total_rows;

        $config['per_page'] = 10;

       /* if ($this->uri->segment(4)) {
            $page = ($this->uri->segment(4));
        } else {
            $page = 1;
        }*/
     if($page == 1){
        $start = ($page - 1) * $config['per_page'];
     }else{
        $start = $page;
     }

        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['uri_segment'] = 4;

         //start search by category
        if (($category_id != '') && (($city == '') || ($city == null)) && (($name == '') || (($name == null)))) { //echo 'category';

            //$all_company = $this->user_model->select_all_company_info_by_id_for_highestrate($rate,$category_id, $config['per_page'], $start);
            $all_company = $this->user_model->select_all_company_info_by_category($rate,$category_id, $config['per_page'], $start);
        }
        
         //start search by only city
        elseif ((($category_id == '') || (($category_id == null))) && (($name == '') || (($name == null))) &&($city != '')) { //echo 'city';
           // echo 'city';
            $all_company = $this->user_model->select_all_company_info_by_city($rate,$city, $config['per_page'], $start);
        }
        //start search by only name
        elseif ((($category_id == '') || (($category_id == null))) && (($city == '') || (($city == null))) && ($name != '' && $name !=null)) { //echo 'city';

            $all_company = $this->user_model->select_all_company_info_by_name($rate,$name, $config['per_page'], $start);
        }
        
         //start search by only category and city
        elseif ((($category_id != '')) && (($city != '')) && ($name == '')) { //echo 'both';

            $all_company = $this->user_model->select_all_company_info_by_id_for_highestrate_by_city_and_category($rate,$category_id, $city, $config['per_page'], $start);
        }
        
         //start search by only category and name
        elseif ((($category_id != '')) && (($city == '')) && ($name != '')) { //echo 'both';

            $all_company = $this->user_model->select_all_company_info_by_id_for_highestrate_by_name_and_category($rate,$category_id, $name, $config['per_page'], $start);
        }
        
         //start search by only city and name
        elseif ((($category_id == '')) && (($city != '')) && ($name != '')) { //echo 'both';

            $all_company = $this->user_model->select_all_company_info_by_id_for_highestrate_by_name_and_city($rate,$city, $name, $config['per_page'], $start);
        }
        
        
         //start search by only category , city and name
         elseif ((($category_id != '')) && (($city != '')) && ($name != '')) { //echo 'both';

            $all_company = $this->user_model->select_all_company_info_by_id_for_highestrate_by_city_and_category_and_name($rate,$category_id,$city,$name, $config['per_page'], $start);
        }
        //print_r($all_company);die();
        //echo $this->db->last_query(); exit;
        $data['all_company'] = $all_company;
        
        $data['city'] = $city;
        $data['category_id'] = $category_id;
        $data['name'] = $name;
        $data['page'] = $page;
    
        
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('includes/font_header', $data);
        $this->load->view('includes/slider', $data);
        $this->load->view('user/show_company_by_search', $data);
        $this->load->view('includes/font_footer', $data);
    }

}