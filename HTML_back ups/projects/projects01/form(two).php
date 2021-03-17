<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="form(one).css">
	<title></title>
</head>
<body>
	<div class="wrapper">
	<div class="header">
		<p>SINENDET MIXED-DAY SECONDARY SCHOOL<br>P.O BOX 163-20152 OLENGURUONE</p>
	</div>
	<div class="homebtn">
		<a href="homepage.php">HOME</a>
	</div><br><br>
	<hr>
	<div class="sidebar">
		<h2>FORM TWO</h2>
    <div class="select">
        <select onchange="window.location=this.options[this.selectedIndex].value" >
            <option >SELECT</option>
            <option value="#">CLASS LIST</option>
            <option value="#">PERFORMANCE</option>
            <option value="#">FEES</option>
            <option value="#">CLASS TEACHER</option>
            <option value="#">CLASS REP.</option>
        </select>
    </div>
	</div>
	<div class="main">
        <?php
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,"students_database");
$query="SELECT adm,name,gender FROM students WHERE form=2";
$result=mysqli_query($con,$query);
?>
         <table align="center"  border="1px" style=" text-align: center; width: 600px; line-height: 40px;">
        <tr>
            <th colspan="3" style="color:lime;background-color: white;color: black">FORM TWO'S LIST</th>
        </tr>
        <t>
            <th style="color:purple">ADM</th>
            <th style="color:purple">STUDENT NAME</th>
            <th style="color:purple">GENDER</th>
        </t>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>  
            <tr>
            <td style="color: blue"><?php echo $rows['adm'];?></td>
            <td style="color: blue"><?php echo $rows['name'];?></td>
             <td style="color: blue"><?php echo $rows['gender'];?></td>
          
            </tr>

        <?php 
        }
        ?>
    </table>
	</div>
</div>
</body>
</html>