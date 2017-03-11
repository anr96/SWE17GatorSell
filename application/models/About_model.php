<?php

class About_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_team() {
    $team = $this->db->get('rbteam_view')->result_array();
//    $team = array(
//        array('name' => 'Amanda Robinson', 'uri' => 'about/Amanda'),
//        array('name' => 'Ronald Rieger', 'uri' => 'about/Ron'),
//        array('name' => 'Rainier Hui', 'uri' => 'about/Rainier'),
//        array('name' => 'Jason Bockover','uri' => 'about/Jason'),
//        array('name' => 'Priya Krishnakumar', 'uri' => 'about/Priya'),
//        array('name' => 'Tony Filippo', 'uri' => 'about/Tony'),
//    );
        return $team;
    }
}
