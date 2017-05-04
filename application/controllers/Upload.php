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
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            echo $config['new_image'] = $img['full_path'] . ".jpg";
            $config['quality'] = 100;
            $config['width'] = 100;
            $config['height'] = 100;

            $this->load->library('image_lib',$config);
            $this->image_lib->resize();
            $this->load->model('photos_model');
            $this->photos_model->upload_photo(16,$img['full_path'],$img['full_path'] . ".jpg",$img['image_type']);
            unlink($img['full_path']);
            unlink($img['full_path'] . ".jpg");
            $this->load->view('upload_test/upload_success', $data);
        }
    }

}

?>