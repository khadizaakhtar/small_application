<?php

class Admin_Model extends CI_Model {

    public function check_admin_login_info($data) {
        $query = $this->db->get_where('user', array('user_mail' => $data['email'], 'password' => $data['password'], 'access_level' => 1));
        //echo $this->db->last_query();exit;     
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $session = array(
                    'admin_id' => $row->user_id,
                    'admin_name' => $row->user_name,
                );
            }

            $this->session->set_userdata($session);
            redirect('admin');
        } else {
            $this->session->set_flashdata('loginerr', ' Wrong Email and Password . Try Again');
            redirect('Admin/login');
        }
    }

    public function save_category_info($data) {
        $this->db->insert('tbl_category', $data);
        return $this->db->insert_id();
    }

    public function add_subcategory($parent, $last_id) {

        $this->db->where('category_id', $last_id);
        $this->db->set('parent', $parent);
        $this->db->update('tbl_category');
    }

    function get_all_parent_categories() {
        $this->db->order_by('category_id', "asc");
        $this->db->where('parent', 0);
        $query = $this->db->get('tbl_category');
        return $query->result();
    }

    public function get_parent_name_by_id($parent) {
        $this->db->select('category_name');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $parent);
        $query_result = $this->db->get();
        $result = $query_result->row();        //print_r($result);die();
        return $result;
    }

    public function select_all_category() { 
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    function select_category_by_category_id($category_id) {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_category_info($data, $category_id) {
        // print_r($data);die();
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
        //echo $this->db->last_query();exit;
    }
    
    public function update_category_icon($category_id,$icon){
        
        $this->db->where('category_id',$category_id);
        $this->db->set('category_icon',$icon); 
        $this->db->update('tbl_category'); 
        //echo $this->db->last_query();exit;
            return true;
    }

    public function delete_category_by_id($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('tbl_category');
    }
    
    public function delete_sms_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete('sms_info');
        }
    

    public function check_email_address_info($email) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_mail', $email);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_postcode_by_userid($userid, $code) {
        $this->db->where('user_id', $userid);
        $this->db->set('postcode', $code);
        $this->db->update('user');
    }

    public function check_code_for_reset_password($code) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('postcode', $code);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_forgot_password_info($data, $code) {
        $this->db->where('postcode', $code);
        $this->db->set('password', $data);
        $this->db->update('user');
    }

    public function save_city($data) {

        $this->db->insert('city', $data);
        //echo $this->db->last_query();exit;
        return true;
    }

    public function select_all_city() {

        $this->db->select('*');
        $this->db->from('city');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_city_by_id($city_id) {

        $this->db->select('*');
        $this->db->from('city');
        $this->db->where('city_id', $city_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_city($data, $city_id) {

        $this->db->where('city_id', $city_id);
        $this->db->update('city', $data);
    }
    
     public function delete_city_by_id($city_id){
        $this->db->where('city_id', $city_id);
        $this->db->delete('city');
    }

    public function get_all_child_categories($cat_id) {

        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('parent', $cat_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function get_all_categories() {

        $this->db->order_by('category_name', 'asc');
        $query = $this->db->get_where('tbl_category', array('parent' => 0)); //,array('parent'=>0)
        $categories = array();
        foreach ($query->result() as $row) {
            array_push($categories, $row);
        }
        // echo '<pre>'; print_r($categories);echo '</pre>'; die();

        return $categories;
    }

    public function check_old_password($id, $old_pass) {

        $this->db->where('user_id', $id);
        $this->db->where('password', $old_pass);
        $this->db->where('access_level', 1);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_password($id, $new_pass) {

        $this->db->where('user_id', $id);
        $this->db->update('user', $new_pass);
        return true;
    }

    public function get_admindetail($admin_id) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $admin_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_admin_data($data, $admin_id) {

        $this->db->where('user_id', $admin_id);
        $this->db->update('user', $data);
        return true;
    }

    public function select_all_users() {

        $this->db->select('*');
        $this->db->from('user');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_user_by_id($user_id){
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function delete_user_by_id($user_id){
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
    }
	
	public function select_all_reviews(){
	    $this->db->select('review.*,company_info.company_name,user.user_name');
        $this->db->from('review');
        $this->db->join('company_info', 'review.company_id = company_info.company_id', 'inner');
		$this->db->join('user', 'review.created_by = user.user_id', 'inner');
        $query = $this->db->get();
        return $query->result();
	}
    
	public function delete_review_by_id($review_id){
	
	    $this->db->where('id', $review_id);
        $this->db->delete('review');
	}
	
	public function update_review_data($review_id,$status){
	
	  if($status == 0){
	    $this->db->where('id', $review_id);
        $this->db->set('status', 1);
        $this->db->update('review');
	 }else{
		$this->db->where('id', $review_id);
        $this->db->set('status', 0);
        $this->db->update('review');
	}
	  return true;
	}
        
       
        public function update_settings($value,$key){
             $sql = $this->db->query("UPDATE settings SET `value` ='" . $value . "' WHERE `key` = '" . $key . "' AND `group`='RS'");
        }
        
     public function get_settings() {
         $this->db->select('*');
        $this->db->from('settings');
        $query_result = $this->db->get();
        $result = $query_result->result();
        $setresult = array();
        foreach ($result as $k => $v) {
            $setresult[$v->key] = $v->value;
        }
        return $setresult;
    }

 public function update_spot_image($lastid, $spot_image){
        $this->db->where('spot_id', $lastid);
        $this->db->set('image', $spot_image);
        $this->db->update('spot_info');
        return true; 
    }
    
    public function select_all_spot(){
        $this->db->select('*');
        $this->db->from('spot_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_spot_by_id($spot_id){
        $this->db->where('spot_id', $spot_id);
        $this->db->delete('spot_info');
      }
      
      public function select_all_spot_by_id($spot_id){
        $this->db->select('*');
        $this->db->from('spot_info');
        $this->db->where('spot_id',$spot_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result; 
      }
      
      public function update_spot_by_spot_id($spot_id,$data){
        $this->db->where('spot_id', $spot_id);
        $this->db->update('spot_info', $data);
      }
	
   

}