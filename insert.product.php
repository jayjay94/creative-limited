
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
<?php
	require ('db.php');
	
    if (isset($_REQUEST['products_name'])){  // if data is submited entered system will input into database.
		$products_name = stripslashes($_REQUEST['products_name']); // removes backslashes
        $products_name = mysqli_real_escape_string($conn,$products_name); //escapes special characters in a string
        $products_price = stripslashes($_REQUEST['products_price']);
        $products_price = mysqli_real_escape_string($conn,$products_price ); 
        $products_keywords = stripslashes($_REQUEST['products_keywords']); 
        $products_keywords = mysqli_real_escape_string($conn,$products_keywords);
        $products_category = stripslashes($_REQUEST['products_category']); 
        $products_category = mysqli_real_escape_string($conn,$products_category);
        $products_brand = stripslashes($_REQUEST['products_brand']); 
        $products_brand = mysqli_real_escape_string($conn,$products_brand);
        $products_description= stripslashes($_REQUEST['products_description']); 
        $products_description= mysqli_real_escape_string($conn,$products_description);

  

        $products_image=$_FILES['products_image']['name'];
        $products_image_tmp=$_FILES['products_image']['tmp_name'];
        
        move_uploaded_file($products_image_tmp,"product_images/$products_image");

        $trn_date = date("Y-m-d H:i:s");


    
        $query = "INSERT into products_details (products_name,products_price,products_brand,products_description,products_category,products_image,products_keywords) VALUES
         ('$products_name','$products_price', '$products_brand','$products_description','$products_category','$products_image','$products_keywords')";
        $result = mysqli_query($conn,$query);
    

if($query){


  echo " <script> alert('product has been inserted') </script> ";
  echo "<script>  window.open('insert.product.php','_self') </script>";

}
    }

else{
?>
<form name="" action="insert.product.php"  method="POST" enctype="multipart/form-data"> <!--inserst products table-->

<br>
<br>

<table align="center" width="600" border="10" style="background-color:#F8F8FF;">

<td colspan="8"><h2> insert products </h2></td>

<tr colspan="8">

<tr>
<td>product name</td>
<td> <input type="text" name="products_name" size="60" required> </td>
</tr>

<tr>
<td>product price</td>
<td colspan="8"> <input type="text"  name="products_price" size="60"  required >   </td>
</tr>


<tr>
<td>product description</td>
<td> <textarea name="products_description" cols="20"  rows="10"  required >   </textarea>   </td>
</tr>


<tr>
<td>product keywords</td>
<td> <input type="text" name="products_keywords" size="60"  required >   </td>
</tr>


<tr>
<td>product image</td>
<td> <input type="file" name="products_image" size="60"  required >   </td>
</tr>



<tr>
<td>product category</td>
<td> 

<select name="products_category"  required> <option> select category </option> 

<?php

//getting categories
  
  $get_cats="select * from category";        //selects databse table
  $run_cats = mysqli_query($conn,$get_cats);     //getting categories querys databse
  
  while($row_cats=mysqli_fetch_array($run_cats)){       
  
  $category_id=$row_cats['category_id'];        
  $category_name=$row_cats['category_name'];
   
                                                // while loop for query and print of table colums
  
  echo "<option value='$category_id'>$category_name</option>";
  

  }
  

?>


</select>


<tr>
<td>product brand</td>
<td> 

<select name="products_brand"  required> <option> select brand </option> 



<?php

$get_brands="select * from brand";        //selects databse table
$run_brands = mysqli_query($conn,$get_brands);     //getting brands querys databse

while($row_brands=mysqli_fetch_array($run_brands)){       

$brand_id=$row_brands['brand_id'];        
$brand_name=$row_brands['brand_name'];
 
                                              // while loop for query and print of table colums

echo "<option value='$brand_id'>$brand_name</option>";



}
  

?>


</select>


</td>

</tr>



</td>

</tr>


<tr>
<td colspan="8" align="center"> <input type="submit" name="submit" value="submit">   </td>
</tr>

</tr>

</table>

<?php }?>
</form>