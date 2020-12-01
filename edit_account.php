
<?php session_start() ; ?>

<?php  include "function.inc.php"?>
<?php  include "db.php"?>

<!DOCTYPE html>
<html>
<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 
 <link rel="stylesheet" href="style.css"> 







 <title>update</title>

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
 <a href="">cart<a>
 <a href="">my account<a>

 
</div>

<div id="shopping_cart">
 <br>  
<?php 

if(!isset($_SESSION['customer_email'])){ //show is session has been started. if not shows login link

echo"<a href='login.php'>login</a>";

}

else{

echo "<a href='logout.php'>logout</a>";



}

?>


<style>


body{

margin: 0;

padding: 0;

font-family: sans-serif ;



background-size: cover;

}


.registration-box{
    

width: 280px ;

position: absolute ;

top: 60%;

left:50%;

transform: translate(-50%, -50%);

color:white;



}


.text-box{


   width:100%;

   font-size:20%;

   padding:5px 0;

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

<?php

//show username
$user = $_SESSION['customer_email'];

$get_customer= "select * from customer where customer_email='$user'";

$run_customer= mysqli_query($conn,$get_customer);

$row_customer= mysqli_fetch_array($run_customer);

$id= $row_customer['customer_id'];
$name= $row_customer['customer_name'];
$email= $row_customer['customer_email'];
$password= $row_customer['customer_password'];
$address= $row_customer['customer_address'];




?>

<div class="registration-box">

<form action="edit_account.php?id=<?php echo $id;?> " action="" method="POST">



<h1 style="color:white;"> update account</h1>

<div class="textbox">

<input type="text" name="customer_name" placeholder="Username"   value="<?php echo $name;?>" required/>
</div>
<br>

<div class="textbox"> 
<input type="text" name="customer_email" placeholder="email"   value="<?php echo $email;?>" required />

</div>
<br>

<div class="textbox"> 
<input type="text" name="customer_address" placeholder="addess"  value="<?php echo $address;?>"  required />

</div>
<br>



<div class="textbox"> 
<input type="password" name="customer_password" placeholder="Password"  value="<?php echo $password;?>" required />

</div>
<br>


<div class="textbox"> 
<input type="submit" name="submit" value="update" />





</div>







<?php


  



   if (isset($_REQUEST['customer_email'])){  // if data is submited entered system will input into database.

     $ip= getIp();

     $customer_id = $id;
       $name = stripslashes($_REQUEST['customer_name']); // removes backslashes
       $name = mysqli_real_escape_string($conn,$name); //escapes special characters in a string
       $email = stripslashes($_REQUEST['customer_email']);
       $email = mysqli_real_escape_string($conn,$email);
       $password = stripslashes($_REQUEST['customer_password']);
   $password = mysqli_real_escape_string($conn,$password);
   $address = stripslashes($_REQUEST['customer_address']);
       $address = mysqli_real_escape_string($conn,$address);




   $trn_date = date("Y-m-d H:i:s");
   
       $update = " UPDATE customer set customer_name='$name', customer_password='$password', customer_email='$email',  customer_address='$address' WHERE customer_id='$customer_id' ";
       
       $run_update = mysqli_query($conn,$update);

if($run_update ){


echo "<script> alert('you have updated')  </script>";
echo "<script> window.open('my_account.php','_self')  </script>";


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









