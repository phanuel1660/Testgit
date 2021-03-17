<?php 
session_start();
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,'user');
$n=$_POST['Username'];
$p=$_POST['Password'];
$s="INSERT INTO account name,password values('$n','$p')";
if (mysqli_query($con,$s)){
	echo "successfully!";
} else{
    echo "unsuccessful!";
}

 ?>