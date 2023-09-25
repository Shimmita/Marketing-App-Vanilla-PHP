<?php
session_start();
include 'config.php';

//before adding the product to cart first check if user is logged in or not
//only logged in users can add products to cart
if(isset($_SESSION['user_id']))
{
    $product_id=$_POST['product_id'];
    $current_user=strtolower($_SESSION['user_name']); //name obtained to create product cart owner
    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    $image=$_POST['image'];
    $owner_ID=$_SESSION['user_id']; //will be used in retrieving owner details when required i.e contacting the owner for transaction
    
    //name of the table
    $name_of_table="cart_$current_user";
    

    //ensure the product id is not null by strcmp fun
    if(strcmp($product_id,"")!=0)
    {
        

        //call fun add the product to the cart db
        facilitateAddToCatNow($connection,$name,$price,$category,$owner_ID,$image,$name_of_table);

    }
    else
    {
        //product id is misssing thus cannot add the product ->might have been deleted
        echo "<script>alert('something went wrong,product is probably unavailable!');window:open('home.php','_self')</script>";

    }

}
else
{
    //session user id is empty thus user not logged in
    echo "<script>alert('please login to facilitate this operation!');window:open('home.php','_self')</script>";

}


function facilitateAddToCatNow($conn,$p_name,$p_price,$p_category,$p_owner_id,$p_image,$unique_name_tb)
{

    //sql to create new table for the cart since each user is entitled to his/her own products cart
    //in the cart table we insert the product id from which we can referece the id from the main products and retrieve its 
    //details

    //contents of the cart->id,name,price,owner,phone

    //create table sql
    $sql_create_table="CREATE TABLE IF NOT EXISTS $unique_name_tb (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `product_name` varchar(50) not null,
     `product_price` int(10) not null,
     `product_category` varchar(50) not null,
      `product_image` varchar(50) not null,
      `product_owner_ID` varchar(100) not null
      )";

     //main sql
     $sql_main_add_product="INSERT INTO $unique_name_tb VALUES ('', '$p_name', '$p_price', '$p_category', '$p_image', '$p_owner_id')";

     //
     if(mysqli_query($conn,$sql_create_table))
     {
   //table created successfully thus lets insert into it the values
   if(mysqli_query($conn,$sql_main_add_product))
   {
        echo mysqli_error($conn);

       //added the product to the cart succcesfully 
       echo "<script> alert('Congratulations! product added succcessfully'); window.open('home.php','_self'); </script>";

   }
   else
   {
        mysqli_error($conn)."<br> @table insert data failure";

       //failed to insert the product details inside the cart
      // echo "<script> alert('failed to add the product!'); window.open('home.php','_self'); </script>";
   }     }
     else
     {
        //failed to create table
        //echo "<script> alert('failed to add the product!'); window.open('home.php','_self'); </script>";
        echo mysqli_error($conn)."<br> @table create failure";

     }

     //close the mysql connection
     mysqli_close($conn);

}