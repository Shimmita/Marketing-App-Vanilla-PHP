
<?php
session_start()
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SEARCH RESULTS</title>
        <link rel="stylesheet" href="styling/results.css">
    </head>
    <body>
      <header id="results_header">

        <nav >
            <h1 ><span id="span_h1_results">MARKET</span> &nbsp;CM</h1>
            <h6 id="subheading_results">ULTIMATE MARKETING PLATFORM</h6>
            <h2 id="search_results">My Shopping Cart<button id="btn_home">home</button> </h2>
        </nav>
      </header>

        <section id="container" >
           
    <?php
    //inclusion of the config file that contains database connectivity
    include "config.php";
    //for this page to be rendered the user must be logged in
    $current_userID=$_SESSION['user_id'];
    $current_name_user=$_SESSION['user_name'];

    if(strcmp($current_userID,"")!=0 && strcmp($current_name_user,"")!=0)
    {
        //user is logged in thus retrieve the data for the cart
        //the the name of the table
        $tableNameCart="cart_$current_name_user";
        //querry to fetch the data from the cart table of the user
        $sql_fetch_data_cart="SELECT * FROM $tableNameCart";

        //call the function fetData on the querry passed as parameter;
        fetchDataQuerry($connection,$sql_fetch_data_cart);
    }
    else
    {
        //redirect the page back to home
        header('location:home.php');
    }


    function fetchDataQuerry($connector,$sql_cart)
    {
        $sql_cart_results=mysqli_query($connector,$sql_cart) or die("error while retrieving the data");
        
        if(mysqli_num_rows($sql_cart_results)>0)
        {
        while($row_results=mysqli_fetch_assoc($sql_cart_results))
        {
            
        ?>

        <form action="process_cart.php" method="post" id="results_form" >
  
            <div>
              <img id="image_item"  src="product_images/<?php echo $row_results['product_image'] ?>" alt="image" >
              <input type="hidden" name="image" value="<?php echo $row_results['product_image'] //1.image ref ?>">

            </div>
            <div>
              <input id="item_name" type="text" disabled value=" <?php echo $row_results['product_name'] ?>" >
               <input type="hidden" name="name" value="<?php echo $row_results['product_name'] //2.product name ref ?>">
            </div>

            <div>
              <input type="text" disabled value=" Ksh.<?php echo number_format( $row_results['product_price'])?>" id="item_price">
              <input type="hidden" name="price" value="<?php echo ( $row_results['product_price']) //3.product price ref ?>">
            </div>

            <input type="hidden" name="category" value="<?php  echo $row_results['product_category'] //4.product categoory ref?>">
            <input type="hidden" name="product_id" value="<?php  echo $row_results['id']//probly shd be frm main tb tht ctains full data//may be required for fetching the products from the main table?>">
            <input type="hidden"  value="<?php echo $row_results['product_owner_ID'] //the owner id will be used to fetch owner details when needed?>" >

            <div>
            <input type="submit" value="Buy" id="btn_add" name="btn_add_buy"> <input type="submit" value="Remove" name="btn_delete" id="btn_delete">
            </div>

        </form>


    <?php
        }
        }
        else
        {
        //data is empty though successfully operation is
        alertEmptyResults("currently shopping cart is empty");
       

        }
        
    }


    function alertEmptyResults($message)
    {
        echo "<script> alert('$message'); window.open('home.php','_self'); </script>";
    }  
    ?>
        </section>

        <script src="javascript/results.js"></script>
    </body>
    </html>


