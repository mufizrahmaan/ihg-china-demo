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

$user_privileges = checkUserAccess("setting_access");

// page name
$page_name = "Users";

// title bar
$page_title = "Users";

// pagename
$page_file_name = "user";

// data_table_name
$data_table_name = "company_employee";

// table

$table = array(	"label" => "User",
				"select_type" => "", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"show_id_col" => false,
				"show_filters" => false,
				"add_button_url" => "userae.php?company_id=".$_GET['company_id'],
				"required_filter_field" => "company_employee.company_id",
				"required_filter_value" => $_GET['company_id'],
				);

// coulmns

/*
$column[] = array(	"label" => "Id",
					"db_field" => "id",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "6%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");
*/

/*
$column[] = array(	"label" => "Photo",
					"db_field" => "photo",
					"db_field_type" => "image",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "0",
					"searchable" => "0",
					"colspan" => "1",
					"align" => "left",
					"href" => "userae.php?id=",
					"imgsrc" => "");
*/

$column[] = array(	"label" => "First Name",
					"db_field" => "first_name",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");

$column[] = array(	"label" => "Last Name",
					"db_field" => "last_name",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");
/*
$column[] = array(	"label" => "Username",
					"db_field" => "username",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");
*/

$column[] = array(	"label" => "Email",
					"db_field" => "email",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "15%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");

$column[] = array(	"label" => "Password",
					"db_field" => "password",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");

// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM company_employee_role WHERE company_id = ".$_GET['company_id']." ORDER BY role asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['id']] = $row['role'];
					}
$column[] = array(	"label" => "Role",
					"db_field" => "role_id",
					"db_field_type" => "cbo",
					"db_table" => "company_employee",
					"query_field" => "role",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"array" => $array);

/*
$column[] = array(	"label" => "Location",
					"db_field" => "location",
					"db_field_type" => "text",
					"db_table" => "tbl_location",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");

					// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM status ORDER BY name asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['value']] = $row['name'];
					}
*/

$column[] = array(	"label" => "Active",
					"db_field" => "active",
					"db_table" => $data_table_name,
					"db_field_type" => "cbo",
					"width" => "5%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);
					
$column[] = array(	"label" => "Added",
					"db_field" => "created_date",
					"db_field_type" => "datetime",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

$column[] = array(	"label" => "Modified", 
					"db_field" => "updated_date",
					"db_field_type" => "datetime",
					"db_table" => $data_table_name,
					"width" => "10%", 
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

if($user_privileges == 'FULL_ACCESS' || $user_privileges == 'RESTRICTED_ACCESS')
{
$column[] = array(	"label" => "Action", 
					"db_field" => "",
					"db_field_type" => "",
					"width" => "2%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Edit",
					"href" => $page_file_name."ae.php?company_id=".$_GET['company_id']."&id=",
					 );
}
if($user_privileges == 'FULL_ACCESS')
{
$column[] = array(	"label" => "", 
					"db_field" => "",
					"db_field_type" => "",
					"width" => "2%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Delete",
					"href" => $page_file_name."del.php?company_id=".$_GET['company_id']."&remove=1&id=",
					);
}
// query 
$query_select = "SELECT company_employee.*,company_employee_role.role FROM company_employee";


// join(if any)
$query_join = " LEFT JOIN company_employee_role ON company_employee.role_id = company_employee_role.id 
				";


if(isset($_REQUEST) && isset($_REQUEST['duplicate_submit']))
{
	$search_list = $_REQUEST['search_list'];
	$new_id = duplicate_mysql_record($data_table_name,"id",$search_list[0]);
	header("Location: ".$page_file_name."ae.php?id=".$new_id);
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
							<li class="active">User Management</li>
						</ul><!-- .breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div>--><!-- #nav-search -->
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
						</div> -->
						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<?php include('table.php'); ?>
<?php include('footer.php'); ?>