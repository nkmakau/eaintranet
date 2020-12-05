<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
	
	
	if(isset($_GET['Page'])){
		$Page = $_GET['Page'];
	} else {
		$Page =  1;
	}
	if(isset($_GET['SDate'])){
		$SDate =$_GET['SDate'];
	} else {
		$SDate =  "%%";
	}
	if(isset($_GET['SMonth'])){
		$SMonth = $_GET['SMonth'];
	} else {
		$SMonth =  "%%";
	}
	if(isset($_GET['SSubmitter'])){
		$SSubmitter =  $_GET['SSubmitter'];
	} else {
		$SSubmitter =   "%%";
	}
	if(isset($_GET['SAgent'])){
		$SAgent =  $_GET['SAgent'];
	} else {
		$SAgent =   "%%";
	}
	if(isset($_GET['FYear'])){
		$FYear =  $_GET['FYear'];
	} 
		
	$RowsPerPage = 10000;
	$offset =  (($Page-1)*$RowsPerPage);
	
	//Get Total Records
	$result_totalRecords = mysqli_query($link,"
		SELECT COUNT(ID) AS TotalRecords
		FROM EBU_ScoreCard
		Where UploadDate LIKE '".$SDate."' AND Month LIKE '".$SMonth."' AND Uploader LIKE '".$SSubmitter."' AND Agentname LIKE '".$SAgent."'  AND FYear LIKE '".$FYear."'") or die(mysqli_error($link));
	$row_totalRecords = mysqli_fetch_array($result_totalRecords);
	$TotalRecords = $row_totalRecords['TotalRecords'];
	
	$TotalPages = ceil($TotalRecords / $RowsPerPage);
	
	//Get all search data 
	$result_getData = mysqli_query($link,"SELECT * FROM `EBU_ScoreCard` 
		Where UploadDate LIKE '".$SDate."' AND Month LIKE '".$SMonth."' AND Uploader LIKE '".$SSubmitter."' AND Agentname LIKE '".$SAgent."' AND FYear LIKE '".$FYear."' Order by UploadDate DESC
		LIMIT $offset, $RowsPerPage") or die(mysqli_error($link));
	$row_getData = mysqli_fetch_array($result_getData);
	$TotalData = mysqli_num_rows($result_getData);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Search Results :: Scorecard<?php echo $FromYear." - ".$ToYear; ?></title>
<?php 
	$filename = "EBU-Scorecard-for-(".$FromYear."-".$ToYear.")-".Date('d-M-Y').".xls"; 
	header("Cache_Control: private");
	header("Pragma: cache");
	header('Content-type: application/ms-excel');
	header('Content-disposition: attachment; filename='.$filename);
?>
	<meta charset="UTF-8">
	<style>
		table th {background-color:#000;}
		table th, td {background-color:#fff;border:1px solid #000;}
	</style>
</head>
<body>
<div>

<!-- !PAGE CONTENT! }-->
<div>

	<!-- Header-->
	<div>
		<h1><b>EBU CARE SCORECARD <?php echo $FromYear." - ".$ToYear; ?></b></h1>	
	</div>
	<div>
		<p><b>Welcome <?php echo $row_getUser['name']." - (".$row_getUser['ekno2']; ?>)</b> Thank you for downloading the report.</p>
	</div>
				<table>
						<tr>
							<td colspan="22">
								<?php echo $Page; ?> / <?php echo $TotalPages; ?> Pages. | Search results <?php echo $TotalRecords; ?>
							</td>
						</tr>
					<tr>
						<th>ID</th>
						<th>Date</th>
						<th>EK No</th>
						<th>Agent Name</th>
						<th>User Name</th>
						<th>Skillset</th>
						<th>Family</th>
						<th>Manager</th>
						<th>Month</th>
						<th>Adherence</th>
						<th>Adherence PDR</th>
						<th>NPS</th>
						<th>NPS PDR</th>
						<th>Interaction</th>
						<th>Interaction PDR</th> 
						<th>Revenue</th>
						<th>Revenue PDR</th>
						<th>SR Quality</th>
						<th>SR Quality PDR</th>
						<th>Email</th>
						<th>Email PDR</th>
						<th>Submitter</th>
					</tr>
					<?php 
						if($TotalData > 0){
							do {
					?>
					<tr>
						<td><?php echo $row_getData['ID']; ?></td>
						<td><?php echo $row_getData['UploadDate']; ?></td>
						<td><?php echo $row_getData['EKNO']; ?></td>
						<td><?php echo $row_getData['Agentname']; ?></td>
						<td><?php echo $row_getData['Username']; ?><td>
						<td><?php echo $row_getData['Skillset']; ?></td>
						<td><?php echo $row_getData['Family']; ?></td>
						<td><?php echo $row_getData['TM']; ?></td>
						<td><?php echo $row_getData['Month']; ?></td>
						<td>
							<?php 
								if(is_numeric($row_getData['Adherence'])){
									echo $row_getData['Adherence']; 
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['Adherence'])){
									echo $row_getData['AdherencePRD']; 
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['NPS'])){
									echo ($row_getData['NPS']*100);
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['NPSPDR'])){
									echo ($row_getData['NPSPDR']);
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['Interactions'])){
									echo $row_getData['Interactions'];
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['InteractionsPDR'])){
									echo $row_getData['InteractionsPDR'];
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['Revenue'])){
									echo $row_getData['Revenue']; 
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['RevenuePDR'])){
									echo $row_getData['RevenuePDR']; 
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['SRQuality'])){
									echo $row_getData['SRQuality']; 
								} else {
									echo "Not Apply";
								}
							?>
						</td>
							<?php 
								if(is_numeric($row_getData['SRQualityPDR'])){
									echo $row_getData['SRQualityPDR']; 
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['EmailQuality'])){
									echo $row_getData['EmailQuality'];
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td>
							<?php 
								if(is_numeric($row_getData['EmailQualityPDR'])){
									echo $row_getData['EmailQualityPDR'];
								} else {
									echo "Not Apply";
								}
							?>
						</td>
						<td><?php echo $row_getData['Uploader']; ?></td>
					</tr>	
					<?php 
							} while ($row_getData = mysqli_fetch_array($result_getData));
						} else {
					?>
					<tr>
						<td colspan="22">No records! Please search again.</td>
					</tr>
					<?php		
						}
					?>
					<tr>
						<td colspan="22">
							<?php echo $Page; ?> / <?php echo $TotalPages; ?> Pages. | Search results <?php echo $TotalRecords; ?>
						</td>
					</tr>
				</table>
			</div>
	</div>
</div>
</body>
</html>
