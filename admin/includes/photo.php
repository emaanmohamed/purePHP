<?php

class Photo extends Db_object
{

    protected static $db_table = "photos";
    protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors_array = array(

        UPLOAD_ERR_OK         => "There is no error",
        UPLOAD_ERR_INI_SIZE   => "exceed the max filesize",
        UPLOAD_ERR_FORM_SIZE  => "exceed the mas_file_size",
        UPLOAD_ERR_PARTIAL    => "the uploaded file was only partial uploaded",
        UPLOAD_ERR_NO_FILE    => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "failed to write a file to disk",
        UPLOAD_ERR_EXTENSION  => "a php extension stopped the fule upload"

    );

    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {

            $this->filename = basename($file['name']);
            $this->tmp_path = basename($file['tmp_name']);
            $this->type     = basename($file['type']);
            $this->size     = basename($file['size']);

        }
    }

    public function picture_path()
    {
        return $this->upload_directory.DS.$this->filename;
    }

    public function save()
    {
        if ($this->id) {
            $this->update();
        } else {
            if (!empty($this->errors)) {
                return false;
            }
        }
        if (empty($this->filename) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = SITE_ROOT.DS.'admin'.DS.$this->upload_directory.DS.$this->filename;
        if (file_exists($target_path)) {
            $this->errors[] = "The file {$this->filename} already exist";
            return false;
        }

        $this->create();

      //  if (move_uploaded_file($this->tmp_path, $target_path)) {

//            if ($this->create()) {
//                unset($this->tmp_path);
//                return true;
//            }
//            echo "uploaded";
//        } else {
//            echo "try again";
//            $this->errors[] = "The file directory was not probably does not have permission";
//            return false;
   //     }

    }

    public function delete_photo() {
        if ($this->delete()) {
            $target_path = SITE_ROOT.DS. 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

    public function comments() {
        return Comment::find_the_comments($this->id);
    }

    public static function display_sidebar_data($photo_id)
    {
        $photo = Photo::find_by_id($photo_id);

        $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture}'";
        $output .= "<p>{$photo->filename}</p>";
        $output .= "<p>{$photo->type}</p>";
        $output .= "<p>{$photo->size}</p>";

        echo $output;
    }


}