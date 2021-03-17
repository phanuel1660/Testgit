<?php
$date = filter_input(INPUT_POST, 'date');
$litres = filter_input(INPUT_POST, 'litres');
$host='localhost:3306';
$dbusername='root';
$dbpassword='admin';
$dbname='milk_records';
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO milk_table (DATE,LITRES) values('$date','$litres')";
if(mysqli_query($conn,$sql)){
	header('location:login.html');
	echo "Record inserted successfully";
}else{
	echo "The email used is already registered with an another account";
}
mysqli_close($conn);
}else{
	header("location:signup.html");
}
?>