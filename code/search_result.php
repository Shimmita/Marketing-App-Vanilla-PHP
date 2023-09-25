
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
            <h2 id="search_results">Search Results  <button id="btn_home">home</button> </h2>
        </nav>
      </header>

        <section id="container" >
           
    <?php
    //inclusion of the config file that contains database connectivity
    include "config.php";

    //obtaining the values of search
    $search_text=trim($_POST['search']);
    $search_category=trim($_POST['category']);



    if(strcmp($search_text,"")==0)
    {
        if(strcmp($search_category,"")!=0)
        {
        //echo "lets go category present";
        $sql_querry="SELECT * FROM  itemtb WHERE `category`='$search_category' ";
        //call the function fetData on the querry passed as parameter;
        fetchDataQuerry($connection,$sql_querry);
        }
        else
        {
        //return home both are empty
        header("location:home.php");
        exit;
        }

    }
    else if(strcmp($search_text,"")!=0)
    {
        if(strcmp($search_category,"")!=0)
        {
          alertEmptyResults("you can only search a product by its name or category!");
        
        }

        else
        {
          
          //only search text is present
          //writing the query that will be used for searching
           $querry_search="SELECT * FROM itemtb WHERE `product name` LIKE '%$search_text%'";
            //search the results
            fetchDataQuerry($connection,$querry_search);
        }
    }


    function fetchDataQuerry($connector,$sql_search)
    {
        $sql_query_results=mysqli_query($connector,$sql_search) or die("error while retrieving the data");
        
        if(mysqli_num_rows($sql_query_results)>0)
        {
        while($row_results=mysqli_fetch_assoc($sql_query_results))
        {
        
          
        ?>

        <form action="add_to_cart.php" method="post" id="results_form" >
  
            <div id="img_container">
              <img id="image_item"  src="product_images/<?php echo $row_results['product image'] ?>" alt="<?php echo $row_results['product name']?> image" >
              <input type="hidden" name="image" value="<?php echo $row_results['product image'] //1.image ref ?>">

            </div>
            <div>
              <input id="item_name" type="text" disabled value=" <?php echo $row_results['product name'] ?>" >
               <input type="hidden" name="name" value="<?php echo $row_results['product name'] //2.product name ref ?>">
            </div>

            <div>
              <input type="text" disabled value="<?php echo $row_results['product owner'] //?>" id="item_owner">
            </div>

            <div>
              <input type="text" disabled value=" Ksh.<?php echo number_format( $row_results['product price'])?>" id="item_price">
              <input type="hidden" name="price" value="<?php echo ( $row_results['product price']) //3.product price ref ?>">
            </div>

            <input type="hidden" name="category" value="<?php  echo $row_results['category'] //4.product categoory ref?>">
            <input type="hidden" name="product_id" value="<?php  echo $row_results['product id'] //must for product to be added since prouct might have been deleted?>">


            <input type="submit" value="add to cart" id="btn_add">  

        </form>


    <?php
        }
        }
        else
        {
        //data is empty though successfully operation is
        alertEmptyResults("products not yet posted");
       

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


