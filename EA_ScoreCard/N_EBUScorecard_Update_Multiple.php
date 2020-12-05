<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
		
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		
		//Search records
		if(isset($_POST['update'])){
			
			if(!empty($_POST['SAdherence'])){
				$SAdherence = $_POST['SAdherence'];
			} else {
				$SAdherence = "Not Apply";
			}
			
			if(!empty($_POST['SNPS'])){
				$SNPS = $_POST['SNPS'];
			} else {
				$SNPS = "Not Apply";
			}
			
			if(!empty($_POST['SInteractions'])){
				$SInteractions = $_POST['SInteractions'];
			} else {
				$SInteractions = "Not Apply";
			}
			
			if(!empty($_POST['SRevenue'])){
				$SRevenue = $_POST['SRevenue'];
			} else {
				$SRevenue = "Not Apply";
			}
			
			if(!empty($_POST['SSRQuality'])){
				$SSRQuality = $_POST['SSRQuality'];
			} else {
				$SSRQuality = "Not Apply";
			}
			
			if(!empty($_POST['SEmailQuality'])){
				$SEmailQuality = $_POST['SEmailQuality'];
			} else {
				$SEmailQuality = "Not Apply";
			}
			
			if(!empty($_POST['SAdherencePRD'])){
				$SAdherencePRD = $_POST['SAdherencePRD'];
			} else {
				$SAdherencePRD = "Not Apply";
			}
			
			if(!empty($_POST['SNPSPDR'])){
				$SNPSPDR = $_POST['SNPSPDR'];
			} else {
				$SNPSPDR = "Not Apply";
			}
			
			if(!empty($_POST['SInteractionsPDR'])){
				$SInteractionsPDR = $_POST['SInteractionsPDR'];
			} else {
				$SInteractionsPDR = "Not Apply";
			}
			
			if(!empty($_POST['SRevenuePDR'])){
				$SRevenuePDR = $_POST['SRevenuePDR'];
			} else {
				$SRevenuePDR = "Not Apply";
			}
			
			if(!empty($_POST['SSRQualityPDR'])){
				$SSRQualityPDR = $_POST['SSRQualityPDR'];
			} else {
				$SSRQualityPDR = "Not Apply";
			}
			
			if(!empty($_POST['SEmailQualityPDR'])){
				$SEmailQualityPDR = $_POST['SEmailQualityPDR'];
			} else {
				$SEmailQualityPDR = "Not Apply";
			}
			
			$updateRCount = count($_POST['m_update']);
			
			for ($u=0; $u<$updateRCount;$u++) {
				$insert_RUpdate = mysqli_query($link,"UPDATE `EBU_ScoreCard` SET  
						Adherence = '".$SAdherence."', 
						AdherencePRD = '".$SAdherencePRD."',
						NPS = '".$SNPS."',  
						NPSPDR = '".$SNPSPDR."',  
						Interactions = '".$SInteractions."',  
						InteractionsPDR = '".$SInteractionsPDR."',  
						Revenue = '".$SRevenue."',  
						RevenuePDR = '".$SRevenuePDR."',  
						SRQuality = '".$SSRQuality."',  
						SRQualityPDR = '".$SSRQualityPDR."',  
						EmailQuality = '".$SEmailQuality."',  
						EmailQualityPDR = '".$SEmailQualityPDR."',
						FYear = '".$FYear."',  
						Uploader = '".$username."',  
						UploadDate =  '".$DateTime."'
						Where ID = '".$_POST['m_update'][$u]."'");
				if($insert_RUpdate){
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Update Successfull!');\n";
					echo "window.location='".$ReportLink."'";
					echo "</script>";
				} else {
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Update Failed! Please try again.');\n";
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
	<title>Update :: Scorecard <?php echo $FromYear." - ".$ToYear; ?></title>
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
		<h2 class="w3-left">Update Multiple Agent Scores</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-responsive w3-padding-16">
			<form method="post" action="<?php echo $MultiUpdateLink; ?>">
				<table class="w3-table-all w3-hoverable w3-centered">
					<tr class="w3-pale-green">
						<td colspan="7">
							<b>Your are updating data for:</b>
						</td>
					</tr>
						<?php 
							if(isset($_POST["record"])){
								$recordToUpdateCount = count($_POST["record"]);
							} else {
								$recordToUpdateCount ="";
							}
							
							for($i=0; $i<$recordToUpdateCount; $i++) {
								$result_recordToUpdate = mysqli_query($link,"Select * From EBU_ScoreCard Where ID='".$_POST['record'][$i]."'") or die(mysqli_error($link));
								$row_recordToUpdate[$i] = mysqli_fetch_assoc($result_recordToUpdate);
								if($row_recordToUpdate[$i]['Uploader'] == $username){
						?>
					<tr>
						<td colspan="7">
							<input type="hidden" name="m_update[]" value="<?php echo $row_recordToUpdate[$i]['ID']; ?>">
							<i class="fa fa-toggle-right"></i> <?php echo $row_recordToUpdate[$i]['Agentname']." (".$row_recordToUpdate[$i]['Username'].") - ".$row_recordToUpdate[$i]['EKNO']; ?>
						</td>
					</tr>
						<?php	
								} else {
									echo "<script language=\"JavaScript\">\n";
									echo "alert('You can only update records you added yourself.');\n";
									echo "window.location='".$ReportLink."'";
									echo "</script>";
								}
							}
						?>
					<tr>
						<th>Month</th>
						<td>
							<select class="w3-input w3-border w3-border-grey" name="SMonth">
									<option value="<">-- Select Month --</option>
									<option value="<?php echo $m1; ?>"><?php echo $m1; ?></option>
									<option value="<?php echo $m2; ?>"><?php echo $m2; ?></option>
									<option value="<?php echo $m3; ?>"><?php echo $m3; ?></option>
									<option value="<?php echo $m4; ?>"><?php echo $m4; ?></option>
									<option value="<?php echo $m5; ?>"><?php echo $m5; ?></option>
									<option value="<?php echo $m6; ?>"><?php echo $m6; ?></option>
									<option value="<?php echo $m7; ?>"><?php echo $m7; ?></option>
									<option value="<?php echo $m8; ?>"><?php echo $m8; ?></option>
									<option value="<?php echo $m9; ?>"><?php echo $m9; ?></option>
									<option value="<?php echo $m10; ?>"><?php echo $m10; ?></option>
									<option value="<?php echo $m11; ?>"><?php echo $m11; ?></option>
									<option value="<?php echo $m12; ?>"><?php echo $m12; ?></option>
							</select>
						</td>
						<th>Financial Year</th>
						<td>
							<select class="w3-input w3-border w3-border-grey" name="SFYear">
									<option value="<">-- Select Month --</option>
									<option value="<?php echo $FYear; ?>"><?php echo $FYear; ?></option>
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
							<b><input class="w3-button w3-green w3-hover-orange w3-right" name="update" type="submit" value="Update Record"></b>
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
</body>
</html>
