<?php

class Messages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('items_model');
        $this->load->model('messages_model');
    }

    public function index() {
        must_be_logged_in();
        
    }

    public function view_message($message_id) {
        must_be_logged_in();
        $message = $this->message_model->get_message($message_id);
        if($message['receiver_id'] != $_SESSION['registered_user']['id']){
            show_404();
        }
        $this->form_validation->set_rules('reply', 'Reply', 'required|min_length[10]|max_length[9000]');

        if ($this->form_validation->run() == FALSE) {
            gator_view('View Message', 'pages/ViewMessage',array('message' => $message));
        } else {
            $data['message'] = $this->input->post('reply');
            $data['sender_id'] = $_SESSION['registered_user']['id'] ;
            $data['receiver_id'] = $message['sender_id'];
            $data['item_id'] = $message['item_id'];
            $message_id = $this->messages_model->add_message($data);
            redirect("messages/message_sent/$message_id");
        }        
    }

    public function message_seller($item_id = 0) {
        must_be_logged_in();
        $item = $this->items_model->get_item($item_id);
        if(!isset($item)){
            show_404();
        }
        $this->form_validation->set_rules('message', 'Message', 'required|min_length[10]|max_length[9000]');

        if ($this->form_validation->run() == FALSE) {
            gator_view('Message Seller', 'pages/MessageSeller',array('item' => $item));
        } else {
            $data['message'] = $this->input->post('message');
            $data['sender_id'] = $_SESSION['registered_user']['id'] ;
            $data['receiver_id'] = $item['seller_id'];
            $data['item_id'] = $item['id'];
            $message_id = $this->messages_model->add_message($data);
            redirect("messages/message_sent/$message_id");
        }
    }

    public function message_sent($message_id){
        $this->session->set_userdata('continue_destination', $_SESSION['cancel_destination']);
        gator_view('Message Sent', 'pages/Confirmation');
    }
}
