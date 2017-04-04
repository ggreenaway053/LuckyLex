<?php

$page_title ="Login Successful";

include_once ('dashboard.php');
include_once('php_includes/functions.php');

// if there is no session found, then script will quit and move users back to index.php
if ($_SESSION = null ) {
  
  session_destroy();
      
        header("Location: index.php");
      
        exit();
    }


?>


<nav class="nav navbar-fixed-bottom">
  <br /><br />
  <div class="alert-success">
    <span aria-hidden="true" id="closeBtn" class="close" aria-label="Close" style="padding-right: 10px; padding-top:5px">&times;</span>
    
    <h4 class="text-center" style="margin-bottom: 0px; padding-top:10px; padding-bottom: 5px;"><span class="fa fa-thumbs-o-up"></span> Login successful! You can now download the game, free of charge! If this was not intended, <a href="logout.php">logout</a>.</h4>
  </div>
</nav>

<script type="text/javascript">

$("#closeBtn").click(function(){
  $('.alert-success').hide();
  
});
</script>

