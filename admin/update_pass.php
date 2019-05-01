<?php

  include 'database.php';
  $obj = new database();
  $host = "localhost";
  $username = "root";
  $password = "";
  $db = "dcp";
  $con = $obj->connect($host,$username,$password,$db);

  $pass = $_POST['password'];
  $pass = md5(hash('sha256',$pass));
  $status = "Y";

  $sql = "UPDATE admin SET password = '$pass',status = '$status'";
  $result = mysqli_query($con,$sql);
  if(!$result){
    die(mysqli_error($con));
  }else{
    echo '<script>window.location="index.php"</script>';
  }


?>
