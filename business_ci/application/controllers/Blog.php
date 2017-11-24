<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
       $this->load->model('blog_model');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->model('option');
        $this->load->library('form_validation');
    }

    public function add_blog_category() {
  if ($this->session->userdata('admin_id') != '') {
        $data=array();
        $data['title']="Add Blog Category";   
        $this->load->view('admin/blog_category',$data);
  }else{
             redirect('admin');
        }
    }

    public function save_blog_category() {
        $data=array();
        $data['title']="Save Blog Category";   
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[blog_category.category_name]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/blog_category', $data);
        } else {
            $data = array();
            $date = date("Y-m-d");
            $data['category_name'] = $this->input->post('category_name', true);
            $data['publication_date'] = $date;
            $result = $this->blog_model->save_blog_info($data);
            $this->session->set_flashdata('success', 'Successfully saved');
            redirect('blog');
        }
    }

    public function manage_blog_category() {
        $data=array();
        $data['title']="Manage Blog Category"; 
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'manage_blog_category';
        $config['total_rows'] = $this->db->count_all('blog_category');
        $config['per_page'] = 5;
        $start = $this->uri->segment(3);
//----------------------------------get actual design------------------------------
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        //$config['display_pages'] = FALSE;
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
        if (count($_GET) > 0)
            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $data['all_category'] = $this->blog_model->select_all_category($config['per_page'], $start);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/manage_blog_category', $data);
    }

    public function edit_blog_category() {
        $data=array();
        $data['title']="Edit Blog Category"; 
        $category_id = $this->uri->segment(2);
        $data['result'] = $this->blog_model->select_blog_category_by_category_id($category_id);
        $this->load->view('admin/blog_category_edit_form', $data);
    }

    public function update_blog_category() {
        $data=array();
        $data['title']="Update Blog Category"; 
        $category_id = $this->uri->segment(2);
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/edit_blog_category',$data);
        } else {
            $data = array();
            $data['category_name'] = $this->input->post('category_name', true);
            $this->blog_model->update_blog_category_info($data, $category_id);
            redirect('edit_blog_category/' . $category_id);
            $this->session->set_flashdata('success', 'Successfully updated');
        }
    }

    public function delete_blog_category() {
        $category_id = $this->uri->segment(2);
        $this->blog_model->delete_blog_category_by_id($category_id);
        redirect('manage_blog_category');
    }

    public function add_blog_post() {
        $data=array();
        $data['title']="Add Blog Category"; 
        $data['all_user'] = $this->blog_model->select_all_user_for_blog();
        $data['all_category'] = $this->blog_model->select_all_blog_category();
        $this->load->view('admin/add_blog_post', $data);
    }

    public function save_blog_post() {
        $data=array();
        $data['title']="Save Blog Category";     
        $this->form_validation->set_rules('blog_title', 'Blog Title', 'required|is_unique[blog_post.blog_title]');
        $this->form_validation->set_rules('blog_description', 'Blog Description', 'required');
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('user_id', 'User Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $data['all_user'] = $this->blog_model->select_all_user_for_blog();
            $data['all_category'] = $this->blog_model->select_all_blog_category();
            $this->load->view('admin/add_blog_post', $data);
        } else {
            $data = array();
            $date = date("Y-m-d");
            $data['publication_date'] = $date;
            $data['blog_title'] = $this->input->post('blog_title', true);
            $data['blog_description'] = $this->input->post('blog_description', true);
            $data['category_id'] = $this->input->post('category_id', true);
            $data['user_id'] = $this->input->post('user_id', true);
            $data['status'] = $this->input->post('status', true);
            $this->db->insert('blog_post', $data);
            $lastid = $this->db->insert_id();

            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $blog_image = $_FILES['image']['name'];
                $config['upload_path'] = './blog_uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("image");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->blog_model->update_blog_image($lastid, $blog_image);
                    if ($update == true) {
                        redirect('add_blog_post');
                    }
                }
            }
        }
    }
    
    public function manage_blog_post(){
        $data=array();
        $data['title']="Manage Blog Post"; 
        $data['all_info'] = $this->blog_model->select_all_blog_post(); 
        $this->load->view('admin/manage_blog_post', $data);
    }
    
    public function delete_blog_post(){
        $post_id = $this->uri->segment(2);
        $this->blog_model->delete_blog_post_by_id($post_id);
        redirect('manage_blog_post'); 
    }
    
    public function edit_blog_post(){
        $post_id = $this->uri->segment(2);
        $data = array();
        $data['title']="Edit Blog Post";
        $data['all_user'] = $this->blog_model->select_all_user_for_blog();
        $data['all_category'] = $this->blog_model->select_all_blog_category();
        $data['result'] = $this->blog_model->select_blog_post_by_post_id($post_id);
        $this->load->view('admin/edit_blog_post', $data); 
    }
    
    public function update_blog_post(){   
        $post_id = $this->input->post('post_id', true);
        $this->form_validation->set_rules('blog_title', 'Blog Title', 'required');
        $this->form_validation->set_rules('blog_description', 'Blog Description', 'required');
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('user_id', 'User Name', 'required');

        if ($this->form_validation->run() == FALSE) {
           redirect('edit_blog_post');
        } else {
            $data = array();
            $data['blog_title'] = $this->input->post('blog_title', true);
            $data['blog_description'] = $this->input->post('blog_description', true);
            $data['category_id'] = $this->input->post('category_id', true);
            $data['user_id'] = $this->input->post('user_id', true);
            $data['status'] = $this->input->post('status', true);           
            $post_id = $this->input->post('post_id', true);
            $result=$this->blog_model->update_blog_post_by_post_id($post_id,$data);           
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $blog_image = $_FILES['image']['name'];
                $config['upload_path'] = './blog_uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '52428800';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $fileinfo = $this->upload->do_upload("image");
                //print_r($company);die();
                if (!$fileinfo) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $update = $this->blog_model->update_blog_image_by_post_id($post_id, $blog_image);
                    if ($update == true) {
                       redirect('manage_blog_post');
                    }
                }
            }
             redirect('manage_blog_post');
        }
    }
    
    public function unpublished_category(){
    $category_id = $this->uri->segment(2);
    $this->blog_model->unpublished_category_by_category_id($category_id);
    redirect('manage_blog_category');
    }
    
    public function published_category(){
    $category_id = $this->uri->segment(2);
    $this->blog_model->published_category_by_category_id($category_id);
    redirect('manage_blog_category');
    }
    
    public function unpublished_post(){
        $post_id = $this->uri->segment(2);
        $this->blog_model->unpublished_post_by_post_id($post_id);
        redirect('manage_blog_post');
    }
    
    public function published_post(){
         $post_id = $this->uri->segment(2);
        $this->blog_model->published_post_by_post_id($post_id);
        redirect('manage_blog_post');
    }

   public function view_blog(){
        $data = array();
        $data['title']="View Blog";
        $this->load->library('pagination');
        $data['total_rows'] = $this->blog_model->count_all_blog();
        $config['base_url'] = base_url() . 'view_blog/';
        $config['total_rows'] = $this->blog_model->count_all_blog();
        $config['per_page'] = 5;
        if ($this->uri->segment(2)) {
            $page = ($this->uri->segment(2));
        } else {
            $page = 1;
        }
        if($page==1){
             $start = ($page - 1) * $config['per_page'];
        }
       else{
          $start=$page; 
       }
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
        $config['uri_segment'] = 2; 
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['recent_post'] = $this->blog_model->select_recent_next_published_post_details_by_post_id();
        $data['all_blog']= $this->blog_model->select_all_blog($config['per_page'], $start);  
        $data['slider_category'] = $this->user_model->select_some_category();
        $data['slider_category2'] = $this->user_model->select_some_category2();
        $this->load->view('includes/font_header', $data);
        $this->load->view('includes/slider', $data);
        $this->load->view('user/blog/blog_view',$data);
     }
     
     public function recent_post(){
     $post_id = $this->uri->segment(2); 
     $data['title']="Recent Post";
     $data['recent_post_details'] = $this->blog_model->select_recent_published_post_details_by_post_id($post_id);
     }

public function blog_detail(){
      $post_id = $this->uri->segment(2); 
      $data = array(); 
      $data['title']="blog detail";
      $data['slider_category'] = $this->user_model->select_some_category();   
      $data['slider_category2'] = $this->user_model->select_some_category2();    
      $data['blog_detail'] = $this->blog_model->select_recent_published_post_details_by_post_id($post_id);
      $data['latest_blog_detail'] = $this->blog_model->select_recent_next_published_post_details_by_post_id();
      $data['user_info'] = $this->option->get_by_id('user', 'user_id',$this->session->userdata('userid'));
      $condition = 'post_id='.$post_id.' '.'AND status=0';
      $data['comments'] = $this->option->FetchData('comments',$condition);
      $this->load->view('includes/font_header', $data);
      $this->load->view('includes/slider', $data);			
      $this->load->view('user/blog/blog_detail',$data);
      $this->load->view('includes/font_footer');
     }

public function save_comment(){
           $data = array();
	   $data['comments'] = $this->input->post('review');
	   $data['post_id'] = $this->input->post('post_id');
	   $data['user_id'] = $this->session->userdata('userid');	   
	   date_default_timezone_set("Asia/Qatar"); 
	   $date = date('Y-m-d');
	   $data['date'] = $date;	   
	   $this->db->insert('comments', $data);	   
	   $json = array();
	   $json['success'] = 'success';	   
	   echo json_encode($json);
	   	   	     
     }
     
}
