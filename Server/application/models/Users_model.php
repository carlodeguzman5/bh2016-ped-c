<?php 
    class Users_model extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }

        function getUser($userId, $password) {
            $query = $this->db->query("SELECT * FROM users WHERE user_id = '{$userId}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
                    if($ret->password == $password) {
                        return $query->result();
                    }
                    else {
                        return 1; // incorrect password
                    }
            } else {
                return 2; //invalid user
            }
        }

        public function createUser( $userId, $password, $email, $schoolId){
            $this->db->query("INSERT INTO users (user_id,password,email,school_id) VALUES ('{$userId}','{$password}','{$email}', '{$schoolId}')");
        }

        public function readUsers(){
            $query = $this->db->query ("SELECT * FROM users");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }

            return $ret;
        }

        public function updateUser($userId, $password, $name){
            $query = $this->db->query( "UPDATE users SET password = '{$password}',  name = '{$name}' WHERE user_id = '{$userId}'");
            return $query;
        }

        public function deleteUser( $userId ){
            $query = $this->db->delete('users',array('user_id'=>$userId));
        }

    }
?>