<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = array();
  
  
  
    //checks for first name field
    if(empty($_POST['emailAddress'])) {
    
      echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-success">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your email address!</h4>
  </div>
</nav>';
      
    } else {
    
      $e = trim($_POST['emailAddress']);
      
      require_once('database_conn/db_connect.php');
      $queryOne = "SELECT userId FROM users WHERE userEmail = $e";
      
      $userID = mysqli_query($dbc, $queryOne);
      
      }
  
  if(empty($_POST['levelID'])) {
    
    echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-success">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter the level number!</h4>
  </div>
</nav>';
    
  } else {
    
    $level = trim($_POST['levelID']);
    
    
  }
  
  if(empty($_POST['highScore'])) {
    
    echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-success">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your email address!</h4>
  </div>
</nav>';
    
  } else {
    
    $hs = trim($_POST['highScore']);
    
    
  }
 
  // if everything is okay, then this if statement will run
        if(empty($errors)) {
        
        require_once('database_conn/db_connect.php');
          
          $q = "INSERT INTO highScore (levelID, userId, score) VALUES ($level, $userID, $hs)";
          
          $r = mysqli_query($dbc, $q);
          
          if ($r) {
            
            //print message
            include ('dashboard.php');
            echo '<nav class="nav navbar-fixed-bottom">
            
  <div class="alert-success">
  <span aria-hidden="true" id="closeBtn" class="close" aria-label="Close" style="padding-right: 10px; padding-top:5px">&times;</span>
    
    <h4 class="text-center" style="margin-bottom: 0px; padding-top:10px; padding-bottom: 5px;"><span class="fa fa-thumbs-o-up"></span> High Score Added!</h4>
  </div>
</nav>
<script type="text/javascript">

$("#closeBtn").click(function(){
  $(".alert-success").hide();
  
});
</script>';
            
          } else {
            
            include('addScore.php');
            echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-danger">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> Uh-Oh System Error! Please try again.</h4>
  </div>
</nav>';
            
            //debug message
            echo '<p>' . mysqli_error($dbc) . '<br/>Query:' . $q . '</p>';
          }
          
          mysqli_close($dbc);
          
          
          
          exit();
          
        }
  
}

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
  <title>Add a new score!</title>
    
    <!-- Meta descriptions -->
    <meta name="author" content="Gareth Greenaway"/>
    <meta name="description" content="Lucky Lex, a fun, addictive game for all! Available free, on iOS and Android, download today!"/>
    <meta name="keywords" content="lucky, lex, fun, iphone, android, game, video game, uuj, uu, ulster, university, imd, interactive multimedia design, gareth, greenaway, gareth greenaway, lucky lex"/>
  
  
   <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  
</head>

<body>
<div class="container">
  
  <div class="register col-md-12">
                <div class="row">
                  <div class="col-sm-12">
                    <form id="register" name="register" class="form-horizontal" action="register.php" method="post">
                     
                      <legend class="text-center">Add a new score!</legend>
                      <p class="lead text-center">Please remember to be honest with your score. Any false scores will be deleted.</p>

                      
                      <fieldset>
                        
                        
                        <!-- Email input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="emailAddress">Email Address:</label>
                          <div class="col-md-6">
                            <input id="emailAddress" required name="emailAddress" type="email" placeholder="lucky.lex@treasurehunter.com" class="form-control" value="<?php if(isset($_POST['emailAddress'])) echo $_POST['emailAddress'] ?>"> 
                          </div>
                          
                        </div>
                        <br/>
                   
                     
                         <!-- Level input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="highScore">Level ID:</label>
                          <div class="col-md-6">
                            <input id="highScore" pattern{1,0} required name="highScore" type="number" placeholder="1" class="form-control"> 
                          
                          </div>
                          
                        </div>
                        
                        <br />
                        
                        
                        <!-- Score input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="highScore">HighScore:</label>
                          <div class="col-md-6">
                            <input id="highScore" required name="highScore" type="number" placeholder="1234" class="form-control"> 
                          
                          </div>
                          
                        </div>
                  
                        <br />
                        
                      </fieldset>
                      
                      <div class="text-center">
                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit Score" id="registrationBtn"/>
                        
                <br /><br />
                        <a href="dashboard.php" class="login">
                Or go back to dashboard.
            </a>
                          
                          </div>
                      
                     
                    </form>
                </div>
              </div>
            </div>
  </div>
        
            <!-- END of Content -->
  
  <?php
  
  include('HTML_includes/footer.html')
  
  ?>