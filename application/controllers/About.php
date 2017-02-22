<?php

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('about_model');
        
    }

    public function view($page = 'about') {
        if (!file_exists(APPPATH . 'views/pages/about/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['team'] = $this->about_model->get_team();
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/about/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

}
