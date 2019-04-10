<?php

namespace Components;

use \Bitphp\Config;

class File {

   public $file;
   public $path;
   public $tmp_path;
   public $upload_dir;
   public $err = false;
   public $prevent_duplicate = true;

   private function getFileType() {
      return strtolower(pathinfo($this->tmp_path, PATHINFO_EXTENSION));
   }

   public function read($input) {

     if(isset($_FILES[$input])) {

        $this->file = $_FILES[$input];
        $this->tmp_path   = $this->file['tmp_name'];
        $this->upload_dir = Config::param('upload.dir');

        $name = basename($this->file['name']);

        if ($this->prevent_duplicate) {
           $pattern = '/(\w+)+.(\w+)/';
           $replace = time() . '_' . md5($name) . '.$2';
           $name = preg_replace($pattern, $replace, $name);
        }

        $this->path = $this->upload_dir . $name;
     } else {

        $this->err = 'Undefined input';
     }

     return $this;
   }

   public function image() {
     if($this->err) return $this;

     $type = $this->getFileType();

     if($type != 'jpg' && $type != 'png' && $type != 'jpeg' && !getimagesize($this->tmp_path)) {
        $this->err = 'File is not an image';
     }

     return $this;
   }

   public function size($limit) {
      if($this->err) return $this;

      if($this->file['size'] > $limit) {
          $this->err = 'File too long';
      }

      return $this;
   }

   public function upload() {
      if(!$this->err) {
          if(!file_exists($this->path)) {
              if(!move_uploaded_file($this->tmp_path, $this->path)) {
                  $this->err = 'Error moving file to destination folder';
              }
          } else {
              $this->err = 'File already exists';
          }
      }

      return $this;
   }
}
