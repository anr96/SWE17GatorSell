<?php

class Photos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_photo($id) {
        $query = $this->db->get_where('photos', array('id' => $id));

        return $query->row();
    }

    public function get_thumbnail($id) {
        $query = $this->db->get_where('thumbnails_view', array('id' => $id));

        return $query->row();
    }

    public function upload_photo($item_id, $path,$path_thumbnail,$content_type) {
        $photo = file_get_contents($path);
        $thumbnail = file_get_contents($path_thumbnail);
        
        $this->db->insert('photos', array('photo' => $photo,'thumbnail'=> $thumbnail,'item_id' => $item_id, 'content_type' => $content_type));
        
        return $this->db->insert_id();
    }

    /** Create a square cropped thumb * */
    function createSquareCroppedThumb($path, $thumbPath, $thumbSize = 100) {

        /* Set Filenames */
        $srcFile = $path;
        $thumbFile = $thumbPath;

        /* Determine the File Type */
        $type = pathinfo($path, PATHINFO_EXTENSION);
        /* Create the Source Image */
        switch ($type) {
            case 'jpg' : case 'jpeg' :
                $src = imagecreatefromjpeg($srcFile);
                break;
            case 'png' :
                $src = imagecreatefrompng($srcFile);
                break;
            case 'gif' :
                $src = imagecreatefromgif($srcFile);
                break;
        }
        /* Determine the Image Dimensions */
        $oldW = imagesx($src);
        $oldH = imagesy($src);

        $minValue = $oldH > $oldW ? $oldW : $oldH;

        /* Create the New Image */
        $new = imagecreatetruecolor($thumbSize, $thumbSize);

        /* Transcribe the Source Image into the New (Square) Image */
        imagecopyresampled($new, $src, 0, 0, ($oldW / 2) - ($minValue / 2), ($oldH / 2) - ($minValue / 2), $thumbSize, $thumbSize, $minValue, $minValue);
        switch ($type) {
            case 'jpg' : case 'jpeg' :
                $src = imagejpeg($new, $thumbFile);
                break;
            case 'png' :
                $src = imagepng($new, $thumbFile);
                break;
            case 'gif' :
                $src = imagegif($new, $thumbFile);
                break;
        }

        imagedestroy($new);
    }

}
