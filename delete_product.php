
<?php include("db.php");?>


<?php 

if(isset($_GET['delete_product'])){


$delete_id= $_GET['delete_product'];




$delete_product="delete from products_details where products_id='$delete_id'";



$run_delete=mysqli_query($conn,$delete_product);


if($run_delete){


echo "<script> alert('product deleted')  </script>"  ;
echo "<script> window.open('view_product.php','_self')  </script>";



}



}




?>