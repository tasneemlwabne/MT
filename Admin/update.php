
      <?php
      error_reporting(0);
      ini_set('display_errors', 0);
     require("Db.php");

         if(isset($_POST['Update']) && isset($_GET['id'])) {
           

            $SupplySql = "SELECT * FROM product WHERE id='".$_GET['id']."'";
            $supplyQuery = mysqli_query($con,$SupplySql);
            
            if(mysqli_num_rows($supplyQuery) > 0){
                $fetch_data = mysqli_fetch_assoc($supplyQuery);
                $old_qty = $fetch_data['qty'];  
                $pro_qty = $_POST['qty'];
                $new_qty = $pro_qty - $old_qty;
                $pro_id= $fetch_data['id'];
                $price = $fetch_data['price'];
                $date=date("d-m-Y h:i:s");
                $SupplySql2 = "INSERT INTO supply(pro_id,qty,price,date) VALUES('$pro_id','$new_qty','$price','$date')";
                $supplyQuery2 = mysqli_query($con,$SupplySql2);
                if($supplyQuery2){
                    echo "<script> alert('data Inserted successfully');</script>";
                }else {
                    echo "<script> alert('Could not insert data');</script>";
                }
            // echo "<script> alert('".$old_qty."');</script>";
            // echo "<script> alert('".$pro_qty."');</script>";
            // echo "<script> alert('".$new_qty."');</script>";
                $pro_qty = $_POST['qty'];
                 $pid=$_GET['id'];
                  $sql="update product SET qty='".$pro_qty."' WHERE id='".$pid."'";
                  $query = mysqli_query($con,$sql);
                  if($query) {
                     echo "<script> alert('Updated data successfully');</script>";
                  }
                   else {
                     echo 'Could not update data: ';                  
                    }
             mysqli_close($con);
            }
        }
            $id=$_GET['id'];
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Add product</title>
    <style>
           header
        {
    width: 100%;
    height: 55vh;
    background: url(img/showcase1.jpg) no-repeat -50% -10%;
    background-size: cover;
	background-attachment: fixed;
        }
h1 {
    margin-bottom: 40px
}

label {
    color: #333
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px
}

.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px
}

.card {
    margin-left: 10px;
    margin-right: 10px
}
    </style>
</head>
<body>
    <?php include("adminNav.php"); ?>
    <header>

</header>
<div class="container">
    <br><br>
     <div class=" text-center mt-2 text-12222C">
        <h1>Update Product</h1>
    </div>
    <div class="row ">
        <div class="col-lg-12 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" method="post" enctype="multipart/form-data">
                            <div class="controls"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Product ID</label> 
                                            <?php $ok=($id !== null) ? $id : '';?>
                                            <input type="text" id="id" name="id" value="<?php echo $ok;?>" class="form-control" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Product QTY</label> 
                                            <input type="text" id="qty" name="qty" class="form-control"  />
                                         </div>
                                    </div>
                                </div>
                                <div class="row">   
                                </div>
                                <div class="col-md-12">
                                         <input type="submit" name="Update" value="Update product" class="btn btn-send pt-2 btn-block" style="background-color:#12222c;color:white;"> 
                                   </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
</body>
</html>