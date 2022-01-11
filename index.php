<!DOCTYPE html>
<html>
  <head>
    <title>Acceuil</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href=".interface/style.css">
  <body>
    <header>
      <h1>LISTE DES PROJETS</h1>
    </header>
    <main class="d-flex justify-content-around flex-wrap">
      <?php
        $arrFiles = scandir('./');
        foreach ($arrFiles as $key => $value) {
          if(substr( $value, 0, 1 ) != "." && is_dir($value)){
            echo '<a class="noDecor" href="'.$value.'">
                    <div id="block" class="d-flex justify-content-between p-2 m-3">
                      <img class="me-1" src="'.createAvatarImage(strtoupper(substr( $value, 0, 1 ))).'">
                      <div class="d-flex flex-wrap justify-content-center">
                        <h3>'.$value.'</h3>
                        <p class="align-self-end fs-6 fw-light fw-italic">Modifier le: '.date("d/m/Y H:i", filemtime($value)).'</p>
                      </div>
                    </div>
                  </a>';
          }
        }

        function createAvatarImage($string){
          $imageFilePath = ".interface/images/".$string . ".png";
          $avatar = imagecreatetruecolor(60,60);
          $bg_color = imagecolorallocate($avatar, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
          imagefill($avatar,0,0,$bg_color);
          $avatar_text_color = imagecolorallocate($avatar, 255,255,255);
          $font = imageloadfont('.interface/font.gdf');
          imagestring($avatar, $font, 15, 12, $string, $avatar_text_color);
          imagepng($avatar, $imageFilePath);
          imagedestroy($avatar);
          return $imageFilePath;
        }
        // echo '<img src="'.createAvatarImage("test").'">';
      ?>
    </main>
  </body>
</html>
