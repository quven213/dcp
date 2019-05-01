<?php

  require_once "database.php";
  $obj = new database();
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "dcp";
  $con = $obj->connect($host,$user,$pass,$db);

  $name = mysqli_real_escape_string($con,$_POST['name']);
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $password = md5(hash("sha256",$password));
  $status = "N";

  $sql = "UPDATE admin SET name = '$name', username = '$username', password = '$password', status = '$status'";
  $result = mysqli_query($con,$sql);
  if($result){
    echo 0;
  }else{
    echo 1;
  }

?>
