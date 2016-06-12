<?php
    // define('BASEPATH') OR exit('No direct script access allowed');
    class MY_Model extends CI_Model{
        protected $_table_name ='';
        protected $_id_field_name ='id';
        protected $_id_field_filter = 'intval';
        protected $_order_by_field = 'id';
        protected $_order_by_order = 'desc';

        public function __construct(){
            parent::__construct();
        }

        public function get($id=null){
            if($id!=null){
                $this->db->select()->from($this->_table_name);
                $query= $this->db->get();
            }else{
                $this->db->select()->from($this->_table_name)->where($this->_id_field_name,$id);
                $query= $this->db->get();
            }

            return $query->result();
        }

        public function get_by($where_array){
            $this->db->select()->from($this->_table_name)->where($where_array);
            $query = $this->db->get();

            return $query->first_row();
        }

        public function insert($data_array){
            return $this->db->insert($this->_table_name,$data_array);
        }

        public function update($id,$object){
            if($id!=null){
                $this->db->where($this->_id_field_name,$id);
                return $this->db->update($this->_table_name,$object);
            }else{
                return 'error index value null';
            }
        }

        public function delete($id){
            if($id!=null){
                $this->db->where($this->_id_field_name,$id);
                $this->db->delete($this->_table_name);
            }else{
                return 'error index value null';
            }
        }
    }
?>