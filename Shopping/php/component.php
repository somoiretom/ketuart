<?php

function component($product_name, $product_price, $product_image, $product_id){
    
    $element ="


    <div class=\"col-md-3 col-sm-6 my-3 my-md-3\" >

                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow \" >
                    <div class=\"image\">
                        <img src=\"$product_image \" alt=\"image1\" class=\"img-fluid card-img-top\" >
                    
                    </div>
                    <div class=\"card-body\">
                         <h5 class =\"card-title\">$product_name</h5> 


                        <p class=\"card-text\"></p>
                        <h5><span class=\"price\">Ksh $product_price</span></h5>

                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                        <input type='hidden' name='product_id' value='$product_id'>
                    </div>
                    </div>
                </form>

                
          </div>
          
";

echo $element;
}






// <button type=\"submit\" class=\"btn btn-warning\"></button>


function cartElement($product_image, $product_name, $product_price,$product_id)
{
    $element="
    
    
    <form action=\"cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3\">
                <img src=$product_image alt=\"image1\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-6\">
                <h5 class=\"pt-2\">$product_name</h5>
                <small class=\"text-secondary\">Seller:Somoire Tom</small>
                <h5 class=\"pt-2\">Ksh $product_price</h5>
               
                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
            </div>
  

            
        </div>
    </div>
</form>
    
    ";
    echo $element;
}












