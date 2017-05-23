<?php

class About extends CI_Controller {

    // displays the about pages or the main about page
    public function view($page = 'about') {
        if (!file_exists(APPPATH . 'views/about/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('templates/header', array('title' => ucfirst($page)));
        $this->load->view('about/' . $page);
        $this->load->view('templates/footer');
    }

}
