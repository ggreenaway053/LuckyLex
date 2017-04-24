<?php
//include_once('php_includes/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
  <title>Signin to Lucky Lex</title>
    
    <!-- Meta descriptions -->
    <meta name="author" content="Gareth Greenaway"/>
    <meta name="description" content="Lucky Lex, a fun, addictive game for all! Available free, on iOS and Android, download today!"/>
    <meta name="keywords" content="lucky, lex, fun, iphone, android, game, video game, uuj, uu, ulster, university, imd, interactive multimedia design, gareth, greenaway, gareth greenaway, lucky lex"/>
  
  
  
</head>

<body style="background-image:url(img/background.jpg);">
  
  
  
       <div class="container">
       
        <div class="card card-container">
          
          
          <h2 class="text-center">Lucky Lex</h2>
          <legend class="text-center">Sign In or Sign Up!</legend>
       
            
            <img id="profile-img" class="profile-img-card" src="img/lucky_lex.png" />
          
            
            <form class="form-signin" action="check_login.php" method="post">
              
              <br />
                
                <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email address" required autofocus>
              <br />
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                
              
              <br />
              
                <button class="btn btn-lg btn-info btn-block" type="submit" id="signIn">Sign In</button>
            </form>
          
          
            <a href="register.php" class="register">
                Not got an account? Register instead.
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    
  
  
  
</body>
  
  
  <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <!-- CSS -->
  <link href="css/login.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
  
  <!-- Hover.css FOR BUTTONS -->
    <link href="css/hover.css" rel="stylesheet">
  
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/app.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>