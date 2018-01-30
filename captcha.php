<?php
  session_start();

  function getCaptcha($width, $height, $rnd_code){
    $img = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefill($img, 0, 0, $white);
    $captcha = '';
    for($i=0; $i<$rnd_code; $i++){
      $captcha .= dechex(mt_rand(0, 9));
    }
    $_SESSION['captcha'] = $captcha;
    
    $rnd_line = mt_rand(0, 8);
    for($i=0; $i<$rnd_code; $i++){
      $rnd_color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
      imagestring($img, 5, $i*$width/$rnd_code+2, 5, $captcha[$i], $rnd_color);
    }
  
    for($i=0; $i<$rnd_line; $i++){
      $rnd_color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
      imageline($img, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $rnd_color);
    }
  
    header('Content-Type: image/png;');
    imagepng($img);
    imagedestroy($img);
  }
  
  getCaptcha(60, 25, 4);
?>