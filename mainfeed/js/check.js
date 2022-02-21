//initialized global variable..
const ConnectWalletBtn = document.getElementById('metamaskbutton')

if (typeof window.ethereum !== 'undefined') {
    console.log('MetaMask is installed!')

    //check logged out status.
    ConnectWalletBtn.addEventListener('click', toggleConnectWallet)

} else {
    console.log('MetaMask is not installed')
}

function toggleConnectWallet(){
    //signout.
    ConnectWalletBtn.innerText='Connect Wallet'
    location.href='../../CryptoSpy/server/signout.php'
}