<?php


function redirectUsers ($page ='index.php') {
  
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
  
  
  $url = rtrim($url, '/\\');
  
  header("Location: $url"); 
  
  
  exit();
  
}


?>