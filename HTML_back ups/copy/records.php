<?php
$con=mysqli_connect('localhost','id15461809_milk','E^d-84Z1<8o@5uHM');
mysqli_select_db($con,"id15461809_milk_records");
$query="SELECT ID,DATE,LITRES
FROM milk_table";
$result=mysqli_query($con,$query);
?>
         <table align="center"  border="1px" style=" text-align: center; width: 90%; line-height: 50px;font-size:32px">
        <tr>
            <th colspan="7" style="color:white;background-color: black;font-weight: bold;font-family: serif;font:italic;">MILK RECORDS</th>
        </tr>
        <t>
              <th style="color:purple">ID</th>
            <th style="color:purple">DATE</th>
            <th style="color:purple">LITRES</th>
      

        </t>
        <?php
        while($rows=mysqli_fetch_assoc($result))
        {
        ?>  
            <tr>
             <td style="color: blue"><?php echo $rows['ID'];?></td>
             <td style="color: blue"><?php echo $rows['DATE'];?></td>
             <td style="color: blue"><?php echo $rows['LITRES'];?></td>
          
            </tr>

        <?php 
        }
        ?>
    </table>
    </div>