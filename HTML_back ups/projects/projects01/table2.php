 <?php
 $con=mysqli_connect('localhost','root','admin');
 mysqli_select_db($con,'useraccount');
 $query="SELECT FIRST_NAME,STUDENT_ID FROM users";
 $result=mysqli_query($con,$query);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
     <table align="center" border="1px" style=" width: 600px;line-height: 50px">
     	<tr>
     		<th colspan="2"></th>
     	</tr>
     	<tr>
     		<th>FIRST_NAME</th>
     		<th>STUDENT_ID</th>
     	</tr>
        <?php
        while ($rows=mysqli_fetch_assoc($result)) 
        {
        ?>
        <tr>
        	<td><?php echo $rows ['FIRST_NAME'];?></td>
        	<td><?php echo $rows ['STUDENT_ID'];?></td>
        </tr>
         <?php	
        }
        ?>
     </table>
 </body>
 </html>