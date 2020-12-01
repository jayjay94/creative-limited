<?php
  $servername = "localhost";        //database connection code variables
  $username = "root";
  $password = "";
  $database = "creative_Limeted";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$database );
  
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  
  echo "Connected successfully";



//getting user ip address
  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;




//getting the cart
}

function cart(){

if(isset($_GET['add_cart'])){

  global $conn;
  $ip= getip();

$product_id = $_GET['add_cart'];
$check_products ="select * from cart where ip_add='$ip' and p_id='$product_id'";

$run_check= mysqli_query($conn,$check_products);

if(mysqli_num_rows($run_check)>0){

  echo"";

}

else{

  $insert_product="insert into cart (p_id,ip_add) values ('$product_id','$ip')";

  $run_product= mysqli_query($conn,$insert_product);

  echo "<script>window.open('index.php','_self')</script>";
}
}
}


//getting total number of items

function total_items(){

if (isset($_GET['add_cart'])){


global $conn;

$ip= getip();


$get_items= "select * from cart where ip_add='$ip'";

$run_items = mysqli_query($conn, $get_items);

$count_items= mysqli_num_rows($run_items);

}

else{

  global $conn;

  $ip= getip();


  $get_items= "select * from cart where ip_add='$ip'";

  $run_items = mysqli_query($conn, $get_items);
  
  $count_items= mysqli_num_rows($run_items);

  
}


echo $count_items;


}




function total_price(){


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


$values = array_sum($products_price);

$total +=$values;



}
}




echo $total;
}



//getting categories

function getcats() {  //updates page i.e dynamic

global $conn;

$get_cats="select * from category";        //selects databse table
$run_cats = mysqli_query($conn,$get_cats);     //getting categories querys databse

while($row_cats=mysqli_fetch_array($run_cats)){       

$category_id=$row_cats['category_id'];        
$category_name=$row_cats['category_name'];
 
                  // while loop for query and print of table colums


echo "<li><a href='products_cat.php?category_id=$category_id'>$category_name</a></li>";

}



}



//getting brand details

function getbrand() {  // function that updates page i.e prints data-base data

  global $conn;
  
  $get_brands="select * from brand";        //selects databse table
  $run_brands = mysqli_query($conn,$get_brands);     //getting brands querys databse
  
  while($row_brands=mysqli_fetch_array($run_brands)){       
  
  $brand_id=$row_brands['brand_id'];        
  $brand_name=$row_brands['brand_name'];
   
                                                // while loop for query and print of table colums
  
 echo "<li><a href='products_brand.php?brand_id=$brand_id'>$brand_name</a></li>";
  
  
  
  }
  
  
  
  }
  


//while loop for displaying imagess from database
  function get_products(){

  if(!isset($_GET['products_category'])){ 


  if(!isset($_GET['products_brand'])){  

global $conn;

$get_products = " select * from products_details";

$run_products = mysqli_query($conn,$get_products);


while($row_products=mysqli_fetch_array($run_products)){


  $products_id = $row_products['products_id'];
  $products_name = $row_products['products_name'];
  $products_price = $row_products['products_price'];
  $products_description = $row_products['products_description'];
  $products_keywords = $row_products['products_keywords'];
  $products_category = $row_products['products_category']; 
  $products_image = $row_products['products_image'];
  $products_brand = $row_products['products_brand'];


echo "                


 
<div class='products_border' style='width:20%; float:right; border:1px solid#dd;   margin-right:100px; padding:10px;'>
<strong style=' color:white;'>$products_name</strong>
<br>
<img src='product_images/$products_image' width='100%;'>


<br><strong style=' color:red;'>$products_price </strong>

<a href='products.php?add_cart=$products_id'><button style='color:red;'>add to cart</button></a><br>
<br>
</div>


"
;

}

}

}

}

?>


<?php

//while loop for displaying imagess from database
function getcatproducts(){

  if(isset($_GET['category_id'])){ 


    $category_id =$_GET['category_id'];

global $conn;

$get_catproducts = " select * from products_details where products_category=' $category_id'";

$run_catproducts = mysqli_query($conn,$get_catproducts);


while($catrow_products=mysqli_fetch_array($run_catproducts)){


  $products_id = $catrow_products['products_id'];
  $products_name = $catrow_products['products_name'];
  $products_price = $catrow_products['products_price'];
  $products_description = $catrow_products['products_description'];
  $products_keywords = $catrow_products['products_keywords'];
  $products_category = $catrow_products['products_category']; 
  $products_image = $catrow_products['products_image'];
  $products_brand = $catrow_products['products_brand'];




echo "                


 
<div class='products_border' style='width:35%; float:right; border:1px solid#dd;   margin-right:100px; padding:10px;'>
<strong style=' color:white;'>$products_name</strong>
<br>
<img src='product_images/$products_image' width='100%;'>


<br><strong style=' color:red;'>$products_price </strong>

<a href='index.php?add_cart=$products_id'><button style='color:red;'>add to cart</button></a><br>
<br>
</div>


"
;

}



}

}

?>


<?php

//while loop for displaying imagess from database
function getbrandproducts(){

  if(isset($_GET['brand_id'])){ 


    $brand_id =$_GET['brand_id'];

global $conn;

$get_brandproducts = " select * from products_details where products_brand='$brand_id'";

$run_brandproducts = mysqli_query($conn,$get_brandproducts);


while($brandrow_products=mysqli_fetch_array($run_brandproducts)){


  $products_id =$brandrow_products['products_id'];
  $products_name = $brandrow_products['products_name'];
  $products_price = $brandrow_products['products_price'];
  $products_description = $brandrow_products['products_description'];
  $products_keywords = $brandrow_products['products_keywords'];
  $products_category = $brandrow_products['products_category']; 
  $products_image = $brandrow_products['products_image'];
  $products_brand = $brandrow_products['products_brand'];




echo "                


 
<div class='products_border' style='width:35%; float:right; border:1px solid#dd;   margin-right:100px; padding:10px;'>
<strong style=' color:white;'>$products_name</strong>
<br>
<img src='product_images/$products_image' width='100%;'>


<br><strong style=' color:red;'>$products_price </strong>

<a href='index.php?add_cart=$products_id'><button style='color:red;'>add to cart</button></a><br>
<br>
</div>


"
;

}



}

}

?>



<?php

//while loop for displaying imagess from database
  function frontget_products(){

  if(!isset($_GET['products_category'])){ 


  if(!isset($_GET['products_brand'])){  

global $conn;

$get_products = " select * from products_details  LIMIT 0,3";

$run_products = mysqli_query($conn,$get_products);


while($row_products=mysqli_fetch_array($run_products)){


  $products_id = $row_products['products_id'];
  $products_name = $row_products['products_name'];
  $products_price = $row_products['products_price'];
  $products_description = $row_products['products_description'];
  $products_keywords = $row_products['products_keywords'];
  $products_category = $row_products['products_category']; 
  $products_image = $row_products['products_image'];
  $products_brand = $row_products['products_brand'];


echo "                


 
<div class='products_border' style='width:20%; float:right; border:1px solid#dd;   margin-right:100px; padding:10px;'>
<strong style=' color:white;'>$products_name</strong>
<br>
<img src='product_images/$products_image' width='100%;'>


<br><strong style=' color:red;'>$products_price </strong>

<a href='index.php?add_cart=$products_id'><button style='color:red;'>add to cart</button></a><br>
<br>
</div>


"
;

}

}

}

}



?>