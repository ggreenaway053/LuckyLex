<?php
require('database_conn/db_connect.php');

//sql query that has maximum of three high scores

$q = "SELECT e1.* FROM (SELECT DISTINCT `score` FROM `highscore` ORDER BY `score` DESC LIMIT 3) s1 JOIN `highscore`e1 ON e1.score = s1.score ORDER BY e1.score DESC";

$result = mysqli_query($dbc, $q);

if($result) {
  
  while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
    
    $source = '';
    
    
    
    case $row['userId']:
    
      $source = 'img/highScorePlace.png';
    }
  
  }


//closes database to free up resources - performance related.
mysqli_close($dbc);
?>
<img src="<?php echo $source; ?>" />