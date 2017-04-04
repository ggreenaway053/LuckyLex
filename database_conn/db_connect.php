<?php


//database details
DEFINE ('DB_USER', 'B00638098');
DEFINE ('DB_PASSWORD', 'GpDx5zaq');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'b00638098');

//making connection
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($dbc, 'utf8');

?>