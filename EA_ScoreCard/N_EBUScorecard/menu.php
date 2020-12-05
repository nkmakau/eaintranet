<?php
	//Menu
	require_once('../D_EBUCareScorecard/D_EBUCareScorecard/config.php'); 
?>

<div class="w3-margin-top w3-margin-bottom">
	<a id="2" href="<?php echo $UploadLink; ?>" class="w3-bar-item w3-button w3-border w3-right links" onClick="changeColor(this)">Upload Scores</a>
	<a id="3" href="<?php echo $ReportLink; ?>" class="w3-bar-item w3-button w3-border  w3-right links" onClick="changeColor(this)">Report</a>
	<a id="4" href="<?php echo $AdminAgentViewLink; ?>" class="w3-bar-item w3-button  w3-border w3-right links" onClick="changeColor(this)">Admin Agent View</a>
	<a id="4" href="<?php echo $AgentViewLink; ?>" class="w3-bar-item w3-button  w3-border w3-right links" onClick="changeColor(this)">Agent View</a>
</div>
