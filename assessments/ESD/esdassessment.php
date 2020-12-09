<?php
ini_set('display_errors', 1); error_reporting(E_ALL);

$monthnow = date ('F');
$yearnow = date ('Y');
$now = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>EBU Experience Assurance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="plugins/jquery/dist/jquery.min.js"></script>

    <script src="plugins/bootstrap/dist/js/popper.min.js"></script>

    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- FAVICON -->
    <link href="images/green.png" rel="shortcut icon">
    <!-- owl carousel css -->
    <link href="css/owl.carousel.css" rel="stylesheet">

    <link href="css/myCss.css" rel="stylesheet">

    <link href="multimenu/style.css" rel="stylesheet" id="bootstrap-css">

    <style type="text/css">
        .navbar-default.sticky-top {
            background: #fff;
            box-shadow: 0px 3px 6px 3px rgba(0, 0, 0, 0.06);
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
        }
    </style>

    <link href="css/topmenu.css" rel="stylesheet">
</head>

<body class="body-wrapper">

    <header class="navbar navbar-expand-md navbar-default sticky-top" data-spy="affix" data-offset-top="400">
        <div class="container" style="max-width: 1440px;">
            <div class="row">

                <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand pull-right" href="">
                        <img src="images/EBU_logo.png" alt="EBU_logo">
                    </a>

                </nav>
            </div>
        </div>

    </header>

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>EBU-Experience Assurance</h3> 
                    <br>
                    <h3>ESD Analyst Assessment</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <section class="blog single-blog section">
        <div class="container" style="max-width: 1350px;">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                    <div class="sidebar">
                        <!-- Category Widget -->
                        <div class="widget category-list">
                            <!-- Widget Header -->
                            <h4 class="widget-header">Navigation Menu</h4>
                            <ul class="category-list">
                                <!--<li><a href="./">About </a></li> -->
                                <li><a href="../Other_Deployments/LE&P_Acc_Manager_Assessment.html">LE &amp; P Acc.
                                        Manager
                                        Assessment</a></li>
                                <li><a href="../ESD/esdassessment.php">ESD Analyst Assessment</a></li>
                                <li><a href="../Other_Deployments/Deployment_Partner_Assessment.html">Deployment Partner
                                        Assessment </a></li>
                                <li><a href="../Other_Deployments/Deployment_Project_Manager_Assessment.html">Deployment
                                        Project Manager
                                        Assessment </a></li>
                                <li><a href="../Other_Deployments/LE&P_Inline_Quality_Assessment.html">LE&amp;P Inlife
                                        Quality
                                        Assessment </a></li>
                                <li><a href="../Other_Deployments/LE&P_Inline_Survey_Assessment.html">LE&amp;P Inlife
                                        Survey
                                        Assessment </a></li>
                                <li><a
                                        href="../Other_Deployments/Enterprise_ Platinum_ Support_ Survey_ Assessment.html">Enterprise
                                        Platinum Support Survey
                                        Assessment </a></li>
                                <li><a href="../Other_Deployments/Enterprise_ Technical_ Quality_ Assessment.html">Enterprise
                                        Technical Quality
                                        Assessment </a></li>
                                <li><a href="../Other_Deployments/Enterprise_ Technical_ Support_ NPS_ Assessment.html">Enterprise
                                        Technical Support NPS
                                        Survey Assessment </a></li>
                                <li><a href="../Other_Deployments/Merchant_ Onboarding_ Quality_ Assessment.html">Merchant
                                        Onboarding Quality
                                        Assessment </a></li>
                                <li><a
                                        href="../Other_Deployments/Merchant_ Onboarding_ Region_ Quality_ Assessment.html">Merchant
                                        Onboarding Quality
                                        Region Assessment </a></li>
                                <li><a href="../Other_Deployments/SME_ NPS_ Assessment.html">SME NPS Survey Assessment
                                    </a></li>

                                <li><a href="../Other_Deployments/SME_ Territory_ Manager_ Acqusition_ Assessment.html">SME
                                        Territory Manager
                                        Acquisition Assessment</a></li>
                                <li><a href="../Other_Deployments/SME_ Territory_ Manager_ Retention_ Assessment.html">SME
                                        Territory Manager
                                        Retention Assessment</a></li>

                                <li><a href="../Other_Deployments/SOHO_ Sales_ Executive_ Survey_ Assessment.html">SOHO
                                        Sales Executive Assessment </a>
                                </li>
                                <li><a href="../Other_Deployments/Masoko_ 2nd_ Line_ Quality_ Assessment.html">Masoko
                                        2nd Line Quality
                                        Assessment </a></li>
                                <li><a href="../Other_Deployments/Masoko_ NPS_ Survey_ Assessment.html">Masoko NPS
                                        Survey Assessment
                                    </a></li>
                                <li><a href="../Other_Deployments/Dealer_ Manager_ NPS_ Survey_ Assessment.html">Dealer
                                        Manager NPS
                                        Survey Assessment </a></li>
                                <li><a
                                        href="../Other_Deployments/Telephone_ Relationship_ Executive_ NPS_ Survey_ Assessment.html">Telephone
                                        Relationship Executive NPS Survey Assessment </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Edit Personal Info -->
                    <!--div class="widgetRCSC personal-info"-->

                    <ul class="topmenu">

                        <li class="menuitem active"><a href="esdassessment.php">Home</a></li>

                        <li class="menuitem"><a href="editor.php">Editions</a></li>
                        <li class="menuitem"><a href="individualreport.php">Individual Report</a></li>
                        <li class="menuitem"><a href="Monthlyreport.php">Monthly Report</a></li>

                        <!--li class="menuitem"><a href="ShopReport.asp">Individual Shop Report</a></li-->
                        <!--li class="menuitem"><a href="RegionalReport.asp">Regional Report</a></li-->

                    </ul>

                    <form action="weka.php" method="POST">
                        <!-- EBU -->
                        <div class="form-group row">

                            <div class="col-lg-3">

                                <label for="first-name">Month</label>
                                <input type="text" class="form-control" id="month" name="month" value="<?=$monthnow?>"
                                    style="height: 55%;" required readonly />
                            </div>

                            <div class="col-lg-3">
                                <label for="first-name">Year</label>
                                <input type="text" class="form-control" id="year" name="year" value="<?=$yearnow?>"
                                    style="height: 55%;" required readonly />
                            </div>

                            <div class="col-lg-3">
                                <label for="first-name">Date of SR</label>
                                <input type="date" class="form-control" id="SRDate" name="SRDate" style="height: 55%;"
                                    required />
                                <input type="hidden" class="form-control" id="AssessmentDate" name="AssessmentDate"
                                    value="<?php echo $now;?>" style="height: 55%;" required readonly />
                            </div>

                            <div class="col-lg-3">
                                <label for="first-name">SR Number</label><input type="text" class="form-control"
                                    id="SRNo" name="SRNo" style="height: 55%;" required />
                            </div>

                        </div>

                        <div class="form-group row">

                        <div class="col-lg-3" >
								<label for="first-name">ESD Analyst</label>
								<select type="text" class="form-control" id="EmployeeName" name="EmployeeName" onChange="getsegment(this.value)" required>
									<option value="">Select ESD Analyst</option>
									<?
									while not ($rsEmployees.$eof or $rsEmployees.$bof);
									?>
									<option value="<?=$rsEmployees?>"><?=$rsEmployees?></option>
									<?
									$rsEmployees.$MoveNext;
									}
									?>
								</select>
							</div>

                            <div class="col-lg-3" id="Segment">
                                <label for="first-name">Segment</label>
                                <input type="text" class="form-control" id="Segment" name="Segment" style="height: 55%;"
                                    required readonly />
                            </div>

                            <script type="text/javascript">
                                function getSegments(empname) {
                                    $.ajax({
                                        type: "POST",
                                        url: "getSegments.asp",
                                        data: {
                                            empname: empname
                                        },
                                        success: function(data) {
                                            $("#Segment").html(data);
                                        },
                                        error: function(data) {
                                            $("#Segment").html("Failed " + data);
                                        }
                                    });
                                }
                            </script>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#esdassessment">ESD Analyst
                                    Assessment</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="ESDassessment" class="container tab-pane active">
                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <th colspan="2">SLA</th>
                                    </tr>

                                    <tr>
                                        <td width="67%">Was SR assigned on time? Did the team marshal assign activity
                                            within 2hr SLA<br></td>

                                        <td width="33%" colspan="2">Yes
                                            <input name="Assign" type="radio" value="15" />
                                            &nbsp No
                                            <input name="Assign" type="radio" value="0" /></td>

                                    </tr>
                                    <tr>
                                        <td>Did the agent create an order within 2hrs of receiving customer request? and
                                            if not were internal teams informed?</td>
                                        <td colspan="2">Yes
                                            <input name="OrderCreation" type="radio" value="30" />
                                            &nbsp No
                                            <input name="OrderCreation" type="radio" value="0" />
                                            &nbsp Partly
                                            <input name="OrderCreation" type="radio" value="15" />
                                            &nbsp N/A
                                            <input name="OrderCreation" type="radio" value="30" /></td>
                                    </tr>

                                    <tr>
                                        <td>Was SR closed on time based on final activity on that SR? If the SR was
                                            transferred, Last activity of the owner. Check service request log. Should
                                            be transferred within 2 hours of the activity. <br> </td>
                                        <td colspan="">Yes <input name="SRClose" type="radio" value="15" /> &nbsp No
                                            <input name="SRClose" type="radio" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"> Quality</th>
                                    </tr>

                                    <tr>
                                        <td>KYC adherance , Quality and Accuracy of the Order</td>
                                        <td colspan="">Yes
                                            <input name="KYC" type="radio" value="30" />
                                            &nbsp No
                                            <input name="KYC" type="radio" value="0" />
                                            &nbsp N/A
                                            <input name="OrderCreation" type="radio" value="30" /></td>
                                    </tr>

                                    <tr>
                                        <td>Marking quality ticket?</td>
                                        <td colspan="">Yes <input name="Quality" type="radio" value="10" /> &nbsp No
                                            <input name="Quality" type="radio" value="0" />
                                            &nbsp N/A
                                            <input name="OrderCreation" type="radio" value="10" /></td>
                                    </tr>

                                    <tr>
                                        <td>Comments and Observations:</td>
                                        <td colspan="2"><textarea class="form-control" name="Comments" cols=""
                                                rows=""></textarea></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="5">

                                            <input name="btnSubmit" type="submit" value="Submit ESD Analyst Assessment"
                                                class="btn btn-success"> <input name="Clear" type="reset" value="Clear"
                                                class="btn btn-danger">

                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                        <!-- end Nav tabs -->
                    </form>

                </div>
            
            </div>

            <div id="successalertModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title  text-center" style="color:green;">Success!</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center"></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" data-dismiss="modal" onclick="reload()">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>
        </div>
    </section>

    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- About -->
                    <div class="block about">
                        <!-- footer logo -->
                        <img src="images/EBU_logo.png" alt="EBU Logo">
                    </div>
                </div>

                <div class="col-lg-3">
                    <!-- About -->
                    <div class="">
                        <p style="color: #fff;">&copy; SafaricomIntranet 2020 – All Right Reserved</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </footer>

    <!-- JAVASCRIPTS -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="plugins/tether/js/tether.min.js"></script>
    <script src="plugins/raty/jquery.raty-fa.js"></script>

    <script src="plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="plugins/smoothscroll/SmoothScroll.min.js"></script> 

</body>

</html>