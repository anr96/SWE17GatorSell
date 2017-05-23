<?php

class Pages extends CI_Controller {

    public function index() {
        can_be_any_logged_in_state();
        $this->load->model('items_model');
        $data['items'] = $this->items_model->get_new_items();
        gator_view('Welcome to GatorSell.com', 'pages/home',$data);
    }
    
    public function view($page = 'home') {
        can_be_any_logged_in_state();
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        gator_view(ucfirst($page), "pages/$page");
    }

}
