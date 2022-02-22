
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoSpy</title>

    <!-- preload css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/navbar-style.css">
    <!-- preload web3 -->
    <script src="node_modules/web3/dist/web3.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <!-- loader element -->
    <div class="loader">
        <div></div>
    </div>


    <!-- block users for mobile Phones -->

    <div class="blockdevice">
        This Site can only be used in Laptops and PCs'
        <div class="loader-1">
            <div></div>
        </div>
    </div>

    <div class="Container">
        <div class="navbar">
        <span class="title-style">
                CryptoSpy
        </span>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contacts</a></li>
                <li>
                    <?php
                        if(!isset($_SESSION['wallet_address'])){
                    ?>
                    <a class="connect-wallet-style" href="#" id="metamaskbutton" data-toggle="modal" data-target="#exampleModal">
                        Connect Wallet
                    </a>
                    <?php
                        } else {
                    ?>
                    <a class="connect-wallet-style" href="#" id="metamaskbutton" data-toggle="modal" data-target="#exampleModal">
                        Sign out
                    </a>
                    <?php
                        session_start();
                        header('Location: mainfeed/index.php');
                        exit();
                        }
                    ?>
                </li>
            </ul>
        </nav>
        </div>
