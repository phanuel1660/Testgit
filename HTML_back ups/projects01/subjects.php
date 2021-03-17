<?php
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,"useraccount");
$query="
select FIRST_NAME,LAST_NAME,STUDENT_ID,DATE,DESTINATION,PURPOSE_OF_TRAVEL
from users
join signout_form
ON users.ID=signout_form.ID";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="navbar">
		<style>
			body{
				font-family: "Lato",sans-serif;
				transition:background-color.5s;
			}
			.sidenav{
				height: 70%;
				width: 0;
				position: fixed;
				z-index: 1;
				top: 8%;
				left: 0;
				background-color:black;
				overflow-x: hidden;
				transition: 0.5s;
				padding-top: 60px;
			}
			.sidenav a{
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 20px;
                color: #818181;
                display: block;
                transition: 03s;
                line-height: 44px;
                font-weight: bold;
                font-family: serif;
			}
			.sidenav a:hover, .offcanvas a:focus{
				color: cyan;
			}
			.sidenav .closebtn{
				position: absolute;
				top: 0;
				right: 25px;
				font-size: 36px;
				margin-left: 50px;
			}
			#main{
				transition: margin-left .5s;
				padding: 16px;
			}
			@media screen and (max-height: 450px){
				.sidenav{padding-top: 15px;}
				.sidenav a{font-size: 18px;}
			}
		</style>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)"
			class="closebtn"
			onclick="closeNav()">&times;</a>
			<a href="test50.html">HOME</a>
			<a href="login.html">ADD</a>	
			<a href="login.html">UPDATE</a>	
			<a href="login.html">DELETE</a>	
			<a href="login.html">LOGOUT</a>	
		</div>
	         <span style="font-size: 30px; cursor:
	         pointer"
	         onclick="openNav()">&#9776;
	         </span>
		</div>
		<script>
			function openNav(){
				document.getElementById("mySidenav")
				.style.width="250px";
				document.getElementById("main")
				.style.marginLeft="20px"
				document.body.style.backgroundcolor="rgba(0,0,0,0.4)";
			}
				function closeNav(){
				document.getElementById("mySidenav")
				.style.width="0";
				document.getElementById("main")
				.style.marginLeft="0"
				document.body.style.backgroundcolor="white";
			}
		</script>
	</div>
	<hr>
	<table align="center" border="1px" style="width: 800px; line-height: 40px;">
		<tr>
			<th colspan="7" style="color:lime">signout history</th>
		</tr>
		<t>
			<th style="color:purple">FIRST_NAME</th>
			<th style="color:purple">LAST_NAME</th>
			<th style="color:purple">STUDENT_ID</th>
			<th style="color:purple">DATE</th>
			<th style="color:purple">DESTINATION</th>
			<th style="color:purple">PURPOSE_OF_TRAVEL</th>
			<th style="color:purple">STATUS</th>

		</t>
		<?php
		while($rows=mysqli_fetch_assoc($result))
		{
		?>	
			<tr>
			<td style="color: blue"><?php echo $rows['FIRST_NAME'];?></td>
			<td style="color: blue"><?php echo $rows['LAST_NAME'];?></td>
			<td style="color: blue"><?php echo $rows['STUDENT_ID'];?></td>
			<td style="color: blue"><?php echo $rows['DATE'];?></td>
			<td style="color: blue"><?php echo $rows['DESTINATION'];?></td>
			<td style="color: blue"><?php echo $rows['PURPOSE_OF_TRAVEL'];?></td>
			</tr>

		<?php 
		}
		?>
	</table>

</body>
</html>