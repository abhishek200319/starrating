<?php
session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "phpproject";
    

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if($conn){
  //   echo"connection stablished successfully";
  }else{
     echo"there was an error". mysqli_connect_error();
  }
if (isset($_POST)) {
$rating= $_POST['rate_value'];
$name= $_POST['user_name'];
$sql="INSERT INTO `rating` (`id`, `rate_value`, `user_name`) VALUES ('null','$rating', '$name')";
 $query= mysqli_query($conn,$sql);
   if($query){
 //   echo "stored";

    header("location:allreviews.php?user=$name & rate=$rating ");
 }
}

?>