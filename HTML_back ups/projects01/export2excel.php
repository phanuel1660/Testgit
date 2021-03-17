<?php
include 'dbcontroller.php';
$db_handle=new DBcontroller();
$productResult= $db_handle->runQuery("select * from faculty");
if(isset($_POST['export'])){
	$filename="Export_excel.xls";
	header("Content-Type:application/xls");
	header("Content-Disposition:attachment;filename=Export_excel.xls");
	$header=false;
	if(!empty($productResult)){
		foreach($productResult as $row){
      if(! $header){
      	echo implode("\t", array_keys($row)). "\n";
          $header=true;
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
				<th>#</th>
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
					<td><?php echo $productResult[$key]["#"];?></td>
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