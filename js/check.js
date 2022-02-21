//initialized global variable..
let tracker = false
const ConnectWalletBtn = document.getElementById('metamaskbutton')
const getcryptospy = document.getElementById('cryptospy-button')

if (typeof window.ethereum !== 'undefined') {
    console.log('MetaMask is installed!')

    //check logged in status.
    ConnectWalletBtn.addEventListener('click', toggleConnectWallet)

} else {
    console.log('MetaMask is not installed')

    //redirect to metamask website.
    ConnectWalletBtn.addEventListener('click', function(){
        location.href='https://metamask.io'
    })
    getcryptospy.addEventListener('click', function(){
        location.href='https://metamask.io'
    })

}


//functions..
function toggleConnectWallet(){
    if(tracker == false){
        //get wallet address
        getAccountForSignin()
    }
}

async function getAccountForSignin() {
    const accounts = await ethereum.request({ method: 'eth_requestAccounts' })
    //catch error.
    .catch((e) => {
        console.error(e.message)
        return
    })
    if(!accounts) { return }

    let walletAddress = {"walletAdd": accounts[0]}

    //pass to php to verify wallet address.
    $.ajax({
        url: "../CryptoSpy/server/verify_user.php",
        method: 'post',
        data: walletAddress,
        success: function(result) {
            if(result == "false"){
                Signup(accounts[0])
            } else {
                Signin(result)
            }
        }
    })
  }


  function Signin(result){
      let signin = document.getElementById('Signinmodal')
      let closeSignin = document.getElementById('closeSignin')
      let submitSignindetails = document.getElementById('submitSignindetails')
      let currWalletAddress = document.getElementById('wallet_address')
      let pass = document.getElementById('passWord')
      let signinError = document.getElementById('signinerror')

      closeSignin.addEventListener('click', function(){
          signin.style.cssText='visibility: hidden; opacity: 0; transition: 0.3s;'
      })
      signin.style.cssText="visibility: visible; opacity: 1; transition: 0.3s;"

      currWalletAddress.setAttribute('value', result)

      //when click signin button.
      submitSignindetails.addEventListener('click', function(){
          //pass to sigin..
          let data = {}
          data.WAddress = currWalletAddress.value
          data.password = pass.value

          console.log(data)
          $.ajax({
              url: "../CryptoSpy/server/signin.php",
              method: 'post',
              data: data,
              success: function(result){
                  if(result == 'true'){
                     location.href='../CryptoSpy/mainfeed/index.php'
                  } else {
                     signinError.style.cssText='display: block; color: red; text-align: center;'
                  }
              }
          })
      })
    }

    function Signup(result){
        // console.log("This is Signup: " + result)
        let signup = document.getElementById('Signupmodal')
        let closeSignup = document.getElementById('closeSignup')
        let submitSignupdetails = document.getElementById('submitSignupdetails')
        let currWalletAddress = document.getElementById('walletaddress')
        let pass = document.getElementById('password')
        let fname = document.getElementById('fname')
        let lname = document.getElementById('lname')

        closeSignup.addEventListener('click', function(){
            signup.style.cssText='visibility: hidden; opacity: 0; transition: 0.3s;'
        })
            signup.style.cssText='visibility: visible; opacity: 1; transition: 0.3s;'

        currWalletAddress.setAttribute('value', result)

        //when click signup button
        submitSignupdetails.addEventListener('click', function(){
            //pass to signup
            let data = {}
            data.fname = fname.value
            data.lname = lname.value
            data.WAddress = currWalletAddress.value
            data.password = pass.value

            console.log(data)
            $.ajax({
                url: '../CryptoSpy/server/signup.php',
                method: 'post',
                data: data,
                success: function(result){
                    if(result == 'true'){
                        location.href='../CryptoSpy/mainfeed/index.php'
                    } else {
                        console.error("Error: Unable to login!")
                    }
                }
            })

        })
    }