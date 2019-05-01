<?php

  require_once 'database.php';
  session_start();

  $host= "localhost";
  $username = "root";
  $password = "";
  $db = "dcp";

  $obj = new database();
  $con = $obj->connect($host,$username,$password,$db);

  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  $sql = "SELECT username, password FROM admin";
  $result = mysqli_query($con,$sql);
  if(!$result){
    die(mysqli_error($con));
  }else{
    $rows = mysqli_fetch_assoc($result);
    if($username == $rows['username'] && md5(hash('sha256',$password)) == $rows['password']){
      echo 0;
      $_SESSION['status'] = 0;
      exit();
    }else{
      echo 1;
      $_SESSION['status'] = 1;
      exit();
    }
  }

?>
