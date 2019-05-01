<?php

  class database{

    function connect($host,$username,$password,$db){
      $con = mysqli_connect($host,$username,$password,$db);
      if(!$con){
        die("Failed to connect to the database");
      }else{
        return $con;
      }
    }

  }

?>
