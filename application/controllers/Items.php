<?php

class Items extends CI_Controller {

    public function view($page = 0) {
        can_be_any_logged_in_state();
        
        $this->load->model('items_model');

        $query = isset($_SESSION['query']) ? $_SESSION['query'] : '';
        $data['items'] = $this->items_model->get_items($_SESSION['categoryID'],$query,$page);
        $data['total'] = $this->items_model->items_count($_SESSION['categoryID'],$query);
//        $data['categoryID'] = $categoryID;
        $data['page'] = $page;
        $data['start'] = $data['total'] == 0 ? 0 : $page * 10 + 1;
        $data['end'] = ($page + 1) * 10 > $data['total'] ? $data['total'] : ($page + 1) * 10;
        
        $this->load->view('templates/header', array('title' => 'Items For Sale'));
        $this->load->view('pages/items', $data);
        $this->load->view('templates/footer');
    }

    public function query(){
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
        $this->load->model('categories_model');
        $data['item'] = $this->items_model->get_item($id);

        // was the $id valid?? if not show the "404 page not found" page and stop
        if (!isset($data['item'])) {
            show_404();
        }

        $data['categories'] = $this->categories_model->get_categories();
        $data['selected'] = 0;
        $data['title'] = $data['item']->name;
        
        // since $id was good, display the page
        $this->load->view('templates/header', $data);
        $this->load->view('prototype/item', $data);
        $this->load->view('templates/footer');
    }
    public function new_item(){
        must_be_logged_in();
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|greater_than[0]');
        $this->form_validation->set_rules('category_id', 'Category', 'required|greater_than[0]');
        $this->form_validation->set_rules('location_id', 'Location', 'required|greater_than[0]');
        
        if ($this->form_validation->run() == FALSE) {
            gator_view('Add New Item', 'pages/Add_New_Post');
        } else {
            $this->load->model('items_model');
            $item = $_POST;
            $item['photo_id'] = 24;
            $item['seller_id'] = 6;
            $id = $this->items_model->add_item($item);
            $item['id'] = $id;
            // set logged in state (not confirmed) and go to 
            gator_view('Post Confirmation','pages/postconfirmation',array('item' => $item));
        }
    }

}
