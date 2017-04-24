<?php
 
function sec_session_start() {
  
    $sessionName = 'sec_session_id';  
  
    session_name($sessionName);
 
    $secure = true;
  
    // This will mean only http access will be allowed
    $httponly = true;
  
   
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
      
        header("Location: index.php");
      
        exit();
    }
  
    
  
    $cookieParamaters = session_get_cookie_params();
    session_set_cookie_params($cookieParamaters["lifetime"], $cookieParamaters["path"], $cookieParamaters["domain"], $secure, $httponly);
 
    session_start();            // Starts PHP Session. 
    session_regenerate_id(true);    // deletes old session and generates new one 
}

?>
