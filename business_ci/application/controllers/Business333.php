<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('business_model');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->model('option');
    }

    /* Start Admin Business */

    public function admin_manage_company() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data['title'] = "Manage Company";
        $data['all_company'] = $this->business_model->select_all_company();
        //print_r($data);die();
        $this->load->view('admin/manage_company', $data);
    }

    public function admin_add_company() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $data['title'] = "Add Company";
        $data['city'] = $this->business_model->get_allcity();
        $data['categories'] = $this->admin_model->get_all_categories();
        $this->load->view('admin/add_company', $data);
    }

    public function admin_save_company() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
      
        $data = array();
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('company_description', 'company_description', 'required');
        $this->form_validation->set_rules('company_address', 'company_address', 'required');
        $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
        $this->form_validation->set_rules('company_email', 'company_email', 'required|trim|valid_email');
        $this->form_validation->set_rules('city_name', 'city_name', 'required');
        $this->form_validation->set_rules('category_name', 'category_name', 'required');

        if ($this->form_validation->run() == FALSE) { //echo 123; exit;
            $data['title'] = "Add Company";
            $data['city'] = $this->business_model->get_allcity();
            $data['categories'] = $this->admin_model->get_all_categories();
            $this->load->view('admin/add_company', $data);
        } else { //echo 2345; exit;
            
  
            $data['user_id'] = $this->session->userdata('admin_id');
            $country_code = $this->input->post('country_code');
            $data['company_name'] = $this->input->post('company_name');
            $data['company_description'] = $this->input->post('company_description');
            $data['company_address'] = $this->input->post('company_address');
            $data['mobile_number'] = $country_code . $this->input->post('mobile_number');
            $data['email'] = $this->input->post('company_email');
            $data['phone_number'] = $this->input->post('phone_number');
            $data['fax'] = $this->input->post('fax');
            $data['city_id'] = $this->input->post('city_name');
            $data['category_id'] = $this->input->post('category_name');
            $data['sub_category_id'] = $this->input->post('sub_category_id');
            $data['company_website'] = $this->input->post('company_uri');
            $data['facebook_link'] = $this->input->post('facebook_uri');
            $data['twitter_link'] = $this->input->post('twitter_uri');
            $data['latitude'] = $this->input->post('latitude');
            $data['longitude'] = $this->input->post('longitude');
            
            //date_default_timezone_set('Asia/Aden');
            ///$date = date_default_timezone_get();
            $date = time();
            $data['date_create'] = $date;

            //print_r($data);die();
            $this->db->insert('company_info', $data);
            //echo $this->db->last_query();exit;
            $lastid = $this->db->insert_id();

            //print_r($_FILES['company_logo']['name']);die();
            if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name'])) {
                $logo = $_FILES['company_logo']['name'];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("company_logo");
                //print_r($company);die();
                if (!$fileinfo) { //echo 123;exit;
                    $data['error'] = $this->upload->display_errors();
                } else { //echo 2345; exit;
                    $update = $this->business_model->update_company_logo($lastid, $logo);
                    if ($update == true) {
                        redirect('manage_company');
                    }
                }
            }
            redirect('manage_company');
        }
    }

    public function delete_company() {     //admin
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $company_id = $this->uri->segment(2);
        $this->business_model->delete_company_by_id($company_id);
        $this->session->set_flashdata("success", "Data Deleted Successfully!!!");
        redirect('manage_company');
    }

    public function edit_company() {     //admin
        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
        $company_id = $this->uri->segment(2);
        $data = array();
        $data['title'] = "Edit Company";
        $data['city'] = $this->option->FetchData('city','');
        $data['categories'] = $this->option->FetchData('tbl_category','parent=0');
       // $data['sub_categories'] = $this->option->FetchData('tbl_category','parent <> 0');
        $data['result'] = $this->business_model->select_company_by_company_id($company_id);
       //print_r($data);die();
        $this->load->view('admin/edit_company', $data);
    }

    public function update_company() {

        if ($this->session->userdata('admin_id') == '') {
            redirect('admin');
        }
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
            $data['title'] = "Edit Company";
            $data['city'] = $this->option->FetchData('city','');
            $data['categories'] = $this->option->FetchData('tbl_category','parent=0');
            //$data['sub_categories'] = $this->option->FetchData('tbl_category','parent <> 0');
            $data['result'] = $this->business_model->select_company_by_company_id($company_id);
            //print_r($data['result']);die();
            $this->load->view('admin/edit_company', $data);
            
        } else { //echo 456; exit;
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
            $data['latitude'] = $this->input->post('latitude', true);
            $data['longitude'] = $this->input->post('longitude', true);
            $data['date_create'] = $date;


            $this->business_model->update_company_info($data, $company_id);

            if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name'])) {
                $logo = $_FILES['company_logo']['name'];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("company_logo");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->business_model->update_company_logo($company_id, $logo);
                    if ($update == true) {
                        redirect('manage_company');
                    }
                }
            }


            $this->session->set_flashdata('success', 'Successfully updated');
            redirect('manage_company');
        }
    }

    /* End Admin Business */

    /* Start Front Business */

    public function list_a_business() {

        if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
       
        $data = array();
        $this->form_validation->set_rules('company_name', 'company_name', 'required|trim');
        if ($this->form_validation->run() == FALSE) {       // echo 123; exit;
        
            $data['slider_category'] = $this->user_model->select_some_category();
            $data['slider_category2'] = $this->user_model->select_some_category2(); 
            $data['city'] = $this->option->FetchData('city', '');
            $data['category'] = $this->option->FetchData('tbl_category', 'parent = 0');
			
			$this->load->view('includes/font_header', $data);
			$this->load->view('includes/main_slider', $data);
			$this->load->view('includes/slider', $data);
            $this->load->view('list_a_business', $data);
			$this->load->view('includes/font_footer_top');
			$this->load->view('includes/font_footer');		
        } else {

            $company = array();
            
            $company['user_id'] = $this->session->userdata('userid');
            $company['company_name'] = $this->input->post('company_name');
            $company['company_description'] = $this->input->post('company_description');
            $company['company_address'] = $this->input->post('company_address');
            $country_code =  $this->input->post('country_code');
            $company['mobile_number'] = $country_code.$this->input->post('mobile_number');
            $company['email'] = $this->input->post('company_email');
            $company['phone_number'] = $this->input->post('phone_number');
            $company['fax'] = $this->input->post('fax');
            $company['city_id'] = $this->input->post('city_name');
            $company['category_id'] = $this->input->post('category_id');
            $company['sub_category_id'] = $this->input->post('sub_category_id');
			
	        date_default_timezone_set("Asia/Qatar"); 
	        $date = date('Y-m-d');
	        $company['date_create'] = $date;
			
			$company_url = $this->input->post('company_uri'); 
			$parsed = parse_url($company_url);
			if (empty($parsed['scheme'])) {
                 $urlStr = 'http://' . ltrim($company_url, '/');
				 $company['company_website'] = $urlStr;
            } //echo $urlStr; exit;
			else{
			   $company['company_website'] = $company_url;
			}
			
			$facebook_url = $this->input->post('facebook_uri');
			$parsed1 = parse_url($facebook_url);
			if (empty($parsed1['scheme'])) {
                 $urlStr = 'http://' . ltrim($facebook_url, '/');
				 $company['facebook_link'] = $urlStr;
            } //echo $urlStr; exit;
			else{
			   $company['facebook_link'] = $facebook_url;
			}

			$twitter_url = $this->input->post('twitter_uri');
			$parsed2 = parse_url($twitter_url);
			if (empty($parsed2['scheme'])) {
                 $urlStr = 'http://' . ltrim($twitter_url, '/');
				 $company['twitter_link'] = $urlStr;
            } //echo $urlStr; exit;
			else{
			   $company['twitter_link'] = $twitter_url;
			}

            $company['latitude'] = $this->input->post('latitude');
            $company['longitude'] = $this->input->post('longitude');   //print_r($company);die();
            $this->db->insert('company_info', $company);
            $lastid = $this->db->insert_id(); //echo $lastid; exit;
            // print_r($_FILES['company_logo']['name']);die();
            if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name'])) {
                $logo = $_FILES['company_logo']['name'];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("company_logo");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->business_model->update_company_logo($lastid, $logo);
                    if ($update == true) {
                        $this->session->set_flashdata("success", "Company added Successfully!!!");
                        redirect('listbusiness');
                    }
                }
            }
            $this->session->set_flashdata("success", "Company added Successfully!!!");
            redirect('listbusiness');
        }
    }

    public function get_subcategory_ajax() {

        $json = array();
        $data = array();
        $parent_id = $this->input->post('parent');
        $data['sub_category'] = $this->option->FetchData('tbl_category', 'parent =' . $parent_id);
        //print_r($data);die();
        if (!empty($data['sub_category'])) {
            $json['success'] = 1;
            $json['box'] = '<select class="form-control" name="sub_category_id" id="category_id">';
            $json['box'] .= '<option>Select Sub Catagory</option>';
            foreach ($data['sub_category'] as $value) {
                $json['box'] .= '<option value="' . $value->category_id . '">' . $value->category_name . '</option>';
            }
            $json['box'] .= '</select>';
        } else {
            $json['success'] = 0;
            $json['box'] = '<select class="form-control" name="sub_category_id" id="category_id">';
            $json['box'] .= '<option>Select Sub Catagory</option>';
            $json['box'] .= '<option>No Sub Category Found!!!</option>';
            $json['box'] .= '</select>';
        }
        echo json_encode($json);
    }

}