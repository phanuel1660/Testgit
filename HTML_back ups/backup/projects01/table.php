<?php
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,'useraccount');
$query="SELECT EMAIL,PHONE FROM users;";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table align="center" border="1px" style="width: 400px;line-height: 20px">
	<tr>
		<th colspan="2"></th>
	</tr>
	<t>
		<th>EMAIL</th>
		<th>PHONE</th>
	</t>
	<?php
	while ($rows=mysqli_fetch_assoc($result)) 
	{
	 ?>	
	 <tr>
       <td><?php echo $rows['EMAIL'];?></td>
       <td><?php echo $rows['PHONE'];?></td>
       </tr>
	 <?php
	 } 
	 ?>
</table>
</body>
</html>