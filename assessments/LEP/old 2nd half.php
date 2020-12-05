<?php require_once('Connections/DBConn.php');
require_once('Connections/checkgrd.php');
?>
<?php
//if user is not manager...redirect to where they come from
if ($row_rsGrd['Grade']<>'Manager')
{                
?>
<script language="javascript">
     alert('You do not have rights to access to this page. \n\n Please contact the Systems Admin for assistance') 
     window.history.back();
     </script>     
     <?php
      }?>

<?php 
$currentPage = $_SERVER["PHP_SELF"];
$Value1 = $_POST['tl'];
$Value2 = $_POST['mth'];?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_DBConn, $DBConn);
$query_rscalls = "SELECT * FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%' ORDER BY Agentname LIMIT 50";
$rscalls = mysql_query($query_rscalls, $DBConn) or die(mysql_error());
$row_rscalls = mysql_fetch_assoc($rscalls);
$totalRows_rscalls = mysql_num_rows($rscalls);

mysql_select_db($database_DBConn, $DBConn);
$query_rsSMS = "SELECT * FROM sc_sms_20_21a WHERE TM LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%' LIMIT 50";
$rsSMS = mysql_query($query_rsSMS, $DBConn) or die(mysql_error());
$row_rsSMS = mysql_fetch_assoc($rsSMS);
$totalRows_rsSMS = mysql_num_rows($rsSMS);

mysql_select_db($database_DBConn, $DBConn);
$query_rsREV = "SELECT * FROM sc_rev_20_21a WHERE TLSPEC LIKE '%".$Value1."%' AND MTHSPEC LIKE '%".$Value2."%' LIMIT 50";
$rsREV = mysql_query($query_rsREV, $DBConn) or die(mysql_error());
$row_rsREV = mysql_fetch_assoc($rsREV);
$totalRows_rsREV = mysql_num_rows($rsREV);

mysql_select_db($database_DBConn, $DBConn);
$query_rsTL = "SELECT name, block, emppos, nickname FROM cm_users WHERE (empposid = 1 or empposid = 19) and block=0 ORDER BY name ASC";
$rsTL = mysql_query($query_rsTL, $DBConn) or die(mysql_error());
$row_rsTL = mysql_fetch_assoc($rsTL);
$totalRows_rsTL = mysql_num_rows($rsTL);

mysql_select_db($database_DBConn, $DBConn);
$query_rsMonths = "SELECT MonthName FROM SC_ScorecardEvalMonth WHERE (`Flag` = 'Yc' AND TLFlag=2 AND Year='Y20') ORDER BY MonthID ASC";
$rsMonths = mysql_query($query_rsMonths, $DBConn) or die(mysql_error());
$row_rsMonths = mysql_fetch_assoc($rsMonths);
$totalRows_rsMonths = mysql_num_rows($rsMonths);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teams Performance - Monthly October 2019 - March 2020...</title>
<script src="/jquery.ui-1.5.2/jquery-1.2.6.js" type="text/javascript"></script>
<script src="/jquery.ui-1.5.2/ui/ui.core.js" type="text/javascript"></script>
<script src="/jquery.ui-1.5.2/ui/ui.tabs.js" type="text/javascript"></script>
<link href="/jquery.ui-1.5.2/themes/flora/flora.tabs.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <h1>Team Leader Monthly Performance Stats </h1>
 <h3>October 2020 - March 2021 </h3>
<form id="form1" name="form1" method="POST" action="">
  <p>
    <label for="tl">TL</label>
    <label for="tl"></label>
    <select name="tl" id="tl">
      <option value="<?php echo $_POST['tl'];?>">Choose TL</option>
      <?php
do {  
?>
      <option value="<?php echo $row_rsTL['nickname']?>"><?php echo $row_rsTL['name']?></option>
      <?php
} while ($row_rsTL = mysql_fetch_assoc($rsTL));
  $rows = mysql_num_rows($rsTL);
  if($rows > 0) {
      mysql_data_seek($rsTL, 0);
	  $row_rsTL = mysql_fetch_assoc($rsTL);
  }
?>
    </select>
    <label for="mth">Period</label>
    <label for="mth"></label>
    <select name="mth" id="mth">
      <option value="<?php echo $_POST['mth'];?>">Choose Period...</option>
      <?php
do {  
?>
<option value="<?php echo $row_rsMonths['MonthName']?>"><?php echo $row_rsMonths['MonthName']?></option>
      <?php
} while ($row_rsMonths = mysql_fetch_assoc($rsMonths));
  $rows = mysql_num_rows($rsMonths);
  if($rows > 0) {
      mysql_data_seek($rsMonths, 0);
	  $row_rsMonths = mysql_fetch_assoc($rsMonths);
  }
?>
    </select>
    <input type="submit" name="button" id="button" value="Search" />
 </p>
</form>
<div id="jQueryUITabs1">
  <ul>
    <li><a href="#jQueryUITabs1-1"><span>Calls</span></a></li>
    <li><a href="#jQueryUITabs1-2"><span>SMS</span></a></li>
    <li><a href="#jQueryUITabs1-3"><span>Reversal</span></a></li>
  </ul>
  <div id="jQueryUITabs1-1">
    
    <?php if ($totalRows_rscalls > 0) { // Show if recordset not empty ?>
      <h3> <strong>TL : <?php echo $row_rscalls['TLCQ']; ?> Period : <?php echo $row_rscalls['MTHCQ']; ?></strong></h3>
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td align="center" bgcolor="#E9FFBB"><strong>Agentname</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Skillset</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Call <br />
        Quality</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>SMS<br />
        Quality</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>CSAT</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>eMail</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Service <br />
        Request</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Adherence</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Calls <br />
        Answered</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Calls Ans Daily</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Hold <br />
        Time</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Talk <br />
        Time</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Short <br />
        Calls</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>FCR</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Month</strong></td>
      </tr>
    <?php do { ?>
      <tr>
        <td height="20"><?php echo $row_rscalls['Agentname']; ?> - (<?php echo $row_rscalls['EKNO']; ?>)</td>
        <td align="center"><?php echo $row_rscalls['Skillset']; ?></td>
        <td align="center"><?php if ( is_numeric($row_rscalls['CQ']) ) {
						echo round($row_rscalls['CQ'],4)*100 . "%"." ";
					} else {
					echo $row_rscalls['CQ'];
					}?></td>
        <td align="center"><?php if ( is_numeric($row_rscalls['SMSCQ']) ) {
						echo round($row_rscalls['SMSCQ'],4)*100 . "%"." ";
					} else {
					echo $row_rscalls['SMSCQ'];
					}?></td>
        <td align="center"><?php if ( is_numeric($row_rscalls['CSAT']) ) {
						echo round($row_rscalls['CSAT'],2) . "%"." ";
					} else {
					echo $row_rscalls['CSAT'];
					}?></td>
        <td align="center"><?php if (is_numeric($row_rscalls['eMail'])) {
						echo round($row_rscalls['eMail'],4)*100 . "%"." ";
					} else {
					echo $row_rscalls['eMail'];
					}?></td>
        <td align="center"><?php if (is_numeric($row_rscalls['SR'])) {
						echo round($row_rscalls['SR'],4)*100 . "%"." ";
					} else {
					echo $row_rscalls['SR'];
					}?></td>
        <td align="center"><?php if (is_numeric($row_rscalls['Adhe']) ) {
						echo round($row_rscalls['Adhe'],2). "%"." ";
					} else {
					echo $row_rscalls['Adhe'];
					}?></td>
        <td align="center"><?php echo $row_rscalls['CallsAnswered']; ?></td>
        <td align="center"><?php echo $row_rscalls['CallsAnsweredDaily']; ?></td>
        <td align="center"><?php echo $row_rscalls['HoldTime']; ?></td>
        <td align="center"><?php echo $row_rscalls['TalkTime']; ?></td>
        <td align="center"><?php  if (is_numeric($row_rscalls['ShortCalls']) ) {
						echo round($row_rscalls['ShortCalls'],2). "%"." ";
					} else {
					echo $row_rscalls['ShortCalls'];
					}?></td>
        <td align="center"><?php if (is_numeric($row_rscalls['FCR'])) {
						echo round($row_rscalls['FCR'],2). "%"." ";
					} else {
					echo $row_rscalls['FCR'];
					}?></td>
        <td><?php echo $row_rscalls['MTHCQ']; ?></td>
        </tr>
      <?php } while ($row_rscalls = mysql_fetch_assoc($rscalls)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
<?php if ($totalRows_rscalls == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>No Records for Agents on Calls...</td>
    </tr>
  </table>
  <?php } // Show if recordset empty ?>

  </div>
  <div id="jQueryUITabs1-2">
  <?php if ($totalRows_rsSMS > 0) { // Show if recordset not empty ?>
  <table width="100%" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td align="center" bgcolor="#E9FFBB"><strong>Agentname</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Skillset</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>TLCQ</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>SMS Quality</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>CSAT</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>SMS Closed</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>SMS Service Level</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Login</strong></td>
      <td align="center" bgcolor="#E9FFBB"><strong>Month</strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <td height="20"><?php echo $row_rsSMS['Agentname']; ?> - (<?php echo $row_rsSMS['EKNO']; ?>)</td>
        <td align="center"><?php echo $row_rsSMS['Skillset']; ?></td>
        <td><?php echo $row_rsSMS['TLCQ']; ?></td>
        <td><?php if ( is_numeric($row_rsSMS['SMSCQ']) ) {
						echo round($row_rsSMS['SMSCQ'],4)*100 . "%"." ";
					} else {
					echo $row_rsSMS['SMSCQ'];
					}?></td>
        <td><?php if ( is_numeric($row_rsSMS['CSAT']) ) {
						echo round($row_rsSMS['CSAT'],2) . "%"." ";
					} else {
					echo $row_rsSMS['CSAT'];
					}?></td>
        <td><?php echo $row_rsSMS['ClosedSMS']; ?></td>
        <td> <?php if ( is_numeric($row_rsSMS['ClosedSMSSLA']) ) {
						echo round($row_rsSMS['ClosedSMSSLA'],4)*100 . "%"." ";
					} else {
					echo $row_rsSMS['ClosedSMSSLA'];
					}?></td>
        <td><?php echo $row_rsSMS['Login']; ?></td>
        <td><?php echo $row_rsSMS['MTHSMS']; ?></td>
      </tr>
      <?php } while ($row_rsSMS = mysql_fetch_assoc($rsSMS)); ?>
  </table>
  <?php } // Show if recordset not empty ?>

<?php if ($totalRows_rsSMS == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>No Records for Agents on SMS...</td>
    </tr>
  </table>
  <?php } // Show if recordset empty ?>
    </ol>
  </div>
 <div id="jQueryUITabs1-3">
   <?php if ($totalRows_rsREV > 0) { // Show if recordset not empty ?>
  <table width="100%" border="1">
    <tr>
      <td bgcolor="#E9FFBB"><strong>EKNO</strong></td>
      <td bgcolor="#E9FFBB"><strong>Agentname</strong></td>
      <td bgcolor="#E9FFBB"><strong>Skillset</strong></td>
      <td bgcolor="#E9FFBB"><strong>Call Quality</strong></td>
      <td bgcolor="#E9FFBB"><strong>CSAT</strong></td>
      <td bgcolor="#E9FFBB"><strong>eMail</strong></td>
      <td bgcolor="#E9FFBB"><strong>Service <br />
        Request</strong></td>
      <td bgcolor="#E9FFBB"><strong>SLA</strong></td>
      <td bgcolor="#E9FFBB"><strong>Reversals</strong></td>
      <td bgcolor="#E9FFBB"><strong>Month</strong></td>
      </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_rsREV['EKSPEC']; ?></td>
        <td><?php echo $row_rsREV['NameSPEC']; ?></td>
        <td><?php echo $row_rsREV['SKSPEC']; ?></td>
        <td><?php if ( is_numeric($row_rsREV['CQ']) ) {
						echo round($row_rsREV['CQ'],4)*100 . "%"." ";
					} else {
					echo $row_rsREV['CQ'];
					}?>
        </td>
        <td><?php if ( is_numeric($row_rsREV['CSAT']) ) {
						echo round($row_rsREV['CSAT'],2) . "%"." ";
					} else {
					echo $row_rsREV['CSAT'];
					}?></td>
        <td><?php if ( is_numeric($row_rsREV['eMail']) ) {
						echo round($row_rsREV['eMail'],4)*100 . "%"." ";
					} else {
					echo $row_rsREV['eMail'];
					}?>
        </td>
        <td><?php if ( is_numeric($row_rsREV['SR']) ) {
						echo round($row_rsREV['SR'],4)*100 . "%"." ";
					} else {
					echo $row_rsREV['SR'];
					}?>
        </td>
        <td><?php echo $row_rsREV['SLA_RT']; ?></td>
        <td><?php if ( is_numeric($row_rsREV['REV_SRVREC']) ) {
						echo round($row_rsREV['REV_SRVREC'],2). "%"." ";
					} else {
					echo $row_rsREV['REV_SRVREC'];
					}?></td>
        <td><?php echo $row_rsREV['MTHSPEC']; ?></td>
        </tr>
      <?php } while ($row_rsREV = mysql_fetch_assoc($rsREV)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
   <?php if ($totalRows_rsREV == 0) { // Show if recordset empty ?>
     <p>No Records for Agent on Reversal / Support</p>
     <?php } // Show if recordset empty ?>
 </div>
</div>
<script type="text/javascript">
// BeginWebWidget jQuery_UI_Tabs: jQueryUITabs1
jQuery("#jQueryUITabs1 > ul").tabs({ event: "click" });

// EndWebWidget jQuery_UI_Tabs: jQueryUITabs1
</script><br /><table width="100%" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td align="center" bgcolor="#E9FFBB"><strong>Call <br />
    Quality</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>CSAT</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>Service <br />
    Request</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>eMail</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>Calls <br />
      Answered</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>Calls <br />
    Ans. Daily</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>Adherence</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>Reversals</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>Talk <br />
    Time</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>SMS <br />
    Quality</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>SMS <br />
    Closed</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>SMS SL</strong></td>
    <td align="center" bgcolor="#E9FFBB"><strong>LogIn</strong></td>
  </tr>
  <tr>
    <td align="center"><?php $result = mysql_query("SELECT Sum(CQ) AS CQ, count(CQ) cnCQ FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND CQ REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$cqt=$row['CQ']*100;
					$cqn=$row['cnCQ'];					
  					if ( $row['CQ'] <> 0 AND $row['cnCQ'] <> 0) {
						echo round(($cqt/$cqn),2). "%";
						} else {
					echo "";
					}  
					}
					?></td>
    <td align="center"><?php $result = mysql_query("SELECT Sum(CSAT) AS CSAT, count(CSAT) cnCSAT FROM sc_calls_20_21a WHERE CSAT REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$csqt=$row['CSAT']*100;
					$csqn=$row['cnCSAT'];					
  					if ( $row['CSAT'] <> 0 AND $row['cnCSAT'] <> 0) {
						echo round(($csqt/$csqn),2). "%";
						} else {
					echo "";
					}  
					}
					?></td>
    <td height="20" align="center"><?php $result = mysql_query("SELECT Sum(SR) AS SR, count(SR) cnSR FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND SR REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$srt=$row['SR']*100;
					$srn=$row['cnSR'];	
  					if ( $srt <> 0 AND $srn <> 0) {
						echo round(($srt/$srn),2) . "%";
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT Sum(eMail) AS eMail, count(eMail) cneMail FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND eMail REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$eMailt=$row['eMail']*100;
					$eMailn=$row['cneMail'];	
  					if ( $eMailt <> 0 AND $eMailn <> 0) {
						echo round(($eMailt/$eMailn),2) . "%";
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT Sum(CallsAnswered) AS CallsAnswered, count(CallsAnswered) cnCallsAnswered FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND CallsAnswered REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$CallsAnsweredt=$row['CallsAnswered'];
					$CallsAnsweredn=$row['cnCallsAnswered'];	
  					if ( $CallsAnsweredt <> 0 AND $CallsAnsweredn <> 0) {
						echo round(($CallsAnsweredt/$CallsAnsweredn),0);
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT (CallsAnsweredDaily) AS CallsAnsweredDaily, count(CallsAnsweredDaily) cnCallsAnsweredDaily FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND CallsAnswered REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$CallsAnswereddt=$row['CallsAnsweredDaily'];
					$CallsAnswereddn=$row['cnCallsAnsweredDaily'];	
  					if ( $CallsAnswereddt <> 0 AND $CallsAnswereddn <> 0) {
						echo round(($CallsAnsweredt/$CallsAnswereddn),0);
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT Sum(Adhe) AS Adhe, count(Adhe) cnAdhe FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND Adhe REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$adhet=$row['Adhe'];
					$adhen=$row['cnAdhe'];	
  					if ( $adhet <> 0 AND $adhen <> 0) {
						echo round(($adhet/$adhen),2) . "%";
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT sum(REV_SRVREC) AS REV_SRVREC, count(REV_SRVREC) cnREV_SRVREC FROM sc_rev_20_21a WHERE REV_SRVREC REGEXP '[0-9]' AND TLSPEC LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$HoldTimet=$row['REV_SRVREC'];
					$HoldTimen=$row['cnREV_SRVREC'];	
  					if ( $HoldTimet <> 0 AND $HoldTimen <> 0) {
						echo round(($HoldTimet/$HoldTimen),0);
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT sum(TalkTime) AS TalkTime, count(TalkTime) cnTalkTime FROM sc_calls_20_21a WHERE Skillset <> 'SMS' AND TalkTime REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$TalkTimet=$row['TalkTime'];
					$TalkTimen=$row['cnTalkTime'];	
  					if ( $TalkTimet <> 0 AND $TalkTimen <> 0) {
						echo round(($TalkTimet/$TalkTimen),2);
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT sum(SMSCQ) AS SMSCQ, count(SMSCQ) cnSMSCQ FROM sc_calls_20_21a WHERE SMSCQ REGEXP '[0-9]' AND TLCQ LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$SMSCQt=$row['SMSCQ']*100;
					$SMSCQn=$row['cnSMSCQ'];
					//echo $SMSCQt;	
  					if ( $SMSCQt <> 0 AND $SMSCQn <> 0) {
						echo round(($SMSCQt/$SMSCQn),2) . "%";
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT sum(ClosedSMS) AS SMSCL, count(ClosedSMS) cnSMSCL FROM sc_sms_20_21a WHERE ClosedSMS REGEXP '[0-9]' AND TM LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$SMSCQclt=$row['SMSCL'];
					$SMSCQcln=$row['cnSMSCL'];
					//echo $SMSCQt;	
  					if ( $SMSCQclt <> 0 AND $SMSCQcln <> 0) {
						echo round(($SMSCQclt/$SMSCQcln),0);
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT sum(ClosedSMSSLA) AS SMSSL, count(ClosedSMSSLA) cnSMSSL FROM sc_sms_20_21a WHERE ClosedSMSSLA REGEXP '[0-9]' AND TM LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$SMSCQslt=$row['SMSSL']*100;
					$SMSCQsln=$row['cnSMSSL'];
					//echo $SMSCQt;	
  					if ( $SMSCQslt <> 0 AND $SMSCQsln <> 0) {
						echo round(($SMSCQslt/$SMSCQsln),2). "%";
						} else {
					echo "";
					}  
					}?></td>
    <td align="center"><?php $result = mysql_query("SELECT sum(Login) AS SMSLG, count(Login) cnSMSLG FROM sc_sms_20_21a WHERE Login REGEXP '[0-9]' AND TM LIKE '%".$Value1."%' AND MTHCQ LIKE '%".$Value2."%'");
					while($row = mysql_fetch_array($result))
  					{
  					$SMSLGclt=$row['SMSLG'];
					$SMSLGcln=$row['cnSMSLG'];
					//echo $SMSCQt;	
  					if ( $SMSLGclt <> 0 AND $SMSLGcln <> 0) {
						echo round(($SMSLGclt/$SMSLGcln),0);
						} else {
					echo "";
					}  
					}?></td>
  </tr>
</table>
<p>
<p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rscalls);

mysql_free_result($rsSMS);

mysql_free_result($rsREV);

mysql_free_result($rsTL);

mysql_free_result($rsMonths);
?>
