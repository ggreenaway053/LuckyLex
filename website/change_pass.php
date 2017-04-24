<?php


$page_title = "Change Password | Lucky Lex";

// this checks the form has been posted to the script
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  

  //checks for email address field
  
  if(empty($_POST['emailAddress'])){
    
    echo '<nav class="nav navbar-fixed-bottom">
          <div class="alert-success">

            <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your existing password!</h4>
          </div>
        </nav>';
      
                } else {

                  $e = trim($_POST['emailAddress']);

                  }
  
    
  
      //checks for existing password field
          if(empty($_POST['oldPass'])) {

            echo '<nav class="nav navbar-fixed-bottom">
        <div class="alert-success">

          <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your existing password!</h4>
        </div>
      </nav>';

          } else {

            $oldPass = trim($_POST['oldPass']);

            }

      //checks for new password field
      if(empty($_POST['newPass'])) {
      
        echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your new password!</h4>
  </div>
</nav>';
      
      } else {
      
        trim($_POST['newPass']);
        
        }
        


        //check for confirming password
        if(empty($_POST['confirmPass'])) {
        
          echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to confirm your new password!</h4>
  </div>
</nav>';
          
        } else {
        
         trim($_POST['confirmPass']);
          
          }
          
    
          //checks password 1 and password 2 to see if they match
    
          if(!empty($_POST['newPass'])) {
          
            if($_POST['newPass'] != $_POST['confirmPass']) {
            
            include('change_pass.php');
            echo '<nav class="nav navbar-fixed-bottom">
  <div class="alert-warning">
    
    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> Your passwords do not match!</h4>
  </div>
</nav>';
            
            } else {
              
              $p = trim($_POST['newPass']);
            
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
          
          require('database_conn/db_connect.php');
          
          $q = "SELECT userId FROM users WHERE(userEmail='$e' AND userPass='$oldPass') "; 
          $r = mysqli_query($dbc, $q);
          
          $num = mysqli_num_rows($r);
          
          
          //if there is one result, then if statement will run
          if ($num == 1) {
  
          // fetches user ID for update query.
          $row = mysqli_fetch_array($r, MYSQLI_NUM);

          //updates user password where the userId is = to the first query.
          $q = "UPDATE users SET userPass= '$p' WHERE userId=$row[0]";
            
          $r = mysqli_query($dbc, $q);
            
          }
          
          
          //if the result is a success, then the user will be navigated back to the dashboard with a success message.
          if ($r) {
            
            //print message
            header('Location: dashboard.php');
            echo '<nav class="nav navbar-fixed-bottom">
            
                  <div class="alert-success">
                  <span aria-hidden="true" id="closeBtn" class="close" aria-label="Close" style="padding-right: 10px; padding-top:5px">&times;</span>

                    <h4 class="text-center" style="margin-bottom: 0px; padding-top:10px; padding-bottom: 5px;"><span class="fa fa-thumbs-o-up"></span> Password Change successful! Awesome job.</h4>
                  </div>
                </nav>
                <script type="text/javascript">

                $("#closeBtn").click(function(){
                  $(".alert-success").hide();

                });
                </script>';

                          // otherwise, the else statement will run, where a system message will show.
                          } else {

                            include('change_pass.php');
                            echo '<nav class="nav navbar-fixed-bottom">
                  <div class="alert-danger">

                    <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> Uh-Oh System Error! Please try again.</h4>
                  </div>
                </nav>';
            
                          //debug message
                          echo '<p>' . mysqli_error($dbc) . '<br/>Query:' . $q . '</p>';
           
          }
          //closes database
          mysqli_close($dbc);
          
          
          //quits script
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
  
  <title><?php echo $page_title?></title>
    
    <!-- Meta descriptions -->
    <meta name="author" content="Gareth Greenaway"/>
    <meta name="description" content="Lucky Lex, a fun, addictive game for all! Available free, on iOS and Android, download today!"/>
    <meta name="keywords" content="lucky, lex, fun, iphone, android, game, video game, uuj, uu, ulster, university, imd, interactive multimedia design, gareth, greenaway, gareth greenaway, lucky lex"/>
  
</head>

  <body>
    <br />

<div class="container">
  
  <div class="register col-md-12">
                <div class="row">
                  <div class="col-sm-12">
                    <form id="register" name="register" class="form-horizontal" action="change_pass.php" method="post">
                     
                      <legend class="text-center">Change your password</legend>
                      <p class="lead text-center">Cool, let's go!</p>

                            <p class="text-center">Please ensure your new password follows the guidelines!</p>

                      
                      <fieldset>
                      
                        
                        <!-- Email input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="emailAddress">Email Address:</label>
                          
                          <div class="col-md-6">
                            <input id="emailAddress" required name="emailAddress" type="email" placeholder="lucky.lex@treasurehunter.com" class="form-control"> 
                          </div>
                          
                        </div>
                        <br />
                        
                        
                        <!-- Password input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="oldPass">Old Password:</label>
                          
                          <div class="col-md-6">
                            <input id="oldPass" pattern=".{8,}" required name="oldPass" type="password" placeholder="********" class="form-control"> 
                          </div>
                          
                        </div>
                        <br />
                     
                        
                        <!-- Password Confirm input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="newPass">New Password:</label>
                          
                          <div class="col-md-6">
                            <input id="newPass" pattern=".{8,}" required name="newPass" type="password" placeholder="********" class="form-control"> 
                          
                          </div>
                          
                        </div>
                  
                        <br />
                        
                        
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="confirmPass">Confirm Password:</label>
                          <small id="passHelp" class="form-text text-muted">MUST match with new password.</small>
                          
                          <div class="col-md-6">
                            <input id="confirmPass" pattern=".{8,}" required name="confirmPass" type="password" placeholder="********" class="form-control"> 
                          
                          </div>
                          
                        </div>
                  
                        <br />
                        
                      </fieldset>
                      
                      <div class="text-center">
                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Update Password" id="changePassBtn"/>
                        
                <br /><br />
                        <a href="dashboard.php" class="dashboard">
                Or go back home?
            </a>
                          
                          </div>
                      
                     
                   
                    </form>
              </div>
            </div>
  </div>
        
            <!-- END of Content -->
              
    </div>
  </body>
  
  
  <?php
  
  include('HTML_includes/footer.html');
  
  ?>