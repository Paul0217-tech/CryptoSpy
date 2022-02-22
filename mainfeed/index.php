

<?php
session_start();
if(isset($_SESSION['wallet_address'])){
?>
<?php include 'header.php' ?>

<!-- index.php user account -->

<h1>Hello World!</h1>

<!-- check subscription -->
<script src='../js/checkSubscription.js'></script>

<?php include 'footer.php' ?>
<?php
} else {
    header('Location: ../index.php');
    exit();
}
?>

