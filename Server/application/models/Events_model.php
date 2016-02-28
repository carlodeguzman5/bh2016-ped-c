<?php 
    class Events_model extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }

        public function readEvents(){
            $query = $this->db->query ("SELECT * FROM events ORDER BY events.event_date");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

        public function readSubscribedEvents($userId){
            $query = $this->db->query ("SELECT * FROM events, subscriptions WHERE subscriptions.user_id = '{$userId}' AND events.host_id = subscriptions.host_id ORDER BY events.event_date");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

        public function readSubscribedEventsMonths($userId){
            $query = $this->db->query ("SELECT month FROM events, subscriptions WHERE subscriptions.user_id = '{$userId}' AND events.host_id = subscriptions.host_id ORDER BY events.event_date");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

        public function readEventById($eventId){
            $query = $this->db->query ("SELECT * FROM events, hosts WHERE events.event_id = '{$eventId}' AND events.host_id = hosts.host_id");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

        



         public function readSubscribedSchoolEvents($userId, $schoolId){
            $query = $this->db->query ("SELECT * FROM events, hosts, subscriptions WHERE subscriptions.user_id = '{$userId}' AND events.host_id = subscriptions.host_id AND hosts.school_id = '{$schoolId}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

         public function readSchoolEvents($schoolId){
            $query = $this->db->query ("SELECT * FROM events, hosts WHERE hosts.host_id = events.host_id AND hosts.school_id = '{$schoolId}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }
            return $ret;
        }

        public function readEventsByTag($eventTag){
          $query = $this->db->query (" SELECT * FROM events, event_tags WHERE event_tags.tag_id = '{$eventTag}' AND events.event_id = event_tags.event_id");
          if($query->num_rows() > 0) {
              $ret = $query->result();
          }else{
              $ret = null;
          }
          return $ret;
        }

        public function readEventsByMonth($date){
          $query = $this->db->query (" SELECT * FROM events WHERE YEAR($date) = YEAR(events.event_date) AND month($date) = month(events.event_date)" ); 
          if($query->num_rows() > 0) {
              $ret = $query->result();
          }else{
              $ret = null;
          }
          return $ret;
        }

        public function readHostEvents($hostId){
          $query = $this->db->query (" SELECT * FROM events WHERE events.host_id = '{$hostId}' " ); 
          if($query->num_rows() > 0) {
              $ret = $query->result();
          }else{
              $ret = null;
          }
          return $ret;
        }

        public function readConcurrentEvents($eventId, $date){
          $query = $this->db->query (" SELECT * FROM events WHERE events.event_date = '{$date}' AND events.event_id <> '{$eventId}' " ); 
          if($query->num_rows() > 0) {
              $ret = $query->result();
          }else{
              $ret = null;
          }
          return $ret;
        }

//A      


        
        public function createEvent($eventId, $eventName, $eventDescription, $eventDate, $eventLocation) {
            $this->db->query ("INSERT INTO events (event_id, event_name,description, event_date, location) VALUES ('{$eventId}', '{$eventName}', '{$eventDescription}', '{$eventDate}', '{$eventLocation}')");
        }
    
        /*public function updateEvent($eventId, $eventName, $eventDescription, $eventDate, $eventLocation){
            $query = $this->db->query( "UPDATE events SET event_name = '{$eventName}', description = '{$eventDescription}', date = '{$eventDate}', location = '{$eventLocation}' WHERE event_id = '{$eventId}'");
            return $query;
        }

        public function deleteEvent($eventId) {
            $query = $this->db->delete('users', array('event_id'=>$eventId));
    
        }*/
    }
?>