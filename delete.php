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
<br>




<div class="main_wrapper">

<div class="header_wrapper">
<div class=></div>
</div>
<!--content wrapper start-->

<div class="content_wrapper">


<form action="" method="POST" enctype="multipart/form-data">

<input type="submit" name="delete" value="delete account">

<?php

$_user=$_SESSION['customer_email'];

if(isset($_POST['delete'])){


    $delete="delete FROM customer WHERE customer_email='$_user'";


    $run_delete=mysqli_query($conn,$delete);


    

    session_destroy();

  echo "<script>alert('account deleted')</script>";
  echo "<script> window.open('products.php')</script>";

}   
?>

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





</div>

</a>
<div class="footer">
  <p>copywrite ©  Creative Limited</p>
</div>

 
</body>

</html>