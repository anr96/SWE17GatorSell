<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $this->load->view('upload_test/upload_form', array('error' => ' '));
    }

    public function do_upload() {
        $this->load->library('upload');
        

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_test/upload_form', $error);
        } else {
            $img = $this->upload->data();
            
            $data = array('upload_data' => $img);
            
            
            $config['image_library'] = 'gd2';
            $config['source_image'] = $img['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = 100;
            $config['width'] = 1000;
            $config['height'] = 1000;

            $this->load->library('image_lib',$config);
            $this->image_lib->resize();
            $this->load->view('upload_test/upload_success', $data);
        }
    }

}

?>