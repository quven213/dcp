<?php

  $course = $_GET['courses'];
  $courses = explode(",",$course);
  $file = fopen('../core/major.txt','a');
  ftruncate($file,0);
  foreach($courses as $i){
    fwrite($file,$i."\n");
  }
  fclose($file);
?>
