<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('business_model');
        $this->load->model('option');
        $this->load->library('form_validation');
    }

    public function login() {

        if ($this->session->userdata('admin_id') == '') {
            $this->load->view('admin/admin_login_view');
        } else {
            redirect('dashboard');
        }
    }

    public function dashboard() {

        if ($this->session->userdata('admin_id') != '') {
            $data['title'] = "Dashboard";
            $this->load->view('admin/admin_dashboard', $data);
        } else {
            redirect('admin');
        }
    }

    public function admin_login_check() {

        $data = array();
        $data['email'] = $this->input->post('admin_email', true);
        $data['password'] = md5($this->input->post('admin_password', true));
        $result = $this->admin_model->check_admin_login_info($data);
    }
    
     public function admin_manage_sms() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data = array();
        $data['title'] = 'View SMS';
        $data['sms_info'] = $this->option->FetchData('sms_info','');        //print_r($data);die();
        $this->load->view('admin/view_sms', $data);
    }
    
    public function delete_sms_info() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $sms_id = $this->uri->segment(2);
        $this->admin_model->delete_sms_by_id($sms_id);
        $this->session->set_flashdata("success", "SMS Deleted Successfully!!!");
        redirect('admin_manage_sms');
    }

    public function add_category() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data = array();
        $data['title'] = "Add Category";
        $data['categories'] = $this->admin_model->get_all_parent_categories();
        //print_r($categories); die();
        $this->load->view('admin/add_category', $data);
    }

    public function save_category() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[tbl_category.category_name]');

        if ($this->form_validation->run() == FALSE) {
            redirect('add_category');
        } else {
            $data = array();
            $data['category_name'] = $this->input->post('category_name');
            $data['parent'] = $this->input->post('parent');
            $date = time();
            $data['date_create'] = $date;
            //print_r($data);die();
            if ($data['parent'] == 0) {
                $last_id = $this->admin_model->save_category_info($data);
            } else {
                $last_id = $this->admin_model->save_category_info($data);
                $update = $this->admin_model->add_subcategory($data['parent'], $last_id);
            }
            if (isset($_FILES['category_icon']) && !empty($_FILES['category_icon']['name'])) {
                $icon = $_FILES['category_icon']['name'];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("category_icon");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->admin_model->update_category_icon($last_id, $icon);
                    if ($update == true) {
                        $this->session->set_flashdata('success', 'Successfully saved');
                        redirect('manage_category');
                    }
                }
            }
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('manage_category');
        }
    }

    public function manage_category() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $data = array();
        $data['title'] = "Manage Category";
        $data['all_category'] = $this->admin_model->select_all_category();
        $this->load->view('admin/manage_category', $data);
    }

    public function edit_category() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $category_id = $this->uri->segment(2);
        $data = array();
        $data['title'] = "Edit Category";
        $data['categories'] = $this->admin_model->get_all_parent_categories();
        $data['result'] = $this->admin_model->select_category_by_category_id($category_id);
        //print_r($data);die();
        $this->load->view('admin/admin_edit_category_form', $data);
    }

    public function update_category() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $category_id = $this->uri->segment(2);
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('edit_category/' . $category_id);
        } else {
            $data = array();
            $data['category_name'] = $this->input->post('category_name', true);
            $data['parent'] = $this->input->post('parent', true);
            $date = time();
            $data['date_create'] = $date;
            $this->admin_model->update_category_info($data, $category_id);

            if (isset($_FILES['category_icon']) && !empty($_FILES['category_icon']['name'])) {
                $icon = $_FILES['category_icon']['name'];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("category_icon");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->admin_model->update_category_icon($category_id, $icon);
                    if ($update == true) {
                        redirect('manage_category');
                    }
                }
            }


            $this->session->set_flashdata('success', 'Successfully updated');
            redirect('manage_category');
        }
    }

    public function delete_category($category_id) {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $this->admin_model->delete_category_by_id($category_id);
        $this->session->set_flashdata('success', 'Category Deleted Successfully');
        redirect('admin/manage_category');
    }

    public function add_city() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $data['title'] = "Add City";
        $this->load->view('admin/admin_add_city', $data);
    }

    public function save_city() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $this->form_validation->set_rules('city_name', 'City Name', 'required|is_unique[city.city_name]');

        if ($this->form_validation->run() == FALSE) {
            redirect('add_city');
        } else {
            $data = array();
            $data['city_name'] = $this->input->post('city_name', true);
            $result = $this->admin_model->save_city($data);

            if ($result == true) {
                $this->session->set_flashdata('success', 'City added successfully');
            }
            redirect('add_city');
        }
    }

    public function manage_city() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data['title'] = "Manage City";
        $data['all_city'] = $this->admin_model->select_all_city();

        $this->load->view('admin/admin_manage_city', $data);
    }

    public function edit_city() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $city_id = $this->uri->segment(2);
        $data = array();
        $data['title'] = "Edit City";
        $data['result'] = $this->admin_model->select_city_by_id($city_id);
        //print_r($data);die();
        $this->load->view('admin/admin_edit_city', $data);
    }

    public function update_city() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $city_id = $this->uri->segment(2);
        $this->form_validation->set_rules('city_name', 'City Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('edit_city/' . $city_id);
        } else {
            $data = array();
            $data['city_name'] = $this->input->post('city_name', true);

            $this->admin_model->update_city($data, $city_id);


            $this->session->set_flashdata('success', 'Successfully updated');
            redirect('manage_city');
        }
    }

    public function delete_city() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $city_id = $this->uri->segment(2);
        $this->admin_model->delete_city_by_id($city_id);
        $this->session->set_flashdata("success", "CityDeleted Successfully!!!");
        redirect('manage_city');
    }

    public function change_admin_password() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data = array();
        $data['title'] = "Change Password";
        $this->load->view('admin/admin_profile/change_admin_password', $data);
    }

    public function update_admin_password() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $admin_id = $this->session->userdata('admin_id');
        $this->form_validation->set_rules('old_pass', 'old_pass', 'required|trim');
        $this->form_validation->set_rules('new_pass', 'new_pass', 'required|trim');
        $this->form_validation->set_rules('conf_new_pass', 'conf_new_pass', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Validation error!!!');
            redirect('change_admin_password');
        } else {

            $md5_old_password = md5($this->input->post('old_pass'));
            $md5_new_password = md5($this->input->post('new_pass'));
            $md5_conf_password = md5($this->input->post('conf_new_pass'));

            if ($md5_new_password == $md5_conf_password) {

                $check_old_pass = $this->admin_model->check_old_password($admin_id, $md5_old_password);
                if ($check_old_pass == true) {
                    $new_password['password'] = $md5_new_password;
                    $save_new_pass = $this->admin_model->update_password($admin_id, $new_password);
                    if ($save_new_pass == true) {
                        $this->session->set_flashdata('success', 'New password updated successfully');
                        redirect('change_admin_password');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Type old password correctly');
                    redirect('change_admin_password');
                }
            } else {
                $this->session->set_flashdata('error', 'Confirm new password correctly');
                redirect('change_admin_password');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

    public function edit_admin_profile() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $data = array();
        $data['title'] = "Edit Profile";
        $data['admin_detail'] = $this->admin_model->get_admindetail($this->session->userdata('admin_id'));
        $this->load->view('admin/admin_profile/edit_admin_profile', $data);
    }

    public function update_admin_detail() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $admin_id = $this->uri->segment(2);
        $this->form_validation->set_rules('first_name', 'first_name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'last_name', 'required|trim');
        $this->form_validation->set_rules('user_mail', 'user_mail', 'required|trim');
        $this->form_validation->set_rules('user_name', 'user_name', 'required|trim');
        $this->form_validation->set_rules('user_type', 'user_type', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Validation error!!!');
            redirect('edit_admin_profile');
        } else {

            $data['first_name'] = strip_tags($this->input->post('first_name'));
            $data['last_name'] = strip_tags($this->input->post('last_name'));
            $data['user_mail'] = strip_tags($this->input->post('user_mail'));
            $data['user_name'] = strip_tags($this->input->post('user_name'));
            $data['access_level'] = strip_tags($this->input->post('user_type'));

            $update = $this->admin_model->update_admin_data($data, $admin_id);

            if ($update == true) {
                $this->session->set_flashdata('success', 'Admin information update successfully');
                redirect('edit_admin_profile');
            }
        }
    }

    public function manage_user() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $data['title'] = "Manage Users";
        $data['all_user'] = $this->admin_model->select_all_users();

        $this->load->view('admin/manage_users', $data);
    }

    public function edit_user() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $user_id = $this->uri->segment(2);
        $data['title'] = "Editt User";
        $data['user'] = $this->admin_model->select_user_by_id($user_id);

        $this->load->view('admin/edit_user', $data);
    }

    public function update_user() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $user_id = $this->uri->segment(2);
        $this->form_validation->set_rules('first_name', 'first_name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'last_name', 'required|trim');
        $this->form_validation->set_rules('user_mail', 'user_mail', 'required|trim');
        $this->form_validation->set_rules('user_name', 'user_name', 'required|trim');
        $this->form_validation->set_rules('access_level', 'access_level', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Validation error!!!');
            redirect('edit_user/' . $user_id);
        } else {

            $data['first_name'] = strip_tags($this->input->post('first_name'));
            $data['last_name'] = strip_tags($this->input->post('last_name'));
            $data['user_mail'] = strip_tags($this->input->post('user_mail'));
            $data['user_name'] = strip_tags($this->input->post('user_name'));
            $data['access_level'] = strip_tags($this->input->post('access_level'));

            $update = $this->admin_model->update_admin_data($data, $user_id);

            if ($update == true) {
                $this->session->set_flashdata('success', 'User information update successfully');
                redirect('manage_user');
            }
        }
    }

    public function delete_user() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $user_id = $this->uri->segment(2);
        $this->admin_model->delete_user_by_id($user_id);
        $this->session->set_flashdata("success", "User Deleted Successfully!!!");
        redirect('manage_user');
    }

    public function manage_reviews() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $data['title'] = "Manage Reviews";
        $data['all_reviews'] = $this->admin_model->select_all_reviews();
        //print_r($data['all_reviews']); die();

        $this->load->view('admin/manage_reviews', $data);
    }

    public function delete_review() {
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $review_id = $this->uri->segment(2);
        $this->admin_model->delete_review_by_id($review_id);
        $this->session->set_flashdata("success", "Review Deleted Successfully!!!");
        redirect('manage_reviews');
    }

    public function update_review_status() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }

        $review_id = $this->uri->segment(2);
        $status = $this->uri->segment(3);
        $update = $this->admin_model->update_review_data($review_id, $status);

        if ($update == true) {
            $this->session->set_flashdata('success', 'Review status updated successfully');
            redirect('manage_reviews');
        }
    }

    public function admin_site_settings() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data = array();
        $data['title'] = 'Site Settings';
        $data['settings'] = $this->admin_model->get_settings();        //print_r($data);die();
        $this->load->view('admin/admin_profile/site_settings', $data);
    }

 public function update_site_settings() {

        $site = array();
        $site['site_name'] = $this->input->post('site_name');
        $site['site_address'] = $this->input->post('site_address');
        $site['site_telephone'] = $this->input->post('site_telephone');
        $site['site_email'] = $this->input->post('site_email');
        $site['site_website'] = $this->input->post('site_website');
        $site['site_facebook'] = $this->input->post('site_facebook');
        $site['site_twitter'] = $this->input->post('site_twitter');
        $site['product_token'] = $this->input->post('product_token');
        $site['verification_message'] = $this->input->post('verification_message');
        
        //print_r($site);die();
       if(!empty($site['site_name'])){
            $key = 'site_name';
            $value = $site['site_name'];
            $this->admin_model->update_settings($value,$key);
       }
       if(!empty($site['site_address'])){
            $key = 'site_address';
            $value = $site['site_address'];
            $this->admin_model->update_settings($value,$key);
       }
       if(!empty($site['site_telephone'])){
            $key = 'site_telephone';
            $value = $site['site_telephone'];
            $this->admin_model->update_settings($value,$key);
       }
       if(!empty($site['site_email'])){
            $key = 'site_email';
            $value = $site['site_email'];
            $this->admin_model->update_settings($value,$key);
       }
       if(!empty($site['site_website'])){
          
            $parsed = parse_url($site['site_website']);
            if (empty($parsed['scheme'])) {
                $urlStr = 'http://' . ltrim($site['site_website'], '/');
                $value = $urlStr;
            } //echo $urlStr; exit;
            else {
               $value = $site['site_website'];
            }
            
            $key = 'site_website';
            $this->admin_model->update_settings($value,$key);
       }
       
       if(!empty($site['site_facebook'])){
           
           $parsed = parse_url($site['site_facebook']);
            if (empty($parsed['scheme'])) {
                $urlStr = 'http://' . ltrim($site['site_facebook'], '/');
                $value = $urlStr;
            } //echo $urlStr; exit;
            else {
               $value = $site['site_facebook'];
            }
            
            $key = 'site_facebook';
            $this->admin_model->update_settings($value,$key);
       }
       
       if(!empty($site['site_twitter'])){
           
            $parsed = parse_url($site['site_twitter']);
            if (empty($parsed['scheme'])) {
                $urlStr = 'http://' . ltrim($site['site_twitter'], '/');
                $value = $urlStr;
            } //echo $urlStr; exit;
            else {
               $value = $site['site_twitter'];
            }
            
            $key = 'site_twitter';
            $this->admin_model->update_settings($value,$key);
       }
        if(!empty($site['product_token'])){
            $key = 'product_token';
            $value = $site['product_token'];
            $this->admin_model->update_settings($value,$key);
       }
       
        if(!empty($site['verification_message'])){
            $key = 'verification_message';
            $value = $site['verification_message'];
            $this->admin_model->update_settings($value,$key);
       }
       //echo 'success';exit;
       
       redirect('admin/admin_site_settings');
        
        
    }
    
 public function add_spot(){        
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data['title'] = "Add Spot";
        $data['all_company'] = $this->business_model->select_all_company();
        $this->load->view('admin/add_spot', $data);
    }
    
    public function save_spot(){
        $data=array();
        $data['title']="Save Spot";     
        $this->form_validation->set_rules('company_id', 'Company Name', 'required');
        $this->form_validation->set_rules('spot_description', 'Spot Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data=array();
            $data['title']="Save Spot";  
            $this->load->view('admin/add_spot', $data);
        } else {
            $data = array();
            $data['date'] = $this->input->post('date', true);
            $data['company_id'] = $this->input->post('company_id', true);
            $data['spot_description'] = $this->input->post('spot_description', true);
            $this->db->insert('spot_info', $data);
            $lastid = $this->db->insert_id();
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {              
                $spot_image = $_FILES['image']['name'];
                $config['upload_path'] = './spot_image/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("image");
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->admin_model->update_spot_image($lastid, $spot_image);
                    if ($update == true) {
                        redirect('add_spot');
                    }
                }
            }
             redirect('add_spot');           
        }  
    }
    
    public function delete_spot(){
        $spot_id = $this->uri->segment(2);
        $this->admin_model->delete_spot_by_id($spot_id);
        redirect('manage_spot');
    }
    
    public function edit_spot(){
       $data=array();
       $data['title']="Edit Spot"; 
       $spot_id = $this->uri->segment(2);
       $data['all_company'] = $this->business_model->select_all_company();
       $data['spot_info']= $this->admin_model->select_all_spot_by_id($spot_id);
       $this->load->view('admin/edit_spot', $data);  
    }

    public function manage_spot(){
       $data=array();
       $data['title']="Manage Spot";  
       $data['all_info']= $this->admin_model->select_all_spot();
       $this->load->view('admin/manage_spot', $data); 
    }
    
    public function update_spot(){
        $data=array();
        $data['title']="Save Spot";     
        $this->form_validation->set_rules('company_id', 'Company Name', 'required');
        $this->form_validation->set_rules('spot_description', 'Spot Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data=array();
            $data['title']="Save Spot";  
            $this->load->view('admin/add_spot', $data);
        } else {
            $data = array();
            $data['date'] = $this->input->post('date', true);
            $data['company_id'] = $this->input->post('company_id', true);
            $data['spot_description'] = $this->input->post('spot_description', true);
            $this->db->insert('spot_info', $data);
            $spot_id = $this->uri->segment(2);
            $result=$this->admin_model->update_spot_by_spot_id($spot_id,$data); 
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {              
                $spot_image = $_FILES['image']['name'];
                $config['upload_path'] = './spot_image/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("image");
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->admin_model->update_spot_image($spot_id, $spot_image);
                    if ($update == true) {
                        redirect('add_spot');
                    }
                }
            }
             redirect('add_spot');           
        } 
    }

}