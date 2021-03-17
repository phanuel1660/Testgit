<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="faculty.css">
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
		<?php
   
    $host='localhost';
    $username='root';
    $password='admin';
    $database='subjects';
    $subjectid='';
    $subjettitle='';
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    try{
    	$connect=mysqli_connect($host,$username,$password,$database);
    }catch(EXCEPTION $ex){
    	echo "Error";
    }
      function getposts(){
    	$posts=array();
    	$posts[0]=$_POST['subjectid'];
    	$posts[1]=$_POST['subjettitle'];
    	return $posts;
    }
    if(isset($_POST['search'])){
    	$data=getposts();
    	$search_query="SELECT * FROM subjects WHERE subjectid=$data[0]";
    	$search_result=mysqli_query($connect,$search_query);
    	if($search_result)
    	{
    		if(mysqli_num_rows($search_result))
            {
              while($row=mysqli_fetch_array($search_result))
              {
                $subjectid=$row['subjectid'];
                $subjettitle=$row['subjettitle'];
              }
    		}else{echo "No data for this id";}
    	}else{echo "result error";}
    }
     if(isset($_POST['insert'])){
    $subjectid = filter_input(INPUT_POST, 'subjectid');
    $subjettitle = filter_input(INPUT_POST, 'subjettitle');
    	 $sql_insert="INSERT INTO subjects (subjectid,subjettitle) values('$subjectid','$subjettitle')";
    if(mysqli_query($connect,$sql_insert)){
    echo "New record inserted successfully";
}else{
    echo "could not insert record:";
}
mysqli_close($connect);
}
 if(isset($_POST['update'])){
 	     $data=getposts();
    $subjectid = filter_input(INPUT_POST, 'subjectid');
    $subjettitle = filter_input(INPUT_POST, 'subjettitle');
    	 $sql_update="UPDATE subjects SET subjettitle='$subjettitle' WHERE subjectid=$data[0] ";
    if(mysqli_query($connect,$sql_update)){
    echo "Record updated successfully";
}else{
    echo "could not update record:".mysqli_error($connect);
}
mysqli_close($connect);
}
if(isset($_POST['delete'])){
 	     $data=getposts();
    	 $sql_delete="DELETE FROM subjects WHERE subjectid=$data[0] ";
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
    <form action="sub_ject.php" method="post">
    	<p>SUBJECT ID</p>
    	<input type="number" name="subjectid" placeholder="subject id" value="<?php echo $subjectid;?>" required><br><br>
    	<p>SUBJECT TITLE</p>
    	<input type="text" name="subjettitle" placeholder="subject title" value="<?php echo $subjettitle;?>"><br><br>
         <div>
         	<br><br>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="search" value="Search">
    </div>
    </form>
</body>
</html>
	</div>
	<div class="main">
		<?php
$con=mysqli_connect('localhost','root','admin');
mysqli_select_db($con,"subjects");
$query="SELECT ss.subjectid,ss.subjettitle,ff.TEACHER_NAME
FROM subjects.subjects ss
join faculty.faculty ff
on ss.subjectid = ff.SUBJECT_ID";
$result=mysqli_query($con,$query);
?>
		 <table align="center"  border="1px" style=" text-align: center; width: 600px; line-height: 40px;">
        <tr>
            <th colspan="7" style="color:white;background-color: black;font-weight: bold;font-family: serif;font:italic;">ALL SUBJECTS FROM FORM 1 TO FORM 4 AGAINST THE TEACHER</th>
        </tr>
        <t>
            <th style="color:purple">SUBJECT ID</th>
            <th style="color:purple">SUBJECT TITLE</th>
            <th style="color:purple">TEACHER NAME</th>
      

        </t>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>  
            <tr>
            <td style="color: blue"><?php echo $rows['subjectid'];?></td>
            <td style="color: blue"><?php echo $rows['subjettitle'];?></td>
             <td style="color: blue"><?php echo $rows['TEACHER_NAME'];?></td>
          
            </tr>

        <?php 
        }
        ?>
    </table>
	</div>
</div>
</body>
</html>