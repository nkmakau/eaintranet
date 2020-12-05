<?php
	require_once('../D_EBUCareScorecard/D_EBUCareScorecard/cond.php'); 
	
	//Get CMIntranet userdata
	$user =& JFactory::getUser();
	$username = $user->get('username');
	//$username = "nkmakau";
	
	$DateTime = date("Y-m-d H:i:s");
	
	//Get Userdata
	$result_getUser = mysqli_query($link,"SELECT ekno2,name FROM cm_users WHERE username='" . $username . "'");
	$row_getUser = mysqli_fetch_array($result_getUser);
	
	//Get Financial Year (from - to year)
	$CurrentMonth = date("n"); 
	
	$month = "";
	$FromYear = "";
	$ToYear = "";
	
	if($CurrentMonth == 1){
		$month="January";
		$FromYear  = date("Y",strtotime('-1 year'));
		$ToYear = date("Y");
	} elseif($CurrentMonth == 2){
		$month="February";
		$FromYear  = date("Y",strtotime('-1 year'));
		$ToYear = date("Y");
	} elseif($CurrentMonth == 3){
		$month="March";
		$FromYear  = date("Y",strtotime('-1 year'));
		$ToYear = date("Y");
	} elseif($CurrentMonth == 4){
		$month="April";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 5){
		$month="May";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 6){
		$month="June";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 7){
		$month="July";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 8){
		$month="August";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 9){
		$month="September";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 10){
		$month="October";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} elseif($CurrentMonth == 11){
		$month="November";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} else {
		$month="December";
		$FromYear  = date("Y");
		$ToYear = date("Y",strtotime('+1 year'));
	} 
	
	$FYear = $FromYear." - ".$ToYear;
	
	$m1="April " . $FromYear;
	$m2="May " . $FromYear;
	$m3="June " . $FromYear;
	$m4="July " . $FromYear;
	$m5="August " . $FromYear;
	$m6="September " . $FromYear;
	$m7="October " . $FromYear;
	$m8="November " . $FromYear;
	$m9="December " . $FromYear;
	$m10="January " . $ToYear;
	$m11="February " . $ToYear;
	$m12="March " . $ToYear;
	
	//Links
	$AgentViewLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1538";
	$AdminAgentViewLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1549";
	$ReportLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1539";
	$AddLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1540";
	$UploadLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1541";
	$SingleUpdateLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1542";
	$MultiUpdateLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1543";
	$SingleDeleteLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1544";
	$MultiDeleteLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1545";
	$ExportLink = "https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1546";
	$Menu = "D_EBUCareScorecard/menu.php";
	$css = "D_EBUCareScorecard/css/w3.css";
	
//	$Author = "https://kinyanjui.xyz";
//	$AuthorName = "DK";
	
	$test = explode('/',$_SERVER['HTTP_USER_AGENT']);
	$GetBrowser = $test[0];
	
	function GetBrowser(){
		$Browser = $_SERVER['HTTP_USER_AGENT'];
		$ABrowser = "";
		if(preg_match('/MSIE/i',$Browser)){
			$ABrowser = "ie";
		}
		
		return $ABrowser;
	}
	
	$GetUserBrowser =  GetBrowser();
	if($GetUserBrowser == "ie"){
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Please use Chrome for better experience!');\n";
		echo "window.location='https://cmintranet/index.php/home.html'";
		echo "</script>";
	}
?>	
