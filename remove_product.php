
 <?php require ('db.php');?>


<!DOCTYPE html>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    
  <title>home</title> <!--WORK ON TOMMOROW!!!-->

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>
<body>
<style>

body {margin:0;

  background-color: grey ;
  background-repeat: no-repeat;
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
.topnav a.active {
  border-bottom: 3px solid red;
}
.topnav-right {        
  float: right;
}

.main_wrapper{
  width:100px;
  height:auto;
  margin:auto;   
  float: left;
  
}

.head_wrapper{
  width:100px;
  height:150;

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
!--inserst products table-->



<?php

$get_products= "select * from products_details";



$run_products=mysqli_query($conn,$get_products);
$i=0; //repeats plus one

while($row_products=mysqli_fetch_array($run_products)){

$pro_tittle= $row_products['products_name'];
$pro_price= $row_products['products_price'];
$pro_description= $row_products['products_description'];
$pro_keywords= $row_products['products_keywords'];
$pro_images= $row_products['products_image'];
$pro_cat= $row_products['products_brand'];
$pro_brand= $row_products['products_category'];

$i++; //repeats plus one



?>

<br>
<br>

<table align="center" width="600" border="10" style="background-color:#F8F8FF;">

<td colspan="8"><h2> delete product </h2></td>

<tr colspan="8">

<tr>
<td>product name</td>
<td> <?php echo $pro_tittle;?></td>
</tr>

<tr>
<td>product price</td>
<td colspan="8"> <?php echo $pro_price;?></td>  
</tr>


<tr>
<td>product description</td>
<td>  <textarea><?php echo $pro_description;?>  </textarea>   </td>
</tr>


<tr>
<td>product keywords</td>
<td>  <?php echo $pro_keywords;?> </td>
</tr>


<tr>
<td>product image</td>
<td>  <?php echo $pro_images;?> </td>
</tr>


<tr>
<td>product category</td>
<td>  <?php echo $pro_cat;?> </td>
</tr>

<tr>
<td>product brand</td>
<td>  <?php echo $pro_brand;?> </td>
</tr>


</td>

</tr>



</td>

</tr>


<tr>
<td colspan="8" align="center"> <a href=""  </td>
</tr>

</tr>

</table>

<?php } ?>