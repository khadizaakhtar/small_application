<?php

class Business_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function get_allcity() {

        $this->db->select('*');
        $this->db->from('city');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('parent', 0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function update_company_logo($lastid, $logo) {

        $this->db->where('company_id', $lastid);
        $this->db->set('company_logo', $logo);
        $this->db->update('company_info');
        //echo $this->db->last_query();exit;
        return true;
    }

    public function update_company_status($lastid) {

        $this->db->where('company_id', $lastid);
        $this->db->set('status', 1);
        $this->db->update('company_info');
        //echo $this->db->last_query();exit;
        return true;
    }

    public function update_company_code($company_id) {

        $this->db->where('company_id', $company_id);
        $this->db->set('status', 1);
        $this->db->set('code', '');
        $this->db->update('company_info');
        //echo $this->db->last_query();exit;
        return true;
    }
    
     //while resend code
    public function update_newcode($newCode,$company_id,$count){  
    
        $this->db->where('company_id', $company_id);
        $this->db->set('status', 0);
        $this->db->set('code', $newCode);
        $this->db->set('count_resend_code', $count);
        $this->db->update('company_info');
        //echo $this->db->last_query();exit;
        return true;
    }

    public function update_business_listing($data, $company_id) {
        $this->db->where('company_id', $company_id);
        $this->db->update('company_info', $data);
        return true;
    }

    public function select_all_company() {

        $this->db->select('*');
        $this->db->from('company_info');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_company_by_id($id) {

        $this->db->where('company_id', $id);
        $this->db->delete('company_info');
    }

    public function select_company_by_company_id($id) {

        $this->db->select('*');
        $this->db->from('company_info');
        $this->db->where('company_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_company_owner_by_id($id) {
        $this->db->select('user_name');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function update_company_info($data, $company_id) {

        $this->db->where('company_id', $company_id);
        $this->db->update('company_info', $data);
        //echo $this->db->last_query();exit;
        return true;
    }

    public function update_company_verification($company_id, $status) {

        if ($status == 0) {

            $this->db->where('company_id', $company_id);
            $this->db->set('status', 1);
            $this->db->update('company_info');
            
        } else {
            
            $this->db->where('company_id', $company_id);
            $this->db->set('status', 0);
            $this->db->update('company_info');
        }
        return true;
    }

    public function get_number($number) {

        $query = $this->db->query("
                SELECT COUNT(mobile_number) as mobile FROM company_info WHERE mobile_number ='" . $number . "' AND status = 0
        "); //echo $this->db->last_query();exit;
        $result = $query->row();
        //print_r($result);die();
        if ($result->mobile > 2) { 
            return 0;
        } else {  
            return 1;
        }
    }

    public function check_mobile_number($number) {

        $query = $this->db->query("
                SELECT COUNT(mobile_number) as mobile FROM company_info WHERE mobile_number ='" . $number . "' AND status = 1
        ");
        $result = $query->row();
        if ($result->mobile > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function user_validation($userid) {

        $query = $this->db->get_where('company_info', array('user_id' => $userid, 'status' => 1));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                return $row->mobile_number;
            }
        } else {
            return 0;
        }
    }

}