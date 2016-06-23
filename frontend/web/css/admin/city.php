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

// $user_privileges = checkUserAccess("setting");
$user_privileges = 'FULL_ACCESS';

// page name
$page_name = "Cities";

// title bar
$page_title = "Cities";

// pagename
$page_file_name = "city";

// data_table_name
$data_table_name = "city";

// table
$table = array(	"label" => "City",
				"select_type" => "", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"add_button_url" => "index.php?r=setting/cityae",
				"show_id_col" => false,
				"show_filters" => true,
				);

// coulmns

/*
$column[] = array(	"label" => "Id",
					"db_field" => "id",
					"db_field_type" => "text",
					"db_table" => "city",
					"width" => "6%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");
*/

$column[] = array(	"label" => "City Name",
					"db_field" => "city",
					"db_field_type" => "text",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => "cityae.php?id=",
					"imgsrc" => "");


$column[] = array(	"label" => "Code",		
					"db_field" => "city_code",
					"db_field_type" => "text",
					"width" => "5%", 
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");


					// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM status ORDER BY name asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['value']] = $row['name'];
					}
$column[] = array(	"label" => "Active",
					"db_field" => "active",
					"db_field_type" => "cbo",
					"db_table" => "city",
					"width" => "5%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);

				// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM state ORDER BY state asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['id']] = $row['state'];
					}

$column[] = array(	"label" => "State",
					"db_field" => "state_id",
					"db_field_type" => "cbo",
					"query_field" => "state",
					"db_table" => "city",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);

					// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM country ORDER BY country asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['id']] = $row['country'];
					}
/*
$column[] = array(	"label" => "Country",
					"db_field" => "country_id",
					"db_field_type" => "cbo",
					"query_field" => "country",
					"db_table" => "city",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);
*/

$column[] = array(	"label" => "Added",
					"db_field" => "date_added",
					"db_field_type" => "datetime",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

$column[] = array(	"label" => "Modified", 
					"db_field" => "date_modified",
					"db_field_type" => "datetime",
					"width" => "10%", 
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

/*
$column[] = array(	"label" => "", 
					"db_field" => "",
					"db_field_type" => "",
					"width" => "2%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "View Cities",
					"href" => "city.php?city2city=",
					"imgsrc" => "./images/icons/view.gif");
*/
if($user_privileges == 'FULL_ACCESS' || $user_privileges == 'RESTRICTED_ACCESS')
{
$column[] = array(	"label" => "Action", 
					"db_field" => "",
					"class"=>"fa-pencil-square-o fa-lg",
					"db_field_type" => "icon",
					"width" => "2%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Edit",
					"href" => "cityae.php?id=",
					"imgsrc" => "./images/icons/edit.gif");
}
if($user_privileges == 'FULL_ACCESS')
{
$column[] = array(	"label" => "", 
					"db_field" => "",
					"class" => " fa-trash-o fa-lg",
			"db_field_type" => "icon",
					"width" => "2%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Delete",
					"href" => "citydel.php?remove=1&id=",
					"imgsrc" => "./images/icons/del.gif");
}
// query 
//$query_select = "SELECT city.*,state.state,country.country FROM city";

$query_select = "SELECT city.*,state.state FROM city";

// join(if any)
$query_join = " LEFT JOIN state ON city.state_id = state.id"; //LEFT JOIN country ON city.country_id = country.id";


if(isset($_REQUEST) && isset($_REQUEST['duplicate_submit']))
{
	$search_list = $_REQUEST['search_list'];
	$new_id = duplicate_mysql_record('city',"id",$search_list[0]);
	header("Location: index.php?r=setting/cityae&id=".$new_id);
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
							<li class="active">Ads</li>
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