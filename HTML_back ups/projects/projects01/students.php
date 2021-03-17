<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="students.css">
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
    $database='students_database';
    $adm='';
    $name='';
    $gender='';
    $form='';
    $subjectid='';
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    try{
        $connect=mysqli_connect($host,$username,$password,$database);
    }catch(EXCEPTION $ex){
        echo "Error";
    }
      function getposts(){
        $posts=array();
        $posts[0]=$_POST['adm'];
        $posts[1]=$_POST['name'];
        $posts[2]=$_POST['gender'];
        $posts[3]=$_POST['form'];
        
        return $posts;
    }
    if(isset($_POST['search'])){
        $data=getposts();
        $search_query="SELECT * FROM students WHERE adm=$data[0]";
        $search_result=mysqli_query($connect,$search_query);
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
              while($row=mysqli_fetch_array($search_result))
              {
                $adm=$row['adm'];
                $name=$row['name'];
                $gender=$row['gender'];
                $form=$row['form'];
                $subjectid=$row['subjectid'];
              }
            }else{echo "No data for this id";}
        }else{echo "result error";}
    }
     if(isset($_POST['insert'])){
    $adm = filter_input(INPUT_POST, 'adm');
    $name= filter_input(INPUT_POST, 'name');
    $gender = filter_input(INPUT_POST, 'gender');
    $form = filter_input(INPUT_POST, 'form');
    $subjectid = filter_input(INPUT_POST, 'subjectid');
    $phy = filter_input(INPUT_POST, 'phy');
    $bio = filter_input(INPUT_POST, 'bio');
         $sql_insert="INSERT INTO students (adm,name,gender,form,subjectid,phy,bio) values('$adm','$name','$gender','$form','$subjectid','$phy','$bio')";
    if(mysqli_query($connect,$sql_insert)){
    echo "New record inserted successfully";
}else{
    echo "could not insert record:".mysqli_error($connect);
}
mysqli_close($connect);
}
 if(isset($_POST['update'])){
         $data=getposts();
    $adm = filter_input(INPUT_POST, 'adm');
    $name= filter_input(INPUT_POST, 'name');
    $gender = filter_input(INPUT_POST, 'gender');
    $form = filter_input(INPUT_POST, 'form');
    $subjectid = filter_input(INPUT_POST, 'subjectid');
         $sql_update="UPDATE students SET name='$name',gender='$gender',form=$form,subjectid=$subjectid ,phy=$phy,bio=$bio WHERE adm=$data[0] ";
    if(mysqli_query($connect,$sql_update)){
    echo "Record updated successfully";
}else{
    echo "could not update record:".mysqli_error($connect);
}
mysqli_close($connect);
}
if(isset($_POST['delete'])){
         $data=getposts();
         $sql_delete="DELETE FROM students WHERE adm=$data[0] ";
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
    <style type="text/css">
        .multiselect{
            width: 200px;
            transform: translate(50%,50%);
        }
        .selectbox{
            position: relative;
        }
        .selectbox select
        {
            width: 100%;
            font-weight: bold;
            font-family: serif;
            color: red;
        }
        .overselect{
            position: absolute;
            left: 0;right: 0;top: 0;bottom: 0;
        }
        #checkboxes
        {
            display: none;
            border: 1px red solid;
        }
        #checkboxes label
        {
            display: block;
        }
        #checkboxes label:hover
        {
            background-color: #1e90ff;
        }
    </style>
</head>
<body>
    <form action="students.php" method="post">
        <p>ADM</p>
        <input type="number" name="adm" placeholder="adm" value="<?php echo $adm;?>" required><br><br>
        <p>STUDENT NAME</p>
        <input type="text" name="name" placeholder="student name" value="<?php echo $name;?>"><br><br>
        <p>GENDER</p>
        <input type="text" name="gender" placeholder="gender" value="<?php echo $gender;?>"><br><br>
         <p>FORM</p>
        <input type="number" name="form" placeholder="form" value="<?php echo $form;?>"><br><br>
    <div class="multiselect">
        <div class="selectbox" onclick="showCheckboxes()">
            <select>
                <option>SELECT SUBJECT</option>
            </select>
            <div class="overselect"></div>
        </div>
        <div id="checkboxes">
            <label><input type="checkbox" name="subjectid" value="100">CHEM F1</label>
            <label><input type="checkbox" name="subjectid" value="200">PHY F1</label>
            <label><input type="checkbox" name="bio" value="300">BIO F1</label>
        </div>
    </div>
<script type="text/javascript">
    var expanded=false;
    function showCheckboxes(){
        var checkboxes=document.getElementById('checkboxes');
        if(!expanded){
            checkboxes.style.display="block";
            expanded=true;
        }else{
            checkboxes.style.display="none";
            expanded=false;
        }
    }
</script>
      <br><br>
      <br><br>
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
mysqli_select_db($con,"students_database");
$query1="SELECT count(*)
FROM students WHERE gender='male'";
$query="SELECT count(*)
FROM students WHERE gender='female'";
$result1=mysqli_query($con,$query1);
$result=mysqli_query($con,$query);
?>
        
        <?php
        while($rows1=mysqli_fetch_assoc($result1))
        {
        ?> 
        <p>TOTAL NUMBER OF BOYS </p>
        <input type="" name="" value=" <?php echo $rows1['count(*)'];?>" ><br><br>
        <?php
         while($rows=mysqli_fetch_assoc($result))
          { 
          ?>  
        <h2></h2>
         <p>TOTAL NUMBER OF GIRLS </p>
        <input type="" name="" value=" <?php echo $rows['count(*)'];?>" >
           
        <?php 
        }
           
        }
        ?>
	</div>
</div>
</body>
</html>