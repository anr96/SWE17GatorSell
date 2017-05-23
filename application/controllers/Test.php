<?php

class Test extends CI_Controller {

    //testing stuff
    public function view() {
        $this->load->model('locations');
        
        $r1 = $this->locations->get_locations();
        print_r($r1);
      
             
    }

}
