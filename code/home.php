                        
                        <?php
                        //start the user session where we will be fetching the details of the current user if logged in or not
                        session_start();

                        //include a file to search all the data from mysql for the cart total number
                        include 'config.php';

                        $varProfile='display: none'; //default invisible till login
                        $varLogReg='display: block'; //default visible until log in

                        $varcartTotals=0;

                        if(isset($_SESSION['user_id']))
                        {
                           if(strcmp($_SESSION['user_id'],"")!=0)
                           {
                             $varProfile='display: block';
                            $varLogReg='display: none';

                            //user is signed in thus lets retrieve all the info from the cart about the data stored
                            $nameUser_Current=$_SESSION['user_name'];
                            if(strcmp($nameUser_Current,"")!=0)
                            {
                                $name_of_table="cart_$nameUser_Current";

                                $sql_fetch_Cart_Contents="SELECT * FROM $name_of_table";

                                $result_fetch_cart=mysqli_query($connection,$sql_fetch_Cart_Contents) or die("something went wrong");
                                $number_rows=mysqli_num_rows($result_fetch_cart);

                                //update the value of cart
                                $varcartTotals=$number_rows;
                        

                            }

                           }
                        }

                        ?>
                           

              <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>PRODUCTS  HOME</title>
                    <link rel="stylesheet" href="styling/home.css">
                </head>
                <body>


                <header id="main_header_container" >

                    <nav id="nav_header">
                        <div id="icon_logo" >
                        <img src="icons/cart.png" alt="icon logo" id="icon_logo"  >
                        </div>
                        <h1 id="heading"><span id="span_h1">MARKET</span>&nbsp;CM</h1>
                        <h6 id="subheading">ULTIMATE MARKETING PLATFORM</h6>
                    
                        <nav id="nav_menu" >
                            
                            <a href="profile.php" id="home" style="<?php echo $varProfile?>">MY PROFILE</a>
                            <a href="logout.php" id="home"  style="<?php echo $varProfile?>">LOGOUT</a>
                            <a href="retrieve_cart.php" id="cartref" style="<?php echo $varProfile?>"><?php echo $varcartTotals?> &nbsp;&nbsp;<img src="icons/trolley.png" alt="cart" style="width: 22px"></a>
                            <a href="login.php" id="login" style="<?php echo $varLogReg?>">LOGIN</a>
                            <a href="registration.php" id="register" style="<?php echo $varLogReg?>">REGISTER</a>
    
                        </nav>
                    </nav>


                   

                    <form action="search_result.php" method="post" id="container_search">
                        <input type="search"  name="search" id="search_box" placeholder="search product by name">
                        <select name="category" style="border: none;padding:.9rem">
                        <option value="">search product by category</option> 
                        <option value="laptops">laptops</option>
                        <option value="phones">phones</option>
                        <option value="tvs">tvs</option>
                        <option value="woofer">woofer</option>
                        <option value="ssds">ssds </option>
                        <option value="earphones">earphones</option>
                        <option value="flash">flash</option>
                        <option value="sd cards">sd cards</option>
                        <option value="powerbanks">powerbanks</option>
                        <option value="laptop rams">laptop rams</option>
                        <option value="shoes">shoes</option>
                        <option value="clothes">clothes</option>
                        </select>

                        <input type="submit" value="search" id="submit">
                    </form>
        </header>


                    
                
                <section>

                <div id="main_container">
                
                <?php 
                    include "config.php";

                    $sql="SELECT * FROM itemtb";
                    
                    $fetch_result=mysqli_query($connection,$sql);

                    if(mysqli_num_rows($fetch_result)>0)
                    {
                        $parent=__DIR__;
                        while($data=mysqli_fetch_assoc($fetch_result))
                        {
                            ?>
                            
                        
                            <form action="add_to_cart.php" method="post" id="main_form">
                            <div id="img_container">
                                <img src="product_images/<?php echo $data['product image'] ?>" id="image"  >
                                <input type="hidden" name="image" value="<?php echo $data['product image'] //1.image ref ?>">
                            </div>
                            <div >
                            <input type="text" disabled  value="<?php echo $data['product name']?>" id="name">
                            <input type="hidden" name="name" value="<?php echo $data['product name'] //2.product name ref ?>">
                            </div>
                            <div >
                            <input type="text" disabled value="<?php echo $data['product owner'] //?>" id="owner">
                            </div>
                            <div >
                            <input type="text" disabled value="Ksh.<?php echo number_format($data['product price']) ?>" id="price">
                            <input type="hidden" name="price" value="<?php echo ( $data['product price']) //3.product price ref ?>">
                            </div>
                            <input type="hidden" name="category" value="<?php  echo $data['category'] //4.product categoory ref?>">
                            <input type="hidden" name="product_id" value="<?php  echo $data['product id'] //must for product to be added since prouct might have been deleted?>">


                            <div >
                                <input type="submit" value="add to cart" id="cart">
                            </div>
                        
                            </form>

                            
                        <?php
                        };
                    };
                    ?>

        </div>

            </section>

            <footer>
            

            </footer>


            <script src="javascript/home.js"></script>
                </body>
                </html>
