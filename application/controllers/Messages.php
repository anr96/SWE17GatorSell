<?php

class Messages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('items_model');
        $this->load->model('messages_model');
    }

    // displays the main messages control panel.  called with /messages
    public function index() {
        must_be_logged_in();
        set_continue_destination(current_url());
        $data['messages'] = $this->messages_model->get_messages($_SESSION['registered_user']['id']);
        gator_view('View Messages', 'pages/ViewMessages',$data);        
    }

    // displays an individual message.  called with /messages/view_message/$message_id
    // $message_id is an integer
    public function view_message($message_id) {
        must_be_logged_in();
        $message = $this->messages_model->get_message($message_id);
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
    
    // handles the sortby form in messages panel.  called in the form action with /messages/sortby
    // updates session variables then redirects back to the index function
    public function sortby(){
        $this->form_validation->set_rules('sortby', 'Sortby', 'required|integer|greater_than_equal_to[0]|less_than_equal_to[3]');
        if($this->form_validation->run() == FALSE){
            $this->session->set_userdata('message_sortby', 0);
        } else {
            $this->session->set_userdata('message_sortby', $this->input->post('sortby'));
        }
        redirect('messages');
    }

    // sends a message to the seller of the item identified by $item_id.  called by /messages/message_seller/$item_id
    // $item_id is an integer
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

    // display confirmation page for message sent. called with /messages/message_sent/$message_id
    // $message_id is an integer
    public function message_sent($message_id){
        must_be_logged_in();
        $data['message'] = $this->messages_model->get_message($message_id);
        gator_view('Message Sent', 'pages/Confirmation',$data);
    }
    
    // deletes a message.  called with /messages/delete/$message_id
    // $message_id is an integer
    public function delete($message_id){
        must_be_logged_in();
        if(!$this->messages_model->validate_ownership($message_id,$_SESSION['registered_user']['id'])){
            show_404();
        }
        $this->messages_model->delete_message($message_id);
        redirect('messages');
    }
}
