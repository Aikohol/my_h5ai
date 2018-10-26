<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href=<?= "http://" . $_SERVER["HTTP_HOST"] ."/my_h5ai".  "/style.css"?> >
  </head>
  <body>
    <ul>
    <?php
      if(!empty($infos["directories"])) {
        foreach($infos["directories"] as $directory) {
          ?>
          <li class="directories"><a href="<?= $directory["link"] ?>"><?= $directory["name"] ?></a></li>
          <?php
        }
      }
      if(!empty($infos["files"])) {
        foreach($infos["files"] as $file) {
          ?>
          <li class="files">
            <img width="35px" src=<?= "http://" . $_SERVER["HTTP_HOST"] ."/my_h5ai/". $infos["files-type"][$file["image"]] ?> />
            <a href="<?= $file["link"] ?>"><?= $file["name"] ?></a>
            <p><?= $file["size"] ?></p>
            <p><?= $file["modification_date"] ?></p>
            <p><?= $file["type"] ?></p>
          </li>
          <?php
        }
      }
    ?>
  </ul>
  </body>
</html>
