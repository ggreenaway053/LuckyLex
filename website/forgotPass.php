<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $errors = array();
  
    //checks for first name field
  
   if(empty($_POST['emailAddress'])){
    
    echo '<nav class="nav navbar-fixed-bottom">
          <div class="alert-success">

            <h4 class="text-center" style="margin-bottom: 0px;"><span class="fa fa-thumbs-o-down"></span> You forgot to enter your existing password!</h4>
          </div>
        </nav>';
      
                } else {

                  $userEmail = trim($_POST['emailAddress']);

                  }
  
  
  
  // if everything is okay, then this if statement will run
        if(empty($errors)) {
          
          require('database_conn/db_connect.php');
          
          $q = "SELECT * FROM users WHERE userEmail = '$userEmail' "; 
          
          
          //queries through sql
          $r = mysqli_query($dbc, $q);
          
          
          //fetchs string
          $res = mysqli_fetch_assoc($r);
          
          $password = $res['userPass'];

          
          //if the result is a success, then the user will be navigated back to the index page with a success message.
          if ($r) {
            
            //who the email is from.
            $emailFrom = "ggreenaway053@gmail.com";
            
            
            //subject of email - so I know what it is about.
            $emailSubject = "Recover Password | Lucky Lex";


            //the overall body of the email, this will show the user name and the message they have sent.
            $emailBody = "<h1>Password Recovery!</h1>
            <br />
            <p>You have requested a recovery of your password. 
            Your password is:
            <br />
            <div style='border-style: solid; border-color: blue; padding-left:5px;'><h2><strong>\n $password \n</strong></h2></div>
            
            <br />
            Please login and then change your password for security protection.
            
            <br />Please do not reply to this email </p>".
  
              //this is where the email will be sent to.  
              $emailTo = $userEmail;


                  //headers to allow for email to be sent plus the use of html tags
                  $headers = "From: $emailFrom \r\n";
                  $headers .= "MIME-Version: 1.0\r\n";
                  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


                //mails to email, with the subject and body including the headers
                mail($emailTo, $emailSubject, $emailBody, $headers);
            
            echo '<h4 class="text-center" style="margin-bottom: 0px; padding-top:10px; padding-bottom: 5px;"><span class="fa fa-thumbs-o-up"></span> Email sent! Please remember to check your junk folder, then head back to <a href="index.php">login</a>!</h4>';

                          // otherwise, the else statement will run, where a system message will show.
                          } else {

                            include_once('forgotPass.php');
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
  
  <title>Forgot your password?</title>
    
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
                    <form id="resetPass" name="resetPass" class="form-horizontal" action="forgotPass.php" method="post">
                     
                      <legend class="text-center">Forgot your password?</legend>
                      <p class="lead text-center">Don't worry!</p>

                            <p class="text-center">Enter your email to recieve instructions.</p>

                      
                      <fieldset>
                        
                        
                        <!-- Email input-->
                        <div class="form-group">
                          
                          <label class="col-md-4 control-label" for="emailAddress">Email Address:</label>
                          <div class="col-md-6">
                            <input id="emailAddress" required name="emailAddress" type="email" placeholder="lucky.lex@treasurehunter.com" class="form-control" value="<?php if(isset($_POST['emailAddress'])) echo $_POST['emailAddress'] ?>"> 
                          </div>
                          
                        </div>
                        <br/>

                      
                      <div class="text-center">
                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Reset Password" id="registrationBtn"/>
                        
                <br /><br />
                        <a href="index.php" class="login">
                Or go back to login?
            </a>
                          
                          </div>
                      
                      </fieldset>
                    
                    
                    
                    </form>
                   
                </div>
              </div>
            </div>
  </div>
        
            <!-- END of Content -->
  </body>
  
  
</html>

<?php
  
  include("HTML_includes/footer.html");
  
  
  ?>
