<?php
	
	//Get Qualified User
	$result_getQUser = mysqli_query($link,"SELECT email FROM cm_users WHERE block=0 AND (empposid='9' or empposid='10' or empposid='11' or empposid='12' or empposid='21') AND snr='CC' AND username='" . $username . "'");
	$TotalQ = mysqli_num_rows($result_getQUser);
	
	//Get TL 
	$result_getTL = mysqli_query($link,"SELECT `name` AS Jina, username FROM cm_users WHERE `grade` LIKE '%manager%' AND `empposid` IN ( '1', '19') AND `block` = '0' AND username='" . $username . "'");
	$TotalTL = mysqli_num_rows($result_getTL);
	
	//Get All TL 
	$result_getAllTL = mysqli_query($link,"SELECT `name` AS TLJina, username FROM cm_users WHERE `grade` LIKE '%manager%' AND `empposid` IN ( '1', '19') AND `block` = '0' Order By TLJina ASC");
	$row_getAllTL = mysqli_fetch_assoc($result_getAllTL);
	
	//Get All Agent Details
	$result_getAllAgent = mysqli_query($link,"SELECT name,username,ekno2 FROM cm_users WHERE `grade` LIKE '%ccr%' AND `block` = '0' AND `empposid` IN ('4', '10', '14', '15', '20', '21', '22', '23', '24', '25', '28', '30', '34', '35',  '50', '51') AND `name` NOT LIKE '%test%' AND `snr` NOT IN ('Non CC', 'Transfered', 'Terminated', 'Exit') AND `name` <> '$username' ORDER BY `name`");
	$row_getAllAgent = mysqli_fetch_assoc($result_getAllAgent);
	
	if(($TotalQ>0) || ($TotalTL>0)){
		//Allow in
	} else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('You do not have right to access this page! Please Contact system administrator for guidance.');\n";
		echo "window.location='".$AgentViewLink."'";
		echo "</script>";
	}

?>
