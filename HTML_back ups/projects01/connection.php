<?php
$name = filter_input(INPUT_POST, 'name');
$gender=filter_input(INPUT_POST, 'gender');
$degree=filter_input(INPUT_POST, 'degree');
$email=filter_input(INPUT_POST, 'email');
$mobile=filter_input(INPUT_POST, 'mobile');
$room=filter_input(INPUT_POST, 'room');
$other=filter_input(INPUT_POST, 'other');
$churchname=filter_input(INPUT_POST, 'churchname');
$churchaddress=filter_input(INPUT_POST, 'churchaddress');
$nextofkinname=filter_input(INPUT_POST, 'nextofkinname');
$nextofkincontact=filter_input(INPUT_POST, 'nextofkincontact');
$nextofkinchurch=filter_input(INPUT_POST, 'nextofkinchurch');
$role=filter_input(INPUT_POST, 'role');
$host='localhost:3306';
$dbusername='root';
$dbpassword='';
$dbfirstname='';
$dbname='church';
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
if(!$conn){
	die('could not connect:'.mysqli_connect_error());
}
echo "connected successfully<br/>";
$sql="INSERT INTO clearance_form (NAME,GENDER,DEGREE,EMAIL_ADDRESS,MOBILE_NO,ROOM/PLOT_NO,OTHER_RELIGIOUS_AFFILIATION,HOME_CHURCH,ADDRESS_OF_HOME_CHURCH,NAME_OF_NEXT_OF_KIN,CONTACT_OF_NEXT_OF_KIN,RELIGIOUS_OF_NEXT_OF_KIN,ROLE/INTEREST) values('$name','$gender','$degree','$email','$mobile','$room','$other','$churchname','$churchaddress','$nextofkinname','$nextofkincontact','$nextofkinchurch','$role')";
if(mysqli_query($conn,$sql)){
	echo "Record inserted successfully";
}else{
	echo "could not insert record:".mysqli_error($conn);
}
mysqli_close($conn);
?>