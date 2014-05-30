<?php

error_reporting(-1);

define( "DB_SERVER", getenv('OPENSHIFT_MYSQL_DB_HOST') );

define( "DB_USER", getenv('OPENSHIFT_MYSQL_DB_USERNAME') );

define( "DB_PASSWORD",  getenv('OPENSHIFT_MYSQL_DB_PASSWORD') );

define( "DB_DATABASE",  getenv('OPENSHIFT_APP_NAME') );


$db = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
        mysql_select_db(DB_DATABASE) or die(mysql_error());

echo $db;
{
	echo "connected successfully";
}


$dbcreate='CREATE DATABASE IF NOT EXISTS image';

$dbase=mysql_query($dbcreate,$db) or die(mysql_error($db));

if($dbase==true)
{
echo 'database created';
}


$dbselect=mysql_select_db(image,$db) or die(mysql_error($db));

if($dbselect==true)
{
echo 'selected';
}

$table_name=$_POST['table_name'];

$create="CREATE TABLE $table_name(name VARCHAR(20),phone_no INTEGER(50),email_add VARCHAR(30),address VARCHAR(50))";

$tablecreate=mysql_query($create,$db) or die(mysql_error($db));

echo $create;

if($tablecreate==true)
{
echo 'table created';
}
else
{
echo "already table is exists";
}

/*
// check if a file was submitted/
if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try {
    $msg= upload();  //this will upload your image
    echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}

// the upload function

function upload() {
    include "file_constants.php";
    $maxsize = 10000000; //set to approx 10 MB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) 
                {

                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
                    // put the image in the db...
                    // database connection
                    $connect=mysql_connect($host, $user, $pass) OR DIE (mysql_error());

                    // select the db
                    mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());

                    // our sql query
                    $sql = "INSERT INTO test_image(image, name) VALUES('{$imgData}','{$_FILES['userfile']['name']}')";

                    // insert the image
                    $msg=mysql_query($sql,$connect) or die("Error in Query: " . mysql_error());
                    echo "image uploaded";
                     if($msg=true)
                     {
                     //$bookname=$_POST['book_name'];
                     //$authorname=$_POST['author_name'];
                   //echo '<html><body><center><b>View The Image</b><a href=file_display.php?id='.mysql_insert_id().'?book_name='$bookname'?author_name='$authorname'><input type=button value=click></a></center><body></html>';
                   header('Location: http://localhost/imagesite/file_display.php?id='.mysql_insert_id().'&book_name1='.$_POST['book_name'].'&author_name1='.$_POST['author_name'].'');

                   }
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";

    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}

// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
*/
?>
