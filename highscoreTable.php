<?php

require ('database_conn/db_connect.php');


// sql query for all highscores.
$tableQuery = "SELECT highscore.score, users.firstName
FROM highscore
INNER JOIN users ON highscore.userId = users.userId WHERE levelID = 1 ORDER BY score DESC";

$result = mysqli_query($dbc, $tableQuery);

$i= 1;


if ($result){ //if there are results found, then this will run
  
  echo '<table class="table table-hover table-bordered table-responsive table-striped">
  <thead>
  <tr>
  <th style="text-align: center;">User Ranking:</th>
  <th style="text-align: center;">User Name:</th>
  <th style="text-align: center;">Score:</th>
  </thead>
  ';
  
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    echo '<tbody class="text-center"><tr>
          <td>'. $i++ .'</td><td>' . $row['firstName'] . '</td><td>' . $row['score'] . '</td></tr></tbody>';
    
    
  }
  

  echo '</table>';
  
  mysqli_free_result($result);
  
  
} else {
  
  
  echo '<p class="lead">Uh Oh! There seems to be an issue with our server. Please try again later.</p>';
  
}

mysqli_close($dbc);

?>