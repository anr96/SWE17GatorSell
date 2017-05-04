<?php
class Locations extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_locations()
    {
        $query = $this->db->get('locations')->result_array();

        return $query;
    }
    

}
