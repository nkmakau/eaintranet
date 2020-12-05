<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
	
	$AssEError = "";
	$AssTError = "";
	$AssMError = "";
	$AssFError = "";
	$AssFileUStatus = "";
	$color = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['AssSubmit'])){
			if(!empty($_POST['AssEditor'])){
				$AssEditor = mysqli_real_escape_string($link,$_POST['AssEditor']);
			} else {
				$AssEError = "*";
			}
			if(!empty($_POST['AssType'])){
				$AssType = mysqli_real_escape_string($link,$_POST['AssType']);
			} else {
				$AssTError = "*";
			}
			if(!empty($_POST['AssMonth'])){
				$AssMonth = mysqli_real_escape_string($link,$_POST['AssMonth']);
			} else {
				$AssMError = "*";
			}
			if(!empty($_FILES['AssFile'])){
				$AssFile = $_FILES['AssFile']['tmp_name'];
				$AssFileName = $_FILES['AssFile']['name'];
			} else {
				$AssFError = "*";
			}
		
			//$getItems = array();
				
			$AssFileType = explode('.',$AssFileName);
		
			if(($AssFileType[1]) != 'csv'){
				$AssFileUStatus = " This file '".$AssFileName."' is not in a CSV format.";
				$color = "red";				
			} else {
				if($_FILES['AssFile']['size'] > 0) {
					$AssFileOpen = fopen($AssFile,'r');
					fgets($AssFileOpen);
				
					while (($AssData = fgetcsv($AssFileOpen, 10000, ',')) != false ) {
						$AssEK =  mysqli_real_escape_string($link,$AssData[0]);
						$AssUser =  mysqli_real_escape_string($link,$AssData[1]);
						$AssAgentname =  mysqli_real_escape_string($link,$AssData[2]);
						$AssSkillset =  mysqli_real_escape_string($link,$AssData[3]);
						$AssFamily =  mysqli_real_escape_string($link,$AssData[4]);
						$AssTM =  mysqli_real_escape_string($link,$AssData[5]);
						$AssMonth =  mysqli_real_escape_string($link,$AssData[6]);
						$AssAdh =  mysqli_real_escape_string($link,$AssData[7]);
						$AssAdhPDR =  mysqli_real_escape_string($link,$AssData[8]);
						$AssNPS =  mysqli_real_escape_string($link,$AssData[9]);
						$AssNPSPDR =  mysqli_real_escape_string($link,$AssData[10]);
						$AssInt =  mysqli_real_escape_string($link,$AssData[11]);
						$AssIntPDR =  mysqli_real_escape_string($link,$AssData[12]);
						$AssRev =  mysqli_real_escape_string($link,$AssData[13]);
						$AssRevPDR =  mysqli_real_escape_string($link,$AssData[14]);
						$AssSR =  mysqli_real_escape_string($link,$AssData[15]);
						$AssSRPDR =  mysqli_real_escape_string($link,$AssData[16]);
						$AssEmail =  mysqli_real_escape_string($link,$AssData[17]);
						$AssEmailPDR =  mysqli_real_escape_string($link,$AssData[18]);
					
						if($AssEK != ''){
							$loadAssData = "INSERT  IGNORE INTO EBU_ScoreCard
							(EKNO,Username,Agentname,Skillset,Family,TM,Month,Adherence,AdherencePRD,NPS,NPSPDR,Interactions,InteractionsPDR,Revenue,RevenuePDR,SRQuality,SRQualityPDR,EmailQuality,EmailQualityPDR,FYear,Uploader,UploadDate)
							VALUES ('$AssEK','$AssUser','$AssAgentname','$AssSkillset','$AssFamily','$AssTM','$AssMonth','$AssAdh','$AssAdhPDR','$AssNPS','$AssNPSPDR','$AssInt','$AssIntPDR','$AssRev','$AssRevPDR','$AssSR','$AssSRPDR','$AssEmail','$AssEmailPDR','$FYear','$username','$DateTime')";
							$result_loadAssData = mysqli_query($link,$loadAssData) or die(mysqli_error($link));
						}
					}
				
					fclose($AssFileOpen );
					if($result_loadAssData){
						$AssFileUStatus= " The CSV file: (".$AssFileName.") has been successfully loaded to the database.";
						$color = "green";	
					} else {
						$AssFileUStatus= " <i class='fa fa-warning'></i> Failed! The CSV file: (".$AssFileName.") was not loaded to the database. Please try again.";	
						$color = "red";
					} //End of Load data
				}
			}
		}
	} //End of Post
?>
<!DOCTYPE html>
<html>
	<title>Upload Data :: Scorecard <?php echo $FromYear." - ".$ToYear; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo $css; ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body,h1,h2,h3,h4,h5,h6 {
		font-family: "Encode Sans Condensed", Arial, Helvetica, sans-serif;
	}
	</style>
<body>
<div class="w3-content">

<!-- !PAGE CONTENT! }-->
<div class="w3-main w3-card" style="margin:10px 0;border:1px solid #ccc;">

	<!-- Header-->
	<div class="w3-container w3-green w3-border-bottom" id="Header">
		<h1><b>Experience AssuranceEBU  Scorecard <?php echo $FromYear." - ".$ToYear; ?></b></h1>
	    	<!--hr style="width:100%;border:3px solid white" class="w3-round"-->		
	</div>
	<div class="w3-container w3-green">
		<h2 class="w3-left">CSV Upload</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-padding w3-round w3-pale-green w3-margin-bottom w3-border w3-border-green">
				<?php if($color  == ""){ } elseif($color  == "green"){?>
					<span class="w3-text-green"><i class='fa fa-check-square-o'></i> <?php echo "<b> File Error:</b> ".$AssFileUStatus."<br>"; ?></span>
				<?php } else { ?>
					<span class="w3-text-red"><i class='fa fa-warning'></i> <?php echo "<b>File Error:</b> ".$AssFileUStatus."<br>"; ?></span>
				<?php } ?>
				<?php if($AssEError !="" OR $AssTError !="" OR $AssMError !="" OR $AssFError !=""){ ?>
					<span class="w3-text-red">The fields with Asterik(*) are required!</span>
				<?php } ?>
			<h5><u>Notes</u></h5> 
			<p class="">This form enables you to save scorecard data to the database. Ensure the uploaded file is in CSV format, and use the column arrangements specified below:
			</p>
			<p class="w3-small">| EKNO | Username | Agentname | Skillset | Family | TM | Month | Adherence | Adherence PRD | NPS | NPS PDR | Interactions | Interactions PDR | Revenue | Revenue PDR | SR Quality | SR Quality PDR | Email Quality | Email Quality PDR | 
			</p>
  		</div>
		
		<div class="w3-bar">
			<button class="w3-bar-item w3-button w3-green w3-hover-green" onclick=""><b>Batch Upload Form</b></button>
  		</div>
		<div id="first" class="w3-container w3-border w3-border-green half">
			<div class="w3-responsive w3-padding-16">
			<form method="post" action="<?php echo $UploadLink;?>" enctype="multipart/form-data">
				<table class="w3-table-all">
					<tr>
						<th>Editor<span class="w3-text-red"><?php echo $AssEError; ?></span></th>
						<td><input class="w3-input w3-border w3-border-green" name="AssEditor" type="text" value="<?php echo $username; ?>"></d>
					</tr>
					<tr>
						<th>Assessment Report Type<span class="w3-text-red"><?php echo $AssTError; ?></span></th>
						<td>
							<select class="w3-input w3-border w3-border-green" name="AssType">
								<option value="EBU Tele Care" selected>EBU Tele Care</option>
							</select>
						</d>
				    	</tr>
					<tr>
						<th>Assessment Month<span class="w3-text-red"><?php echo $AssMError; ?></span></th>
						<td>
							<select class="w3-select w3-border w3-border-green" name="AssMonth">
								<option value="" disabled selected> - Choose Month - </option>
								<option value="Jan">January</option>
								<option value="Feb">February</option>
								<option value="Mar">March</option>
								<option value="Apr">April</option>
								<option value="May">May</option>
								<option value="Jun">June</option>
								<option value="Jul">July</option>
								<option value="Aug">August</option>
								<option value="Sep">September</option>
								<option value="Oct">October</option>
								<option value="Nov">November</option>
								<option value="Dec">December</option>
							</select>
						</d>
				    	</tr>
					<tr>
						<th>Upload CSV File<span class="w3-text-red w3-tiny"> <?php echo $AssFError; ?></span></th>
						<td><input class="w3-input w3-border w3-border-green" name="AssFile" type="file"></d>
				    	</tr>
					<tr>
						<th>&nbsp;</th>
						<td>
							<b><input class="w3-button w3-green" name="AssSubmit" type="submit" value="Upload File"></b>
							<a href="<?php echo $ReportLink; ?>" class="w3-button w3-green w3-margin-right"><b>Cancel</b></a>
						</d>
				    	</tr>
				</table>
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
	  			Copyrights <a href="https://cmintranet/experienceassurance" target="_blank">Experience Assurance 2020</a>
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
</div></body>
</html>
