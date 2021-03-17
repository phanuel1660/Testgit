<?php
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'phone');
$date = filter_input(INPUT_POST, 'date');
$transaction = filter_input(INPUT_POST, 'transaction');
$room = filter_input(INPUT_POST, 'room');
$amount = filter_input(INPUT_POST, 'amount');
$month = filter_input(INPUT_POST, 'month');
if(!empty($name)){
	if(!empty($phone)){
		if(!empty($date)){
        if(!empty($transaction)){
        	if(!empty($amount)){
        		if(!empty($month)){
        			if(!empty($room)){
$host='localhost:3306';
$dbemail='root';
$dbpassword='admin';
$dbfirstname='';
$dbname='rent';
$conn=mysqli_connect($host,$dbemail,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO rent (FULL_NAME,PHONE,DATE_PAID,TRANSACTION_ID,ROOM_NO,AMOUNT,MONTH_RENT) values('$name','$phone','$date','$transaction','$room','$amount','$month')";
if(mysqli_query($conn,$sql)){
	echo "Record inserted successfully";
}else{
	echo "could not insert record:".mysqli_error($conn);
}
mysqli_close($conn);
}
else{
	echo "Enter the number of your room";
}
}
else{
	echo "Enter the month of your rent";
}
}
else{
	echo "Enter the value of the rent paid";
}
}
else{
	echo "Enter transaction id";
}
}
else{
	echo "Enter date";
}
}else{
	echo "Enter your phone number";
}
}else{
	echo "Enter your name";
}
?>