<?php

class Messages_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_messages($receiver_id) {
        $query = $this->db->where('receiver_id', $receiver_id)
                ->get('messages_view')
                ->result_array();

        return $query;
    }
    
    public function count_messages($receiver_id){
        return $this->db->where('receiver_id', $receiver_id)
                ->count_all_results('messages_view');
    }

    public function get_message($id) {
        return $this->db->where('id', $id)
                ->get('messages_view')
                ->row_array();
    }

    public function add_message($message) {
        $data = array(
            'sender_id' => $message['sender_id'],
            'receiver_id' => $message['receiver_id'],
            'item_id' => $message['item_id'],
            'message' => $message['message']
        );
        $this->db->insert('messages', $data);
        return $this->db->insert_id();
    }

    public function delete_message($id) {
        $this->db->delete('messages', array('id' => $id));
    }
    
    public function validate_ownership($message_id,$receiver_id){
         return ($this->db->where('receiver_id', $receiver_id)
                ->where('id',$message_id)
                ->count_all_results('messages_view') == 1);
       
    }

}
