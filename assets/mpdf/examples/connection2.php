<?php

    error_reporting(0);

    $con = mysqli_connect("localhost","root","password","db_itech");

    // Check connection
    if (mysqli_connect_errno())
      {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    //   // Create connection
    // $conn = new mysqli("localhost","root","password","db_mukundroadlines");
    // // Check connection
    // if ($conn->connect_error) 
    // {
    //     die("Connection failed: " . $conn->connect_error);
    // } 
    // else
    // {
    //     echo "connect";
    // }
        
?>
