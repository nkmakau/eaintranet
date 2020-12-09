<?
 
if (@$_POST["btnSubmit"] == "Submit ESD Analyst Assessment") {
 
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
 
 
if ($monthSelected == "" || $yearSelected == "" || $SRDate == "" || $AssessmentDate == "" || $SRNo == "" || $EmployeeName == "" || $Assign == "" || $OrderCreation == "" || $SRCLose == "" || $SRClose == "" || $KYC == "" || $Quality == "" ) {
?>
	
<script type="text/javascript" language="javascript">

	var message = 'Please fill out all the fields';
	
	confirm(message)
	window.location.href="<?=$HTTP_esdPath?>";

</script>

<?
} else {
 
$checkCount = "select count(*) as assCount from ".tbl_EsdAssessment2019." where EmployeeName = '".$EmployeeName."' and monthSelected = '".$monthSelected."'  and yearSelected = '".$yearSelected."'";
 
set $rsCount = $econn.execute($checkCount);
 
if ($rsCount.$eof || $rsCount.$bof) {
	$assCount= 0;
} else {
	$assCount = $rsCount["assCount"];
}
 
 
$checkSRno = "select count(*) as SRnoCount from ".tbl_EsdAssessment2019." where SRNo = '".$SRNo."' ";
 
set $rsSRno = $econn.execute($checkSRno);
 
if ($rsSRNo.$eof || $rsSRNo.$bof) {
	$SRNoCount = 0;
} else {
	$SRNoCount = $rsSRNo["SRnoCount"];
}
 
if ($assCount >= 5) {
?>
	
<script type="text/javascript" language="javascript">

	var message = 'Maximum Assessments for <?=$EmployeeName.", for ".$monthSelected.", ".$yearSelected?> have been reached.';
	
	confirm(message)
	window.location.href="<?=$HTTP_esdPath?>";

</script>

<?
} else {
 
if ($SRnoCount == 0) {
 
$sqlInsert = "insert into ".tbl_EsdAssessment2019."(monthSelected, yearSelected, SRDate, AssessmentDate, SRNo, EmployeeName, Segment, Assign, OrderCreation, SRCLose,  "._; 
" KYC, Quality, Comments,Assessor) values('".$monthSelected."', "._;  
" '".$yearSelected."','".$SRDate."','".$AssessmentDate."','".$SRNo."','".$EmployeeName."', '".$Segment."','".$Assign."','".$OrderCreation."','".$SRClose."','".$KYC."','".$Qulaity."',"._; 
" '".$Comments."', '".$SmallUser."')";
 
$econn.execute($sqlInsert);
?>
	
<script type="text/javascript" language="javascript">

	var message = 'Assessment for <?=$EmployeeName.", for ".$monthSelected.", ".$yearSelected?> has been submitted';
	
	confirm(message)
	window.location.href="<?=$HTTP_esdPath?>";

</script>

<?
} else {
?>
	
<script type="text/javascript" language="javascript">

	var message = 'The SR Number you have entered has been assessed';
	
	confirm(message)
	window.location.href="<?=$HTTP_esdPath?>";

</script>

<?
}
 
}
 
}
 
}
?>
