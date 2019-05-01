<?php

  $course = $_GET['courses'];
  $courses = explode(",",$course);
  $file = fopen('../core/long_term_care_track.txt','a');
  ftruncate($file,0);
  foreach($courses as $i){
    fwrite($file,$i."\n");
  }
  fclose($file);

?>
