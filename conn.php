<?php
// establish connection
// mysqli contect (host, user, pass, db)
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Origin");

$conn = mysqli_connect("localhost","root","","ohsem");


// check for connection success
if(!$conn) {
  die("Error, could not connect: " . mysqli_connect_error());
}

?>