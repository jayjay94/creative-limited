
<?php include("db.php");?>


<?php 

if(isset($_GET['delete_customer'])){


$delete_id= $_GET['delete_customer'];




$delete_customer="delete from customer where customer_id='$delete_id'";



$run_delete=mysqli_query($conn,$delete_customer);


if($run_delete){


echo "<script> alert('customer deleted')  </script>"  ;
echo "<script> window.open('view_customer.php','_self')  </script>";



}



}




?>