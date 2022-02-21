<?php

include 'conn.php';

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$walletAddress = mysqli_real_escape_string($conn, $_POST['WAddress']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

//echo $fname ." ".$lname." ".$walletAddress." ".$password;

//hashed password.
$hashpass = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO useracccounts (first_name, last_name, wallet_address, user_password)
VALUES ('$fname', '$lname', '$walletAddress', '$hashpass');";

if ($conn->query($sql) === TRUE) {
  session_start();
  $_SESSION['wallet_address'] = $walletAddress;
  $_SESSION['first_name'] = $fname;
  $_SESSION['last_name'] = $lname;
  echo "true";
} else {
  echo "false";
}


?>