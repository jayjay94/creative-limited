<!DOCTYPE html>

<link rel="stylesheet" href="style.css"> 

<?php session_start() ; ?>

<?php  include "function.inc.php"?>
<?php  include "db.php"?>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    

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
  padding: 12px 10px;
  display: inline-block;
  border: 50px solid ;
  border-radius: 4px;
  box-sizing: border-box;
  height:auto;
  margin:20; 
 font-size:20px;
align:center;
}
  

.main_wrapper {
  float: left;
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



</div>

<div class="main_wrapper">

<div class="header_wrapper">
<div class=></div>
</div>
<br>

<!--content wrapper start-->


<div class="content_wrapper">

<div  id="sidebar">
<div id="sidebar_tittle">

<ul id="cats">
<?php

//show username
$user = $_SESSION['customer_email'];

$get_name= "select * from customer where customer_email='$user'";

$run_name= mysqli_query($conn,$get_name);

$row_name= mysqli_fetch_array($run_name);

$customer= $row_name['customer_name'];

echo 'logged in as &nbsp'.$customer;


?>

<li><a href="my_account.php?my_orders>my_orders" style="color:black;">my orders</a></li>
<li><a href="my_account.php?edit_account" style="color:black;">edit account</a></li>
<li><a href="my_account.php?delete" style="color:black;">delete account</a></li>



</ul>

<br>

<?php

if (!isset($_GET['my_orders'])){
  if (!isset($_GET['edit_account'])){
      if (!isset($_GET['delete'])){



echo "you can see your orders proggress by clicking <a href='my_account.php?my_orders'> link </a>" ;


}
}
}

?>

<div id="shopping_cart" >
 <b></b> <!-- shows art-->
 <br>  
<?php 

if(!isset($_SESSION['customer_email'])){ //show is session has been started. if not shows login link

echo"<a href='login.php'>login</a>";

}

else{

echo "<a href='logout.php' style='color:white;'>logout</a>";



}

?>
<?php

if(isset($_GET['edit_account'])){

  echo "<script> window.open('edit_account.php','_self') </script>";

}

if(isset($_GET['delete'])){

  echo "<script> window.open('delete.php','_self') </script>";

}








?>

<br>
<br>


</div>
</div>

</form>


<a class="line">





</div>

</a>
<div class="footer">
  <p>copywrite ©  Creative Limited</p>
</div>

 
</body>

</html>