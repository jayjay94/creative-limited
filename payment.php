<?php session_start() ; ?>

<?php  include "function.inc.php"?>
<?php  include "db.php"?>

<?php $paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr"; 
$paypalID = "jardainw@yahoo.com";

?>
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

$product_name=$pp_price['products_name'];

$values = array_sum($products_price);

$total +=$values;



}
}

?>
<!DOCTYPE html>

<link rel="stylesheet" href="style.css"> 




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

<div id="shopping_cart">
 <b>total items:<?php total_items(); ?> total price: <?php total_price() ?></b>
 <br>  
<span><b style="color:black; float:right;"><a href="http://localhost/online_store/cart.php"style="color:black;">shopping cart</a></b></span> 
<?php 

if(!isset($_SESSION['customer_email'])){

echo"<a href='login.php'>login</a>";

}

else{

echo "<a href='logout.php'>logout</a>";



}

?>



</div>
<br>



<div class="main_wrapper">

<div class="header_wrapper">
<div class=></div>
</div>
<!--content wrapper start-->

<div class="content_wrapper">
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">

                  <!-- Identify your business so that you can collect the payments. -->
                  <input type="hidden" name="business" value="<?php echo $paypalID; ?>">

                  <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
                  <input type="hidden" name="cmd" value="_xclick">
                  <!-- <input type="hidden" name="add" value="1"> -->

                  <!-- Specify details about the item that buyers will purchase. -->
                  <input type="hidden" name="item_name" value="<?php echo $product_name;?>">
               
                  <input type="hidden" name="amount" value="<?php echo $total;?>">
                  <input type="hidden" name="currency_code" value="GBP">


                  <input type="hidden" name="return" value="http://localhost/online_store/visible/">

                  <!-- Display the payment button. -->
                  <input type="image" name="submit"
                    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                    alt="Paypal - The safer, easier way to pay online.">
                  <img alt="" width="1" height="1"
                    src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">

                    <!-- Specify the URLs -->
                    <input type='hidden' name='cancel_return' value='http://localhost/kamal-dev/cl/cancel.php'>
        <input type='hidden' name='return' value='http://localhost/online_store/success.php'>
            </form>
