<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<title></title>
     <style type="text/css">
        #chart-container{
            width: 640px;
            height: auto;
            background-color:white;
            position:relative;
            left: 0%;
            top: 10%;
        }
    </style>
</head>
<body>
	<div class="wrapper">
	<div class="header">
		<p>USIJALI SECONDARY SCHOOL<br>P.O BOX 163-20152 OLENGURUONE</p>
	</div>
	<div class="homebtn">
		<a href="login.html">LOGOUT</a>
	</div>
    
    <br><br>
	<hr>
	<div class="sidebar">
        <h4 style="color: chocolate;">GRADE STUDENT</h4>
        <hr style="border: 2px solid brown">
        <?php
   
    $host='localhost';
    $username='root';
    $password='admin';
    $database='students_database';
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
        $posts[0]=$_POST['adm'];
        $posts[1]=$_POST['marks'];
        return $posts;
    }
    if(isset($_POST['search'])){
        $data=getposts();
        $search_query="SELECT * FROM exams WHERE adm=$data[0]";
        $search_result=mysqli_query($connect,$search_query);
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
              while($row=mysqli_fetch_array($search_result))
              {
                $adm=$row['adm'];
                $marks=$row['marks'];
              }
            }else{echo "No data for this adm";}
        }else{echo "result error";}
    }
     if(isset($_POST['insert'])){
    $adm = filter_input(INPUT_POST, 'adm');
    $marks = filter_input(INPUT_POST, 'marks');
         $sql_insert="INSERT INTO exams (adm,marks) values('$adm','$marks')";
    if(mysqli_query($connect,$sql_insert)){
    echo "Graded successfully";
}else{
    echo "Could not grade";
}
mysqli_close($connect);
}
 if(isset($_POST['update'])){
         $data=getposts();
    $adm = filter_input(INPUT_POST, 'adm');
    $marks = filter_input(INPUT_POST, 'marks');
         $sql_update="UPDATE exams SET marks='$marks' WHERE adm=$data[0] ";
    if(mysqli_query($connect,$sql_update)){
    echo "Grade updated successfully";
}else{
    echo "could not update".mysqli_error($connect);
}
mysqli_close($connect);
}
if(isset($_POST['delete'])){
         $data=getposts();
         $sql_delete="DELETE FROM exams WHERE adm=$data[0] ";
    if(mysqli_query($connect,$sql_delete)){
    echo "Grade deleted successfully";
}else{
    echo "could not delete grade:".mysqli_error($connect);
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
    <form action="homepage.php" method="post">
        <p>ADM</p>
        <input type="number" name="adm" placeholder="adm" value="<?php echo $adm;?>" required><br><br>
        <p>MARK</p>
        <input type="number" name="marks" placeholder="marks" value="<?php echo $marks;?>"><br><br>
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
        <div class="graph">
            <h4>PERFORMANCE GRAPH</h4>
                   <div id="chart-container">
        <canvas id="mycanvas"></canvas>
        
    </div>
    <script type="text/javascript" src="js/jquery1.js"></script>
    <script type="text/javascript" src="js/Chart.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
       
    </div> 
     <div class="msg">
            <h5 style="color: white;font-weight: bold;font-family: serif;"
            >SEND MESSAGE TO ALL PARENTS</h5>
            <form>
     <textarea></textarea><br>
     <input type="submit" name="send" value="SEND">
     </form>
     </div>
        </div>
	</div>
    <div class="menu">
          <style>
            body{
                font-family: "Lato",sans-serif;
                transition:background-color.5s;
            }
            .sidenav{
                height: 1124.5%;
                width:0%;
                position:fixed;
                z-index: 1;
                top: 145.52%;
                left: 6%;
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
            <a href="faculty.php">TEACHERS</a>
            <a href="students.php">STUDENTS</a>
            <a href="#">FEES</a>
            <a href="sub_ject.php">SUBJECTS</a> 
            <a href="form(one).php">FORM ONE</a>
            <a href="form(two).php">FORM TWO</a>
            <a href="form(three).php">FORM THREE</a> 
            <a href="form(four).php">FORM FOUR</a> 
        </div>
             <span style="color: white; font-size: 24px; cursor:
             pointer"
             onclick="openNav()">&#9776;MENU
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
</body>
</html>