<?php

class Items extends CI_Controller {

    public function view($page = 0, $sortby = 0) {
        can_be_any_logged_in_state();

        $this->load->model('items_model');

        $query = isset($_SESSION['query']) ? $_SESSION['query'] : '';
        $data['items'] = $this->items_model->get_items($_SESSION['categoryID'], $query, $page, $sortby);
        $data['total'] = $this->items_model->items_count($_SESSION['categoryID'], $query);
        $data['page'] = $page;
        $data['sortby'] = $sortby;
        $data['start'] = $data['total'] == 0 ? 0 : $page * 10 + 1;
        $data['end'] = ($page + 1) * 10 > $data['total'] ? $data['total'] : ($page + 1) * 10;

        gator_view('Items For Sale', 'pages/items', $data);
    }

    public function query() {
        can_be_any_logged_in_state();
        $this->form_validation->set_rules('categoryID', 'Category', 'required|is_natural');
        $this->form_validation->set_rules('query', 'Query', 'trim|alpha_numeric_spaces');

        if ($this->form_validation->run() == FALSE) {
            redirect('items');
        } else {
            $this->session->set_userdata('categoryID', $this->input->post('categoryID'));
            $this->session->set_userdata('query', $this->input->post('query'));
            redirect('items');
        }
    }

    public function item($id) {
        can_be_any_logged_in_state();
        // load the model and use its get_item function
        $this->load->model('items_model');
        $data['item'] = $this->items_model->get_item($id);

        // was the $id valid?? if not show the "404 page not found" page and stop
        if (!isset($data['item'])) {
            show_404();
        }
        // since $id was good, display the page
        gator_view($data['item']['name'], 'prototype/item', $data);
    }

    public function new_item() {
        must_be_logged_in();

        // set up the rules to validate the form data
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|greater_than[0]');
        $this->form_validation->set_rules('category_id', 'Category', 'required|greater_than[0]');
        $this->form_validation->set_rules('location_id', 'Location', 'required|greater_than[0]');

        // execute the form validation
        if ($this->form_validation->run() == FALSE) {
            // form is incorrect or hasn't been run yet so show the add item page
            gator_view('Add New Item', 'pages/Add_New_Post');
        } else {
            // data is good.  add new item to the database
            $this->load->model('items_model');
            $item = $_POST;
            $item['photo_id'] = 0;
            $item['seller_id'] = $_SESSION['registered_user']['id'];
            $item_id = $this->items_model->add_item($item);
            
            //upload photo if there is one
            $photo_id = $this->upload_photo($item_id);
            $this->items_model->update_photo_id($item_id,$photo_id);

            redirect("items/post_confirm/$item_id");
        }
    }

    private function upload_photo($item_id) {
        $this->load->library('upload');

        // is there a file uploaded?
        if (!$this->upload->do_upload('photo')) {
            return 0;
        } else {
            $img = $this->upload->data();
            
            // set up the image manipulation api
            $config['image_library'] = 'gd2';
            $config['source_image'] = $img['full_path'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = $img['full_path'] . ".jpg";
            $config['quality'] = 100;
            $config['width'] = 100;
            $config['height'] = 100;

            // create the thumbnail
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            
            // upload the blob to the database
            $this->load->model('photos_model');
            $photo_id = $this->photos_model->upload_photo($item_id, $img['full_path'], $img['full_path'] . ".jpg", $img['image_type']);
            
            // delete the temporary files
            unlink($img['full_path']);
            unlink($img['full_path'] . ".jpg");

            return $photo_id;
        }
    }

    public function post_confirm($id) {
        must_be_logged_in();
        $this->load->model('items_model');
        $data['item'] = $this->items_model->get_item($id);
        gator_view('Post Confirmation', 'pages/postconfirmation', $data);
    }

    public function delete($id) {
        must_be_logged_in();
        $this->load->model('items_model');
        if (!$this->items_model->validate_ownership($id, $_SESSION['registered_user']['id'])) {
            show_404();
        }
        $this->items_model->delete_item($id);
        redirect('account');
    }

}
