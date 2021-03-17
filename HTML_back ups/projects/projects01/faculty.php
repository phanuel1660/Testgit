<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="faculty.css">
	<title></title>
    <script type="text/javascript">
        function exportTableToExcel(tbldata,filename=''){
            var downloadLink;
            var dataType='application/vnd.ms-excel';
            var tableSelect=document.getElementById('tbldata');
            var tableHTML=tableSelect.outerHTML.replace(/ /g,'%20');
            filename=filename?filename +'.xls':'excel_data.xls';
            downloadLink=document.createElement("a");
            document.body.appendChild(downloadLink);
            if(navigator.msSaveOrOpenBlob){
                var blob=new Blob(['\ufeff',tableHTML],{
                    type:dataType
                });
                navigator.msSaveOrOpenBlob(blob,filename);
            }else{
              downloadLink.href='data:' + dataType + ',' + tableHTML;
              downloadLink.download=filename;
              downloadLink.click();
            }
        }
    </script>
</head>
<body>
	<div class="wrapper">
        <div class="excel">
               <button onclick="exportTableToExcel('tbldata')" ><img src="exporticon.jpg" width="15px" height="15px"> Export To Excel</button>
        </div>
     
	<div class="header">
		<p>SINENDET MIXED-DAY SECONDARY SCHOOL<br>P.O BOX 163-20152 OLENGURUONE</p>
	</div>
	<div class="homebtn">
		<a href="homepage.php">HOME</a>
	</div><br><br>
	<hr>
	<div class="sidebar">
		<?php
   
    $host='localhost';
    $username='root';
    $password='admin';
    $database='faculty';
    $TEACHER_ID='';
    $TEACHER_NAME='';
     $PHONE='';
    $SUBJECT_ID='';
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    try{
        $connect=mysqli_connect($host,$username,$password,$database);
    }catch(EXCEPTION $ex){
        echo "Error";
    }
      function getposts(){
        $posts=array();
        $posts[0]=$_POST['TEACHER_ID'];
        $posts[1]=$_POST['TEACHER_NAME'];
        $posts[2]=$_POST['PHONE'];
        $posts[3]=$_POST['SUBJECT_ID'];
        return $posts;
    }
    if(isset($_POST['search'])){
        $data=getposts();
        $search_query="SELECT * FROM faculty WHERE TEACHER_ID=$data[0]";
        $search_result=mysqli_query($connect,$search_query);
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
              while($row=mysqli_fetch_array($search_result))
              {
                $TEACHER_ID=$row['TEACHER_ID'];
                $TEACHER_NAME=$row['TEACHER_NAME'];
                $PHONE=$row['PHONE'];
                $SUBJECT_ID=$row['SUBJECT_ID'];
              }
            }else{echo "No data for this id";}
        }else{echo "result error";}
    }
     if(isset($_POST['insert'])){
    $TEACHER_ID = filter_input(INPUT_POST, 'TEACHER_ID');
    $TEACHER_NAME = filter_input(INPUT_POST, 'TEACHER_NAME');
    $PHONE = filter_input(INPUT_POST, 'PHONE');
    $SUBJECT_ID = filter_input(INPUT_POST, 'SUBJECT_ID');
         $sql_insert="INSERT INTO faculty (TEACHER_ID,TEACHER_NAME,PHONE,SUBJECT_ID) values('$TEACHER_ID','$TEACHER_NAME','$PHONE','$SUBJECT_ID')";
    if(mysqli_query($connect,$sql_insert)){
    echo "New record inserted successfully";
}else{
    echo "could not insert record:".mysqli_error($connect);
}
mysqli_close($connect);
}
 if(isset($_POST['update'])){
         $data=getposts();
    $TEACHER_ID = filter_input(INPUT_POST, 'TEACHER_ID');
    $TEACHER_NAME = filter_input(INPUT_POST, 'TEACHER_NAME');
    $PHONE = filter_input(INPUT_POST, 'PHONE');
    $SUBJECT_ID = filter_input(INPUT_POST, 'SUBJECT_ID');
         $sql_update="UPDATE faculty SET TEACHER_NAME='$TEACHER_NAME',PHONE=$PHONE,SUBJECT_ID=$SUBJECT_ID WHERE TEACHER_ID=$data[0] ";
    if(mysqli_query($connect,$sql_update)){
    echo "Record updated successfully";
}else{
    echo "could not update record:".mysqli_error($connect);
}
mysqli_close($connect);
}
if(isset($_POST['delete'])){
         $data=getposts();
         $sql_delete="DELETE FROM faculty WHERE TEACHER_ID=$data[0] ";
    if(mysqli_query($connect,$sql_delete)){
    echo "Record deleted successfully";
}else{
    echo "could not delete record:".mysqli_error($connect);
}
mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> INSERT_UPDATE_DELETE_SEARCH</title>
</head>
<body>
    <form action="faculty.php" method="post">
        <p>TEACHER ID</p>
        <input type="number" name="TEACHER_ID" placeholder="teacher  id" value="<?php echo $TEACHER_ID;?>" required><br><br>
        <p>TEACHER NAME</p>
        <input type="text" name="TEACHER_NAME" placeholder="teacher name" value="<?php echo $TEACHER_NAME;?>"><br><br>
        <p>PHONE</p>
        <input type="number" name="PHONE" placeholder="phone" value="<?php echo $PHONE;?>"><br><br>
        <p>SUBJECT ID</p>
        <input type="number" name="SUBJECT_ID" placeholder="subject id" value="<?php echo $SUBJECT_ID;?>"><br><br>
         <div>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="search" value="search">
    </div>
    </form>
</body>
</html>
	</div>
	<div class="main">
        <?php
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,"faculty");
$query="SELECT ff.TEACHER_ID,ff.TEACHER_NAME,ff.PHONE,ss.subjettitle
FROM subjects.subjects ss
join faculty.faculty ff
on ss.subjectid = ff.SUBJECT_ID";
$result=mysqli_query($con,$query);
?>
         <table id="tbldata" align="center"  border="1px" style=" text-align: center; width: 600px; line-height: 40px;">
        <tr>
            <th colspan="4" style="color:lime;background-color: white;color: black">RECORDS FOR ALL TEACHERS IN THE SCHOOL</th>
        </tr>
        <t>
            <th style="color:purple">TEACHER ID</th>
            <th style="color:purple">TEACHER NAME</th>
            <th style="color:purple">PHONE</th>
            <th style="color:purple">SUBJECT TITLE</th>
        </t>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>  
            <tr>
            <td style="color: blue"><?php echo $rows['TEACHER_ID'];?></td>
            <td style="color: blue"><?php echo $rows['TEACHER_NAME'];?></td>
             <td style="color: blue"><?php echo $rows['PHONE'];?></td>
            <td style="color: blue"><?php echo $rows['subjettitle'];?></td>
          
            </tr>

        <?php 
        }
        ?>
    </table>
    </div>
	</div>
</div>
</body>
</html>