<?php
include "file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks
 if(isset($_GET['id']) && is_numeric($_GET['id'])) {
     //connect to the db
     $link = mysql_connect("$host", "$user", "$pass") or die("Could not connect: " . mysql_error());

     // select our database
     $query=mysql_select_db($db,$link) or die(mysql_error());
     // get the image from the db
     $sql = "SELECT image FROM test_image WHERE id=" .$_GET['id'] . ";";
     
     // the result of the query
     $result = mysql_query($sql,$link) or die("Invalid query: " . mysql_error());

               //header("Content-type: image/jpeg"); 
               
              $bookname=$_GET['book_name1'];
               $authorname=$_GET['author_name1'];
               
               $image = imagecreatefromstring(mysql_result($result, 0));
               //$image = imagecreatefromjpeg($image);
               $grey = imagecolorallocate($image, 128, 128, 128);
                $black = imagecolorallocate($image, 128, 128, 128);
                $font = './TAMu_Kalyani.ttf';

                imagettftext($image, 40, 0,100,100,$black,$font,$bookname);
                imagettftext($image,40,0,500,700,$black,$font,$authorname); 


                
                header('Content-Type: image/jpg');
                imagejpeg($image);
                imagedestroy($image);  
                mysql_close($link);
 }
?>
