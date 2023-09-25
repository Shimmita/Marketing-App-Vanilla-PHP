    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>POST PRODUCT</title>
    </head>
    <body>
    <form action="process_post.php" method="post" target="_blank"  enctype="multipart/form-data">
        <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg, image/png, image/gif"> <br> <br>
        <input type="text" placeholder="product name" min=3 name="product_name"> <br> <br>
        <input type="number" name="product_price" id="price" placeholder="5"><br> <br>
        <input type="text" name="product_owner" placeholder="owner name"><br> <br>
        <label for="list">product catgeory:</label><br>
        <select name="product_category" id="list">
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
        </select> <br> <br>
        <input type="submit" value="send">
    </form> 

    <br> <br>

    <form action="home.php" method="post" target="_blank">
        <button type="submit">home</button>
    </form>

    </body>
    </html>