<?php

namespace Admin\Libs;

trait UploadPhoto
{
    public $src = "uploads/";
    public $tmp;
    public $filename;
    public $size;
    public $type;
    public $uploadfile;
    public $errors = array();

    public function startupLoad($file)
    {
        $this->filename = $file['name'];
        $this->tmp = $file['tmp_name'];
        $this->size = $file['size'];
        $this->type = $file['type'];
        $this->uploadfile = $this->src . basename($this->filename);
    }
    public function uploadFile()
    {
        if (isset($this->filename)) {
            $file_ext = explode(".", $this->filename);
            $file_ext = end($file_ext);
            $exts = array("PNG", "JPG", "JPEG", "png", "jpg", "jpeg");
            if (in_array($file_ext, $exts) === false) {
                $this->errors[] = "Please provide an extension JPEG or PNG";
            }
            if ($this->size > 8097152) {
                $this->errors[] = "File size must by les then 8MB";
            }

            if (empty($this->errors)) {
                move_uploaded_file($this->tmp, $this->uploadfile);
                return true;
            } else {
                return false;
            }
        }
    }
}
