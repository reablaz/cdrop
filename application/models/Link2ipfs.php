<?php
class Link2ipfs extends CI_Model {


        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function setLink($link, $hash)
        {
                $this->link    = $link; 
                $this->hash    = $hash; 
                
                $this->db->insert('map', $this);
        }
        

        public function getLink($link)
        {
                $query = $this->db->get_where('map', array('link' => $link), 1);
                return $query->result();
        }

}
?>