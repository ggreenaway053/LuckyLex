<?php

// checks form has been sent over
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  
include ('database_conn/db_connect.php');




// email address and password from form 
$emailAddress=$_POST['emailAddress']; 
$password=$_POST['password']; 



  // helps to prevent sql injection
  $emailAddress = stripslashes($emailAddress);
  $password = stripslashes($password);


  $emailAddress = mysqli_real_escape_string($dbc, $emailAddress);
  $password = mysqli_real_escape_string($dbc, $password);


    // sql query
    $sql="SELECT * FROM users WHERE userEmail='$emailAddress' and userPass='$password'";

    $result=mysqli_query($dbc, $sql);


        // Mysql_num_row is counting table row
   $count=mysqli_num_rows($result);

              // if there is one result then if statement will run
            if($count == 1){
              
              

            // redirect to file "login_success.php"
              session_start();
            $_SESSION['userId'] = $data['userId'];
              
            $_SESSION['firstName'] = $data['firstName'];
              
            header("location: login_success.php");
              
            
            
                          } else {
                                  
                                  
                                  include ('index.php');
                                  echo "<nav class='nav navbar-fixed-top'>
                                  <div class='alert-danger'>
                                  <h4 class='text-center' style='margin-top: 0px; padding-top:10px; padding-bottom: 5px;'>
                                  <span class='fa fa-thumbs-o-down'></span> Your username or password, do match those on record. Please try again!</h4>
                                  </div>
                                  </nav>";
                                  
                                  
                                  } 
  
}
?>