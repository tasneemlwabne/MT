
<?php

	//if upload button is pressed
	if(isset($_POST['upload']))
	{
        require "Db.php";
		//the path to store the upload image
		$target = "product_image/".basename($_FILES['image']['name']); //need to change the path
		
		// connect to the database
		// $connect = mysqli_connect("localhost","root","","mt2");
		//get all the submitted data from the form
		$image =mysqli_real_escape_string($con, $_FILES['image']['name']);
		$text = mysqli_real_escape_string($con, $_POST['name']);
		$price=$_POST['price'];
		$qty=$_POST['qty'];
		$catg=$_POST['catg'];
        $desc=mysqli_real_escape_string($con, $_POST['desc']);
        // echo $image;
		$sql = "INSERT INTO product(name,price,qty,image,category,details) VALUES ('$text','$price','$qty','$image','$catg','$desc')";
		$query=mysqli_query($con,$sql); //stores the submitted data into the database table : images
        if($query){
            echo "<p>product uploaded successfully</p>";
    }
        else {
            echo "<p>There was a problem uploading product</p>";	
        }
		//now lets move the uploaded image into the filder : images
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
		{
			echo "<p>image uploaded successfully</p>";
		}
		else
		{
			echo "<p>There was a problem saving image</p>";	
		}
   
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Add product</title>
    <style>
             header
        {
    width: 100%;
    height: 55vh;
    background: url(../img/showcase1.jpg) no-repeat -50% -10%;
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
    <br>
     <div class=" text-center mt-2 text-12222C">
        <h1>Add Product</h1>
    </div>
    <div class="row ">
        <div class="col-lg-12 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" action="addproduct.php" method="POST" enctype="multipart/form-data">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Product Name</label> 
                                            <input type="text"  id="name" name="name" class="form-control" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Product Price</label> 
                                            <input type="text" id="price" name="price" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Product Qty</label> 
                                            <input type="text" id="qty" name="qty" class="form-control" required> 
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Product Category</label> 
                                            <select  id="catg" name="catg" class="form-control" required>
                                                <option value="" selected disabled>--Select Category--</option>
                                                <option value="Hair">Hair</option>
                                                <option value="Oily">Face: Oily Skin</option>
                                                <option value="Dry">Face: Dry Skin</option>
                                                <option value="Sensitive">Face: Sensitive Skin</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> 
                                            <label>Product Description</label> 
                                            <textarea name="desc" maxlength="1000" rows="3" class="form-control" required></textarea>
                                         </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"> 
                                            <label>Product Image</label> 
                                            <input type="file" id="image" name="image" class="form-control" required/>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                         <input type="submit" name="upload" value="Upload product" class="btn btn-send pt-2 btn-block" style="background-color:#12222c;color:white;"> 
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


