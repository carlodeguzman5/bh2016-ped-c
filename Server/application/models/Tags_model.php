<?php 
    class Tags_model extends CI_Model {
    
        function __construct() {
            parent::__construct();
        }


        public function createTag($tagId, $tagName) {
            $this->db->query("INSERT INTO tags (tag_id, tag_name) VALUES ('{$tagId}','{$tagName}')");

        public function readTags(){
            $query = $this->db->query ("SELECT * FROM tags");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }else{
                $ret = null;
            }

            return $ret;
        }

   

        public function updateTag($tagId, $tagName){
            $query = $this->db->query( "UPDATE tags SET tag_name = '{$tagName}', WHERE tag_id = '{$tagId}'" );
            return $query;
        }

        public function deleteTag( $tagId ){
            $query = $this->db->delete('tags',array('tag_id'=>$tagId));
    
        }
    }
?>