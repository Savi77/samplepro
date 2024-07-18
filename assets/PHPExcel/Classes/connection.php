



<?php


//using sql server 2012 using username password 
$serverName = "AMOD\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"db_kirloskar", "UID"=>"dbo_kirloskar", "PWD"=>"ileaf@@2017");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


?>

