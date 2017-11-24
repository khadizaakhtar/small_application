<?php
class Business_model extends CI_Model {

    function __construct()
    {
        
        parent::__construct();
    }
    
     public function get_allcity(){
        
            $this->db->select('*');
            $this->db->from('city');
            $query = $this->db->get();
            return $query->result();
    }
    
    public function get_all_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('parent',0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;  
        }
        
    
    public function update_company_logo($lastid,$logo){
        
        $this->db->where('company_id',$lastid);
        $this->db->set('company_logo',$logo); 
        $this->db->update('company_info'); 
        //echo $this->db->last_query();exit;
            return true;
    }
    
    public function update_company_code($company_id){
        
        $this->db->where('company_id',$company_id);
        $this->db->set('status',1); 
        $this->db->set('code',''); 
        $this->db->update('company_info'); 
        //echo $this->db->last_query();exit;
            return true;
    }
    
 public function update_business_listing($data, $company_id){        
        $this->db->where('company_id',$company_id);
        $this->db->update('company_info',$data); 
         return true; 
    }
    public function select_all_company(){
        
            $this->db->select('*');
            $this->db->from('company_info');
            $query = $this->db->get();
            return $query->result();
    }
    
    public function delete_company_by_id($id){
        
        $this->db->where('company_id', $id);
        $this->db->delete('company_info');
    }
    
    public function select_company_by_company_id($id){
        
        $this->db->select('*');
        $this->db->from('company_info');
        $this->db->where('company_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_company_owner_by_id($id){
        $this->db->select('user_name');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function update_company_info($data,$company_id){
        
        $this->db->where('company_id',$company_id);
        $this->db->update('company_info',$data); 
        //echo $this->db->last_query();exit;
            return true;
    }
    
}    
