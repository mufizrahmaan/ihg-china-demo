<?php

$user_privileges = checkUserAccess("setting");

// page name
$page_name = "Countries";

// title bar
$page_title = "Countries";

// pagename
$page_file_name = "country";

// data_table_name
$data_table_name = "lot_country";

// table
$table = array(	"label" => "Country",
				"select_type" => "", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"add_button_url" => "index.php?r=setting/countryae",
				"show_id_col" => false,
				"show_filters" => true,
				);

// coulmns

/*
$column[0] = array(	"label" => "Id",
					"db_field" => "id",
					"db_field_type" => "text",
					"width" => "6%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");
*/

$column[] = array(	"label" => "Country Name",
					"db_field" => "country",
					"db_field_type" => "text",
					"db_table" => "lot_country",
					"width" => "20%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
				//	"href" => "countryae.php?id=",
					"imgsrc" => "");

$column[] = array(	"label" => "Code",		
					"db_field" => "country_code",
					"db_table" => "lot_country",
					"db_field_type" => "text",
					"width" => "15%", 
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

					// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM lot_status ORDER BY name asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['value']] = $row['name'];
					}
$column[] = array(	"label" => "Active",
					"db_field" => "active",
					"db_table" => "lot_country",
					"db_field_type" => "cbo",
					"width" => "5%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);
					
$column[] = array(	"label" => "Added",
					"db_field" => "date_added",
					"db_field_type" => "datetime",
					"db_table" => "lot_country",
					"width" => "15%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

$column[] = array(	"label" => "Modified", 
					"db_field" => "date_modified",
					"db_field_type" => "datetime",
					"db_table" => "lot_country",
					"width" => "15%", 
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");


$column[] = array(	"label" => "", 
					"db_field" => "",
					"db_field_type" => "",
					"width" => "5%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "View States",
					"href" => "index.php?r=setting/state&scbo_country_id=Equals&stxt_country_id=",
					"imgsrc" => "./images/icons/view.gif");
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
					"href" => "index.php?r=setting/countryae&id=",
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
					"href" => "index.php?r=setting/countrydel&remove=1&id=",
					"imgsrc" => "./images/icons/del.gif");
}
// query 
$query_select = "SELECT * FROM lot_country";

// join(if any)
$query_join = "";


if(isset($_REQUEST) && isset($_REQUEST['duplicate_submit']))
{
	$search_list = $_REQUEST['search_list'];
	$new_id = duplicate_mysql_record('lot_country',"id",$search_list[0]);
	header("Location: countryae.php?id=".$new_id);
}
	
?>





	 
			
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
			
