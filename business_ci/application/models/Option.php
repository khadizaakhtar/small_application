<?php

class Option extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function FetchData($table, $condition) {

        if ($condition == "")
            $sql = $this->db->get($table);
        else
            $sql = $this->db->get_where($table, $condition);

        if ($sql->num_rows() > 0) {

            return $data = $sql->result();
        } else {
            return false;
        }
    }

    public function UsersData($table, $condition) {

        $sql = $this->db->get_where($table, $condition);
        //echo $this->db->last_query();exit;
        if ($sql->num_rows() > 0) {
            return $data = $sql->result();
        } else {
            return false;
        }
    }

    function get_by_id($table, $fieldname, $id) {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($fieldname, $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_data($tablename, $data, $fieldname, $id) {

        $this->db->update($tablename, $data, array($fieldname => $id));
        return true;
    }

    public function update_data_using_set($where_fieldname,$where_id,$set_fieldname,$set_id,$tablename) {
        $this->db->where($where_fieldname,$where_id);
        $this->db->set($set_fieldname,$set_id);
        $this->db->update($tablename);
        //echo $this->db->last_query();exit;
        return true;
    }

    public function delete_data($id) {

        $this->db->delete('users', array('uid' => $id));
    }
    
   public function count_avg_reviews($company_id ){
        
        $this->db->select_avg('rating');
        $this->db->from('review');
        $this->db->where('company_id', $company_id );
        $query = $this->db->get();
       //echo $this->db->last_query();exit;
        $result = $query->row();
        return $result;
       
    }
    public function get_company_by_id($table, $fieldname, $id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($fieldname, $id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result; 
    }
    
     function get_by_id_with_limit($table,$fieldname,$id,$limit,$start) {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($fieldname, $id);
        $this->db->where('status', 1);
        $this->db->limit($limit,$start);
        $this->db->order_by('create_time','desc');
        $query_result = $this->db->get();
       //echo $this->db->last_query();exit;
        $result = $query_result->result();
        return $result;
    }

}

?>