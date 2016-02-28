<?php 
    class Hosts_model extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }

        public function createSubscription($userId, $hostId){
            $this->db->query("INSERT INTO subscriptions (user_id, host_id) VALUES ('{$userId}','{$hostId}')");     
        }

        public function createHost($userId, $name, $description, $schoolId) {
            $this->db->query("INSERT INTO hosts (user_id, name, description, school_id) VALUES ('{$userId}','{$name}','{$description}','{$schoolId}')");
        }

        public function getHostById($hostId){
            $query = $this->db->query("SELECT * FROM hosts WHERE host_id = '{$hostId}' ");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

        public function readHosts(){
            $query = $this->db->query ("SELECT * FROM hosts");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }

            return $ret;
        }

        public function updateHost($hostId, $hostName, $hostDescription){
            $query = $this->db->query( "UPDATE hosts SET name = '{$hostName}', description = '{$hostDescription}' WHERE host_id = '{$hostId}'" );
            return $query;
        }

        public function deleteHost( $hostId ){
            $query = $this->db->delete('hosts',array('host_id'=>$hostId));
    
        }
    }
?>