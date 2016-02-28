<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Tag_controller extends REST_Controller {

   	function events_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readEvents(); // 1 if incorrect password, 2 if invalid users
        if($data != NULL) {
        	$this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
   	}
}
