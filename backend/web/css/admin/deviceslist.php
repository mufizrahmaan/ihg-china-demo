<?php
if(!defined('__CONFIG'))
{
	include_once('../config.php');
}

/*
if(!checkUserLoggedIn())
{
	header('Location: login.php');
	exit();
}
else
{
	$user_id = getLoggedInUserId();
}
*/

// $user_privileges = checkUserAccess("setting_access");
$user_privileges = 'FULL_ACCESS';

// page name
$page_name = "Devices";

// title bar
$page_title = "Devices";

// pagename
$page_file_name = "Devices";

// data_table_name
$data_table_name = "company_registration_device";

// table
$table = array(	"label" => "ad",
				"select_type" => "", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"show_id_col" => false,
				"show_filters" => false,
				//"required_filter_field" => "",
				//"required_filter_value" => '',
			
				);

				
// coulmns
$column[] = array(	"label" => "Device Key",
					"db_field" => "device_registration_key",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "15%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");

				
$column[] = array(	"label" => "Establishment",
					"db_field" => "name",
					"db_field_type" => "text",
					"db_table" => "company_establishment",
					"query_field" => "name",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");
					
$column[] = array(	"label" => "Model",
					"db_field" => "device_model",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");					

$column[] = array(	"label" => "Address",
					"db_field" => "address",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

$column[] = array(	"label" => "Install Location",
					"db_field" => "company_establishment_device_location",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");

				$column[] = array(	"label" => "App Version",
					"db_field" => "device_app_version",
					"db_field_type" => "text",
					//"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");	


					


$column[] = array(	"label" => "Battery State",
					"db_field" => "",
					"db_field_type" => "text",
					//"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");					

$column[] = array(	"label" => "Active",
					"db_field" => "active",
					"db_table" => $data_table_name,
					"db_field_type" => "cbo",
					"width" => "5%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

$column[] = array(	"label" => "Content Last Requested",
					"db_field" => "last_request_datetime",
					"db_field_type" => "text",
					//"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");	


$column[] = array(	"label" => "Last updated",
					"db_field" => "",
					"db_field_type" => "text",
					//"db_table" => $data_table_name,
					"width" => "15%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");


// query 
$query_select = "SELECT company_registration_device.*,company_establishment.name as name,company_establishment.address, company_establishment_device_location.company_establishment_device_location FROM company_registration_device";

// join(if any)
$query_join = " LEFT JOIN company_establishment ON company_registration_device.company_establishment_id =  company_establishment.id 
				LEFT JOIN company_establishment_device_location ON company_registration_device.company_establishment_device_location_id =  company_establishment_device_location.id";


if(isset($_REQUEST) && isset($_REQUEST['duplicate_submit']))
{
	$search_list = $_REQUEST['search_list'];
	$new_id = duplicate_mysql_record($data_table_name,"id",$search_list[0]);
	//header("Location: ".$page_file_name."ae.php?id=".$new_id);
}
	
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
							<li class="active">Devices</li>
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


<!-- Graph div starts -->					

<div class="col-xs-12">
<div id="chart_div" style="width: 1100px; height: 400px; text-align: center;"></div>
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
<?php include('table.php'); ?>
<?php include('footer.php'); ?>