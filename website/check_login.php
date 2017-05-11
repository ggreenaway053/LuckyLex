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


    // sql query SHA1 helps to find encrypted pass
    $sql="SELECT * FROM users WHERE userEmail='$emailAddress' and userPass=SHA1('$password')";

    $result=mysqli_query($dbc, $sql);


        // Mysql_num_row is counting table row
   $count=mysqli_num_rows($result);

              // if there is one result then if statement will run
            if($count == 1){
              
              

            // redirect to file "dashboard.php"
              session_start();
              
              
              setcookie ('userID', $data[1]);
              
            header("location: dashboard.php");
              
            
            
                          } else {
                                  
                                  
                                  include_once ('index.php');
                                  echo "<nav class='nav navbar-fixed-top'>
                                  <div class='alert-danger'>
                                  <h4 class='text-center' style='margin-top: 0px; padding-top:10px; padding-bottom: 5px;'>
                                  <span class='fa fa-thumbs-o-down'></span> Your username or password, do match those on record. Please try again!</h4>
                                  </div>
                                  </nav>";
                                  
                                  
                                  } 
  
}
?>