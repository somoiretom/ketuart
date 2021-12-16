<?php

//start Session

session_start();

require_once("php/CreateDb.php");
require_once("./php/component.php");



//create instance of CreateDb class

$database = new CreateDb(dbname:"somoireart", tablename:"Productdb");

if(isset($_POST['add'])){
   //print_r($_POST['product_id']);

    if(isset($_SESSION['cart'])){

        $item_array_id=array_column($_SESSION['cart'],column_key:"product_id");
 
        

        if(in_array($_POST['product_id'], $item_array_id)){


            echo "<script>alert('Product is already added in the cart...!')</script>";
            echo "<script>window.location='index.php</script>";

        }else{

            $count=count($_SESSION['cart']);
            $item_array=array(
                'product_id'=>$_POST['product_id']
            );


            $_SESSION['cart'][$count] = $item_array;
            //print_r($_SESSION['cart']);

            
        }
       // print_r($_SESSION['cart']);
        


    }

    else{

        $item_array=array(
            'product_id'=>$_POST['product_id']
        );
    
        //Create new session variable
        $_SESSION['cart'][0]= $item_array;
        print_r($_SESSION['cart']);
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwetushop</title>

    <link rel="stylesheet" href="style.css">
    
   

     <!--fontawesomekit-->
        
    
     <script src="https://kit.fontawesome.com/999964c6fd.js" crossorigin="anonymous"></script>

    <!----getbootstrap.com, get started and copy the CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
      
</head>
<body>





<?php require_once("php/header.php"); ?>
  <div class="container">
      <div class="row text-center py-5" >
       <?php 
       
       $result= $database->getData();
       while($row = mysqli_fetch_assoc($result)){
           component($row['product_name'],$row['product_price'],$row['product_image'], $row['id']);
       }
       ?>

      </div>
  </div>  
  <div class="footer">
  <p>&copy; All rights reserved KwetuArt &trade; 2021 By : <a href="https://somoiretom.github.io/portfolio/ ">Somoire Tom</a>  | CEO KwetuArt</p>
	</div>

<!----copy JS-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>