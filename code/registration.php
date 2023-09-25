<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    <link rel="stylesheet" href="styling/registration.css">
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
            <h3 id="subheader">REGISTRATION</h3>
        </div>
        
    </header>

    <section id="main_container">

    <form action="process_reg.php" method="post">
        

     <div id="item_register">
        <div>
            <label>FIRSTNAME:
            <input type="text" name="firstname" id="firstname" placeholder="Michael" required maxlength="20">
            </label>
        </div>

        <div>
            <label>LASTNAME:
            <input type="text" name="lastname" id="lastname" placeholder="Kendie" required maxlength="20">
            </label>
        </div>

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

        <div>
            <label>
                USER PHONE :   
                <input type="tel" name="userphone" id="userphone" placeholder="phone number" required maxlength="10">
            </label>
        </div>

        <div>
            <label>
             USER COUNTY:
            <input type="text" name="usercounty" id="usercounty" placeholder="i.e Nairobi,Mombasa,Busia" required maxlength="20" >
            </label>
        </div>
        <input type="submit" value="Register Now" id="btn_reg">
        </div>
    </form>


    </section>

</body>
</html>