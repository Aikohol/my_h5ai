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
          $infos["directories"][$i]["link"] = preg_replace('/([\/])\\1+/', '/', rtrim($_SERVER["REQUEST_URI"] . "/" . $value, '/'));
        }
        if(is_file($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value)) {
          $infos["files"][$i]["name"] = $value;
          $infos["files"][$i]["size"] = humanFileSize(filesize(($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value)));
          $infos["files"][$i]["modification_date"] = date("F d Y", filemtime($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value));
          $infos["files"][$i]["link"] = $_SERVER["REQUEST_URI"] . "/" . $value;
          $infos["files"][$i]["type"] = mime_content_type($_SERVER["DOCUMENT_ROOT"] . $this->path . "/" . $value);
        }
        $i++;
      }
      $infos["files-type"] = [
        "application/json" => "src"
      ];
      require("template.php");
    }
    else {
      readfile($_SERVER["DOCUMENT_ROOT"].$this->path);
    }
  }
}

function humanFileSize($size)
{
    if ($size >= 1073741824) {
      $fileSize = round($size / 1024 / 1024 / 1024,1) . 'GB';
    } elseif ($size >= 1048576) {
        $fileSize = round($size / 1024 / 1024,1) . 'MB';
    } elseif($size >= 1024) {
        $fileSize = round($size / 1024,1) . 'KB';
    } else {
        $fileSize = $size . ' bytes';
    }
    return $fileSize;
}
