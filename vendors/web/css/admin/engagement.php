<?php
if(!defined('__CONFIG'))
{
	include_once('../config.php');
}


if(!checkUserLoggedIn())
{
	header('Location: login.php');
	exit();
}
else
{
	$user_id = getLoggedInUserId();
}
$company_id = $_REQUEST['id'];
$show = $_REQUEST['show'];

if(isset($_REQUEST['store_id']) && $_REQUEST['store_id'])
$store_id = $_REQUEST['store_id'];
else
$store_id = 0;

if(isset($_REQUEST['device_id']) && $_REQUEST['device_id'])
$device_id = $_REQUEST['device_id'];
else
$device_id = 0;

if(isset($_REQUEST['ad_id']) && $_REQUEST['ad_id'])
$ad_id = $_REQUEST['ad_id'];
else
$ad_id = 0;

$all_stores = array('0' => 'All Stores');
$all_devices = array('0' => 'All Devices');
$all_ads = array('0' => 'All Ads');
?>


<?php include('header.php'); ?>

<!-- main content starts from here -->

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Admin</a>
							</li>
							<li class="active">Engagement</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>
					
					
					<div class="page-content">
					
						<div class="page-header">
							<h1>
							Engagement
								<small>
									<i class="icon-double-angle-right"></i>
									<?php echo $show; ?>
									<i class="icon-double-angle-right"></i>
									<?php echo $all_stores[$store_id]; ?>
									<i class="icon-double-angle-right"></i>
									<?php echo $all_devices[$device_id]; ?>
									<i class="icon-double-angle-right"></i>
									<?php echo $all_ads[$ad_id]; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->	
<br /><br />
							<div class="pull-right">
							<a href="engagement.php?show=today&id=<?php echo $company_id;?>">Today</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="engagement.php?show=thisweek&id=<?php echo $company_id;?>">This Week</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="engagement.php?show=thismonth&id=<?php echo $company_id;?>">This Month</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="engagement.php?show=last7days&id=<?php echo $company_id;?>">Last 7 days</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="engagement.php?show=lastweek&id=<?php echo $company_id;?>">Last Week</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="engagement.php?show=last30days&id=<?php echo $company_id;?>">Last 30 days</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="engagement.php?show=lastmonth&id=<?php echo $company_id;?>">Last Month</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="engagement.php?show=last3months&id=<?php echo $company_id;?>">Last 3 Months</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;							
							<a href="engagement.php?show=overall&id=<?php echo $company_id;?>">Over All</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;							
							</div>
<br /><br />
<div class="control-group">						
<div class="row">


									<div class="space-6"></div>

									<div class="col-sm-7 col-sm-offset-2 infobox-container">
										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="icon-tablet"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><div id="female"></div></span>
												<div class="infobox-content">Devices</div>
											</div>

											
											<!-- <div class="badge badge-success">32%</div> -->
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="icon-group"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><div id="total"></div></span>
												<div class="infobox-content">Views</div>
											</div>
											<!-- <div class="badge badge-success">32%</div>-->
										</div>
										</div>
</div>
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div id="chart_div" style="width: 1100px; height: 400px;"></div>
							</div>	
						</div>							
</div>
<?php include('footer.php'); ?>


<!-- Load jQuery -->
<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"> </script>
	
<!-- Load Google JSAPI -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
<script type="text/javascript">

        google.load("visualization", "1", { packages: ["corechart"] });
        google.setOnLoadCallback(drawChart);
		
		

        function drawChart() {

				jsonData = $.ajax({
					url: 'engagement_data.php?show=<?php echo $show; ?>'+'&id='+<?php echo $company_id; ?>,
					dataType: "json",
					async: false
				}).responseText;				
			

			var obj = jQuery.parseJSON(jsonData).view_data;  
			//alert(JSON.stringify(jsonData));

			document.getElementById('female').innerHTML = jQuery.parseJSON(jsonData).total_devices;
			document.getElementById('total').innerHTML = jQuery.parseJSON(jsonData).total_views;			
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'Engagement report',
                hAxis: {title: 'No of Views', titleTextStyle: {color: 'red'}},
                vAxis: {title: 'Stores', titleTextStyle: {color: 'green'}}				
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));					
            chart.draw(data, options);
        }
		
</script>