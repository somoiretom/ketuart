<?php 

session_start();

require_once("php/CreateDb.php");
require_once("php/component.php");

$database = new CreateDb(dbname:"somoireart", tablename:"productdb");


if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
        foreach($_SESSION['cart'] as $key =>$value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);

                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
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
    <title>cart</title>

    <link rel="stylesheet" href="/Shopping/style.css">

<!--fontawesomekit-->
   

<script src="https://kit.fontawesome.com/999964c6fd.js" crossorigin="anonymous"></script>

<!----getbootstrap.com, get started and copy the CDN-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
 


</head>

 <body class="bg-light"> 

<?php
require_once('php/header.php');

?>

<div class="container-fluid">
    <div class="row px-5">
       <div class="col-md-7">
           <div class="shopping-cart">
               <h6>My Cart</h6>
               <hr>



              

            
               
               <?php

/*
               $product_id = array_column($_SESSION['cart'], column_key:'product_id');


               $result = $database->getData();
               while($row = mysqli_fetch_row($result)){
                   foreach($product_id as $id){
                       if($row['id'] == $id){
                           cartElement($row['product_image'], $row['product_name'], $row['product_price'] );
                       }
                   }
                }
               

               */

               $total=0;
               if(isset($_SESSION['cart'])){
                    
               $productid = array_column($_SESSION['cart'], 'product_id');


                $result = $database->getData();
             while($row = mysqli_fetch_assoc($result)){
                    foreach($productid as $id){
                        if($row['id'] == $id){
                            cartElement($row['product_image'], $row['product_name'], $row['product_price'],$row['id']);
                            $total= $total + (int)$row['product_price'];
                        }
                    }
                }
                }else{
                    echo "<h5>Cart is Empty</h5>";
                }

                

                ?>
                

              
           </div>
       </div> 
       <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
           <div class="pt-4">
               <h6>PRICE DETAILS</h6>
               <hr>
               <div class="row price-details">
                   <div class="col-md-6">
                       <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                                
                            }
                            else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                       ?>

                       <h6>Delivery Charges</h6>
                       <hr>
                       <h6>Amount Payable</h6>
                   </div>
                   <div class="col-md-6">
                       <h6>Ksh <?php echo  $total ?></h6>
                       <h6 class="text-success">FREE</h6>
                       <hr>
                       <h6>Ksh <?php echo $total ?></h6>
                   </div>

                   <button type="submit" class="btn btn-warning">For Inquaries and order Contact: +254743545146</button>
               </div>
           </div>
       </div>
    </div>
</div>


<script src="./cart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>