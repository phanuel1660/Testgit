<?php
$destination = filter_input(INPUT_POST, 'destination');
$meansoftravel = filter_input(INPUT_POST, 'meansoftravel');
$purposeoftravel = filter_input(INPUT_POST, 'purposeoftravel');
$dateofdeparture = filter_input(INPUT_POST, 'dateofdeparture');
$date = filter_input(INPUT_POST, 'date');
$dateofreturn = filter_input(INPUT_POST, 'dateofreturn');
$check = filter_input(INPUT_POST, 'check');
$host='localhost:3306';
$dbusername='root';
$dbpassword='admin';
$dbname='useraccount';
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO signout_form (DESTINATION,MEANS_OF_TRAVEL,PURPOSE_OF_TRAVEL,DATE_OF_DEPARTURE,DATE,DATE_OF_RETURN,DURING) values('$destination','$meansoftravel','$purposeoftravel','$dateofdeparture','$date','$dateofreturn','$check')";
if(mysqli_query($conn,$sql)){
	echo "Record inserted successfully";
}else{
	echo "could not insert record:".mysqli_error($conn);
}
mysqli_close($conn);
?>