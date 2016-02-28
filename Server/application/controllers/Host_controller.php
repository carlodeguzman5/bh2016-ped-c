<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Host_controller extends REST_Controller {

   	function createHosts_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Hosts_model');
        $data = $this->Hosts_model->createHost($params['userId'], $params['name'],$params['description'],$params['schooolId']);
        if($data != NULL) {
        	$this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
   	}

    function createSubscription_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Hosts_model');
        $data = $this->Hosts_model->createSubscription($params['userId'],$params['hostId']);
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function getHostById_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Hosts_model');
        $data = $this->Hosts_model->getHostById($params['hostId']);
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    



    function readHosts_post(){

      $this->load->model('Hosts_model');
        $data = $this->Hosts_model->readHosts();
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }
}
