<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h2><a href="<?= $back_path ?>">Back</a></h2>
    <ul>
    <?php
      if(!empty($infos["directories"])) {
        foreach($infos["directories"] as $directory) {
          ?>
          <li><a href="<?= $directory["link"] ?>"><?= $directory["name"] ?></a></li>
          <?php
        }
      }
      if(!empty($infos["files"])) {
        foreach($infos["files"] as $file) {
          ?>
          <li><a href="<?= $file["link"] ?>"><?= $file["name"] ?></a></li>
          <?php
        }
      }
    ?>
    <ul>
  </body>
</html>