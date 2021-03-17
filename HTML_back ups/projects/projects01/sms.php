<!DOCTYPE html>
<?php
if(isset($_POST['send'])){
	$from=$_POST['femail'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];
	if(empty($from)){
		echo "enter the email";
		exit();
	}elseif (empty($phone)) {
		echo "enter phone";
		exit();
	}elseif (empty($message)) {
		echo "enter message";
		exit();
	}else{
		$message=wordwrap($message,70);
		$header=$from;
		$subject='from submission';
		$to=$phone;
		$result=mail($to, $subject, $message,$header);
		echo "message sent to".$to;
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="sms.php" method="post">
		<table align="center">
			<tr>
				<td>From:</td>
				<td><input type="email" name="femail" placeholder="example@example.com"></td><br>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input type="text" name="phone" placeholder="phone"></td><br>
			</tr>
			<tr>
				<td>Message:</td>
				<td><textarea rows="6" cols="50" name="message"></textarea></td><br>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="send" value="send"></td>
			</tr>
		</table>
	</form>

</body>
</html>