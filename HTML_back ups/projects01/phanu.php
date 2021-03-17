<?php
$name = filter_input(INPUT_POST, 'name');
$gender=filter_input(INPUT_POST, 'gender');
$degree=filter_input(INPUT_POST, 'degree');
$host='localhost:3306';
$dbusername='root';
$dbpassword='';
$dbfirstname='';
$dbname='kiprono';
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO langat (NAME,GENDER,DEGREE) values('$name','$gender','$degree')";
if(mysqli_query($conn,$sql)){
	echo "Record inserted successfully";
}else{
	echo "could not insert record:".mysqli_error($conn);
}
mysqli_close($conn);
?>