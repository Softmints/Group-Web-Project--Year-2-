<?php
//Connect to database
	include 'extras/connect.php';
	$InvestorID=$_COOKIE['userID'];
			//get only the relavent productions for investor
			$result = mysqli_query($mysqli,"SELECT p.ProductionName, ir.ReportName, ir.ReportURL, ir.UDate from investorreports ir, investedProduction ip, production p where ip.ProductionNo=p.ProductionNo and p.ProductionNo=ir.ProductionNo and ip.InvestorNo='$InvestorID' ORDER BY ir.Udate ");
			while($row = mysqli_fetch_assoc($result)){
				//display reports for productions
				echo"<tr>
						<td>".$row['ProductionName']."</td>
						<td><a href='".$row['ReportURL']."' download>".$row['ReportName']."</td>
						<td>".$row['UDate']."</td>
						</tr>";
			}
			//close database connection
			$mysqli->close();
		
?>