<?php
$UsernameDB = 'root';
$PasswordDB = '';
$HostnameDB = 'localhost';
$DatabaseName = 'autombeheer';
$Results = array();

//connection to the database
$dbhandle = mysqli_connect($HostnameDB, $UsernameDB, $PasswordDB) 
  or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysqli_select_db($dbhandle, $DatabaseName)
  or die("Could not select AutomBeheer");

?>