<?php

class Pages extends CI_Controller {

    // main entry to gatorsell.com. displays the home page
    public function index() {
        can_be_any_logged_in_state();
        $this->load->model('items_model');
        $data['items'] = $this->items_model->get_new_items();
        gator_view('Welcome to GatorSell.com', 'pages/home',$data);
    }
    
    // used for unit testing.. called with /pages/$page
    // page is the name of the php webpage in the /view/pages directory
    public function view($page = 'home') {
        can_be_any_logged_in_state();
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        gator_view(ucfirst($page), "pages/$page");
    }

}
