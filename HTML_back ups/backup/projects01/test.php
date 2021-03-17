<?php
$name = filter_input(INPUT_POST, 'name');
$gender = filter_input(INPUT_POST, 'gender');
$degree = filter_input(INPUT_POST, 'degree');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$room = filter_input(INPUT_POST, 'room');
$other = filter_input(INPUT_POST, 'other');
$homechurch = filter_input(INPUT_POST, 'homechurch');
$homechurchaddress = filter_input(INPUT_POST, 'homechurchaddress');
$nameofnextofkin = filter_input(INPUT_POST, 'nameofnextofkin');
$contactofnextofkin = filter_input(INPUT_POST, 'contactofnextofkin');
$churchofnextofkin = filter_input(INPUT_POST, 'churchofnextofkin');
$roleinchurch = filter_input(INPUT_POST, 'roleinchurch');
$host='localhost:3306';
$dbusername='root';
$dbpassword='admin';
$dbfirstname='';
$dbname='test20';
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO test30 (NAME,GENDER,DEGREE,EMAIL_ADDRESS,MOBILE_NO,ROOM,OTHER_CHURCH,HOME_CHURCH,HOME_CHURCH_ADDRESS,NAME_OF_NEXT_OF_KIN,CONTACT_OF_NEXT_OF_KIN,CHURCH_OF_NEXT_OF_KIN,ROLE_IN_CHURCH) values('$name','$gender','$degree','$email','$phone','$room','$other','$homechurch','$homechurchaddress','$nameofnextofkin','$contactofnextofkin','$churchofnextofkin','$roleinchurch')";
if(mysqli_query($conn,$sql)){
	echo "Record inserted successfully";
}else{
	echo "could not insert record:".mysqli_error($conn);
}
mysqli_close($conn);
?>