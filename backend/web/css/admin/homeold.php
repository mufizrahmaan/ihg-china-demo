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
$show = $_REQUEST['show'];
?>


<?php include('header.php'); ?>

    <!-- Load jQuery -->
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"> </script>
	
    <!-- Load Google JSAPI -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
    <script type="text/javascript">

        google.load("visualization", "1", { packages: ["corechart"] });
        google.setOnLoadCallback(drawChart);
		
		

        function drawChart() {

				jsonData = $.ajax({
					url: 'home_adview_data.php?show=<?php echo $show; ?>',
					dataType: "json",
					async: false
				}).responseText;				
			

			var obj = jQuery.parseJSON(jsonData).view_data;
			//alert(JSON.stringify(jsonData));
			document.getElementById('male').innerHTML = jQuery.parseJSON(jsonData).male;
			document.getElementById('female').innerHTML = jQuery.parseJSON(jsonData).female;
			document.getElementById('total').innerHTML = jQuery.parseJSON(jsonData).total;			
            var data = google.visualization.arrayToDataTable(obj);

            var options = {
                title: 'Adview Report',
				hAxis: {title: 'Time Duration', titleTextStyle: {color: 'red'}},
				vAxis: {title: 'Number Of Views', titleTextStyle: {color: 'green'}},
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));					
            chart.draw(data, options);
        }
		
    </script>

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
							<li class="active">Adview</li>
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

							<br/><br/>

							<div class="pull-right">
							<a href="home.php?show=today" <?php echo gethighlight('home.php?show=today'); ?> >Today</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="home.php?show=thisweek" <?php echo gethighlight('home.php?show=thisweek'); ?> >This Week</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="home.php?show=thismonth" <?php echo gethighlight('home.php?show=thismonth'); ?> >This Month</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="home.php?show=last7days" <?php echo gethighlight('home.php?show=last7days'); ?> >Last 7 days</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="home.php?show=lastweek" <?php echo gethighlight('home.php?show=lastweek'); ?> >Last Week</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="home.php?show=last30days" <?php echo gethighlight('home.php?show=last30days'); ?> >Last 30 days</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="home.php?show=lastmonth" <?php echo gethighlight('home.php?show=lastmonth'); ?> >Last Month</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<!--<a href="home.php?show=monthly" <?php echo gethighlight('home.php?show=monthly'); ?> >Monthly</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <a href="home.php?show=last3months" <?php echo gethighlight('home.php?show=last3months'); ?> >Last 3 Months</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;							
							</div>	

<br/><br/>


									<div class="space-6"></div>

									<div class="col-sm-7 col-sm-offset-2 infobox-container">
										<div class="infobox infobox-blue  ">
											<div class="infobox-icon">
												<i class="icon-male"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><div id="male"></div></span>
												<div class="infobox-content">male</div>
											</div>
											<!-- <div class="badge badge-success">32%</div> -->
										</div>

										<div class="infobox infobox-red  ">
											<div class="infobox-icon">
												<i class="icon-female"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><div id="female"></div></span>
												<div class="infobox-content">female</div>
											</div>

											
											<!-- <div class="badge badge-success">32%</div> -->
										</div>

										<div class="infobox infobox-orange  ">
											<div class="infobox-icon">
												<i class="icon-group"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><div id="total"></div></span>
												<div class="infobox-content">total</div>
											</div>
											<!-- <div class="badge badge-success">32%</div>-->
										</div>
										</div>							

<!-- Graph div starts -->					
<div class="col-xs-12">
<div id="chart_div" style="width: 1100px; height: 400px;"></div>
</div>
<!-- Graph div ends -->
					
					<div class="page-content">
					<!--
						<div class="page-header">
							<h1>
								User Management
								<small>
									<i class="icon-double-angle-right"></i>
									Manage users and edit roles
								</small>
							</h1>
						</div>--><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<?php include('footer.php'); ?>