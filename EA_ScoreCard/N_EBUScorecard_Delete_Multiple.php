<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
		
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//Search records to delete
		if(isset($_POST['delete'])){			
			$deleteRCount = count($_POST['m_delete']);
			
			for ($u=0; $u<$deleteRCount;$u++) {
				$Delete_RUpdate = mysqli_query($link,"DELETE FROM `EBU_ScoreCard` WHERE `EBU_ScoreCard`.`ID` = '".$_POST['m_delete'][$u]."'");
				if($Delete_RUpdate){
					echo "<script language=\"JavaScript\">\n";
					echo "alert('All selected records deleted Successfully!');\n";
					echo "window.location='".$ReportLink."'";
					echo "</script>";
				} else {
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Delete Failed! Please try again.');\n";
					echo "window.location='".$ReportLink."'";
					echo "</script>";
				}
			}
		} //End Save
		
	} //End of Post
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Multiple Records :: Scorecard <?php echo $FromYear." - ".$ToYear; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $css; ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,h1,h2,h3,h4,h5,h6 {
		font-family: "Encode Sans Condensed", Arial, Helvetica, sans-serif;
	}
	</style>
</head>
<body>
<div class="w3-content">

<!-- !PAGE CONTENT! }-->
<div class="w3-main w3-card" style="margin:10px 0;border:1px solid #ccc;">

	<!-- Header-->
	<div class="w3-container w3-green w3-border-bottom" id="Header">
		<h1><b>EBU CARE SCORECARD<?php echo $FromYear." - ".$ToYear; ?></b></h1>
	    	<!--hr style="width:100%;border:3px solid white" class="w3-round"-->		
	</div>
	<div class="w3-container w3-green">
		<h2 class="w3-left">Delete Multiple Scores 	 </h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-responsive w3-padding-16">
			<form method="post" action="<?php echo $MultiDeleteLink;?>">
				<table class="w3-table-all w3-hoverable w3-centered">
					<tr class="w3-pale-green">
						<td colspan="12">
							<b>Your are about to delete records for:</b>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>Agent</td>
						<td>Skillset</td>
						<td>TM</td>
						<td>Month</td>
						<td>Adherence</td>
						<td>NPS</td>
						<td>Interactions</td>
						<td>Revenue</td>
						<td>SRQuality</td>
						<td>EmailQuality</td>
						<td>Uploader/Date</td>
					</tr>
						<?php 
							if(isset($_POST["record"])){
								$recordToDeleteCount = count($_POST["record"]);
							} else {
								$recordToDeleteCount ="";
							}
						
							for($i=0; $i<$recordToDeleteCount; $i++) {
								$result_recordToDelete = mysqli_query($link,"Select * From EBU_ScoreCard Where ID='".$_POST['record'][$i]."'") or die(mysqli_error($link));
								$row_recordToDelete[$i] = mysqli_fetch_assoc($result_recordToDelete);
								if($row_recordToDelete[$i]['Uploader'] == $username){
						?>
					<tr>
						<td>
							<input type="hidden" name="m_delete[]" value="<?php echo $row_recordToDelete[$i]['ID']; ?>">
							<i class="fa fa-toggle-right"></i> 
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Agentname']." (".$row_recordToDelete[$i]['Username'].") - ".$row_recordToDelete[$i]['EKNO']; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Skillset']." (".$row_recordToDelete[$i]['Family'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['TM']; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Month']; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Adherence']." (PDR: ".$row_recordToDelete[$i]['AdherencePRD'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['NPS']." (PDR: ".$row_recordToDelete[$i]['NPSPDR'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Interactions']." (PDR: ".$row_recordToDelete[$i]['InteractionsPDR'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Revenue']." (PDR: ".$row_recordToDelete[$i]['RevenuePDR'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['SRQuality']." (PDR: ".$row_recordToDelete[$i]['SRQualityPDR'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['EmailQuality']." (PDR: ".$row_recordToDelete[$i]['EmailQualityPDR'].")"; ?>
						</td>
						<td>
							<?php echo $row_recordToDelete[$i]['Uploader']." (Uploaded on: ".$row_recordToDelete[$i]['UploadDate'].")"; ?>
						</td>
					</tr>
						<?php	
								} else {
									echo "<script language=\"JavaScript\">\n";
									echo "alert('You can only delete records you added yourself.');\n";
									echo "window.location='".$ReportLink."'";
									echo "</script>";
								}
							}
						?>
					<tr>
						<td colspan="12">
							<input class="w3-button w3-green w3-hover-orange w3-right" name="delete" type="submit" value="Delete Records">
							<a href="<?php echo $ReportLink;?>" class="w3-button w3-green w3-right w3-margin-right"><b>Cancel</b></a>
						</td>
					</tr>
					<tr>
						<td colspan="12">
							<p class="w3-tiny">All selected records will be deleted</p>
						</td>
					</tr>
				</table>
  			</form>
		</div>
	</div>

	<!-- Footer -->
	<footer class="w3-container w3-padding w3-center w3-opacity w3-border-bottom w3-tiny">
		<p class="w3-left ">
			<?php 
				echo "Browser in use: ".$GetBrowser;
			?>
		</p>
		<div class="w3-right">
	  		<p>
	  			Designed by <a href="<?php echo $Author; ?>" target="_blank"><?php echo $AuthorName; ?></a>
	  		</p>
		</div>
	</footer>
</div>
</body>
</html>
