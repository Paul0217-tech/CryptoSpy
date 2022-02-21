<?php

include 'conn.php';

$walletAddress = mysqli_real_escape_string($conn, $_POST['WAddress']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

    //echo $walletAddress

    $sql = "SELECT * FROM useracccounts";
    $result = $conn->query($sql);

    //echo $result->num_rows;


    $counter = 1;
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        //hashed password
        $hashpassword = $row['user_password'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];

        if($walletAddress == $row['wallet_address'] && password_verify($password, $hashpassword) == 1){
          session_start();
          $_SESSION['wallet_address'] = $walletAddress;
          $_SESSION['first_name'] = $fname;
          $_SESSION['last_name'] = $lname;
          echo "true";
          break;
        } elseif($counter == $result->num_rows){
          echo "false";
        }
        $counter++;
      }
    } else {
      echo "false";
    }

?>