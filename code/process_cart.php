<?php
//start session to retrieve data across pages
session_start();

include 'config.php';

//get the currentUser
$current_user=$_SESSION['user_name'];

//check what button submit was clicked
if(isset($_POST['btn_add_buy']))
{
    //buy button is selected
    echo "buy";
}
else if(isset($_POST['btn_delete']))
{
    //remove button clicked
    //obtaining the product id which will be used to remove the item from the cart
    $product_id_from_cart=$_POST['product_id'];
    if(strcmp($product_id_from_cart,"")!=0)
    {
        //product id present thus perform the removal of the product from the 
        $name_of_table_user="cart_$current_user";

        $sql_remove_item_cart="DELETE FROM `$name_of_table_user` WHERE `id`='$product_id_from_cart'";

        if(mysqli_query($connection,$sql_remove_item_cart))
        {
            //product removed successfully
            echo "<script>alert('Congratulations! product removed successfully');window.open('home.php','_self') </script>";

        }
        else
        {
           echo mysqli_error($connection);
            //echo "<script>alert('Failed try again!');window.open('home.php','_self') </script>";
        }

    }
    else
    {
        //product id missing hence return something went wrong
        echo "<script>alert('something went wrong!');window.open('home.php','_self') </script>";
    }


}


//end mysql connection
mysqli_close($connection);

?>