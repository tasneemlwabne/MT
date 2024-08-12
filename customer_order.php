

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <style>
    body{
background-color: #eee; 
}

table th , table td{
text-align: center;
}

table tr:nth-child(even){
background-color: #BEF2F5
}

.pagination li:hover{
cursor: pointer;
}
    table tbody tr {
        display: none;
    }

</style>
</head>
<body>
  <?php include('HomeNav.php'); ?>
<br><br><br><br>
<h1 class="text-center">Customer Orders</h1>
<h2 class="text-center"> You Have 2 Days To Cancle The orders</h2>
<br><br>
<div class="container">
		<h2>Select Number Of Rows</h2>
				<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="5000">Show ALL Rows</option>
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
             <option value="200">200</option>
						</select>
			 		
			  	</div>

<table class="table table-striped table-class" id= "table-count">
<thead>
	<tr>
    <th>Order ID</th>
    <th>Image</th>
		<th>Name</th>
		<th>Total Price</th>
		<th>Quantity</th>
    <th>Email</th>
		<th>Date</th>
    <th>Action</th>
	</tr>
  </thead>
  <form method="post">
  <tbody>
  <?php 
   $sql="SELECT * FROM orders WHERE user_email='$_SESSION[email]'";
   $query = mysqli_query($con,$sql);
   if(mysqli_num_rows($query) > 0) {
    
   while($res=mysqli_fetch_array($query))
   {
  ?>
	<tr>
          <td><?php echo $res['order_id']; ?></td>
          <td> <img src="admin/product_image/<?php echo $res['image']; ?>" height="100px" id="img" alt=""></td>
          <td><?php echo $res['name']; ?></td>
          <td><?php echo $res['price'] * $res['qty']; ?></td>
          <td><?php echo $res['qty']; ?></td>
          <td><?php echo $_SESSION['email']; ?></td>
          <td><?php echo $res['date']; ?></td>
          <td><a href="cancel_order.php?id=<?php echo $res['order_id']; ?>">Cancel</a></td>
	</tr>
  <?php
    }
  } else {
    echo '<script> alert("You Dont Have Any Orders Yet. !") </script>';
  }
    ?>

     </tbody>
     </form>
</table>
<!--		Start Pagination -->
			<div class='pagination-container' >
				<nav>
				  <ul class="pagination">
            
            <li data-page="prev" >
								     <span> < <span class="sr-only">(current)</span></span>
								    </li>
				   <!--	Here the JS Function Will Add the Rows -->
        <li data-page="next" id="prev">
								       <span> > <span class="sr-only">(current)</span></span>
								    </li>
				  </ul>
				</nav>
			</div>

</div> <!-- 		End of Container -->

<?php include('foter.php'); ?>
<script>
           getPagination('#table-count');
		 
function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
      //$('.paginationprev').html('');						// reset pagination

     lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //	numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
								  <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
								</li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');					// add active class to the clicked
	  	limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
	  limitPagging();
    })
    .val(5)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging(){

	if($('.pagination li').length > 7 ){
			if( $('.pagination li.active').attr('data-page') <= 3 ){
			$('.pagination li:gt(5)').hide();
			$('.pagination li:lt(5)').show();
			$('.pagination [data-page="next"]').show();
		}if ($('.pagination li.active').attr('data-page') > 3){
			$('.pagination li:gt(0)').hide();
			$('.pagination [data-page="next"]').show();
			for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
				$('.pagination [data-page="'+i+'"]').show();

			}

		}
	}
}

</script>
</body>
</html>