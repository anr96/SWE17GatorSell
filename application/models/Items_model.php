<?php

class Items_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function items_count($category_id = 0, $like = '') {
        if ($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $tok = strtok($like, ' ');
        while ($tok) {
            $this->db->group_start()
                    ->like('name', $tok)
                    ->or_like('description', $tok)
                    ->group_end();
            $tok = strtok(' ');
        }
        return $this->db->count_all_results('items');
    }

    public function get_items($category_id = 0, $like = '', $page = -1, $how_many = 10) {

        if ($category_id)
            $this->db->where(array('category_id' => $category_id));
        // if $page is -1, get everything.  Otherwise, limit the results
        $tok = strtok($like, ' ');
        while ($tok) {
            $this->db->group_start()
                    ->like('name', $tok)
                    ->or_like('long_description', $tok)
                    ->group_end();
            $tok = strtok(' ');
        }

        if ($page != -1)
            $this->db->limit($how_many, $page * $how_many);

        return $this->db->get('items_briefdescription_view')->result();
    }

//    public function get_items($category_id,$page = -1) {
//        return $this->db->get_where('items_briefdescription_view', array('category_id' => $category_id))->result();
//    }

    public function get_item($id) {
        return $this->db->get_where('items', array('id' => $id))->first_row();
    }

    public function add_item($item) {

        $data = array(
            'name' => $item['name'],
            'description' => $item['description'],
            'price' => $item['price'],
            'category_id' => $item['category_id'],
            'photo' => $item['photo']
        );
        $this->db->insert('items', $data);
    }

    public function update_photo_id($item_id, $photo_id) {
        $this->db->where('item_id', $item_id)
                ->set('photo_id', $photo_id)
                ->update('items');
        
    }

}
