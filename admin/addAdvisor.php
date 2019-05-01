<?php

  $value = $_GET['value'];

  $file = fopen("../core/advisor.txt","a");
  fwrite($file,$value);
  fclose($file);


?>
