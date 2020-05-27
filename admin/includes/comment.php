<?php


class Comment extends Db_object
{

    protected static $db_table = "comments";
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'body');
    public $id;
    public $photo_id;
    public $password;
    public $author;
    public $body;
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

    public static function create_comment($photo_id, $author="John", $body="") {

        if (!empty($photo_id) && !empty($author) && !empty($body)) {
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;

            return $comment;
        } else {
            return false;
        }
    }

    public static function find_the_comments($photo_id=0) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql.= " WHERE photo_id = " . $database->escape_string($photo_id);
        $sql.= " ORDER BY photo_id ASC";

        return self::find_by_query($sql);
    }



}



