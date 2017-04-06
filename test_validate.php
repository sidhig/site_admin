<?


// $data1 =  'iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABl'
//        . 'BMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDr'
//        . 'EX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r'
//        . '8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg=='; // replace with an image string in bytes

// $data = base64_decode($data1); // decode an image

// $im = imagecreatefromstring($data); // php function to create image from string
// // condition check if valid conversion
// if ($im !== false) 
// {
//     // saves an image to specific location
//     $resp = imagepng($im, $_SERVER['DOCUMENT_ROOT'].'/site_admin'.'/image/'.date('ymdhis').'.png');
//     // frees image from memory
//     imagedestroy($im);
// }
// else 
// {
//     // show if any error in bytes data for image
//     echo 'An error occurred.'; 
// }
?>


<!-- // header ("Content-type: image/png");
// $text='test@example.com';
// $string = $text;                                            
// $font   = 3;
// $width  = ImageFontWidth($font) * strlen($string);
// $height = ImageFontHeight($font);
  
// $im = @imagecreate ($width,$height);
// $background_color = imagecolorallocate ($im, 255, 255, 255); //white background
// $text_color = imagecolorallocate ($im, 0, 0,0);//black text
// imagestring ($im, $font, 0, 0,  $string, $text_color);
// echo imagepng ($im); -->

<?php
// Create a 100*30 image
$im = imagecreate(1000, 300);

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Write the string at the top left
imagestring($im, 5, 0, 0, 'Hello world!', $textcolor);

// Output the image
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>