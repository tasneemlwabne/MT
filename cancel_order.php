<?php

include('Db.php');
if(isset($_GET['id']))
{
$order_id=$_GET['id'];
// echo '<script>alert("'.$order_id.'");</script>';
$sql1="SELECT * FROM orders WHERE order_id='$order_id'";
$query1=mysqli_query($con,$sql1);
while($res=mysqli_fetch_array($query1))
{
     $qty1=$res['qty'];
     $sql2="SELECT * FROM product WHERE id=$res[pro_id]";
     $query2=mysqli_query($con,$sql2);
     while($row=mysqli_fetch_array($query2))
     {
        $qty2=$row['qty']+$qty1;
        $sql3="update product set qty='$qty2' where id='".$res["pro_id"]."'";
        $sql4="DELETE FROM orders WHERE order_id='$order_id'";
        $query3=mysqli_query($con,$sql3);
       $query4=mysqli_query($con,$sql4);

     }
}
if($query4)
{
  echo '<script>alert("Your Orders Has Been Canceled");</script>';
  echo '<script>window.location="customer_order.php"</script>';
}
mysqli_close($con);
} 
?>