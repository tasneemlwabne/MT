<?php require("Db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>products</title>
  <style>
    #bg {
    background: #eee
}
header
        {
    width: 100%;
    height: 55vh;
    background: url(img/showcase1.jpg) no-repeat -50% -10%;
    background-size: cover;
	background-attachment: fixed;
        }
  </style>
</head>
<body id="bg">
  <?php include("adminNav.php"); ?>

  <header>

</header>
  <br><br>
<?php
require "Db.php";
  $selectSQL = 'SELECT * FROM product';
  if( !( $selectRes = mysqli_query($con,$selectSQL) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
    ?>
    <center>
<table border="2" width="50%" class="table table-striped table-borderless">
  <thead class="table-dark">
    <tr>
      <center>
             <th>Product Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
                </center>
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          require "Db.php";
          echo "<tr>
          <td>{$row['id']}</td>
          <td><img src='product_image/$row[image]' height='100px' id='img'></td>
          
          <td>{$row['name']}</td>
          <td>{$row['price']}</td>
          <td>{$row['qty']}</td>
          <td>{$row['category']}</td>
          <td width='15%'>
          <a href='erasure.php?id={$row['id']}'>
Delete
<i class='bi bi-trash-o'></i>
<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='black' class='bi bi-trash-o' viewBox='0 0 16 16'>
<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
<path fill-rule='black' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
</svg>
</a>

<a href='update.php?id={$row['id']}'>
&nbsp;&nbsp;&nbsp;&nbsp;
Edit
<i class='fa fa-edit' style='font-size:24px;color:red'></i>
</a>
          </td>
          </tr>\n";
        }
      }
    ?>
  
  </tbody>
</table>
</center>
    <?php
  }
?>
</body>
</html>