<!DOCTYPE html>

<link rel="stylesheet" href="style.css"> 

<?php  include "function.inc.php"?>
<?php  include "db.php"?>

<?php session_start(); ?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    
  <title>home</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>
<body>
<style>
body {margin:0;

  background-color:black;
  background-repeat:  repeat-both;
  background-size: 100%;
  
}


/* Add a black background color to the top navigation */
.topnav {
  overflow: hidden;
  background-color: #f1f1f1;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}

.topnav-right {        
  float: right;
}


.head_wrapper{
  width:100px;
  height:150;
float:left;
}


.content_wrapper{
  background-color:grey;
  width: 100%px;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  height:auto;
  margin:auto; 
 font-size:20px;
align:center;
}
  

.main_wrapper {
  
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}



.products_area {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.products_area a {
  text-align:center

}
#shopping_cart{
  overflow: hidden;
  background-color:grey;
  float:right;
  padding: 20px 30px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="http://localhost/online_store/visible/">Home</a>
  <a href="http://localhost/online_store/about.php">about</a>
  <a href="http://localhost/online_store/products.php">products</a>

  <div class="topnav-right">
  <a href="http://localhost/online_store/contact.php">Contact</a>
  <a href="http://localhost/online_store/login.php">login</a>
  <a href="http://localhost/online_store/cart.php">cart<a>
  <a href="">my account<a>

</div>
</div>
<?php cart(); ?>



</div>
<br>




<div class="main_wrapper">

<div class="header_wrapper">
<div class=></div>
</div>
<!--content wrapper start-->

<div class="content_wrapper">


<form action="" method="POST" enctype="multipart/form-data">


Total £<?php echo  total_price()  ?><br>

<br>

<?php



$total=0;
    
global $conn;

$ip= getip();

$sel_price="select * from cart where ip_add='$ip'";

$run_price = mysqli_query($conn,$sel_price);

while($p_price=mysqli_fetch_array($run_price)){

$product_id=$p_price['p_id'];

$product_price="select * from products_details where products_id='$product_id' ";

$run_product_price= mysqli_query($conn,$product_price);

while($pp_price= mysqli_fetch_array($run_product_price)){

$products_price = array($pp_price['products_price']);

$products_name= $pp_price['products_name'];

$product_image = $pp_price['products_image'];

$single_price=$pp_price['products_price'];



$values = array_sum($products_price);

$total +=$values;    






?>


<tr style='width:35%; float:right; border:1px solid#dd;   margin-right:100px; padding:10px;'>


<tr colspan="8">

remove
<input type="checkbox" name="remove[]" value="<?php  echo $product_id; ?>" />
<br>
<?php echo $products_name; ?> 

<img src="product_images/<?php echo $product_image;?>" width="60" height="60"/> <br>

quantity:

<input type="text"  size="3" name="qty" value="<?php echo $_SESSION['qty']; ?>"/>

<?php


// if clicked updates quantity
if(isset($_POST['update_cart'])){

$qty= $_POST['qty'];

$update_qty= "update cart set quantity='$qty'";

$run_qty=mysqli_query($conn,$update_qty);

$_SESSION['qty']=$qty;


$total= $total * $qty;

}

?>

<br>
<?php echo "£" . $single_price; ?>
<br>
<br>



<?php }} ?>




<br>
<br>
<input type="submit"  name="update_cart" value="update cart">

<input type="submit" name="continue"  value="continue shopping">

<button><a href="checkout.php">checkout</a></button>
<br>
<br>
<br>

</ul>



</div>


</div>

<!--content wrapper end-->


</div>

<br>
<br>


</div>
</div>

</form>

<?php



$ip= getip();

//if button is clicked removes item


if(isset($_POST['update_cart'])){


foreach($_POST['remove'] as $remove_id){

$delete_product=" delete from cart where p_id='$remove_id' and ip_add='$ip' ";

$run_delete = mysqli_query($conn, $delete_product);

if($run_delete){

echo "<script> window.open('cart.php','_self')</script>";





}


}



}



if(isset($_POST['continue'])){


echo "<script> window.open('products.php','_self') </script>";


}


?>

<?php echo $ip=getIp()?>
<div class="products_area">

<a class="line">





</div>

</a>
<div class="footer">
  <p>copywrite ©  Creative Limited</p>
</div>

 
</body>

</html>