<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('business_model');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->model('option');
    }
    
   /* public function company_detail_view(){
    
    if ($this->session->userdata('userid') == '') {
            redirect('joinnow');
        }
         
        $user_id = $this->session->userdata('userid'); 
	$data = array(); 
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();
	
        $company_id = $this->uri->segment(2);
        $data['company_detail'] = $this->option->FetchData('company_info','company_id='.$company_id);
        
        $condition = 'company_id='.$company_id.' '.'AND status=1';
        $data['reviews'] = $this->option->FetchData('review',$condition);
        $data['user_info'] = $this->option->get_by_id('user', 'user_id',$user_id );
		
	//print_r($data); die();
		
            $this->load->view('includes/font_header', $data);
	    $this->load->view('includes/slider', $data);			
            $this->load->view('user/company_detail',$data);
            $this->load->view('includes/font_footer');	
        
    }*/
    
        public function company_detail_view(){
    

        $user_id = $this->session->userdata('userid'); 
	$data = array(); 
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();
	
        $company_id = $this->uri->segment(2);
        $data['company_detail'] = $this->option->get_by_id('company_info','company_id',$company_id);
        //$data['company_detail'] = $this->option->FetchData('company_info','company_id='.$company_id);
        $data['avg_ratings'] = $this->option->count_avg_reviews($company_id);
        //print_r($data['avg_ratings']); die();
        $condition = 'company_id='.$company_id.' '.'AND status=1';
        $data['reviews'] = $this->option->FetchData('review',$condition);
        $data['user_info'] = $this->option->get_by_id('user', 'user_id',$user_id );
		
	//print_r($data); die();
		
            $this->load->view('includes/font_header', $data);
	    $this->load->view('includes/slider', $data);			
            $this->load->view('user/company_detail',$data);
            $this->load->view('includes/font_footer');	
        
    }
	
	public function save_review(){
	//echo time(); exit;
	   $data = array();
	   $data['comment'] = $this->input->post('review');
	   $data['rating'] = $this->input->post('rating');
	   $data['company_id'] = $this->input->post('company_id');
	   $data['created_by'] = $this->session->userdata('userid');
	   
	   date_default_timezone_set("Asia/Qatar"); 
	   $date = date('Y-m-d');
	   $data['create_time'] = $date;
	   
	   $this->db->insert('review', $data);
	   
	   $json = array();
	   $json['success'] = 'success';
	   
	  echo json_encode($json);
	   	   	     
		  
	}
}   