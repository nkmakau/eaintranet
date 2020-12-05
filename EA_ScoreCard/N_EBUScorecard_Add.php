<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
	
	//Get TL 
	$result_getTL = mysqli_query($link,"SELECT `name` AS Jina, username FROM cm_users WHERE `grade` LIKE '%manager%' AND `empposid` IN ( '1', '19', '21') AND `block` = '0' ORDER BY `name`");
	$row_getTL = mysqli_fetch_assoc($result_getTL);
	
	if(isset($_GET['name'])){
		$AgentName = $_GET['name'];
	} else {
		$AgentName = "";
	}
	
	if(isset($_GET['username'])){
		$AgentUsername = $_GET['username'];
	} else {
		$AgentUsername = "";
	}
	
	if(isset($_GET['EKNo'])){
		$AgentEKNo = $_GET['EKNo'];
	} else {
		$AgentEKNo = "";
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//Get Agent details
		if(isset($_POST['getAgentDetails'])){
			$getAgentDetails = mysqli_real_escape_string($link,$_POST['getAgentDetails']);
			$result_getAgentDetails = mysqli_query($link,"SELECT name,username,ekno2 FROM cm_users WHERE block='0' AND empposid='4' AND grade='CCR' AND username='".$getAgentDetails."'");
			$row_getAgentDetails = mysqli_fetch_assoc($result_getAgentDetails);
			
			$AgentName = $row_getAgentDetails['name'];
			$AgentUsername = $row_getAgentDetails['username'];
			$AgentEKNo = $row_getAgentDetails['ekno2'];
			header('location: '.$AddLink.'?name='.$AgentName.'&username='.$AgentUsername.'&EKNo='.$AgentEKNo);
		}
		
		//Save Agent details
		if(isset($_POST['add'])){
		
			if(isset($_POST['Name'])){
				$AName = mysqli_real_escape_string($link,$_POST['Name']);
			} else {
				$AName = "Not Apply";
			}
			if(isset($_POST['EKNo'])){
				$AEKNo = mysqli_real_escape_string($link,$_POST['EKNo']);
			} else {
				$AEKNo = "Not Apply";
			}
			if(isset($_POST['Username'])){
				$AUsername = mysqli_real_escape_string($link,$_POST['Username']);
			} else {
				$AUsername = "Not Apply";
			}
			if(isset($_POST['Family'])){
				$AFamily = mysqli_real_escape_string($link,$_POST['Family']);
			} else {
				$AFamily = "Not Apply";
			}
			if(isset($_POST['TL'])){
				$ATL = mysqli_real_escape_string($link,$_POST['TL']);
			} else {
				$ATL = "Not Apply";
			}
			if(isset($_POST['Skillset'])){
				$ASkillset = mysqli_real_escape_string($link,$_POST['Skillset']);
			} else {
				$ASkillset = "Not Apply";
			}
			if(isset($_POST['Month'])){
				$AMonth= mysqli_real_escape_string($link,$_POST['Month']);
			} else {
				$AMonth = "Not Apply";
			}
			if(isset($_POST['Adherence'])){
				$AAdherence = mysqli_real_escape_string($link,$_POST['Adherence']);
			} else {
				$AAdherence = "Not Apply";
			}
			if(isset($_POST['NPS'])){
				$ANPS = mysqli_real_escape_string($link,$_POST['NPS']);
			} else {
				$ANPS = "Not Apply";
			}
			if(isset($_POST['Interactions'])){
				$AInteractions = mysqli_real_escape_string($link,$_POST['Interactions']);
			} else {
				$AInteractions = "Not Apply";
			}
			if(isset($_POST['Revenue'])){
				$ARevenue = mysqli_real_escape_string($link,$_POST['Revenue']);
			} else {
				$ARevenue = "Not Apply";
			}
			if(isset($_POST['SRQuality'])){
				$ASRQuality = mysqli_real_escape_string($link,$_POST['SRQuality']);
			} else {
				$ASRQuality= "Not Apply";
			}
			if(isset($_POST['EmailQuality'])){
				$AEmailQuality= mysqli_real_escape_string($link,$_POST['EmailQuality']);
			} else {
				$AEmailQuality= "Not Apply";
			}
			if(isset($_POST['AdherencePRD'])){
				$AAdherencePRD = mysqli_real_escape_string($link,$_POST['AdherencePRD']);
			} else {
				$AAdherencePRD = "Not Apply";
			}
			if(isset($_POST['NPSPDR'])){
				$ANPSPDR = mysqli_real_escape_string($link,$_POST['NPSPDR']);
			} else {
				$ANPSPDR = "Not Apply";
			}
			if(isset($_POST['InteractionsPDR'])){
				$AInteractionsPDR = mysqli_real_escape_string($link,$_POST['InteractionsPDR']);
			} else {
				$AInteractionsPDR = "Not Apply";
			}
			if(isset($_POST['RevenuePDR'])){
				$ARevenuePDR = mysqli_real_escape_string($link,$_POST['RevenuePDR']);
			} else {
				$ARevenuePDR= "Not Apply";
			}
			if(isset($_POST['SRQualityPDR'])){
				$ASRQualityPDR = mysqli_real_escape_string($link,$_POST['SRQualityPDR']);
			} else {
				$ASRQualityPDR= "Not Apply";
			}
			if(isset($_POST['EmailQualityPDR'])){
				$AEmailQualityPDR = mysqli_real_escape_string($link,$_POST['EmailQualityPDR']);
			} else {
				$AEmailQualityPDR = "Not Apply";
			}
			
			$redirect = $AddLink."?name=".$AgentName."&username=".$AgentUsername."&EKNo=".$AgentEKNo;
			
			//Get duplicates
			$result_Duplicate = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $AUsername . "' and Month='$AMonth'");
			$TotalDuplicate = mysqli_num_rows($result_Duplicate);
			
			if($TotalDuplicate <1){
				$Add_Record = mysqli_query($link,"INSERT INTO EBU_ScoreCard (
					EKNO,
					Username,
					Agentname,
					Skillset,
					Family,
					TM,
					Month,
					Adherence,
					AdherencePRD,
					NPS,
					NPSPDR,
					Interactions,
					InteractionsPDR,
					Revenue,
					RevenuePDR,
					SRQuality,
					SRQualityPDR,
					EmailQuality,
					EmailQualityPDR,
					 FYear,
					Uploader,
					UploadDate
				) VALUES (
					'$AEKNo',
					'$AUsername',
					'$AName',
					'$ASkillset',
					'$AFamily',
					'$ATL',
					'$AMonth',
					'$AAdherence',
					'$AAdherencePRD',
					'$ANPS',
					'$ANPSPDR',
					'$AInteractions',
					'$AInteractionsPDR',
					'$ARevenue',
					'$ARevenuePDR',
					'$ASRQuality',
					'$ASRQualityPDR',
					'$AEmailQuality',
					'$AEmailQualityPDR',
					'$FYear',
					'$username',
					'$DateTime'
				)") or die(mysqli_error($link));
				 
				if($Add_Record){
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Record Added Successfully!');\n";
					echo "window.location='".$ReportLink."'";
					echo "</script>";
				} else {
					echo "<script language=\"JavaScript\">\n";
					echo "alert('Submit Failed!');\n";
					echo "window.location='".$redirect."'";
					echo "</script>";
				} //End Insert
			} else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('This is a duplicate record. Please Recheck!');\n";
				echo "window.location='".$redirect."'";
				echo "</script>";
			}//End check duplicate 
		}
		
	} //End of Post
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Scores:: Scorecard <?php echo $FromYear." - ".$ToYear; ?></title>
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
		<h1><b>EBU CARE SCORECARD <?php echo $FromYear." - ".$ToYear; ?></b></h1>
	    	<!--hr style="width:100%;border:3px solid white" class="w3-round"-->		
	</div>
	<div class="w3-container w3-green">
		<h2 class="w3-left">Add Agent Scores</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-container w3-border w3-border-green">
			<div class="w3-padding-16">
				<form method="post" action="<?php echo $AddLink; ?>">
					<table class="w3-table-all">
						<tr>
							<th>Select agent</th>
							<td>
								<select class="w3-input w3-border w3-border-grey" name="getAgentDetails" onchange="this.form.submit()">
									<option value="<">-- Select Agent --</option>
									<?php do { ?>
										<option value="<?php echo $row_getAllAgent ['username']; ?>"><?php echo $row_getAllAgent ['name']; ?></option>
									<?php } while ($row_getAllAgent = mysqli_fetch_assoc($result_getAllAgent)); ?>
								</select>						
							</td>
							<th></th>
							<!--td>
								<input class="w3-button w3-green w3-hover-orange w3-right" name="getagent" type="submit" value="Save Record">
							</td-->
						</tr>
					</table>
				</form>
			</div>
					
			<div class="w3-padding-16">
				<p>Please enter the details below.</p>
				<form method="post" action="<?php echo $AddLink; ?>">
					<table class="w3-table-all">
						<tr>
							<th>Name</th>
							<td>
								<input class="w3-input w3-border w3-border-grey" name="Name" type="text" value="<?php echo $AgentName; ?>" required>						
							</td>
							<th>Staff Number</th>
							<td><input class="w3-input w3-border w3-border-grey" type="text" name="EKNo" value="<?php echo $AgentEKNo; ?>" required></td>
							<th>Username</th>
							<td>
								<input class="w3-input w3-border w3-border-grey" name="Username" type="text" value="<?php echo $AgentUsername; ?>" required>
							</td>
						</tr>
						<tr>
							<th>Family</th>
							<td>
								<select class="w3-input w3-border w3-border-grey" name="Family" required>
									<option value="<">-- Select Family --</option>
									<option value="Ashenafi">Ashenafi</option>
								</select>	
							</td>
							<th>TL</th>
							<td>
								<select class="w3-input w3-border w3-border-grey" name="TL" required>
									<option value="<">-- Select TL --</option>
									<?php do { ?>
									<option value="<?php echo $row_getTL['Jina']; ?>"><?php echo $row_getTL['Jina']; ?></option>
									<?php } while ($row_getTL = mysqli_fetch_assoc($result_getTL)); ?>
								</select>	
							</td>
							<th>Skillset</th>
							<td>
								<select class="w3-input w3-border w3-border-grey" name="Skillset" required>
									<option value="<">-- Select Skillset --</option>
									<option value="Tams">Tams</option>
								</select>	
							</td>
						</tr>
						<tr>
							<th>Month</th>
							<td>
								<select class="w3-input w3-border w3-border-grey" name="Month" required>
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
							<th></th>
							<td></td>
							<th></th>
							<td></td>
						</tr>
						<tr>
							<td colspan="6">
								<table class="w3-table-all">
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
										<td><input class="w3-input w3-border w3-border-grey" name="Adherence" type="number"  min="0" max="100" step=".01" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="NPS" type="number" min="0" max="100" step=".01" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="Interactions" type="number" min="0" max="10000" step=".01" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="Revenue" type="number" min="0" max="10000" step=".01" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="SRQuality" min="0" max="100" type="number" step=".01" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="EmailQuality" min="0" max="100" type="number" step=".01" value=""></td>
									</tr>
									<tr>
										<th>PDR</th>
										<td><input class="w3-input w3-border w3-border-grey" name="AdherencePRD" min="1" max="5" type="number" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="NPSPDR" min="1" max="5" type="number" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="InteractionsPDR" min="1" max="5" type="number" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="RevenuePDR" min="1" max="5" type="number" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="SRQualityPDR" min="1" max="5" type="number" value=""></td>
										<td><input class="w3-input w3-border w3-border-grey" name="EmailQualityPDR" min="1" max="5" type="number" value=""></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="6">
								<b><input class="w3-button w3-green w3-hover-orange w3-right" name="add" type="submit" value="Save Record"></b>
								<a href="<?php echo $ReportLink; ?>" class="w3-button w3-green w3-right w3-margin-right"><b>Cancel</b></a>
							</td>
						</tr>
						<tr>
							<td colspan="6">
								<p class="w3-tiny">NB: Blank = Not Apply</p>
							</td>
						</tr>
					</table>
				</form>
			</div>
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
</div></body>
</html>
