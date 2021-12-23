<?php
   if(isset($_FILES['uploaded_file'])){
      $msg= "";
      $file_name = $_FILES['uploaded_file']['name'];
      $file_size =$_FILES['uploaded_file']['size'];
      $file_tmp =$_FILES['uploaded_file']['tmp_name'];
      $file_type=$_FILES['uploaded_file']['type'];
      $tmp = explode('.',$_FILES['uploaded_file']['name']);
      $file_ext=strtolower(end($tmp));
      
      $extensions= array("txt","hex");
      
      // errors during uploadimg file

      if(in_array($file_ext,$extensions)=== false){
         $msg="extension not allowed, please choose a txt or hex file.";
      }
      
     /* if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      } */
      
      if($msg==""){
         if(move_uploaded_file($file_tmp,"uploads/".$file_name)){
             $msg = "File was uploaded successefully";
         }
      }
   }
   else{
    
    $msg = "error try agin";

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload</title>
    <!-- rnder all elements normally -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main template css file -->
    <link rel="stylesheet" href="css/upload.css">
</head>
<body>
<h1 class="message"> <?php print ($msg); ?></h1>
</body>
</html>