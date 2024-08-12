<?php 
$con = mysqli_connect('localhost','root','','mt3');
if(!$con)
{
    echo "Failed To Connect : " . mysqli_connect_error();
}
?>