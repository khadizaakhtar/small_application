<?php
class User_model extends CI_Model {

    function __construct()
    {
        
        parent::__construct();
    }
	 public function userlogin($data) {
        //print_r($data);exit;
        $query = $this->db->get_where('user', array('user_mail' => $data['email'], 'password' => $data['password']));
        //echo $this->db->last_query();exit;
        //print_r($query->result());exit;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $session = array(
                    'userid' => $row->user_id,
                    'username' => $row->user_name,
                    'usertype' => $row->access_level
                );
            }
            /* access_level 1 = admin, 0 = user, 2 = service provider */
            $this->session->set_userdata($session);
            //$this->session->set_flashdata('success', 'You are successfully logged in!!!');
            return 1;
        } else {
            //$this->session->set_flashdata('loginerr', ' Wrong Email and Password . Try Again');
            return 0;
        }
    }
public function get_review_by_company_id($company_id){
        $query = $this->db->query("
                SELECT COUNT(comment) as total FROM review WHERE company_id ='" .$company_id."'
        ");
        $result=$query->row(); 
        return $result; 
        }

 public function count_avg_ratings($company_id){       
        $this->db->select_avg('rating');
        $this->db->from('review');
        $this->db->where('company_id', $company_id );
        $query = $this->db->get();
        $result = $query->row();
        return $result;
       
    }
	
	public function insert($info){
                        //print_r($info);exit;
		$this->db->insert('user',$info);
                return true; 
	
	}
    
	function chkLogin($data){

		$query=$this->db->get_where("user",array('username'=>$data['username'],'password'=>$data['password']));
		if($query->num_rows()>0){
		$row = $query->result();
		return $row[0];
		}

		else{
		return false;
		}
		
	}
	
        
        public function FetchUsers(){
            
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('user_type','user');
            $query = $this->db->get();
            return $query->result();
            
        }
        
        public function get_admin_info(){
            
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('user_type','admin');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function update_admin_data($data,$id){
            
            $this->db->where('uid',$id);
            $this->db->update('users',$data); 
            return true;
        }

     function get_company_main_image($id) {

        $this->db->select('images');
        $this->db->from('company_images');
        $this->db->where('company_id', $id);
        $this->db->where('main', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit;
        return $result;
    }

      public function update_main_image($company_id,$image_id){

          $this->db->where('company_id',$company_id);
          $this->db->set('main',0);
          $this->db->update('company_images'); 
 
          $this->db->where('company_id',$company_id);
          $this->db->where('id',$image_id);
          $this->db->set('main',1);
          $this->db->update('company_images'); 
          return true;
      }

      public function delete_company_image($image_id){
           
           $this->db->where('id', $image_id);
           $this->db->delete('company_images');
           return true;
     }

     public function delete_company_by_user($company_id){
        $this->db->where('company_id', $company_id);
           $this->db->delete('company_info');
           return true;
     }
        
       public function count_review_by_id($id){
 
        
        $query = $this->db->query("
                SELECT COUNT(comment) as total FROM review WHERE created_by ='" .$id."'
        "); 

        $result=$query->row(); 
        return $result; 
    
       }
         
        
        
        
                
        public function FetchDataRow($table , $condition){
		if($condition == "") $sql = $this->db->get($table);
		else  $sql = $this->db->get_where($table, $condition);
		   
		   if($sql->num_rows() > 0){				
				return $data = $sql->row();
		   }else {
			   return false;
		   }
	}
        
        
        
        public function selectusers($id){
		$query =$this->db->get_where('users',array('uid'=>$id));
		return $query->row();
	}
        
        
        
        public function deletemenu($id){
            
		$this->db->delete('chef_menu',array('id'=> $id));
		 
	}
        

        
    public function user_approval($data,$id){

      return $this->db->update('users',$data,array('uid'=>$id));

	}
        
    
	public function settings(){
		$query =$this->db->get('settings');
		return $query->row();
	}
	public function settingsUpdated($data){
		return $this->db->update('settings', $data);
	}

 public function select_all_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('parent',0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;  
        }
        
        
      public function select_some_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('parent',0);
        $this->db->order_by("date_create", "DESC");
        $this->db->limit(5);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;   
       }
       
       public function select_some_category2(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('parent',0);
        $this->db->order_by("date_create", "DESC");
        $this->db->limit(5,5);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;   
       }


       public function select_latest_company(){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->order_by("date_create", "DESC");
       $this->db->limit(4);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;
        }
        
       public function select_latest_one_company(){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->order_by("date_create", "DESC");
       $this->db->limit(1);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result; 
        }

       public function select_latest_company_offset_four(){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->order_by("date_create", "DESC");
       $this->db->limit(4,4);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result; 
        }
        
      public function select_company_info_by_id($category_id){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->where('category_id',$category_id);
       $this->db->order_by("date_create", "DESC");
       $this->db->limit(4);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;   
        }
        
       public function select_company2_info_by_id($category_id){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->where('category_id',$category_id);
       $this->db->order_by("date_create", "DESC");
       $this->db->limit(4,4);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;  
        }
 
        
       public function select_all_company_info_by_id($category_id,$limit, $start){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->where('category_id',$category_id);
       $this->db->order_by("date_create", "DESC");
       $this->db->limit($limit,$start);
       $query_result = $this->db->get();
       $result = $query_result->result();    
       return $result;   
        }
        
       public function select_all_company_info_by_id_for_highestrate($category_id,$limit, $start){
       $this->db->select('company_info.*,review.rating');
       $this->db->from('company_info');
       $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
       $this->db->where('company_info.category_id',$category_id);
       $this->db->order_by("review.rating", "DESC");
       $this->db->limit($limit,$start);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;   
        }
        
       public function select_all_company_info_by_id_for_alfabeticaly($category_id,$limit, $start){
       $this->db->select('*');
       $this->db->from('company_info');
       $this->db->where('category_id',$category_id);
       $this->db->order_by("company_name", "ASC");
       $this->db->limit($limit,$start);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;  
        }

        public function count_all_company($category_id){          
          $this->db->where('category_id', $category_id);
          $num_rows = $this->db->count_all_results('company_info');    
          return $num_rows;  
        }
        
        
        //start sumaya
         public function count_all_company_by_city($city_id) {

        $this->db->where('city_id', $city_id);
        $num_rows = $this->db->count_all_results('company_info');
        return $num_rows;
    }

    public function count_all_company_by_name($name) {

        $this->db->like('company_name', $name, 'both');
        $num_rows = $this->db->count_all_results('company_info');
        return $num_rows;
    }

    public function count_all_company_by_city_and_category($category_id, $city_id) {

        $this->db->where('city_id', $city_id);
        $this->db->where('category_id', $category_id);
        $num_rows = $this->db->count_all_results('company_info');

        return $num_rows;
    }

    public function count_all_company_by_name_and_category($category_id, $name) {

        $this->db->like('company_name', $name);
        $this->db->where('category_id', $category_id);
        $num_rows = $this->db->count_all_results('company_info');

        return $num_rows;
    }

    public function count_all_company_by_name_and_city($city, $name) {

        $this->db->like('company_name', $name);
        $this->db->where('city_id', $city);
        $num_rows = $this->db->count_all_results('company_info');

        return $num_rows;
    }

    public function count_all_company_by_city_and_category_and_name($category_id, $city, $name) {

        $this->db->where('city_id', $city);
        $this->db->where('category_id', $category_id);
        $this->db->like('company_name', $name, 'both');
        $num_rows = $this->db->count_all_results('company_info');

        return $num_rows;
    }

    public function select_all_company_info_by_category($rate, $category_id, $limit, $start) {

        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
            // echo $this->db->last_query();exit;
        }

        if ($rate == 'alfabetically') {
            //echo 123; exit;
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        $result = $query_result->result();
        return $result;
    }

    public function select_all_company_info_by_city($rate, $city_id, $limit, $start) {
    // echo $rate.' '.$city_id.' '.$limit.' '.$start;exit;
        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.city_id', $city_id);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit,$start);
            $query_result = $this->db->get();
             //echo $this->db->last_query();exit;
        }

        if ($rate == 'alfabetically') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.city_id', $city_id);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.city_id', $city_id);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        $result = $query_result->result();
        return $result;
    }

    public function select_all_company_info_by_name($rate, $name, $limit, $start) {

        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'alfabetically') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        $result = $query_result->result();
        return $result;
    }

    public function select_all_company_info_by_id_for_highestrate_by_city_and_category($rate, $category_id, $city, $limit, $start) {

        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
            // echo $this->db->last_query();exit;
        }
        if ($rate == 'alfabetically') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }
        $result = $query_result->result();
        return $result;
    }

    public function select_all_company_info_by_id_for_highestrate_by_name_and_category($rate, $category_id, $name, $limit, $start) {

        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.category_id', $category_id);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
            // echo $this->db->last_query();exit;
        }
        if ($rate == 'alfabetically') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.category_id', $category_id);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.category_id', $category_id);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
            
        }
        $result = $query_result->result();
        return $result;
    }

    public function select_all_company_info_by_id_for_highestrate_by_name_and_city($rate, $city, $name, $limit, $start) {

        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
            // echo $this->db->last_query();exit;
        }
        if ($rate == 'alfabetically') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }
        $result = $query_result->result();
        return $result;
    }

    public function select_all_company_info_by_id_for_highestrate_by_city_and_category_and_name($rate, $category_id, $city, $name, $limit, $start) {

        if ($rate == 'highestrate') {
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name, 'both');
            $this->db->where('company_info.category_id', $category_id);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("review.rating", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
            // echo $this->db->last_query();exit;
        }
        if ($rate == 'alfabetically') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("company_info.company_name", "ASC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }

        if ($rate == 'recentfirst') {
            
            $this->db->select('company_info.*,review.rating');
            $this->db->from('company_info');
            $this->db->join('review', 'review.company_id = company_info.company_id', 'left');
            $this->db->like('company_info.company_name', $name);
            $this->db->where('company_info.city_id', $city);
            $this->db->order_by("company_info.date_create", "DESC");
            $this->db->group_by("company_info.company_id");
            $this->db->limit($limit, $start);
            $query_result = $this->db->get();
        }
        $result = $query_result->result();
        return $result;
    }

	
}
?>