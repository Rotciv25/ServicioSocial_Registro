//<?php

//if ($SERVER['REQUEST_METHOD'] == 'GET') {
//  echo "Se enviaron por GET";
//}
//else{
  //echo "Se enviaron por GET";
//}
if (isset($_POST['submit'])) {
  echo "Se han enviando los datos correctamente";
  print_r($_POST['submit']);
}
 ?>
