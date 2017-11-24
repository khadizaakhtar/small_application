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
        $data['multiple_image'] = $this->option->UsersData('company_images','company_id='.$company_id);
		
	//print_r($data); die();
		
            $this->load->view('includes/font_header', $data);
	    $this->load->view('includes/slider', $data);			
            $this->load->view('user/company_detail',$data);
            $this->load->view('includes/font_footer');	
        
    }*/
    public function company_detail_view() {


        $user_id = $this->session->userdata('userid');
        $data = array();
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();

        $company_id = $this->uri->segment(2);
        $data['company_detail'] = $this->option->get_by_id('company_info', 'company_id', $company_id);
        //$data['company_detail'] = $this->option->FetchData('company_info','company_id='.$company_id);
        $data['avg_ratings'] = $this->option->count_avg_reviews($company_id);
        $data['multiple_image'] = $this->option->FetchData('company_images', 'company_id='.$company_id);
        //echo $this->db->last_query();exit;
        //print_r($data['multiple_image']); die();
        //$condition = 'company_id='.$company_id.' '.'AND status=1';
        //$condition .= 'LIMIT 2';
        $data['reviews'] = $this->option->get_by_id_with_limit('review', 'company_id', $company_id, 2,0); //$table, $fieldname, $id, $limit
        $data['user_info'] = $this->option->get_by_id('user', 'user_id', $user_id);

        //print_r($data); die();

        $this->load->view('includes/font_header', $data);
        $this->load->view('includes/slider', $data);
        $this->load->view('user/company_detail', $data);
        $this->load->view('includes/font_footer');
    }
    
     public function loadmore() {
        date_default_timezone_set("Asia/Qatar");
      $limit = $this->input->post('limit'); //echo $limit;
      $offset = $this->input->post('offset');
      $company_id = $this->input->post('company_id');      
      $result  = $this->option->get_by_id_with_limit('review', 'company_id', $company_id, $limit,$offset);
      //echo '<pre>'; print_r($result);die();
      if(!empty($result)){
      $data['view'] = '<div>';
      foreach ($result as $res) {
          $user_info = $this->option->UsersData('user', 'user_id=' . $res->created_by);
          $data['view'] .= '<div class="grid1">';
          $data['view'] .= '<div class="col-md-12" style="background-color:white; padding-bottom:10px; margin-bottom: 15px;">';
          $data['view'] .= ' <ul class="website parent-container">';
          $data['view'] .= '<li>';
          foreach ($user_info as $user) { 
               $data['view'] .= '<img src="'.base_url('uploads/'.$user->user_image).'" class="img-responsive featured-img avatar" alt=""/></li>';
          }
          $data['view'] .= '<li><p>'.$res->comment.'</p></li>';
          $data['view'] .= '<div class="clearfix"></div>';
          $data['view'] .= '</li></ul>';
          $data['view'] .= '<ul class="website parent-container">';
          $data['view'] .= '<li><a href="">';
           foreach ($user_info as $user) {
               $data['view'] .= $user->user_name;
           }
          $data['view'] .= '</a></li><span>.</span>';
          $data['view'] .= '<li>';
         //$data['view'] .= date_default_timezone_set("Asia/Qatar");
          $data['view'] .= date('M-d-Y', strtotime($res->create_time));
          $data['view'] .= '</li><span>.</span>';
          $data['view'] .= '<li>';
          $data['view'] .= '<span>5/'.$res->rating.'</span>';
          $data['view'] .= '</li>';
          $data['view'] .= '</ul>';
          $data['view'] .= '</div></div>';
      }
      $data['view'] .= '</div>';
      }else{
          $data['view'] = '';
      }
      //$data['view'] = $result;
      $data['offset'] =$offset + 2;
      $data['limit'] = $limit;
      echo json_encode($data);
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
        
        public function service_agreement(){
           // echo 123; exit;
           
            $data=array();
            $data['title'] = 'Service Agreement';
            $this->load->view('includes/font_header', $data);			
            $this->load->view('user/service_agreement',$data);
            $this->load->view('includes/font_footer');	
        }
        
        public function contact_us(){
            
            $data=array();
            $data['title'] = 'Contact Us';
            $data['settings'] = $this->admin_model->get_settings();  
            $this->load->view('includes/font_header', $data);			
            $this->load->view('user/contact_us',$data);
            $this->load->view('includes/font_footer');	
        }
        
        public function contact_with_authority(){
            
            $this->form_validation->set_rules('subject', 'subject', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('message', 'message', 'required');
            
             if ($this->form_validation->run() == FALSE) {
                 
            $data=array();
            $data['title'] = 'Contact Us';
            $this->load->view('includes/font_header', $data);			
            $this->load->view('user/contact_us',$data);
            $this->load->view('includes/font_footer');	
             }else{
                 
           
            $subject = $this->input->post('subject', true);  //echo $subject;
            $sender_name = $this->input->post('name', true);  //echo $name;
            $sender_email = $this->input->post('email', true); //echo $email;
            $sender_phone = $this->input->post('phone', true); //echo $phone;
            $sender_message = $this->input->post('message', true); //echo $message; exit;
            

            $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = 'Name:'.' '.$sender_name.' '.'Email:'.' '.$sender_email.' '.'Phone:'.$sender_phone.'<br>';
            $message .= $sender_message;
            
            $settings = $this->admin_model->get_settings(); 
            $email = $settings['site_email'];

            //echo $message; exit;
            mail($email, $subject, $message, $headers);
            
            $this->session->set_flashdata("success", "Your mail has sent successfully!!!");
            redirect('contact_us');
            
          }
        }
        
        public function about_us(){
            
             $data=array();
            $data['title'] = 'About Us';
            $data['settings'] = $this->admin_model->get_settings();  
            $this->load->view('includes/font_header', $data);			
            $this->load->view('user/about_us',$data);
            $this->load->view('includes/font_footer');	
        }
}   