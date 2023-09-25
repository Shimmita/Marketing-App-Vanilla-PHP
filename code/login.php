<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="styling/login.css">
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
            <h3 id="subheader">USER LOGIN</h3>
        </div>
        
    </header>

    <section id="main_container">

    <form action="process_login.php" method="post">
        

     <div id="item_login">

        <div>
            <label >USER EMAIL:
            <input type="email" name="useremail" id="useremail" placeholder="abc@gmail.com" required>
            </label>
        </div>

        <div>

            <label>
                PASSWORD :   
                <input type="password" name="userpass" id="userpass" placeholder="password" required maxlength="20" minlength="6" >
            </label>

        </div>
        <input type="submit" value="Login Now" id="btn_login">
        <h5 id="reset_stat">forgot password? <input type="button" value="reset password" id="btn_reset"></h5> 
        </div>

    </form>

    </section>

    <script  src="javascript/login.js"></script>
</body>
</html>