<?php

$page_title = "Register | Lucky Lex";

include('php_includes/functions.php');

// checks for form submission


  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = array();
  
  
  
    //checks for first name field
    if(empty($_POST['firstName'])) {
    
      echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-success">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your first name!</h4>
  </div>
</nav>';
      
    } else {
    
      $fn = trim($_POST['firstName']);
      
      }

      //checks for last name field
      if(empty($_POST['lastName'])) {
      
        echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your surname!</h4>
  </div>
</nav>';
      
      } else {
      
        $ln = trim($_POST['lastName']);
        
        }
        
        //check for email address
        if(empty($_POST['emailAddress'])) {
        
          echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your email address!</h4>
  </div>
</nav>';
          
        } else {
        
          $e = trim($_POST['emailAddress']);
          
          }
          
    
          //checks password 1 and password 2 to see if they match
    
          if(!empty($_POST['pass1'])) {
          
            if($_POST['pass1'] != $_POST['pass2']) {
            
            include('register.php');
            echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> Your passwords do not match!</h4>
  </div>
</nav>';
            
            } else {
              
              $p = trim($_POST['pass1']);
            
              }
              
          } else {
          
            echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your password!</h4>
  </div>
</nav>';
            
            }
            
        
        // if everything is okay, then this if statement will run
        if(empty($errors)) {
        
        require ('database_conn/db_connect.php');
          
          $q = "INSERT INTO users (firstName, lastName, userEmail, userPass) VALUES ('$fn', '$ln', '$e', '$p' )";
          
          $r = mysqli_query($dbc, $q);
          
          if ($r) {
            
            //print message
            include ('dashboard.php');
            echo '<nav class="nav navbar-fixed-bottom">
            
  <div class="alert-success">
  <span aria-hidden="true" id="closeBtn" class="close" aria-label="Close" style="padding-right: 10px; padding-top:5px">&times;</span>
    
    <h4 class="text-center" style="margin-bottom: 0px; padding-top:10px; padding-bottom: 5px;"><span class="fa fa-thumbs-o-up"></span> Registration successful! Awesome job.</h4>
  </div>
</nav>
<script type="text/javascript">

$("#closeBtn").click(function(){
  $(".alert-success").hide();
  
});
</script>';
            
          } else {
            
            include('register.php');
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
  
  <title>Register for Lucky Lex!</title>
    
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
                     
                      <legend class="text-center">Register for Lucky Lex!</legend>
                      <p class="lead text-center">Awesome, now let's get started.</p>

                            <p class="text-center">All fields are required for successful registration.</p>

                      
                      <fieldset>
                        
                        <!-- Full Name input -->
                        
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="firstName">First Name:</label>
                          <div class="col-md-6">
                            <input id="firstName" required name="firstName" type="text" placeholder="Lucky" class="form-control" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName'] ?>">
                          </div>
                        </div>
                        <br />
                        
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="lastName">Last Name:</label>
                          <div class="col-md-6">
                            <input id="lastName" required name="lastName" type="text" placeholder="Lex" class="form-control" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName'] ?>">
                          </div>
                        </div>
                        <br />
                        
                        
                        <!-- Email input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="emailAddress">Email Address:</label>
                          <div class="col-md-6">
                            <input id="emailAddress" required name="emailAddress" type="email" placeholder="lucky.lex@treasurehunter.com" class="form-control" value="<?php if(isset($_POST['emailAddress'])) echo $_POST['emailAddress'] ?>"> 
                          </div>
                          
                        </div>
                        <br/>
                        
                       
                        
                        <!-- Password input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="pass1">Password:</label>
                          <small id="passHelp" class="form-text text-muted">No less than 8 characters.</small>
                          <div class="col-md-6">
                            <input id="pass1" pattern=".{8,}" required name="pass1" type="password" placeholder="********" class="form-control" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'] ?>"> 
                          </div>
                          
                        </div>
                        <br />
                     
                        
                        <!-- Password Confirm input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="pass2">Confirm Password:</label>
                          <small id="passHelp" class="form-text text-muted">MUST match with password.</small>
                          <div class="col-md-6">
                            <input id="pass2" pattern=".{8,}" required name="pass2" type="password" placeholder="********" class="form-control" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'] ?>"> 
                          
                          </div>
                          
                        </div>
                  
                        <br />
                        
                      </fieldset>
                      
                      <div class="text-center">
                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit Details" id="registrationBtn"/>
                        
                <br /><br />
                        <a href="index.php" class="login">
                Or go back to login?
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