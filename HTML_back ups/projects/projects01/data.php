<?php
header('Content-Type:application/json');
define('host', 'localhost');
define('username', 'root');
define('password', 'admin');
define('dbname', 'mydb');
$mysqli= new mysqli(host,username,password,dbname);
if (!$mysqli) {
	die("connection failed".$mysqli->error);
}
$query=sprintf("SELECT form,avg(e.marks)marks
FROM students_database.exams e
JOIN students_database.students s
ON e.adm=s.adm
group by form");
$result=$mysqli->query($query);
$data=array();
foreach ($result as $row) {
	$data[]=$row;
}
$result->close();
$mysqli->close();
print json_encode($data);

?>