<?php
    use App\Cart;
    use App\Category;
    use App\Product;

?>

//this page for generating QR image for each products in DB, and save them in a folder called qrcodes. 
   <html>

    <body>

         <?php


            echo "Generating QR code images png and save them in public folder";
            $products=Product::all();

            $path='qrcodes/';
            $file_name='';


            foreach($products as $product)
            {

                $file_name=$product->title.".png";
                $file_name=$path.$file_name;

                QrCode::format('png')->size(100)->generate($product->title,$file_name);
                echo "<p><img src='" . $file_name. "'><h4>".$product->title."</h4></p>";


            }




        ?>



    </body>
</html>
