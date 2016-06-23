<?php

$user_privileges = checkUserAccess("setting");

// page name
$page_name = "States";

// title bar
$page_title = "States";

// pagename
$page_file_name = "state";

// data_table_name
$data_table_name = "lot_state";

// table
$table = array(	"label" => "State",
				"select_type" => "", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"add_button_url" => "index.php?r=setting/stateae",
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

$column[] = array(	"label" => "State Name",
					"db_field" => "state",
					"db_field_type" => "text",
					"db_table" => "lot_state",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					//"href" => "stateae.php?id=",
					"imgsrc" => "");

$column[] = array(	"label" => "Code",		
					"db_field" => "state_code",
					"db_field_type" => "text",
					"db_table" => "lot_state",
					"width" => "5%", 
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
					"db_field_type" => "cbo",
					"db_table" => "lot_state",
					"width" => "5%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);
					
					

					// array for cbo
					$array = array('show_all_values' => '----Show All----');
					$sql = "SELECT * FROM lot_country ORDER BY country asc";
					$stmt = $db->query($sql);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$array[$row['id']] = $row['country'];
					}

$column[] = array(	"label" => "Country",
					"db_field" => "country_id",
					"db_field_type" => "cbo",
					"query_field" => "country",
					"db_table" => "lot_state",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left",
					"array" => $array);
					
$column[] = array(	"label" => "Added",
					"db_field" => "date_added",
					"db_field_type" => "datetime",
					"db_table" => "lot_state",
					"width" => "10%",
					"sortable" => "1",
					"colspan" => "1",
					"align" => "left");

$column[] = array(	"label" => "Modified", 
					"db_field" => "date_modified",
					"db_field_type" => "datetime",
					"db_table" => "lot_state",
					"width" => "10%", 
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
					"action_field" => "View Cities",
					"href" => "index.php?r=setting/city&scbo_state_id=Equals&stxt_state_id=",
					"imgsrc" => "./images/icons/view.gif");
if($user_privileges == 'FULL_ACCESS' || $user_privileges == 'RESTRICTED_ACCESS')
{
$column[] = array(	"label" => "Action", 
					"db_field" => "",
					"class"=>"fa-pencil-square-o fa-lg",
					"db_field_type" => "icon",
					"width" => "3%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Edit",
					"href" => "index.php?r=setting/stateae&id=",
					"imgsrc" => "./images/icons/edit.gif");
}
if($user_privileges == 'FULL_ACCESS')
{
$column[] = array(	"label" => "", 
					"db_field" => "",
					"class" => " fa-trash-o fa-lg",
					"db_field_type" => "icon",
					"width" => "3%", 
					"sortable" => "0",
					"colspan" => "1",
					"align" => "center",
					"action_field" => "Delete",
					"href" => "index.php?r=setting/statedel&remove=1&id=",
					"imgsrc" => "./images/icons/del.gif");
}
// query 
$query_select = "SELECT lot_state.*,lot_country.country FROM lot_state";

// join(if any)
$query_join = " LEFT JOIN lot_country ON lot_state.country_id = lot_country.id";


if(isset($_REQUEST) && isset($_REQUEST['duplicate_submit']))
{
	$search_list = $_REQUEST['search_list'];
	$new_id = duplicate_mysql_record('lot_state',"id",$search_list[0]);
	header("Location: index.php?r=setting/stateae&id=".$new_id);
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
			
