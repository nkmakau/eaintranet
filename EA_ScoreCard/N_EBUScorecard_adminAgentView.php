<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	// require_once('N_EBUScorecard/config.php'); 
	// require_once('N_EBUScorecard/permissions.php'); 
		
	$agentUsername = "";
	$agentName = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['getAgentDetails'])){
			$agentDetails = $_POST['getAgentDetails'];
			$SplitDetails = explode("/",$agentDetails);
			$agentUsername = $SplitDetails[0];
			$agentName = $SplitDetails[1];
		}
	}
		
	//Get all agent
	$result_SAgent = mysqli_query($link,"SELECT DISTINCT Agentname, Username FROM EBU_ScoreCard");
	$row_SAgent = mysqli_fetch_array($result_SAgent);
		
	//Get data for April
	$result_April = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m1'");
	$row_April = mysqli_fetch_array($result_April);
	
	//Get data for May
	$result_May = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m2'");
	$row_May = mysqli_fetch_array($result_May);
	
	//Get data for Jun
	$result_Jun = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m3'");
	$row_Jun = mysqli_fetch_array($result_Jun);
	
	//Get data for Jul
	$result_Jul = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m4'");
	$row_Jul = mysqli_fetch_array($result_Jul);
	
	//Get data for Aug
	$result_Aug = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m5'");
	$row_Aug = mysqli_fetch_array($result_Aug);
	
	//Get data for Sep
	$result_Sep = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m6'");
	$row_Sep = mysqli_fetch_array($result_Sep);
	
	//Get data for Oct
	$result_Oct = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m7'");
	$row_Oct = mysqli_fetch_array($result_Oct);
	
	//Get data for Nov
	$result_Nov = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m8'");
	$row_Nov = mysqli_fetch_array($result_Nov);
	
	//Get data for Dec
	$result_Dec = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m9'");
	$row_Dec = mysqli_fetch_array($result_Dec);
	
	//Get data for Jan
	$result_Jan = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m10'");
	$row_Jan = mysqli_fetch_array($result_Jan);
	
	//Get data for Feb
	$result_Feb = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m11'");
	$row_Feb = mysqli_fetch_array($result_Feb);
	
	//Get data for Mar
	$result_Mar = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Month='$m12'");
	$row_Mar = mysqli_fetch_array($result_Mar);
	
	/* FIRST Half */
	
	//Get Average for Adherence first half
	$result_A_Adh = mysqli_query($link,"SELECT AVG(Adherence) AS AA FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Adherence REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6')");
	$row_A_Adh = mysqli_fetch_array($result_A_Adh);
	
	//Get Average for Email Quality first half
	$result_A_Email = mysqli_query($link,"SELECT AVG(EmailQuality) AS AE FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and EmailQuality REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6')");
	$row_A_Email = mysqli_fetch_array($result_A_Email);
	
	//Get Average for SR first half
	$result_A_SR = mysqli_query($link,"SELECT AVG(SRQuality) AS ASR FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and SRQuality REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6')");
	$row_A_SR = mysqli_fetch_array($result_A_SR);
	
	//Get Average for Revenue first half
	$result_A_Rev = mysqli_query($link,"SELECT AVG(Revenue) AS ARev FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Revenue REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6')");
	$row_A_Rev = mysqli_fetch_array($result_A_Rev);
	
	//Get Average for NPS first half
	$result_A_NPS = mysqli_query($link,"SELECT AVG(NPS) AS ANPS FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and NPS REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6')");
	$row_A_NPS = mysqli_fetch_array($result_A_NPS);
	
	//Get Average for interactions first half
	$result_A_Int = mysqli_query($link,"SELECT AVG(interactions) AS AInt FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and interactions REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6')");
	$row_A_Int = mysqli_fetch_array($result_A_Int);
	
	/* SECOND Half */
	
	//Get Average for Adherence
	$result2_A_Adh = mysqli_query($link,"SELECT AVG(Adherence) AS ASA FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Adherence REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6' OR Month='$m7' OR Month='$m8' OR Month='$m9' OR Month='$m10' OR Month='$m11' OR Month='$m12')");
	$row2_A_Adh = mysqli_fetch_array($result2_A_Adh);
	
	//Get Average for Email Quality
	$result2_A_Email = mysqli_query($link,"SELECT AVG(EmailQuality) AS ASE FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and EmailQuality REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6' OR Month='$m7' OR Month='$m8' OR Month='$m9' OR Month='$m10' OR Month='$m11' OR Month='$m12')");
	$row2_A_Email = mysqli_fetch_array($result2_A_Email);
	
	//Get Average for SR
	$result2_A_SR = mysqli_query($link,"SELECT AVG(SRQuality) AS ASSR FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and SRQuality REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6' OR Month='$m7' OR Month='$m8' OR Month='$m9' OR Month='$m10' OR Month='$m11' OR Month='$m12')");
	$row2_A_SR = mysqli_fetch_array($result2_A_SR);
	
	//Get Average for Revenue
	$result2_A_Rev = mysqli_query($link,"SELECT AVG(Revenue) AS ASRev FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and Revenue REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6' OR Month='$m7' OR Month='$m8' OR Month='$m9' OR Month='$m10' OR Month='$m11' OR Month='$m12')");
	$row2_A_Rev = mysqli_fetch_array($result2_A_Rev);
	
	//Get Average for NPS
	$result2_A_NPS = mysqli_query($link,"SELECT AVG(NPS) AS ASNPS FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and NPS REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6' OR Month='$m7' OR Month='$m8' OR Month='$m9' OR Month='$m10' OR Month='$m11' OR Month='$m12')");
	$row2_A_NPS = mysqli_fetch_array($result2_A_NPS);
	
	//Get Average for interactions
	$result2_A_Int = mysqli_query($link,"SELECT AVG(interactions) AS ASInt FROM EBU_ScoreCard WHERE Username='" . $agentUsername . "' and interactions REGEXP '[0-9]' and (Month='$m1' OR Month='$m2' OR Month='$m3' OR Month='$m4' OR Month='$m5' OR Month='$m6' OR Month='$m7' OR Month='$m8' OR Month='$m9' OR Month='$m10' OR Month='$m11' OR Month='$m12')");
	$row2_A_Int = mysqli_fetch_array($result2_A_Int);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Agent View :: Scorecard <?php echo $FromYear." - ".$ToYear; ?></title>
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
<div  class="w3-content">
<!-- !PAGE CONTENT! }-->
<div class="w3-main w3-card" style="margin:10px 0;border:1px solid #ccc;">

	<!-- Header-->
	<div class="w3-container w3-green w3-border-bottom" id="Header">
		<h1><b>Experience Assurance EBU Scorecard <?php echo $FromYear." - ".$ToYear; ?></b></h1>
	    	<!--hr style="width:100%;border:3px solid white" class="w3-round"-->		
	</div>
	<div class="w3-container w3-green">
		<h2 class="w3-left">Admin Agent View</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']; ?> - (<?php  echo $row_getUser['ekno2']; ?>)</b></p>
	</div>
  
	<div id="scorecard" class="w3-container w3-padding">
		<div class="w3-padding-16">
				<form method="post" action="<?php echo $AdminAgentViewLink; ?>">
					<table class="w3-table-all">
						<tr>
							<th>Select agent</th>
							<td>
								<select class="w3-input w3-border w3-border-grey" name="getAgentDetails" onchange="this.form.submit()">
									<?php if($agentName ==""){ ?>
									<option value="" selected disabled>-- Select Agent --</option>
									<?php } else { ?>
									<option value="" selected disabled><?php echo $agentName; ?></option>
									<?php } ?>
									
									<?php do { ?>
										<option value="<?php echo $row_SAgent['Username'].'/'.$row_SAgent['Agentname']; ?>"><?php echo $row_SAgent['Agentname']; ?></option>
									<?php } while ($row_SAgent = mysqli_fetch_assoc($result_SAgent)); ?>
								</select>						
							</td>
							<th colspan="2">
								
							</th>
						</tr>
					</table>
				</form>
		</div>
		<div class="w3-bar">
			    <button class="w3-bar-item w3-button w3-border w3-border-green tablink w3-green" onclick="openHalf(event,'first')"><b>First Half</b></button>
			    <button class="w3-bar-item w3-button w3-border w3-border-green tablink" onclick="openHalf(event,'second')"><b>Second Half</b></button>
  		</div>
  		
		<!-- First Half -->
  
		<div id="first" class="w3-container w3-border w3-border-green half">
			<div class="w3-responsive w3-padding-16">
				<table class="w3-table-all  w3-centered">
					<tr class="w3-green">
						  <th colspan="2"class=" w3-left-align">Period Under Analysis</th>
						  <th><?php echo date("M Y",strtotime($m1)); ?></th>
						  <th><?php echo date("M Y",strtotime($m2)); ?></th>
						  <th><?php echo date("M Y",strtotime($m3)); ?></th>
						  <th><?php echo date("M Y",strtotime($m4)); ?></th>
						  <th><?php echo date("M Y",strtotime($m5)); ?></th>
						  <th><?php echo date("M Y",strtotime($m6)); ?></th>
						  <th>Average</th>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>KPIs</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Skillset</b></td>
						  <td><?php echo $row_April['Skillset']; ?></td>
						  <td><?php echo $row_May['Skillset']; ?></td>
						  <td><?php echo $row_Jun['Skillset']; ?></td>
						  <td><?php echo $row_Jul['Skillset']; ?></td>
						  <td><?php echo $row_Aug['Skillset']; ?></td>
						  <td><?php echo $row_Sep['Skillset']; ?></td>
						  <td class="w3-pale-green">-</td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Adherence</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
							<?php 
								if(is_numeric($row_April['Adherence'])){
									echo $row_April['Adherence']."%";
								} elseif($row_April['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} 
							?>
						  </td>
						  <td>
							<?php 
								if(is_numeric($row_May['Adherence'])){
									echo $row_May['Adherence'] ."%";
								} elseif($row_May['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} 
							?>
						  </td>
						  <td>
							<?php 
								if(is_numeric($row_Jun['Adherence'])){
									echo $row_Jun['Adherence'] ."%";
								} elseif($row_Jun['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} 
							?>
						 </td>
						  <td>
							<?php 
								if(is_numeric($row_Jul['Adherence'])){
									echo $row_Jul['Adherence'] ."%";
								} elseif($row_Jul['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} 
							?>
						 </td>
						  <td>
							<?php 
								if(is_numeric($row_Aug['Adherence'])){
									echo $row_Aug['Adherence'] ."%";
								} elseif($row_Aug['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} 
							?>
						 </td>
						  <td>
							<?php 
								if(is_numeric($row_Sep['Adherence'])){
									echo $row_Sep['Adherence'] ."%";
								} elseif($row_Sep['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} 
							?>
						 </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row_A_Adh['AA'] <> 0){
						  			echo round($row_A_Adh['AA'],2)."%";
								} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Email Quality</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_April['EmailQuality'])){
						  			echo $row_April['EmailQuality']."%"; 
								} elseif($row_April['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_May['EmailQuality'])){
						  			echo $row_May['EmailQuality']."%"; 
								} elseif($row_May['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jun['EmailQuality'])){
						  			echo $row_Jun['EmailQuality']."%";  
								} elseif($row_Jun['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jul['EmailQuality'])){
						  			echo $row_Jul['EmailQuality']."%"; 
								} elseif($row_Jul['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Aug['EmailQuality'])){
						  			echo $row_Aug['EmailQuality']."%";  
								} elseif($row_Aug['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Sep['EmailQuality'])){
						  			echo $row_Sep['EmailQuality']."%"; 
								} elseif($row_Sep['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row_A_Email['AE'] <> 0){
						  			echo $row_A_Email['AE']."%";
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Service Request</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_April['SRQuality'])){
						  			echo $row_April['SRQuality']."%"; 
								} elseif($row_April['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_May['SRQuality'])){
						  			echo $row_May['SRQuality']."%"; 
								} elseif($row_May['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jun['SRQuality'])){
						  			echo $row_Jun['SRQuality']."%"; 
								} elseif($row_Jun['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} 
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jul['SRQuality'])){
						  			echo $row_Jul['SRQuality']."%"; 
								} elseif($row_Jul['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Aug['SRQuality'])){
						  			echo $row_Aug['SRQuality']."%"; 
								} elseif($row_Aug['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Sep['SRQuality'])){
						  			echo $row_Sep['SRQuality']."%"; 
								} elseif($row_Sep['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row_A_SR['ASR'] <> 0) {
						  			echo $row_A_SR['ASR']."%";
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Revenue/Baseline</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_April['Revenue'])){
						  			echo $row_April['Revenue']; 
								} elseif($row_April['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_May['Revenue'])){
						  			echo $row_May['Revenue']; 
								} elseif($row_May['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jun['Revenue'])){
						  			echo $row_Jun['Revenue']; 
								} elseif($row_Jun['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jul['Revenue'])){
						  			echo $row_Jul['Revenue']; 
								} elseif($row_Jul['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Aug['Revenue'])){
						  			echo $row_Aug['Revenue']; 
								} elseif($row_Aug['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Sep['Revenue'])){
						  			echo $row_Sep['Revenue']; 
								} elseif($row_Sep['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row_A_Rev['ARev'] <> 0){
						  			echo $row_A_Rev['ARev'];
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Interactions</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td><?php  if(is_numeric($row_April['Interactions'])){echo $row_April['Interactions']; } elseif( $row_April['Interactions'] == "Not Apply") { echo "Not Apply";} ?></td>
						  <td><?php  if(is_numeric($row_May['Interactions'])){echo $row_May['Interactions']; } elseif( $row_May['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Jun['Interactions'])){echo $row_Jun['Interactions']; } elseif($row_Jun['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Jul['Interactions'])){echo $row_Jul['Interactions']; } elseif($row_Jul['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Aug['Interactions'])){echo $row_Aug['Interactions']; } elseif($row_Aug['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Sep['Interactions'])){echo $row_Sep['Interactions']; } elseif($row_Sep['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row_A_Int['AInt'] <> 0) {
						  			echo $row_A_Int['AInt'];
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Net Promoter Score (NPS)</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Individual</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_April['NPS'])){
						  			echo $row_April['NPS']*100; 
								} elseif($row_April['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_May['NPS'])){
						  			echo $row_May['NPS']*100; 
								} elseif($row_May['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jun['NPS'])){
						  			echo $row_Jun['NPS']*100; 
								} elseif($row_Jun['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jul['NPS'])){
						  			echo $row_Jul['NPS']*100; 
								} elseif($row_Jul['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Aug['NPS'])){
						  			echo $row_Aug['NPS']*100; 
								} elseif($row_Aug['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Sep['NPS'])){
						  			echo $row_Sep['NPS']*100; 
								} elseif($row_Sep['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row_A_NPS['ANPS'] <> 0){
						  			echo round($row_A_NPS['ANPS']*100,0);
						  		} 
						  	?>
						  </td>
					</tr>
				</table>
			</div>
  		</div>
		
		<!-- Second Half -->
		<div id="second" class="w3-container w3-border w3-border-green half" style="display:none">
			<div class="w3-responsive w3-padding-16">
				<table class="w3-table-all  w3-centered">
					<tr class="w3-green">
						  <th colspan="2" class=" w3-left-align">Period Under Analysis</th>
						  <th><?php echo date("M Y",strtotime($m7)); ?></th>
						  <th><?php echo date("M Y",strtotime($m8)); ?></th>
						  <th><?php echo date("M Y",strtotime($m9)); ?></th>
						  <th><?php echo date("M Y",strtotime($m10)); ?></th>
						  <th><?php echo date("M Y",strtotime($m11)); ?></th>
						  <th><?php echo date("M Y",strtotime($m12)); ?></th>
						  <th>Average</th>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>KPIs</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Skillset</b></td>
						  <td><?php echo $row_Oct['Skillset']; ?></td>
						  <td><?php echo $row_Nov['Skillset']; ?></td>
						  <td><?php echo $row_Dec['Skillset']; ?></td>
						  <td><?php echo $row_Jan['Skillset']; ?></td>
						  <td><?php echo $row_Feb['Skillset']; ?></td>
						  <td><?php echo $row_Mar['Skillset']; ?></td>
						  <td class="w3-pale-green">-</td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Adherence</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
							<?php 
								if(is_numeric($row_Oct['Adherence'])){
									echo $row_Oct['Adherence']."%";
								} elseif($row_Oct['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
							?>
						  </td>
						  <td>
							<?php 
								if(is_numeric($row_Nov['Adherence'])){
									echo $row_Nov['Adherence'] ."%";
								} elseif($row_Nov['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
							?>
						  </td>
						  <td>
							<?php 
								if(is_numeric($row_Dec['Adherence'])){
									echo $row_Dec['Adherence'] ."%";
								} elseif($row_Dec['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
							?>
						 </td>
						  <td>
							<?php 
								if(is_numeric($row_Jan['Adherence'])){
									echo $row_Jan['Adherence'] ."%";
								} elseif($row_Jan['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
							?>
						 </td>
						  <td>
							<?php 
								if(is_numeric($row_Feb['Adherence'])){
									echo $row_Feb['Adherence'] ."%";
								} elseif($row_Feb['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
							?>
						 </td>
						  <td>
							<?php 
								if(is_numeric($row_Mar['Adherence'])){
									echo $row_Mar['Adherence'] ."%";
								} elseif($row_Mar['Adherence'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
							?>
						 </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row2_A_Adh['ASA'] <> 0){
						  			echo $row2_A_Adh['ASA']."%";
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Email Quality</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Oct['EmailQuality'])){
						  			echo $row_Oct['EmailQuality']."%"; 
								} elseif($row_Oct['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Nov['EmailQuality'])){
						  			echo $row_Nov['EmailQuality']."%"; 
								} elseif($row_Nov['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Dec['EmailQuality'])){
						  			echo $row_Dec['EmailQuality']."%";  
								} elseif($row_Dec['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jan['EmailQuality'])){
						  			echo $row_Jan['EmailQuality']."%"; 
								} elseif($row_Jan['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Feb['EmailQuality'])){
						  			echo $row_Feb['EmailQuality']."%";  
								} elseif($row_Feb['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Mar['EmailQuality'])){
						  			echo $row_Mar['EmailQuality']."%"; 
								} elseif($row_Mar['EmailQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row2_A_Email['ASE'] <> 0){
						  			echo $row2_A_Email['ASE']."%";
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Service Request</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Oct['SRQuality'])){
						  			echo $row_Oct['SRQuality']."%"; 
								} elseif($row_Oct['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Nov['SRQuality'])){
						  			echo $row_Nov['SRQuality']."%"; 
								} elseif($row_Nov['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Dec['SRQuality'])){
						  			echo $row_Dec['SRQuality']."%"; 
								} elseif($row_Dec['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jan['SRQuality'])){
						  			echo $row_Jan['SRQuality']."%"; 
								} elseif($row_Jan['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Feb['SRQuality'])){
						  			echo $row_Feb['SRQuality']."%"; 
								} elseif($row_Feb['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Mar['SRQuality'])){
						  			echo $row_Mar['SRQuality']."%"; 
								} elseif($row_Mar['SRQuality'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row2_A_SR['ASSR'] <> 0){
						  			echo $row2_A_SR['ASSR']."%";
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Revenue/Baseline</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Oct['Revenue'])){
						  			echo $row_Oct['Revenue']; 
								} elseif($row_Oct['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Nov['Revenue'])){
						  			echo $row_Nov['Revenue']; 
								} elseif($row_Nov['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Dec['Revenue'])){
						  			echo $row_Dec['Revenue']; 
								} elseif($row_Dec['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jan['Revenue'])){
						  			echo $row_Jan['Revenue']; 
								} elseif($row_Jan['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Feb['Revenue'])){
						  			echo $row_Feb['Revenue']; 
								} elseif($row_Feb['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Mar['Revenue'])){
						  			echo $row_Mar['Revenue']; 
								} elseif($row_Mar['Revenue'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row2_A_Rev['ASRev'] <> 0) {
						  			echo $row2_A_Rev['ASRev'];
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Interactions</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Score</b></td>
						  <td><?php  if(is_numeric($row_Oct['Interactions'])){echo $row_Oct['Interactions']; } elseif($row_Oct['Interactions'] == "Not Apply") { echo "Not Apply";} ?></td>
						  <td><?php  if(is_numeric($row_Nov['Interactions'])){echo $row_Nov['Interactions']; } elseif($row_Nov['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Dec['Interactions'])){echo $row_Dec['Interactions']; } elseif($row_Dec['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Jan['Interactions'])){echo $row_Jan['Interactions']; } elseif($row_Jan['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Feb['Interactions'])){echo $row_Feb['Interactions']; } elseif($row_Feb['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td><?php  if(is_numeric($row_Mar['Interactions'])){echo $row_Mar['Interactions']; } elseif($row_Mar['Interactions'] == "Not Apply") { echo "Not Apply";}  ?></td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row2_A_Int['ASInt'] <> 0) {
						  			echo $row2_A_Int['ASInt'];
						  		} 
						  	?>
						  </td>
					</tr>
					<tr>
						  <td class="w3-pale-green w3-left-align"><b>Net Promoter Score (NPS)</b></td>
						  <td class="w3-pale-green w3-left-align"><b>Division</b></td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Oct['NPS'])){
						  			echo $row_Oct['NPS']*100; 
								} elseif($row_Oct['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Nov['NPS'])){
						  			echo $row_Nov['NPS']*100; 
								} elseif($row_Nov['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Dec['NPS'])){
						  			echo $row_Dec['NPS']*100; 
								} elseif($row_Dec['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Jan['NPS'])){
						  			echo $row_Jan['NPS']*100; 
								} elseif($row_Jan['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Feb['NPS'])){
						  			echo $row_Feb['NPS']*100; 
								} elseif($row_Feb['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td>
						  	<?php 
						  		if(is_numeric($row_Mar['NPS'])){
						  			echo $row_Mar['NPS']*100; 
								} elseif($row_Mar['NPS'] =="Not Apply") {
									echo "Not Apply";
								} else {
									echo "";							
								}
						  	?>
						  </td>
						  <td class="w3-pale-green">
						  	<?php 
						  		if($row2_A_NPS['ASNPS'] <> 0) {
						  			echo round($row2_A_NPS['ASNPS']*100,0);
						  		} 
						  	?>
						  </td>
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
	  			Copyrights <a href="<?php echo $Author; ?>" target="_blank"><?php echo $AuthorName; ?></a>
	  		</p>
		</div>
	</footer>
	
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
</div>
</div></body>
</html>
