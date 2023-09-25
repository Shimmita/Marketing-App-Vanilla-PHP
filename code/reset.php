<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESET PASSWORD</title>
    <link rel="stylesheet" href="styling/reset.css">
</head>
<body>
    <header>
        <div id="container">
            <img src="icons/cart.png" alt="logo" id="cart"> 
        </div>
        <div id="container2">
        <h1 id="title">MARKET CM</h1>
        </div>
        <div id="container3">
            <h3 id="subheader">PASSWORD RESET</h3>
        </div>
        
    </header>

    <section id="main_container">

    <form action="process_reset.php" method="post">
        

     <div id="item_login">

        <div>
            <label >USER EMAIL:
            <input type="email" name="useremail" id="useremail" placeholder="abc@gmail.com" required>
            </label>
        </div>

        <div>
            <label>
                PASSWORD :   
                <input type="password" name="userpass1" id="userpass" placeholder="new password" required maxlength="20" minlength="6" >
            </label>
        </div>
        <div>
            <label>
             CONFIRM  :   
                <input type="password" name="userpass2" id="userpass" placeholder="confirm password" required maxlength="20" minlength="6" >
            </label>
        </div>

        <input type="submit" value="Reset Password" id="btn_reg">
        </div>
    </form>

    </section>

</body>
</html>