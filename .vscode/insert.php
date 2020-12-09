<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
//$con = mysqli_connect('localhost', 'ebu_user', 'K@jiado78??','EBU_database');
include "dbconn.php";
// Get post records
$monthSelected = @$_POST["month"];
$yearSelected = @$_POST["year"];
$SRDate = @$_POST["SRDate"];
$AssessmentDate = @$_POST["AssessmentDate"];
$SRNo = @$_POST["SRNo"];
$EmployeeName = @$_POST["EmployeeName"];
$Segment = @$_POST["Segment"];
$Assign = @$_POST["Assign"];
$OrderCreation = @$_POST["OrderCreation"];
$SRClose = @$_POST["SRClose"];
$KYC = @$_POST["KYC"];
$Quality = @$_POST["Quality"];
$Comments = @$_POST["Comments"];

//conditions
if ($monthSelected == "" || $yearSelected == "" || $SRDate == "" || $AssessmentDate == "" || $SRNo == "" || $EmployeeName == "" || $Segment == "" || $Assign == "" || $OrderCreation == "" || $SRCLose == "" || $SRClose == "" || $KYC == "" || $Quality == "" ) {
?>
	
<script type="text/javascript" language="javascript">

	var message = 'Please fill out all the fields';
	
	confirm(message)
	window.location.href="../ESD/esdassessment.html";

</script>

<?
} else {
 
$checkCount = "select count(*) as assCount from 'tbl_esdassessments' where EmployeeName = '$EmployeeName' and monthSelected = '$monthSelected'  and yearSelected = '$yearSelected'";
 
set $rsCount = $con.execute($checkCount);
 
if ($rsCount.$eof || $rsCount.$bof) {
	$assCount= 0;
} else {
	$assCount = $rsCount["assCount"];
}
?>

<? 
$checkSRno = "select count(*) as SRnoCount from 'tbl_esdassessments' where SRNo = '$SRNo' ";
 
set $rsSRno = $con.execute($checkSRno);
 
if ($rsSRNo.$eof || $rsSRNo.$bof) {
	$SRNoCount = 0;
} else {
	$SRNoCount = $rsSRNo["SRnoCount"];
}
 
if ($assCount >= 5) {
?>
	
<script type="text/javascript" language="javascript">

	var message = 'Maximum Assessments for <?=$EmployeeName, 'for' $monthSelected, $yearSelected?> have been reached.';
	
	confirm(message)
	window.location.href="../ESD/esdassessment.html";

</script>

<?
} else {

//DB insert SQL code
$sqlInsert = "insert into 'tbl_EsdAssessment2019'('id', 'monthSelected', 'yearSelected', 'SRDate', 'AssessmentDate', 'SRNo', 'EmployeeName', 'Segment', 'Assign', 'OrderCreation', 'SRCLose',  "._; 
" 'KYC', 'Quality', 'Comments',) values('$monthSelected','$yearSelected','$SRDate','$AssessmentDate','$SRNo','$EmployeeName', '$Segment','$Assign','$OrderCreation','$SRClose','$KYC','$Quality','$Comments')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Evaluation Records Saved Successfully!";
}
?>
