<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
	
	$ID = $_GET['X'];
	 
	 //Get ID data if available
	$result_getIDData= mysqli_query($link,"SELECT * FROM `EBU_ScoreCard` WHERE ID=$ID");
	$row_getIDData = mysqli_fetch_array($result_getIDData);
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//Search records
		if(isset($_POST['update'])){
			$ID = $_POST['ID'];
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
			
			$insert_Update = mysqli_query($link,"UPDATE `EBU_ScoreCard` SET  
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
					Uploader = '".$username."',  
					UploadDate =  '".$DateTime."'
					Where ID = '".$ID."'");
			if($insert_Update){
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Update Successfull!');\n";
				echo "window.location='".$SingleUpdateLink."&X=".$ID."'";
				echo "</script>";
			} else {
				echo "<script language=\"JavaScript\">\n";
				echo "alert('Update Failed!');\n";
				echo "window.location='".$SingleUpdateLink."&X=".$ID."'";
				echo "</script>";
			}
		}
		
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
		<h1><b>EBU CARE SCORECARD <?php echo $FromYear." - ".$ToYear; ?></b></h1>
	    	<!--hr style="width:100%;border:3px solid white" class="w3-round"-->		
	</div>
	<div class="w3-container w3-green">
		<h2 class="w3-left">Update Record</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-responsive w3-padding-16">
			<form method="post" action="<?php echo $SingleUpdateLink; ?>&X=<?php echo $ID;?>">
				<table class="w3-table-all w3-hoverable w3-centered">
					<tr class="w3-pale-green">
						<td colspan="7">
							<input type="hidden" name="ID" value="<?php echo $ID; ?>">
							Your are updating data for <b><?php echo $row_getIDData['Agentname']." (".$row_getIDData['Username'].") - ".$row_getIDData['EKNO']; ?></b> of <b><?php echo $row_getIDData['Skillset']." (".$row_getIDData['Family'].")"; ?></b>  uploaded on <b><?php echo date("d M Y H:i A",strtotime($row_getIDData['UploadDate'])); ?></b>  by <b><?php echo $row_getIDData['Uploader']; ?></b>. <br> The Agents manager is <b><?php echo $row_getIDData['TM']; ?></b>.
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
	
	<!-- Tabs Placement -->
<script>
	function openHalf(evt, halfname) {
  		var i, x, tablinks;
		x = document.getElementsByClassName("half");
		for (i = 0; i < x.length; i++) {
		  	x[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < x.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
		}
		document.getElementById(halfname).style.display = "block";
		evt.currentTarget.className += " w3-green";
	}
</script>
</body>
</html>
