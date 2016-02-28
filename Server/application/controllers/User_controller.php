<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User_controller extends REST_Controller {

   	function getUsers(){
   		$this->load->model('Users_model');
   		$data["users"] = $this->Users_model->readUsers();
   		$this->load->view('Welcome', $data);
   	}

   	function login_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Users_model');
        $data = $this->Users_model->getUser($params["userId"], $params["password"]); // 1 if incorrect password, 2 if invalid users
        if($data == 1) {
        	$this->response($data, 1);
        }
        else if ($data == 2) {
        	$this->response($data, 2);
        }
        else {
      		$this->response($data, 200);
      	}
   	}

   	function users_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Users_model');
        $data = $this->Users_model->readUsers();
         if($data != NULL) {
        	$this->response($data, 200);
        } else {
        	$this->response($data, 404);
        }
   }

   // CREATE

   function createUser_post() {
   		$params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Users_model');
        $data = $this->Users_model->createUser($params['userId'], $params['password'], $params['email'], $params['schoolId']);
        if($data != NULL) {
          $this->response($data, 200);
        } else {
          $this->response($data, 404);
        }
   }
}
