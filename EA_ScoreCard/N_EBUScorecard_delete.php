<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
	
	if(isset($_GET['X'])){
		$ID = $_GET['X'];
	} else {
		header('location: '.$ReportLink.'');
	}
	 
	 //Get ID data if available
	$result_getIDData= mysqli_query($link,"SELECT * FROM `EBU_ScoreCard` WHERE ID=$ID");
	$row_getIDData = mysqli_fetch_array($result_getIDData);
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//Search records
		if(isset($_POST['delete'])){
						
			$delete_data = mysqli_query($link,"DELETE FROM `EBU_ScoreCard` WHERE `EBU_ScoreCard`.`ID` = '".$ID."'");
			if($delete_data){
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Record deleted Successfully!');\n";
				echo "window.location='".$ReportLink."'";
				echo "</script>";
			} else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Record Delete Failed!');\n";
				echo "window.location='".$SingleDeleteLink."?X=".$ID."'";
				echo "</script>";
			}
		}
		
	} //End of Post
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete :: Scorecard <?php echo $FromYear." - ".$ToYear; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="N_EBUScorecard/css/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,h1,h2,h3,h4,h5,h6 {
		font-family: "Encode Sans Condensed", Arial, Helvetica, sans-serif;
	}
	</style>
</head>
<body>
<div  class="w3-content">

<!-- !PAGE CONTENT! }-->
<div class="w3-main w3-card" style="margin:10px 0;border:1px solid #ccc;">

	<!-- Header-->
	<div class="w3-container w3-green w3-border-bottom" id="Header">
		<h1><b>EBU CARE SCORECARD <?php echo $FromYear." - ".$ToYear; ?></b></h1>
	    	<!--hr style="width:100%;border:3px solid white" class="w3-round"-->		
	</div>
	<div class="w3-container w3-green">
		<h2 class="w3-left">Delete Record</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-responsive w3-padding-16">
			<form method="post" action="<?php echo $SingleDeleteLink; ?>?X=<?php echo $ID;?>">
				<table class="w3-table-all w3-hoverable w3-centered">
					<tr class="w3-pale-green">
						<td colspan="7">
							Your are about to delete data for <b><?php echo $row_getIDData['Agentname']." (".$row_getIDData['Username'].") - ".$row_getIDData['EKNO']; ?></b> of <b><?php echo $row_getIDData['Skillset']." (".$row_getIDData['Family'].")"; ?></b>  uploaded on <b><?php echo date("d M Y H:i A",strtotime($row_getIDData['UploadDate'])); ?></b>  by <b><?php echo $row_getIDData['Uploader']; ?></b>. <br> The Agents manager is <b><?php echo $row_getIDData['TM']; ?></b>.
						</td>
					</tr>
					<tr>
						<th>Month</th>
						<td>
							<select class="w3-input w3-border w3-border-grey" name="SMonth">
								<option value="<?php echo $row_getIDData['Month'] ?>"><?php echo $row_getIDData['Month'] ?></option>
							</select>
						</td>
					<tr>
						<th>&nbsp;</th>
						<th>Adherence</th>
						<th>NPS</th>
						<th>Interactions</th>
						<th>Revenue</th>
						<th>SR Quality</th>
						<th>Email</th>
					</tr>
					<tr>
						<th>Scores</th>
						<td><input class="w3-input w3-border w3-border-grey" name="SAdherence" type="number"  min="0" max="100" step=".01" value="<?php echo $row_getIDData['Adherence']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SNPS" type="number" min="0" max="100" step=".01" value="<?php echo $row_getIDData['NPS']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SInteractions" type="number" step=".01" value="<?php echo $row_getIDData['Interactions']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SRevenue" type="number" step=".01" value="<?php echo $row_getIDData['Revenue']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SSRQuality" min="0" max="100" type="number" step=".01" value="<?php echo $row_getIDData['SRQuality']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SEmailQuality" min="0" max="100" type="number" step=".01" value="<?php echo $row_getIDData['EmailQuality']; ?>"></td>
					</tr>
					<tr>
						<th>PDR</th>
						<td><input class="w3-input w3-border w3-border-grey" name="SAdherencePRD" min="1" max="5" type="number" value="<?php echo $row_getIDData['AdherencePRD']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SNPSPDR" min="1" max="5" type="number" value="<?php echo $row_getIDData['NPSPDR']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SInteractionsPDR" min="1" max="5" type="number" value="<?php echo $row_getIDData['InteractionsPDR']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SRevenuePDR" min="1" max="5" type="number" value="<?php echo $row_getIDData['RevenuePDR']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SSRQualityPDR" min="1" max="5" type="number" value="<?php echo $row_getIDData['SRQualityPDR']; ?>"></td>
						<td><input class="w3-input w3-border w3-border-grey" name="SEmailQualityPDR" min="1" max="5" type="number" value="<?php echo $row_getIDData['EmailQualityPDR']; ?>"></td>
					</tr>
					<tr>
						<td colspan="7">
							<input class="w3-button w3-green w3-hover-orange w3-right" name="delete" type="submit" value="Delete Record">
							<a href="<?php echo $ReportLink; ?>" class="w3-button w3-green w3-right w3-margin-right"><b>Cancel</b></a>
						</td>
					</tr>
					<tr>
						<td colspan="7">
							<p class="w3-tiny">Blank = Not Apply</p>
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
	
	<!-- Tabs Placement -->
<script>
</body>
</html>
