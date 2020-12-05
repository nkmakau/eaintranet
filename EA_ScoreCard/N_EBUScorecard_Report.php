<?php 
	
	ini_set('display_errors', 1); error_reporting(E_ALL);
	
	require_once('N_EBUScorecard/config.php'); 
	require_once('N_EBUScorecard/permissions.php'); 
	
	if(isset($_GET['Page'])){
		$Page = $_GET['Page'];
	} else {
		$Page = 1;
	}

	
	if(isset($_GET['SDate'])){
		$SDate = $_GET['SDate'];
	} else {
		$SDate =  "%%";
	}
	if(isset($_GET['SMonth'])){
		$SMonth = $_GET['SMonth'];
	} else {
		$SMonth =  "%%";
	}
	if(isset($_GET['SSubmitter'])){
		$SSubmitter = $_GET['SSubmitter'];
	} else {
		$SSubmitter =   "%%";
	}
	if(isset($_GET['SAgent'])){
		$SAgent = $_GET['SAgent'];
	} else {
		$SAgent =   "%%";
	}
	if(isset($_GET['STL'])){
		$STL = $_GET['STL'];
	} else {
		$STL =   "%%";
	}
			
	$RowsPerPage = 20;
	$offset =  (($Page-1)*$RowsPerPage);
	
	//Get Username for Updater
	$result_getUpdater = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE Uploader='" . $username . "'");
	$TotalUpdater = mysqli_num_rows($result_getUpdater);	
	
	//Get Unique Month
	$result_getMonth = mysqli_query($link,"SELECT DISTINCT Month FROM `EBU_ScoreCard` Order by Month DESC");
	$row_getMonth = mysqli_fetch_array($result_getMonth);
	
	//Get Unique Financial Year
	$result_getFYear = mysqli_query($link,"SELECT DISTINCT FYear FROM `EBU_ScoreCard` ORDER by FYear DESC ");
	$row_getFYear = mysqli_fetch_array($result_getFYear);
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//Search records
		if(isset($_POST['Search'])){
			if(!empty($_POST['SDate'])){
				$Date = date("Y-m-d", strtotime($_POST['SDate']));
				$SDate = $Date."%";
			}  
			if(!empty($_POST['SMonth'])){
				$SMonth = $_POST['SMonth'];
			} 
			if(!empty($_POST['Submitter'])){
				$Submitter = $_POST['Submitter'];
				$SSubmitter = "%".$Submitter."%";
			}  
			if(!empty($_POST['Agent'])){
				$SAgent = "%".$_POST['Agent']."%";
			} 
			if(!empty($_POST['FYear'])){
				$FYear = $_POST['FYear'];
			}   
			if(!empty($_POST['TL'])){
				$STL = "%".$_POST['TL']."%";
			} 
		}
	} //End of Post
	
	$searchCat = "&SDate=$SDate&SMonth=$SMonth&SSubmitter=$SSubmitter&SAgent=$SAgent&FYear=$FYear&STL=$STL";
		
	//Get Total Records
	$result_totalRecords = mysqli_query($link,"
		SELECT COUNT(ID) AS TotalRecords
		FROM EBU_ScoreCard
		Where UploadDate LIKE '".$SDate."' AND Month LIKE '".$SMonth."' AND Uploader LIKE '".$SSubmitter."' AND Agentname LIKE '".$SAgent."' AND FYear LIKE '".$FYear."' AND TM LIKE '".$STL."'") or die(mysqli_error($link));
	$row_totalRecords = mysqli_fetch_array($result_totalRecords);
	$TotalRecords = $row_totalRecords['TotalRecords'];
	
	$TotalPages = ceil($TotalRecords / $RowsPerPage);
	
	//Get all data 
	$result_getData = mysqli_query($link,"SELECT * FROM `EBU_ScoreCard` 
		Where UploadDate LIKE '".$SDate."' AND Month LIKE '".$SMonth."' AND Uploader LIKE '".$SSubmitter."' AND Agentname LIKE '".$SAgent."' AND FYear LIKE '".$FYear."' AND TM LIKE '".$STL."' Order by UploadDate DESC
		LIMIT $offset, $RowsPerPage") or die(mysqli_error($link));
	$row_getData = mysqli_fetch_array($result_getData);
	$TotalData = mysqli_num_rows($result_getData);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Report :: Scorecard<?php echo $FromYear." - ".$ToYear; ?></title>
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
		<h2 class="w3-left">Scorecard Report</h2>
		<?php require_once($Menu); ?>
	</div>
	<div class="w3-container">
		<p class="w3-text-green"><b>Welcome <?php echo $row_getUser['name']." - (".$row_getUser['ekno2']; ?>)</b></p>
	</div>
	<div class="w3-container">
			<div class="w3-margin-bottom">
				<form method="post" action="<?php echo $ReportLink; ?>">
					<table class="w3-table-all">
						<tr class="w3-green w3-center">
							<td colspan="10"><b>Search Records</b></td>
						</tr>
						<tr>
						<?php if($TotalTL>0){ /*Hide Submitter for TLs and show TL Name*/ ?>
							<th>TL Name</th>
							<td>
								<select class="w3-input w3-border w3-border-green" name="TL">
									<option value=""> - Select TL - </option>
								<?php do { ?>
									<option value="<?php echo $row_getAllTL['TLJina']; ?>"><?php echo $row_getAllTL['TLJina']; ?></option>
								<?php } while ($row_getAllTL = mysqli_fetch_assoc($result_getAllTL)); ?>
								</select>									
							</td>					
						<?php } else { ?>
							<th>Submitter</th>
							<td>
								<input class="w3-input w3-border w3-border-green" name="Submitter" type="text">
							</td>
						<?php } ?>
							<th>Agent</th>
							<td>
								<input class="w3-input w3-border w3-border-green" name="Agent" type="text">
							</td>
							<th>Date</th>
							<td><input class="w3-input w3-border w3-border-green" name="SDate" type="date"></td>
							<th>Month</th>
							<td>
								<select class="w3-input w3-border w3-border-green" name="SMonth">
									<option value="">Select Month</option>
								<?php do { ?>
									<option value="<?php echo $row_getMonth['Month'] ?>"><?php echo $row_getMonth['Month'] ?></option>
								<?php } while ($row_getMonth = mysqli_fetch_array($result_getMonth)); ?>
								</select>
							</td>
							<th>FYear</th>
							<td>
								<select class="w3-input w3-border w3-border-green" name="FYear">
									<option value="">Select FYear</option>
								<?php do { ?>
									<option value="<?php echo $row_getFYear['FYear'] ?>"><?php echo $row_getFYear['FYear'] ?></option>
								<?php } while ($row_getFYear = mysqli_fetch_array($result_getFYear)); ?>
								</select>
						</tr>
						<tr>
							<td colspan="10" class="w3-center"><input class=" w3-button w3-green" name="Search" type="submit" value="Search Scores"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="w3-container">
		<?php /*echo "TotalQ: ".$TotalQ." TotalTL ".$TotalTL;*/ ?>
			<div class="w3-bar">
				<a href="<?php echo $ExportLink; ?>&	
					Page=<?php echo $Page; ?>
					&SDate=<?php echo $SDate; ?>
					&SMonth=<?php echo $SMonth; ?>
					&SSubmitter=<?php echo $SSubmitter; ?>
					&SAgent=<?php echo $SAgent; ?>
					&FYear=<?php echo $FYear; ?>
					&STL=<?php echo $STL; ?>" target="_blank" class="w3-bar-item w3-button w3-green w3-right"><b>Export</b></a>
				
			<?php if($TotalQ>0){ ?>
				<a href="javascript: batchUpdate()" class="w3-bar-item w3-button w3-green w3-right w3-margin-right"><b>Batch Update</b></a>
				<a href="javascript: batchDelete()" class="w3-bar-item w3-button w3-green w3-right w3-margin-right"><b>Batch Delete</b></a>
				<a href="<?php echo $AddLink; ?>" class="w3-bar-item w3-button w3-green w3-right w3-margin-right"><b>Add Score</b></a>
			<?php } ?>
			</div>
  		</div>
		<div class="w3-container">
			<div class="w3-responsive w3-padding-16">
				<form method="post" action="" id="report">
					<table class="w3-table-all w3-hoverable w3-centered">
						<tr>
							<td colspan="14" class="w3-text-green w3-xxlarge">
									<?php if(!($Page<=1)){ ?>				
										<div class="w3-container w3-cell">
											<a href="<?php echo $ReportLink.'&Page=1'.$searchCat;?>"><i class="fa fa-angle-double-left"></i></a>
										</div>
										<div class="w3-container w3-cell">
											<a href="<?php if($Page<=1){ echo $ReportLink.'&Page=1'.$searchCat; } else { echo $ReportLink.'&Page='.($Page-1).$searchCat;} ?>"><i class="fa fa-angle-left"></i></a>
										</div>
									<?php } ?>
										<div class="w3-container w3-cell w3-large w3-cell-middle">
											<?php echo $Page; ?> / <?php echo $TotalPages; ?> Pages.
										</div>
										</div>
									<?php if(!($Page>=$TotalPages)){ ?>
										<div class="w3-container w3-cell">
											<a href="<?php if($Page>=$TotalPages){ echo $ReportLink.'&Page='.$TotalPages; } else { echo $ReportLink.'&Page='.($Page+1); } ?>"><i class="fa fa-angle-right"></i></a>
										</div>
										<div class="w3-container w3-cell">
											<a href="<?php echo $ReportLink; ?>&Page=<?php echo $TotalPages.$searchCat; ?>"><i class="fa fa-angle-double-right"></i></a>
										</div>
									<?php } ?>
									  	<div class="w3-container w3-cell w3-large w3-cell-middle">
									  		Search results <?php echo $TotalRecords; ?> Entries.
										</div>
							</td>
						</tr>
						
						<tr class="w3-green">
							<th><input class="w3-check" type="checkbox" onClick="toggle(this)"></th>
							<th>Date</th>
							<th>Agent Name</th>
							<th>Skillset</th>
							<th>Manager</th>
							<th>Month</th>
							<th>Adherence</th>
							<th>NPS</th>
							<th>Interaction</th>
							<th>Revenue</th>
							<th>SR Quality</th>
							<th>Email</th>
							<th>Submitter</th>
							<th></th>
						</tr>
						<?php 
							if($TotalData > 0){
								do {
						?>
						<tr class="w3-small">
							<td><input class="w3-check record" type="checkbox" name="record[]" value="<?php echo $row_getData['ID']; ?>"></td>
							<td><?php echo $row_getData['UploadDate']; ?></td>
							<td><?php echo $row_getData['Agentname']. " (" .$row_getData['EKNO'].")"; ?></td>
							<td><?php echo $row_getData['Skillset'] . "  (".$row_getData['Family'].")"; ?></td>
							<td><?php echo $row_getData['TM']; ?></td>
							<td><?php echo $row_getData['Month']; ?></td>
							<td>
								<?php 
									if(is_numeric($row_getData['Adherence'])){
										echo $row_getData['Adherence']."%<br><span class='w3-text-red'>PDR: ".$row_getData['AdherencePRD']."</span>"; 
									} else {
										echo "Not Apply";
									}
								?>
							</td>
							<td>
								<?php 
									if(is_numeric($row_getData['NPS'])){
										echo ($row_getData['NPS']*100)."<br><span class='w3-text-red'>PDR: ".$row_getData['NPSPDR']."</span>";
									} else {
										echo "Not Apply";
									}
								?>
							</td>
							<td>
								<?php 
									if(is_numeric($row_getData['Interactions'])){
										echo $row_getData['Interactions']."<br><span class='w3-text-red'>PDR: ".$row_getData['InteractionsPDR']."</span>";
									} else {
										echo "Not Apply";
									}
								?>
							</td>
							<td>
								<?php 
									if(is_numeric($row_getData['Revenue'])){
										echo $row_getData['Revenue']."<br><span class='w3-text-red'>PDR: ".$row_getData['RevenuePDR']."</span>"; 
									} else {
										echo "Not Apply";
									}
								?>
							</td>
							<td>
								<?php 
									if(is_numeric($row_getData['SRQuality'])){
										echo $row_getData['SRQuality']."%<br><span class='w3-text-red'>PDR: ".$row_getData['SRQualityPDR']."</span>"; 
									} else {
										echo "Not Apply";
									}
								?>
							</td>
							<td>
								<?php 
									if(is_numeric($row_getData['EmailQuality'])){
										echo $row_getData['EmailQuality']."%<br><span class='w3-text-red'>PDR: ".$row_getData['EmailQualityPDR']."</span>";
									} else {
										echo "Not Apply";
									}
								?>
							</td>
							<td><?php echo $row_getData['Uploader']; ?></td>
							<td style="vertical-align:middle">
								<?php 
									//Get Username allowed to Update/Delete
									$result_getUpdater = mysqli_query($link,"SELECT * FROM EBU_ScoreCard WHERE (Uploader='" . $username . "') AND ID='".$row_getData['ID']."'");
									$TotalUpdater = mysqli_num_rows($result_getUpdater);	
									if(($TotalUpdater > 0) || ($username == 'dkinyanjui') || ($TotalTL<0)){ 
								?>
								<a href="<?php echo $SingleUpdateLink; ?>&X=<?php echo $row_getData['ID']; ?>" class="">
									<i class="fa fa-edit" style="color:green"></i>
								</a>
								
								<a href="<?php echo $SingleDeleteLink; ?>&X=<?php echo $row_getData['ID']; ?>" class="">
									<i class="fa fa-close" style="color:green"></i>
								</a>
								<?php } ?>
							</td>
						</tr>	
						<?php 
								} while ($row_getData = mysqli_fetch_array($result_getData));
							} else {
						?>
						<tr>
							<td class="w3-text-red" colspan="13">No records! Please use the search box above.</td>
						</tr>
						<?php		
							}
						?>
						<tr>
							<td colspan="14" class="w3-text-green w3-xxlarge">
									<?php if(!($Page<=1)){ ?>				
										<div class="w3-container w3-cell">
											<a href="?Page=1"><i class="fa fa-angle-double-left"></i></a>
										</div>
										<div class="w3-container w3-cell">
											<a href="<?php if($Page<=1){ echo $ReportLink.'&Page=1'; } else { echo $ReportLink.'&Page='.($Page-1);} ?>"><i class="fa fa-angle-left"></i></a>
										</div>
									<?php } ?>
										<div class="w3-container w3-cell w3-large w3-cell-middle">
											<?php echo $Page; ?> / <?php echo $TotalPages; ?> Pages. 
										</div>
										</div>
									<?php if(!($Page>=$TotalPages)){ ?>
										<div class="w3-container w3-cell">
											<a href="<?php if($Page>=$TotalPages){ echo $ReportLink.'&Page='.$TotalPages; } else { echo $ReportLink.'&Page='.($Page+1); } ?>"><i class="fa fa-angle-right"></i></a>
										</div>
										<div class="w3-container w3-cell">
											<a href="?Page=<?php echo $TotalPages; ?>"><i class="fa fa-angle-double-right"></i></a>
										</div>
									<?php } ?>
									  	<div class="w3-container w3-cell w3-large w3-cell-middle">
									  		Search results <?php echo $TotalRecords; ?> Entries.
										</div>
							</td>
						</tr>
					</table>
				</form>
			</div>
  		</div>
	</div>

	<!-- Footer -->
	<footer class="w3-container w3-tiny">
		<p class="w3-left ">
			<?php 
				echo "Browser in use: ". $GetBrowser;
			?>
		</p>
		<div class="w3-right">
	  		<p>
	  			Designed by <a href="<?php echo $Author; ?>" target="_blank"><?php echo $AuthorName; ?></a>
	  		</p>
	  		<p id="x"></p>
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
			
			function toggle(source) {
				checkboxes = document.getElementsByName("record[]");
				for(var i=0; i<checkboxes.length;i++) {
						checkboxes[i].checked = source.checked;
				}
			}
	
			function batchUpdate() {
				var checkedrecord1 = document.getElementsByClassName("record");
				//a=checkedrecord1.length;
				var count = 0;
   				for (var i=0; i<checkedrecord1.length; i++) {       
					if (checkedrecord1[i].type == "checkbox" && checkedrecord1[i].checked == true){
          					count++;
       					}
    				}
				if (count>0) {
					document.forms["report"].action='https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1543';
					document.forms["report"].submit();
				} else {
					alert('You must select atleast two records');
				}
			} 
	
			function batchDelete() { 
				var checkedrecord2 = document.getElementsByClassName("record");
				var countx = 0;
   				for (var i=0; i<checkedrecord2.length; i++) {       
					if (checkedrecord2[i].type == "checkbox" && checkedrecord2[i].checked == true){
          					countx++;
       					}
    				}
				if (countx>0) {
					document.forms["report"].action='https://cmintranet/index.php?option=com_php&task=display&tmpl=component&Itemid=1545';
					document.forms["report"].submit();
				} else {
					alert('You must select atleast two records');
				}
			}
		</script>
</div>
</body>
</html>
