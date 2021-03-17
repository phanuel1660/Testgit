<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="form(1)4.css">
   <title></title>
</head>
<body>
   <div class="header">
      <h4>SINENDENT MIXED DAY SECONDARY SCHOOL<br>P.O.BOX 000-20152 OLENGURUONE</h4>
   </div>
<div class="body">
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
    echo "Record inserted successfully";
}else{
    echo "could not insert record:".mysqli_error($connect);
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
   <title> INSERT UPDATE DELETE SEARCH</title>
</head>
<body>
    <form action="Actions.php" method="post">
      <input type="number" name="subjectid" placeholder="subjectid" value="<?php echo $subjectid;?>" required><br><br>
      <input type="text" name="subjettitle" placeholder="subjettitle" value="<?php echo $subjettitle;?>"><br><br>
         <div>
        <input type="submit" name="insert" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="search" value="search">
    </div>
    </form>
</body>
</html>
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