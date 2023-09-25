var imageLogo=document.getElementById('icon_logo');
//adding listener to the home image onclick
imageLogo.addEventListener("click",function(){

    //ask user of going back to home
    alert("the page will be refreshed to home");
    //open in the same window the home
    window.location.href='home.php';
})