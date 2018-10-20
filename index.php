<?php

class Index {
  private $path;

  public function __construct($path) {
    $this->path = $path;
  }

  public function scan_dir() {
    if($this->path == null) {
      return "Nothing here...";
    }
    $folders = scandir($this->path);

    $i = 0;
    $infos = [];
    foreach($folders as $value) {
      if(is_dir($this->path . "/" . $value)) {
        $infos[$i]["name"] = $value;
        $infos[$i]["size"] = filesize($this->path . "/" . $value);
        $infos[$i]["modification_date"] = filemtime($this->path . "/" . $value);
        $infos[$i]["type"] = pathinfo($this->path . "/" . $value, PATHINFO_EXTENSION);
      }
      $infos["path"] = $_SERVER["DOCUMENT_ROOT"] . $this->path;
      var_dump($infos);
    }
  }
}

$index = new Index("../.");
$index->scan_dir();
