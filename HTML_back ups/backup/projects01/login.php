<?php
session_start();
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,'useraccount');
$name=$_POST['email'];
$pass=$_POST['password'];
$s="SELECT * from users where EMAIL='".$name."' AND PASSWORD='".$pass."'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
	header('location:homepage.php');
}else{
	header('location:login.html');
}
?>