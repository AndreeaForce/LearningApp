<?php
include_once 'database.php';

if(isset($_POST['upload'])){
 
 $name = $_FILES['avatar']['name'];
 $target_dir = "images/";
 $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){
 
  // Insert record
  $query = "insert into users(avatar) values('".$name."')";
  mysqli_query($con,$query);
  
  // Upload file
  move_uploaded_file($_FILES['avatar']['tmp_name'],$target_dir.$name);

 }
    header("Location: /learningApp/index.php?signup=success");
    exit();
 
}
?>