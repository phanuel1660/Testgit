<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="form(1).css">
   <title></title>
</head>
<body>
   <div class="con">
      <h4>SINENDENT MIXED DAY SECONDARY SCHOOL<br>P.O.BOX 000-20152 OLENGURUONE</h4>
   </div>
   <div class="con1">
      <a href="form(2).html">HOME</a>
      <a href="#">REGISTRATION</a>
      <a href="#"></a>
      <a href="#"></a>
</div>
<div class="con2">
   <?php
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,"subjects");
$query="
SELECT * FROM subjects";
$result=mysqli_query($con,$query);
?>
    <table align="right"  border="1px" style=" left: 10%; text-align: center; width: 600px; line-height: 40px;">
        <tr>
            <th colspan="7" style="color:lime">ALL SUBJECTS FROM FORM 1 TO FORM 4 AGAINST TEACHER</th>
        </tr>
        <t>
            <th style="color:purple">subjectid</th>
            <th style="color:purple">subjettitle</th>
      

        </t>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>  
            <tr>
            <td style="color: blue"><?php echo $rows['subjectid'];?></td>
            <td style="color: blue"><?php echo $rows['subjettitle'];?></td>
          
            </tr>

        <?php 
        }
        ?>
    </table>
</div>
</body>
</html>