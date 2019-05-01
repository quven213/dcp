<?php

  $pa = $_GET['pa'];

  $values = explode(",",$pa);

  $file = fopen("../core/advisor.txt","w");
  ftruncate($file,0);

  foreach($values as $i){
    fwrite($file,$i."\n");
  }

  fclose($file);
?>
