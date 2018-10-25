<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h2><a href="<?= $infos["directories"][array_rand($infos["directories"])]["link"] . "/../.." ?>">Back</a></h2>
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
          <li>
            <a href="<?= $file["link"] ?>"><?= $file["name"] ?></a>
            <p><?= $file["size"] ?></p>
            <p><?= $file["modification_date"] ?></p>
            <p><?= $file["type"] ?></p>
          </li>
          <?php
        }
      }
    ?>
    <ul>
  </body>
</html>
