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

//$user_privileges = checkUserAccess("setting_access");
$user_privileges = 'FULL_ACCESS';

// page name
$page_name = "Categories";

// title bar
$page_title = "Categories";

// pagename
$page_file_name = "category";

// data_table_name
$data_table_name = "category";

// table
$table = array(	"label" => "Categories",
				"select_type" => "", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"show_id_col" => false,
				"show_filters" => false,
				);

// coulmns

$column[] = array(	"label" => "Id",
					"db_field" => "id",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "6%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");


$column[] = array(	"label" => "Category",
					"db_field" => "category",
					"db_field_type" => "text",
					"db_table" => $data_table_name,
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => $page_file_name."ae.php?id=",
					"imgsrc" => "");



$column[] = array(	"label" => "Parent Category",
					"db_field" => "parent_category",
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
					$sql = "SELECT * FROM status ORDER BY name asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['value']] = $row['name'];
					}
$column[] = array(	"label" => "Active",
					"db_field" => "active",
					"db_table" => $data_table_name,
					"db_field_type" => "cbo",
					"width" => "10%",
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
					"href" => $page_file_name."ae.php?id=",
					);
}
if($user_privileges == 'FULL_ACCESS')
{
	/*
$column[] = array(	"label" => "", 
					"db_field" => "",
					"db_field_type" => "",
					"width" => "2%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Delete",
					"href" => $page_file_name."del.php?remove=1&id=",
					);
					*/
}
// query 
$query_select = "SELECT a.*,b.category as parent_category FROM category a ";

// join(if any)
$query_join = " LEFT JOIN category b ON a.parent_id = b.id ";


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
							<li class="active">Categories</li>
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
								Category Management
								<small>
									<i class="icon-double-angle-right"></i>
									Manage users and edit roles
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


				<?php
				if($user_privileges != 'NO_ACCESS')
						{
					include('table.php'); 
				}
				else
				{
					echo '<br><br><h4>You do not have required privileges to view this page.</h4>';
				}
				?>
	

<?php include('footer.php'); ?>