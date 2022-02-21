<?php
    include 'conn.php';

    $walletAddress = mysqli_real_escape_string($conn, $_POST['walletAdd']);

    //echo $walletAddress

    $sql = "SELECT * FROM useracccounts";
    $result = $conn->query($sql);

    //echo $result->num_rows;

    $counter = 1;
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        if($walletAddress == $row['wallet_address']){
          echo $row['wallet_address'];
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