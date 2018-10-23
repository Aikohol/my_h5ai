<?php

namespace Core;

class UrlController {
  private $path;

  public function __construct($path) {
    $this->path = $path;
  }

  public function scan_dir() {
    if($this->path == null) {
      return "Nothing here...";
    }
    if(is_dir($_SERVER["DOCUMENT_ROOT"].$this->path)) {
      $folders = scandir($_SERVER["DOCUMENT_ROOT"].$this->path);
      $i = 0;
      $infos = [];
      foreach($folders as $value) {
        if(is_dir($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value)) {
          $infos["directories"][$i]["name"] = $value;
          $infos["directories"][$i]["link"] = $_SERVER["REQUEST_URI"] . "/" . $value;
        }
        if(is_file($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value)) {
          $infos["files"][$i]["name"] = $value;
          $infos["files"][$i]["size"] = filesize($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value);
          $infos["files"][$i]["modification_date"] = filemtime($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value);
          $infos["files"][$i]["link"] = $_SERVER["REQUEST_URI"] . "/" . $value;
          $infos["files"][$i]["type"] = explode("/", mime_content_type($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value));
        }
        $i++;
      }
      $back_path = explode("/", $this->path);
      array_pop($back_path);
      $back_path = $_SERVER["REQUEST_URI"] . "/" . implode("/", $back_path);
      $back_path = str_replace("/////", "/", $back_path);
      // $infos["back_url"] = implode("/", $this->path);
      require("template.php");
    }
    else {
      readfile($_SERVER["DOCUMENT_ROOT"].$this->path);
    }
  }
}
