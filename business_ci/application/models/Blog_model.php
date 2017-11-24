<?php

class Blog_Model extends CI_Model {

    public function save_blog_info($data) {
        $this->db->insert('blog_category', $data);
    }

    public function select_all_category() {
        $this->db->select('*');
        $this->db->from('blog_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_blog_category_by_category_id($category_id) {
        $this->db->select('*');
        $this->db->from('blog_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_blog_category_info($data, $category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->update('blog_category', $data);
    }

    public function delete_blog_category_by_id($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('blog_category');
    }

    public function select_all_blog_category() {
        $this->db->select('*');
        $this->db->from('blog_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_user_for_blog() {
        $this->db->select('*');
        $this->db->from('user');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function update_blog_image($lastid, $blog_image) {
        $this->db->where('post_id', $lastid);
        $this->db->set('image', $blog_image);
        $this->db->update('blog_post');
        return true;
    }
    
    public function select_all_blog_post(){
       $this->db->select('blog_post.*,user.first_name,user.user_id,tbl_category.category_id,tbl_category.category_name');
       $this->db->from('blog_post');
       $this->db->join('tbl_category','blog_post.category_id=tbl_category.category_id');
       $this->db->join('user','user.user_id=blog_post.user_id');
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result; 
    }
    
    public function delete_blog_post_by_id($post_id){
         $this->db->where('post_id', $post_id);
        $this->db->delete('blog_post');
    }
    public function select_blog_post_by_post_id($post_id){       
       $this->db->select('blog_post.*,user.first_name,user.user_id,tbl_category.category_id,tbl_category.category_name');
       $this->db->from('blog_post');
       $this->db->join('tbl_category','blog_post.category_id=tbl_category.category_id');
       $this->db->join('user','user.user_id=blog_post.user_id');
       $this->db->where('blog_post.post_id', $post_id);
       $query_result = $this->db->get();
       $result = $query_result->row();
       return $result;  
    }
    
    public function update_blog_post_by_post_id($post_id,$data){
        $this->db->where('post_id', $post_id);
        $this->db->update('blog_post', $data);
    }
    
    public function update_blog_image_by_post_id($post_id, $blog_image){
        $this->db->where('post_id', $post_id);
        $this->db->set('image', $blog_image);
        $this->db->update('blog_post');
        return true;
    }
    
    public function unpublished_category_by_category_id($category_id){
        $this->db->set('publication_status',0);
        $this->db->where('category_id',$category_id);
        $this->db->update('blog_category');
    }
    
    public function published_category_by_category_id($category_id){
        $this->db->set('publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->update('blog_category');
    }
    public function unpublished_post_by_post_id($post_id){
       $this->db->set('status',0);
        $this->db->where('post_id',$post_id);
        $this->db->update('blog_post');  
    }
    public function published_post_by_post_id($post_id){
        $this->db->set('status',1);
        $this->db->where('post_id',$post_id);
        $this->db->update('blog_post');  
    }
    
    public function select_all_published_blog_category(){
        $this->db->select('*');
        $this->db->from('blog_category');
        $this->db->where('publication_status',1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_recent_published_post(){
       $this->db->select('*');
       $this->db->from('blog_post');
       $this->db->where('status',1);
       $this->db->order_by("publication_date", "DESC");
       $this->db->limit(4);
       $query_result = $this->db->get();
       $result = $query_result->result();
        return $result; 
    }
    
    public function select_recent_four_published_post(){
       $this->db->select('*');
       $this->db->from('blog_post');
       $this->db->where('status',1);
       $this->db->order_by("publication_date", "DESC");
       $this->db->limit(4,4);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result;   
    }
    
    public function select_recent_two_published_post_offset_two(){
        $this->db->select('*');
       $this->db->from('blog_post');
       $this->db->where('status',1);
       $this->db->order_by("publication_date", "DESC");
       $this->db->limit(2,2);
       $query_result = $this->db->get();
       $result = $query_result->result();
       return $result; 
    }

public function count_all_blog(){
        $this->db->where('status',1);
        $num_rows = $this->db->count_all_results('blog_post');    
        return $num_rows; 
    }
   public function select_recent_next_published_post_details_by_post_id(){
     $query=$this->db->query("SELECT blog_post.*,user.user_name,user.user_id,blog_category.category_id,blog_category.category_name FROM blog_post LEFT JOIN  user ON user.user_id=blog_post.user_id LEFT JOIN blog_category ON blog_post.category_id=blog_category.category_id WHERE blog_post.status=1  ORDER BY blog_post.publication_date DESC LIMIT 1");
     $result = $query->row();          
     return $result;
    }

public function select_all_blog($limit, $start){
     $query=$this->db->query("SELECT blog_post.*,user.user_name,user.user_id,blog_category.category_id,blog_category.category_name FROM blog_post LEFT JOIN  user ON user.user_id=blog_post.user_id LEFT JOIN blog_category ON blog_post.category_id=blog_category.category_id WHERE blog_post.status=1 LIMIT $start,$limit");
     $result = $query->result();          
     return $result; 
    }

public function select_recent_published_post_details_by_post_id($post_id){     
     $query=$this->db->query("SELECT blog_post.*,user.user_name,user.user_id,blog_category.category_id,blog_category.category_name FROM blog_post LEFT JOIN  user ON user.user_id=blog_post.user_id LEFT JOIN blog_category ON blog_post.category_id=blog_category.category_id WHERE blog_post.post_id=".$post_id);
     $result = $query->row();          
     return $result;  
    }

public function select_spot_info($category_id){
          $curmonth=date('F');
          $query = $this->db->query("SELECT spot_info.*,company_info.company_id,company_info.category_id
                                     FROM `spot_info` RIGHT JOIN `company_info`
                                     ON company_info.company_id = spot_info.company_id
                                     WHERE company_info.category_id = '".$category_id."' AND spot_info.date = '".$curmonth."' 
                                     ");
          $result = $query->result();          
          return $result;    
        }

}
