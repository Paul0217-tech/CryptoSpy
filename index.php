<?php include 'header.php' ?>

<?php
    session_start();
    if(!isset($_SESSION['wallet_address'])) {

?>

<link rel="stylesheet" href="css/index.css">


<!-- Sign in modal -->
<div id="Signinmodal" class="modalSignin">
<div class="Signin-modal">
    <span id="closeSignin"> X </span>
        <h4>Sign in</h4>
        <input id="wallet_address" type="text" disabled>
        <br>
        <input id="passWord" type="password" placeholder="Password" required>
        <br>
        <button id='submitSignindetails' type="submit">Sign in</button>
        <p id='signinerror' style="color: red; text-align: center; display: none;">*You inputted a wrong Password!</p>
</div>
</div>

<!-- Signup modal -->
<div id="Signupmodal" class="modalSignup">
    <div class="Signup-modal">
        <span id="closeSignup"> X </span>
            <h4>Sign up</h4>
            <input type="text" id="fname" placeholder='First name' required>
            <br>
            <input type="text" id="lname" placeholder='Last name' required>
            <br>
            <input type="text" id="walletaddress"  disabled>
            <br>
            <input type="password" id="password" placeholder='Password'>
            <br>
            <button id="submitSignupdetails" type='submit'>Sign Up</button>
    </div>
</div>


<div class="row">
    <div class="col-lg-6">
        <div class="slogan">
            <h1 class="main-slogan">
                Have the advantage ahead of others in the <span class="cryptospace-style">Crypto space</span>.
            </h1>
            <p class="desc-slogan">
                Send. Swap. Monitor and Snipe your favorite tokens.
            </p>
            <a class="getcryptospy-style" href="#" id="cryptospy-button">Get CryptoSpy</a>
            <a class="seeoffers-style" href="#">See Offers...</a>
        </div>
    </div>
    <div class="col-lg-6">
        <img src="Images/blockchain_cryptocurrency_37_generated.jpg" alt="" class="banner-image">
    </div>
</div>


<?php

    } else {
        header('Location: mainfeed/index.php');
        exit();
    }

?>

<?php include 'footer.php' ?>

