<?php
date_default_timezone_set("nairobi/kenya");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="milk2.php">
	<link rel="stylesheet" type="text/css" href="milk2.css">
</head>
<body>
<form>
	<p>Date:</p>
	<input type="date" value="<?php echo date("Y-m-d"); ?>">
	<p>Litres:</p>
	<input type="number" name="Litres" placeholder="Litres" required=""><br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>