<?php
include "dbconn.php";
?>
<?

$selectedEmpname = @$_POST["empname"];
 
$sqlSegments = "select Segment from ".tbl_users." where EmployeeName='".$selectedEmpname."' ";
 
$rsSegments = execute($sqlSegments);
 
if ($rsSegments.$eof || $rsSegments.$bof) {
	$Segment =  "";
	
	} else {
	$Segment = $rsSegments["Segment"];
	
}
 
 
echo "<label for='first-name'>Segment</label>";
echo "<input type='text' class='form-control' id='Segment' name='Segment' value='".$Segment."' style = 'height: 55%;' readonly />";
 
?>