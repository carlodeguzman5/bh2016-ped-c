<?php 
    class Schools_model extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }

        public function createSchool($schoolId, $schoolName) {
            $this->db->query("INSERT INTO schools (school_id, name) VALUES ('{$schoolId}','{$schoolName}')");

        public function readSchools(){
            $query = $this->db->query ("SELECT * FROM schools");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }

            return $ret;
        }

        public function updateSchool($schoolId, $schoolName){
            $query = $this->db->query( "UPDATE schools SET name = '{$schoolName}', WHERE school_id = '{$schoolId}'" );
            return $query;
        }

        public function deleteSchool( $schoolId ){
            $query = $this->db->delete('schools',array('school_id'=>$schoolId));
    
    }
?>