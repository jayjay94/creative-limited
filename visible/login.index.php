
<?php session_start() ; ?>

<?php  include "function.inc.index.php"?>
<?php  include "db.php"?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>login</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<style>


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

.topnav a.active {
  border-bottom: 3px solid red;
}

.topnav-right {        
  float: right;
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

echo"<a href='login.index.php' style='color:black;'>login</a>";

}

else{

echo "<a href='logout.php' style='color:black;'>logout</a>";



}

?>


<style>


body{

margin: 0;

padding: 0;

font-family: sans-serif ;

background:url("ball.jpg") no-repeat ;

background-size: cover;

}


.registration-box{
     

 width: 280px ;

position: absolute ;

top: 50%;

left:50%;

transform: translate(-50%, -50%);

color:white;



}


.text-box{


    width:200%;

    font-size:20%;

    padding:8px 0;

    margin:8px 0;


}

input[type=text], select { 
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

h1 {


color

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


<div class="registration-box">

<form name="login " action="" method="POST">


 
<h1 style="color:black;"><strong> login</strong></h1>

<div class="textbox">

<input type="text" name="email" placeholder="email" required />
</div>
<br>
 



<div class="textbox"> 
<input type="password" name="Password" placeholder="Password" required />

</div>
<br>


<div class="textbox"> 
<input type="submit" name="submit" value="Login" />


<br><a href="http://localhost/online_store/registration.php" style="color:black"> click this link to register</a>


</div>
<?php


   
if (isset($_REQUEST['email'])){  // if data is entered system will input into database.
$email= stripslashes($_REQUEST['email']); // removes backslashes
$email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
$password = stripslashes($_REQUEST['Password']);
$password = mysqli_real_escape_string($conn,$password);


$sel_customer="select * from customer where customer_password='$password' and customer_email='$email'";



$run_c= mysqli_query($conn,$sel_customer);


$check_customer= mysqli_num_rows($run_c);

if($check_customer==0){

echo" <script> alert('password or email is incorrect')</script>";

exit();

}

$ip= getIp();

$sel_cart= "select * from cart where ip_add='$ip'";


$run_cart= mysqli_query($conn,$sel_cart);

$check_cart= mysqli_num_rows($run_cart);

if($check_customer>0 AND  $check_cart==0) {


  $_SESSION['customer_email']=$email;
  echo " <script> alert('you are now logged in.') </script> ";
  echo "<script>  window.open('my_account.php','_self') </script>";  


}

else {

$_SESSION['customer_email']=$email;
echo " <script> alert('You are now logged in.') </script> ";
echo "<script>  window.open('checkout.php','_self') </script>";



}
  }
?>

</form>

</div>
<?php ?>
<div class="footer">
  <p>copywrite ©  Creative Limited</p>
</div>

</body>
</html>









