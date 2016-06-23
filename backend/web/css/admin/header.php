<?php
//include('connection.php');
if(!defined('__CONFIG'))
{
	include_once('../config.php');
}


if(isset($_SESSION['email'])){
	
}
else{
		header("Location:login.php");
}

// lets check role_id
if(isset($_SESSION['role_id']) && $_SESSION['role_id'] != 'superadmin'){
	header("Location:login.php");
}

// lets check role_id
if(!isset($_SESSION['role_id'])){
	header("Location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php if(isset($_SESSION['company_name'])) { echo $_SESSION['company_name']; } ?> | Shelf</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="./../manage/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="./../manage/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="./../manage/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="./../manage/assets/css/jquery-ui-1.10.3.full.min.css" />
		<link rel="stylesheet" href="./../manage/assets/css/datepicker.css" />
<!--		<link rel="stylesheet" href="./../manage/assets/css/ui.jqgrid.css" /> -->
		<!-- fonts -->
		
		<!-- jquery is required -->
		<!--<script src="././../manage/assets/includes/js/jquery.js"></script> -->
		<!-- jquery.validate is required for form validations -->
		<!--<script src="././../manage/assets/includes/jquery-validation/dist/jquery.validate.js"></script>-->

		

		


		<link rel="stylesheet" href="./../manage/assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="./../manage/assets/css/ace.min.css" />
		<link rel="stylesheet" href="./../manage/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="./../manage/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="./../manage/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

<script src="./../manage/jquery.js" type="text/javascript"></script>
<script src="./../manage/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="http://www.google.com/jsapi"></script> -->
<script type="text/javascript" src="./../manage/js/jsapi.js"></script>
<script type="text/javascript" src="./../manage/scripts/dygraph-combined.js"></script>
<script type="text/javascript" src="./../manage/scripts/highcharts.js"></script>
<!-- <script src="js/jquery.mobile-1.3.0.min.js"></script>  -->
<script src="./../manage/js/jquery-ui-1.10.2.custom.min.js"></script>
<script  type="text/javascript" src="./../manage/js/flot/jquery.flot.js"></script>
<script  type="text/javascript" src="./../manage/js/flot/jquery.flot.time.js"></script>


	
<!-- <link href="css/jquery.mobile-1.1.1.css" rel="stylesheet"> -->
<!--<link href="css/ui-lightness/jquery-ui-1.10.2.custom.css" rel="stylesheet"> -->

<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->


<style type="text/css">
.visible{ visibility: visible; display: block;}
.not_visible{ visibility: hidden; display: none;}
.demo-placeholder {
	width: 450px;
	height: 270px;
	font-size: 14px;
	line-height: 1.2em;
}

.demo-container {
	box-sizing: border-box;
	width: 450px;
	height: 270px;
	padding: 20px 15px 15px 15px;
	border: 1px solid #ddd;
	background: #fff;
	background: linear-gradient(#f6f6f6 0, #fff 50px);
	background: -o-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -ms-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -moz-linear-gradient(#f6f6f6 0, #fff 50px);
	background: -webkit-linear-gradient(#f6f6f6 0, #fff 50px);
	box-shadow: 0 3px 10px rgba(0,0,0,0.15);
	-o-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-ms-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-moz-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
	-webkit-box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.containing-element .ui-slider-switch { width: 13em }

</style>

		<!-- ace settings handler -->

		<script src="./../manage/assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="./../manage/assets/js/html5shiv.js"></script>
		<script src="./../manage/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
						<img src="./images/logo.png"  height="28">
							&nbsp;&nbsp;<?php if(isset($_SESSION['company_name'])) { echo $_SESSION['company_name']; } ?> Shelf
						</small>
					</a><!-- /.brand -->
	
				</div><!-- /.navbar-header -->
				
				<!--
				<div class="navbar-header pull-right" role="navigation">
						<ul class="nav ace-nav">
						<li>
						<img src="images/mintm.png" width="28" >
						</li>
						</ul>
				</div>
				-->

				<div class="navbar-header pull-right" role="navigation">
				
						<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src=".<?php echo $_SESSION['photo']; ?>" alt="<?php echo $_SESSION['first_name']; ?> Photo" /> -->

								<span class="user-info">
									<small>Welcome,</small>
									<?php 
									if(isset($_SESSION['first_name']) && isset($_SESSION['last_name']))
									echo $_SESSION['first_name']." ".$_SESSION['last_name']; 
									else if(isset($_SESSION['first_name']))
									echo $_SESSION['first_name'];
									else 
									echo $_SESSION['email'];
									?>
								</span>

								<i class="icon-caret-down"></i>
							</a>
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
	
								<!--
								<li>
									<a href="myprofile.php">
										<i class="icon-user"></i>
										My Profile
									</a>
								</li>

								<li>
									<a href="changepass.php">
										<i class="icon-key"></i>
										Change Password
									</a>
								</li>
								

								<li class="divider"></li>
								-->

								<li>
									<a href="logout.php">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				
							<button class="btn btn-success" onclick="document.location.href = 'index.php';">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info" >
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning" >
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger" >
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->
					
					
					<?php
									function getLeftMenuClass($needle)
									{
										if(contains($needle,get_current_page_url()))
										{
											return 'class="active open"';
										}
									}
					?>


					<ul class="nav nav-list">			

						<li>
							<a href="index.php" class="dropdown-toggle">
								<i class="icon-home"></i>

								<span class="menu-text">
									Home
								</span>

							</a>
						
							
					  </li>
						
			

						





												<li <?php echo getLeftMenuClass('company'); ?>>
													<a href="company.php">
														<i class="icon-double-angle-right"></i>
														Publishers
												</a>
												</li>

												<li <?php echo getLeftMenuClass('advertiser'); ?>>
													<a href="advertiser.php">
														<i class="icon-double-angle-right"></i>
														Advertisers
												</a>
												</li>

												<li <?php echo getLeftMenuClass('agency'); ?>>
													<a href="agency.php">
														<i class="icon-double-angle-right"></i>
														Agencies
												</a>
												</li>

												<li <?php echo getLeftMenuClass('adcategory'); ?>>
													<a href="adcategory.php">
														<i class="icon-double-angle-right"></i>
														AD Categories
												</a>
												</li>

												<li <?php echo getLeftMenuClass('adtype'); ?>>
													<a href="adtype.php">
														<i class="icon-double-angle-right"></i>
														AD Types
												</a>
												</li>
												
												<li <?php echo getLeftMenuClass('ads'); ?>>
													<a href="ads.php">
														<i class="icon-double-angle-right"></i>
														ADs
												</a>
												</li>	

												<li <?php echo getLeftMenuClass('devices'); ?>>
													<a href="devices.php">
														<i class="icon-double-angle-right"></i>
														Devices
												</a>
												</li>	
												
												<li <?php echo getLeftMenuClass('category'); ?>>
													<a href="category.php">
														<i class="icon-double-angle-right"></i>
														Categories
												</a>
												</li>

												 <li <?php echo getLeftMenuClass('display_est.php'); ?> <?php echo getLeftMenuClass('footfall.php'); ?> <?php echo getLeftMenuClass('adview.php'); ?> <?php echo getLeftMenuClass('adview_est.php'); ?> <?php echo getLeftMenuClass('battery.php'); ?>>
							<a href="#" class="dropdown-toggle">
								<i class="icon-bar-chart"></i>

								<span class="menu-text">
									Settings
								</span>

								<b class="arrow icon-angle-down"></b>
							</a>
						
							<ul class="submenu">
									<li <?php echo getLeftMenuClass('city.php'); ?>>
										<a href="city.php">
											<i class="icon-double-angle-right"></i>
											Cities
										</a>
									</li>
									
									<li <?php echo getLeftMenuClass('state.php'); ?>>
										<a href="state.php">
											<i class="icon-double-angle-right"></i>
											States
										</a>
									</li>
								
									<li <?php echo getLeftMenuClass('country.php'); ?>>
										<a href="country.php">
											<i class="icon-double-angle-right"></i>
											Counteries
										</a>
									</li>
									
								
							</ul>
					  </li>
										
	

					 

					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

<?php
function gethighlight($needle)
{
	if(contains($needle,get_current_page_url())){
	    return 'style="font-weight: bold"';
	} else{
	    return '';
	}
}
?>