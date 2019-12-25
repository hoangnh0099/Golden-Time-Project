<?php
  $localhost = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $database = "golden_time_database";

  $connect = mysqli_connect($localhost, $dbUsername, $dbPassword, $database) or die("Cannot connect to database");
?>