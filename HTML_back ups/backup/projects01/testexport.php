<?php
class DBcontroller
{
	private $host ="localhost";
	private $user ="root";
	private $password ="admin";
	private $database ="faculty";
	private $conn;
	
	function __construct()
	{
		$this->conn=$this->connectDB();
	}
	function connectDB(){
		$conn=mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	function runQuery($query){
		$result=mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)){
			$resultset[] =$row;
		}
		if(!empty($resultset))
			return $resultset;
	}
}
$db_handle=new DBcontroller();
$productResult= $db_handle->runQuery("select * from faculty");
if(isset($_POST['export'])){
	$filename="Export_excel.xls";
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment;filename=\"$filename\"");
	$isPrintHeader=false;
	if(!empty($productResult)){
		foreach($productResult as $row){
      if(! $isPrintHeader){
      	echo implode("\t", array_keys($row)). "\n";
          $isPrintHeader=true;
          }
          echo implode("\t", array_values($row)). "\n";
		}
	}
	exit();
}
?>
<div>
	<table>
		<thead>
			<tr>
				<th>TEACHER_ID</th>
				<th>TEACHER_NAME</th>
				<th>PHONE</th>
                <th>SUBJECT_ID</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$query =$db_handle->runQuery("select * from faculty");
			if(!empty($productResult)){
				foreach ($productResult as $key => $value){
				?>
				<tr>
					<td><?php echo $productResult[$key]["TEACHER_ID"];?></td>
					<td><?php echo $productResult[$key]["TEACHER_NAME"];?></td>
					<td><?php echo $productResult[$key]["PHONE"];?></td>
					<td><?php echo $productResult[$key]["SUBJECT_ID"];?></td>
				</tr>
				<?php	
				}
			}
			?>
		</tbody>
	</table>
	<div>
		<form>
			
			<input type="submit" name="export" value="export">
		</form>
	</div>
</div>