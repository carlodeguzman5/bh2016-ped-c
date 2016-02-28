<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Event_controller extends REST_Controller {

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

    function subscriptions_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readSubscribedEvents($params['userId']); 
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function subscriptionsMonths_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readSubscribedEventsMonths($params['userId']);
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function eventById_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readEventById($params['eventId']); // 1 if incorrect password, 2 if invalid users
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function schoolSubscriptions_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readSubscribedSchoolEvents($params['userId'], $params['schoolId']); // 1 if incorrect password, 2 if invalid users
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function schoolEvents_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readSchoolEvents($params['schoolId']); 
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function tagEvents_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readEventsByTag($params['tag']); 
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function eventsByMonth_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readEventsByMonth($params['hostId']); 
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function hostEvents_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readHostEvents($params['hostId']); 
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
        }
    }

    function concurrentEvents_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->readConcurrentEvents($params['eventId'], $params['date']); 
        if($data != NULL) {
          $this->response($data, 200);
        }
        else {
          $this->response($data, 404);
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

    function createEvent_post() {
        $params = json_decode(file_get_contents('php://input'), TRUE);
        $this->load->model('Events_model');
        $data = $this->Events_model->createEvent($params['eventId'], $params['eventName'], $params['eventDescription'], 
                                                $params['eventDate'], $params['eventLocation']);
        if($data != NULL) {
          $this->response($data, 200);
        } else {
          $this->response($data, 404);
        }
    }
}