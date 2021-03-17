<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="sidebar">
        <?php
   
    $host='localhost';
    $username='id15461809_milk';
    $password='E^d-84Z1<8o@5uHM';
    $database='id15461809_milk_records';
    $id='';
    $date='';
    $number='';
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    try{
        $connect=mysqli_connect($host,$username,$password,$database);
    }catch(EXCEPTION $ex){
        echo "Error";
    }
      function getposts(){
        $posts=array();
        $posts[0]=$_POST['id'];
        $posts[1]=$_POST['date'];
        $posts[2]=$_POST['number'];
        return $posts;
    }
    if(isset($_POST['search'])){
        $data=getposts();
        $search_query="SELECT * FROM milk_table WHERE ID=$data[0]";
        $search_result=mysqli_query($connect,$search_query);
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
              while($row=mysqli_fetch_array($search_result))
              {
                $id=$row['ID'];
                $date=$row['DATE'];
                $number=$row['LITRES'];
              }
            }else{echo "No data for this id";}
        }else{echo "result error";}
    }
     if(isset($_POST['insert'])){
    $date = filter_input(INPUT_POST, 'date');
    $number = filter_input(INPUT_POST, 'number');
         $sql_insert="INSERT INTO milk_table (DATE,LITRES) values('$date','$number')";
    if(mysqli_query($connect,$sql_insert)){
    echo "New record inserted successfully";
}else{
    echo "could not insert record:";
}
mysqli_close($connect);
}
 if(isset($_POST['update'])){
         $data=getposts();
    $id = filter_input(INPUT_POST, 'id');
    $date = filter_input(INPUT_POST, 'date');
    $number = filter_input(INPUT_POST, 'number');
         $sql_update="UPDATE milk_table SET DATE='$date',LITRES='$number' WHERE ID=$data[0] ";
    if(mysqli_query($connect,$sql_update)){
        echo "Record updated successfully!";
}else{
    echo "could not update record:".mysqli_error($connect);
}
mysqli_close($connect);
}
if(isset($_POST['delete'])){
         $data=getposts();
         $sql_delete="DELETE FROM milk_table WHERE ID=$data[0] ";
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
    <form action="modify.php" method="post">
         <p>ID</p>
        <input type="number" name="id" placeholder="id" value="<?php echo $id;?>"><br><br>
        <p>date</p>
        <input type="date" name="date" placeholder="date" value="<?php echo $date;?>"><br><br>
        <p>litres</p>
        <input type="number" name="number" placeholder="number" value="<?php echo $number;?>"><br><br>
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
</body>
</html>