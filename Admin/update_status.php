
      <?php
      error_reporting(0);
      ini_set('display_errors', 0);
     require("Db.php");

         if(isset($_POST['Update']) && isset($_GET['id'])) {
           
            $order_status = $_POST['status'];
               $order_id=$_GET['id'];
                  $sql="update orders SET status='".$order_status."' WHERE order_id='".$order_id."'";
                  $query = mysqli_query($con,$sql);
                  if($query) {
                     echo "<script> alert('Updated data successfully');</script>";
                  }
                   else {
                     echo 'Could not update data: ';                  
                    }
             mysqli_close($con);
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
        <h1>Update Order Status</h1>
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
                                            <label>Order ID</label> 
                                            <?php $ok=($id !== null) ? $id : '';?>
                                            <input type="text" id="id" name="id" value="<?php echo $ok;?>" class="form-control" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Order Status</label> 
                                            <select  id="catg" name="status" class="form-control" required>
                                                <option value="" selected disabled>--Select--</option>
                                                <option value="Packaged">Packaged</option>
                                                <option value="Shippied">Shippied</option>
                                                <option value="Delivered">Delivered</option>
                                            </select> 
                                         </div>
                                    </div>
                                </div>
                                <div class="row">   
                                </div>
                                <div class="col-md-12">
                                         <input type="submit" name="Update" value="Update Status" class="btn btn-send pt-2 btn-block" style="background-color:#12222c;color:white;"> 
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