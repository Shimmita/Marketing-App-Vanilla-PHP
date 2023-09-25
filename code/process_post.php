        <?php

    //include the configphp that contains connection to the database
    include "config.php";


        echo "<pre>";

        var_dump($_FILES);

        echo "</pre>";

        //begin extracting data from the file
        if(isset($_FILES['image'])&& isset($_POST))
        {
            //entitiess of the image file

        $image_file= basename( $_FILES['image']['name']);
        $image_name=$_FILES['image']['tmp_name'];
        $image_size=$_FILES['image']['size'];
        $image_type=$_FILES['image']['type'];

        $image_kb=ceil($image_size/1024);

        echo "$image_file"."<br>";
        echo "$image_name"."<br>";
        echo "$image_size"."<br>";
        echo "$image_type"."<br>";


        //entities of the post data contains product values
        $productName=$_POST['product_name'];
        $productPrice=$_POST['product_price'];
        $productOwner=$_POST['product_owner'];
        $productCategory=$_POST['product_category'];

        //echo the values being returned

        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";






        //begin the process of uploading the file
        $tbName="itemtb";
        $sql="INSERT INTO $tbName VALUES ('', '$productName', '$productPrice', '$productOwner', '$image_file', '$productCategory')";

        //running the querry
        if(mysqli_query($connection,$sql))
        {
            if(move_uploaded_file($_FILES["image"]["tmp_name"],"product_images\\".$_FILES["image"]["name"]))
            {
                echo "successfully uploaded image"."<br>";
                echo "image size= $image_kb KB";

            }

            mysqli_close($connection);
        }
        else
        {
            die("error".mysqli_error($connection));
            mysqli_close($connection);

        }


        }
        else
        {
            echo "empty file or data submitted";
        }
    

        ?>