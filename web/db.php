<?php
function OpenCon()
 {
 $dbhost = "192.168.88.16";
 $dbuser = "gvanca";
 $dbpass = "12345678";
 $db = "iot";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
  
?>


