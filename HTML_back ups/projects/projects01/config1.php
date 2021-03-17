<?php
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$studentid = filter_input(INPUT_POST, 'studentid');
$password = filter_input(INPUT_POST, 'password');
$cpassword = filter_input(INPUT_POST, 'cpassword');
$phone = filter_input(INPUT_POST, 'phone');
if($password==$cpassword){
$host='localhost:3306';
$dbusername='root';
$dbpassword='admin';
$dbfirstname='';
$dbname='useraccount';
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO users (FIRST_NAME,LAST_NAME,EMAIL,STUDENT_ID,PASSWORD,CONFIRM_PASSWORD,PHONE) values('$fname','$lname','$email','$studentid','$password','$cpassword','$phone')";
if(mysqli_query($conn,$sql)){
	header('location:login.html');
	echo "Record inserted successfully";
}else{
	echo "The email used is already registered with an another account";
}
mysqli_close($conn);}else{
	header("location:signup.html");
}
?>