<?php


if (!isset($_POST['submitComment'])) {

echo "Error! You need to fully submit the form!";

}

$n = $_POST['name'];

$em = $_POST['emailAddress'];

$message = $_POST['comment'];


if (empty($n) || empty($em))
{

echo "Your name and email are required for the comments area.";
exit();

}

//this will show on the email who it is from. used same email to stop messages going to spam folder
$emailFrom = "ggreenaway053@gmail.com";


//subject of email - so I know what it is about.
$emailSubject = "Lucky Lex | New comment submitted";


//the overall body of the email, this will show the user name and the message they have sent.
$emailBody = "You have received a new comment from\n $n . Here is what they said:\n $message ".
  
//this is where the email will be sent to.  
  $emailTo = "ggreenaway053@gmail.com";


//headers to allow replies
$headers = "From: $emailFrom \r\n";

$headers .= "Reply-To: $em \r\n";


//mails to email, with the subject and body including the headers
mail($emailTo, $emailSubject, $emailBody, $headers);


//once the email has been successfully submitted, the following will run
include("dashboard.php");

echo "<nav class='nav navbar-fixed-bottom'>
                <br /><br />
              <div class='alert-success'>
              <span aria-hidden='true' title='Close' id='closeBtn' class='close' aria-label='Close' style='padding-right: 10px; padding-top:5px'>&times;</span>
              <h4 class='text-center' style='margin-bottom: 0px; padding-top:10px; padding-bottom: 5px;'><span class='fa fa-thumbs-o-up'></span> Thanks! Your comment has been sent to Gareth!</h4>
              </div>
              </nav>
              
              <script type='text/javascript'>
              $('#closeBtn').click(function(){
              $('.alert-success').hide();
              });
              </script>";


?>