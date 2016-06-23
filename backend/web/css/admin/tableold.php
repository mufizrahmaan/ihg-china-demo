<!-- TODO : thead & tbody -->

<!--

// table
$table = array(	"label" => "Customer",
				"select_type" => "radio", //radio,check
				"results_per_page" => TABLE_ROWS_PER_PAGE,
				"show_id_col" => false,
				"show_filters" => true,
				"show_add_button" => false,
				"add_button_url" => "leadoption.php",
				"show_duplicate_button" => false,
				"show_next_button" => true,
				"default_sort_by" => "date_added",
				"default_sort_order" => "asc",
				"required_filter_field" => "lead_id",
				"required_filter_value" => $lead_id,
				);

-->

<?php

//**************************************************************** DO NOT MODIFY BELOW THIS **********************************************//
/*	
	echo "<pre>";
	print_r($_REQUEST);


	echo "<pre>";
	print_r($_POST);

	echo "<pre>";
	print_r($_GET);
	echo "<pre>";
	print_r($_SERVER);
*/
	// ToggleSearch
	if(isset($_REQUEST) && isset($_REQUEST['btn_filters']))
	{
		if($_REQUEST['btn_filters'] == "Show Filters")
		{
			$table['show_filters'] = true;
		}
		else if($_REQUEST['btn_filters'] == "Hide Filters")
		{
			$table['show_filters'] = false;
			$_REQUEST['btn_clear'] = "";
		}
	}
	else
	{
		if(isset($_REQUEST) && isset($_REQUEST['btn_saved_filters']))
		{
			if($_REQUEST['btn_saved_filters'] == "Show Filters")
			{
				$table['show_filters'] = true;
			}
			else if($_REQUEST['btn_saved_filters'] == "Hide Filters")
			{
				$table['show_filters'] = false;
				$_REQUEST['btn_clear'] = "";
			}
		}
	}

	// clear filter parameters
	if(isset($_REQUEST) && isset($_REQUEST['btn_clear']))
	{
			if (!empty($_SERVER['QUERY_STRING'])) 
			{
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$filter_type_param = '';
				$filter_value_param = '';
				foreach ($params as $param) 
				{
					$length = strlen("scbo_");
					$pos = strpos($param,"scbo_");
					if($pos === false) 
					{
					 // string needle NOT found in haystack
					}
					else 
					{
					 // string needle found in haystack
					 if($pos == 0)
					 {
						$pos2 = strpos($param,"=");
						$field = substr($param, $length, $pos2-$length);
						
						// get the field name
						$filter_type_param = "scbo_".$field;
						$filter_value_param = "stxt_".$field;

						if(isset($_REQUEST[$filter_type_param]))
						{
							$_REQUEST[$filter_type_param] = '';
							unset($_REQUEST[$filter_type_param]);
						}

						if(isset($_REQUEST[$filter_value_param]))
						{
							$_REQUEST[$filter_value_param] = '';
							unset($_REQUEST[$filter_value_param]);
						}
					 }
					}
				}
			}
	}


$show_form = '';
$total = 0;
$user_id = getLoggedInUserId();
if ( isset($user_id) )
{
	$show_form = '1';
	$query_where = " WHERE 1";
	$query_order = " ORDER BY";

	// sorting part for the table
	if(isset($_REQUEST['sort_by']) && $_REQUEST['sort_by']!='')
	{
		$sort_by = trim($_REQUEST['sort_by']);
		$sort_order = trim($_REQUEST['sort_order']);
		if(!$sort_order)
			$sort_order = trim("desc");

		$n_sort_order = CheckSortType($sort_order);
		$query_order  .= " ".$sort_by." ".$n_sort_order." ";
	}
	else if(isset($table['default_sort_by']))
	{
		$sort_by = trim($table['default_sort_by']);
		
		if(isset($table['default_sort_order']))
		{
			$sort_order = $table['default_sort_order'];
		}
		else
		{
			$sort_order = trim("desc");
		}
		$n_sort_order = CheckSortType($sort_order);
		$query_order  .= " ".$sort_by." ".$n_sort_order." ";
	}
	else
	{
		$sort_by = $column[0]['db_field'];
		$sort_order = trim("desc");
		$n_sort_order = CheckSortType($sort_order);
		$query_order  .= " ".$sort_by." ".$n_sort_order." ";
	}
	

	// filtering
	$filter = '';
	$query_string = "";
	$array_filter = array('' => '----No Filter----', 'Equals' => 'Equals', 'NotEqual' => 'Not Equal', 'Contains' => 'Contains', 'StartsWith' => 'Starts With', 'EndsWith' => 'Ends With', 'LessEqualThan' => '<=','GreaterEqualThan' => '>=');
	if (!empty($_SERVER['QUERY_STRING'])) {
		$params = explode("&", $_SERVER['QUERY_STRING']);
		$filter_type_param = '';
		$filter_value_param = '';
		foreach ($params as $param) 
		{
			$length = strlen("scbo_");
			$pos = strpos($param,"scbo_");
			if($pos === false) 
			{
			 // string needle NOT found in haystack
			}
			else 
			{
			 // string needle found in haystack
			 if($pos == 0)
			 {
   			    $pos2 = strpos($param,"=");
				$field = substr($param, $length, $pos2-$length);
				
				// get the field name
				$filter_type_param = "scbo_".$field;
				$filter_value_param = "stxt_".$field;
				

				if(isset($_REQUEST[$filter_type_param]) && $_REQUEST[$filter_type_param] != '')
				{
					$filter_type = $_REQUEST[$filter_type_param];
					$filter_value = $_REQUEST[$filter_value_param];

					if($filter_value != 'show_all_values')
					{
					
						foreach ($column as $array_column) 
						{
							if($field == $array_column['db_field'])
							{
								if(isset($array_column['db_table']))
								$field = $array_column['db_table'].".".$field;

								if($array_column['db_field_type'] == 'datetime')
								{
									// hardcoding that the date field name should start like date_
									//if(substr($field, 0,5) == "date_")
									//{
										$filter_value = convert_readable_date_to_mysql_datetime($filter_value);
									//}
									$field = "date"."($field)";
									
								}
							}
						}

						if($filter_value != '' || $filter_value != "" || $filter_value != null)
						{
							if($filter_type == 'Equals')
							{
								$filter .= " and ".$field." = '".$filter_value."'";
							}
							else if($filter_type == 'NotEqual')
							{
								$filter .= " and ".$field." != '".$filter_value."'";
							}
							else if($filter_type == 'Contains')
							{
								$filter .= " and ".$field." like '%".$filter_value."%'";
							}
							else if($filter_type == 'StartsWith')
							{
								$filter .= " and ".$field." like '".$filter_value."%'";
							}
							else if($filter_type == 'EndsWith')
							{
								$filter .= " and ".$field." like '%".$filter_value."'";
							}
							else if($filter_type == 'LessEqualThan')
							{
								$filter .= " and ".$field." <= '".$filter_value."'";
							}
							else if($filter_type == 'GreaterEqualThan')
							{
								$filter .= " and ".$field." >= '".$filter_value."'";
							}
						}
					}
					
				}
			 }
			}
		}
	}
	
	// if set this will be applied always
	if(isset($table['required_filter_field']) && isset($table['required_filter_value']))
	{
			$filter .= " and ".$table['required_filter_field']." = '".$table['required_filter_value']."'";
	}

	$query_where .= $filter;

	if(isset($query_where_required) && $query_where_required != '')
	{
		$query = $query_select.$query_join.$query_where.$query_where_required.$query_order;
	}
	else
	{
		$query = $query_select.$query_join.$query_where.$query_order;
	}

	//echo $query;
	$logger->debug($query); 

	// pagination
	$page_num = 0;
	if (isset($_REQUEST['page_num'])) {
		$page_num = $_REQUEST['page_num'];
	}

	if(isset($_REQUEST['results_per_page']))
	{
		$_SESSION['results_per_page'] = $_REQUEST['results_per_page'];
		$results_per_page = $_SESSION['results_per_page'];
	}
	else
	{
		$_SESSION['results_per_page'] = $table['results_per_page'];
		$results_per_page = $_SESSION['results_per_page'];
	}
	

	$start_row = $page_num * $results_per_page;
	$query_limit = sprintf("%s LIMIT %d, %d", $query, $start_row, $results_per_page);

	$stmt = $db->query($query_limit);
	$total = $stmt->rowCount();
	// get the first row
	$row = $stmt->fetch();

	if (isset($_REQUEST['total_rows'])) {
		$total_rows = $_REQUEST['total_rows'];
	}
	else {
		$stmt1 = $db->query($query);
		$total_rows = $stmt1->rowCount();
		// $all = $stmt1->fetch();
	}
	$total_pages = ceil($total_rows/$results_per_page)-1;

	$query_string = "";
	if (!empty($_SERVER['QUERY_STRING'])) {
		$params = explode("&", $_SERVER['QUERY_STRING']);
		//print_r($params);
		$new_params = array();
		foreach ($params as $param) {
			if(isset($table['required_filter_field']) && isset($table['required_filter_value']))
			{
				if (stristr($param, "page_num") == false && stristr($param, "total_rows") == false && stristr($param, "sort_by") == false && stristr($param, "sort_order") == false && stristr($param, $table['required_filter_field']) == false) 
				{
					array_push($new_params, $param);
				}
			}
			else
			{
				if (stristr($param, "page_num") == false && stristr($param, "total_rows") == false && stristr($param, "sort_by") == false && stristr($param, "sort_order") == false) 
				{
					array_push($new_params, $param);
				}
			}
		}
		if (count($new_params) != 0) {
			$query_string = "&" . htmlentities(implode("&", $new_params));
		}
	}
	$query_string = sprintf("&total_rows=%d%s", $total_rows, $query_string);
	//$query_string = sprintf("&btn_filters=%s%s", $_REQUEST['btn_filters'], $query_string);

	// for required field
	if(isset($table['required_filter_field']) && isset($table['required_filter_value']))
	{
		$required_field = $table['required_filter_field'];
		$required_value = $table['required_filter_value'];

		$query_string = sprintf("&".$required_field."=%s%s", $required_value, $query_string);
	}

}

//**************************************************************** DO NOT MODIFY BELOW THIS **********************************************//

?>
<!--
<link type="text/css" href="jquery-ui-1.8.11.custom/css/start/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="jquery-ui-1.8.11.custom/js/jquery-1.5.1.min.js"></script> 
<script type="text/javascript" src="jquery-ui-1.8.11.custom/js/jquery-ui-1.8.11.custom.min.js"></script>


<script>

		$(function() {
		<?php
		foreach ($column as $array_column) 
		{
			if($array_column['db_field_type'] == 'datetime')
			{
			
		?>

				$( "#<?php echo "stxt_".$array_column['db_field']; ?>" ).datepicker({
					showOn: "button",
					buttonImage: "images/calendar.gif",
					buttonImageOnly: true,
					dateFormat: "dd/mm/yy 00:00:00",
					changeMonth: true,
					changeYear: true});

		<?php
			}
		}
		?>
});
</script>
-->
<script type="text/javascript">
function submit_form()
{
	//debugger;
	document.forms["frm_table"].submit();
}

function checkAll(master){
var checked = master.checked;
var col = document.getElementsByTagName("input");
for (var i=0;i<col.length;i++) {
col[i].checked= checked;
}
}
</script>
                
<form name="frm_table" id="frm_table" method="get" action="<?php echo $current_page_url; ?>">
<input name="id" id="id" type="hidden" value="<?php echo isset($_REQUEST[id])? $_REQUEST[id]: 0; ?>" class="btn-xs" />


<?php
if($_REQUEST[id])
{
	$id = $_REQUEST[id];
	$sql_check = "Select * from ad_mapping where ad_id = '$id'";
	$stmt_check = $db->query($sql_check);
	$array_row_check = array();
	while($row_check = $stmt_check->fetch())
	{
		$array_row_check[] = $row_check['device_id'];

	}
}
?>

<?php
if(isset($table['required_filter_field']) && isset($table['required_filter_value']))
{
?>
<input type="hidden" name="<?php echo $table['required_filter_field']; ?>" id="<?php echo $table['required_filter_field']; ?>" value="<?php echo isset($table['required_filter_value']) ? $table['required_filter_value'] : ''; ?>"/>
<?php
}
?>
				<?php
				if ($show_form == '1')
				{
				?>
				<table  class="table table-striped table-bordered table-condensed">

					<tr>
						<td colspan="20">
						<h4><?php echo ucwords($page_name); ?></h4>
						</td>
					</tr>

					<tr>
					<td width="35%">Total Rows : <?php  echo $total_rows > 0 ? $total_rows: '0'; ?>
     				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Rows Per Page :
                    <select name="results_per_page" id="results_per_page" onchange="submit_form();" style="width:60px">
								<option value="5" <?php echo $results_per_page=='5' ? 'selected':'';?> >5</option>
								<option value="10" <?php echo $results_per_page=='10' ? 'selected':'';?> >10</option>
								<option value="20" <?php echo $results_per_page=='20' ? 'selected':'';?>>20</option>
								<option value="30" <?php echo $results_per_page=='30' ? 'selected':'';?>>30</option>
								<option value="50" <?php echo $results_per_page=='50' ? 'selected':'';?>>50</option>
								<option value="100" <?php echo $results_per_page=='100' ? 'selected':'';?>>100</option>
                    </select> 
					
					
					</td>
					<td width="50%">
					Search :
					<?php if($table['show_filters'] == true)
					{
					?>
					&nbsp;&nbsp;
					<button name="btn_search" type="submit" class="btn btn-info btn-xs" onclick="submit_form();" value="Search" /><i class="icon-search"></i> Search</button>
					&nbsp;&nbsp;
					<button name="btn_clear" type="submit" class="btn btn-xs" onclick="submit_form();" value="Clear" /><i class="icon-eraser"></i> Clear</button>
					
					<?php
					}
					?>


					<?php if($table['show_filters'] == true)
					{
						?>
						
						&nbsp;&nbsp;
						<button name="btn_filters" id="btn_filters" type="submit" class="btn btn-xs" onclick="submit_form();" value="Hide Filters" /><i class="icon-arrow-up"></i> Hide Filters</button>
						<input name="btn_saved_filters" id="btn_saved_filters" type="hidden" value="Show Filters" class="btn-xs" />
						<?php

					}
					else
					{
						?>
						&nbsp;&nbsp;
						<button name="btn_filters" id="btn_filters" type="submit" class="btn btn-xs" onclick="submit_form();" value="Show Filters" /><i class="icon-filter"></i> Show Filters</button>
						<input name="btn_saved_filters" id="btn_saved_filters" type="hidden" value="Hide Filters" class="btn-xs">
						<?php
					}
					?>
				
					</td>
					<td align="right" width="15%"> 
					<?php if(isset($table['show_add_button']) && $table['show_add_button'] == false)
					{
					?>
				
					<?php
					}
					else
					{
						if(isset($table['add_button_url']) && $table['add_button_url'] != '')
						{
						?>
							<a href=<?php echo $table['add_button_url']; ?> class="btn btn-success btn-xs"><i class="icon-plus"></i> Add New</a> 
						<?php
						}
						else
						{
						?>
							<a href=<?php echo $page_file_name."ae.php"; ?> class="btn btn-success btn-xs"><i class="icon-plus"></i> Add New</a> 
						<?php
						}
					}
						?>
				 </td>
    
      </tr>


	  </table>

	  <table class="table table-striped table-condensed table-hover">	 
	  <!-- <caption>Data</caption>-->
					
							<?php

								// header row starts
								echo "<thead>";
								echo "<tr>";

								// select column
								if($table['select_type'] == 'radio')
								{
									echo "<td width=\"4%\"></td>";
								}
								else if($table['select_type'] == 'check')
								{	
									echo "<td width=\"4%\"><input type=checkbox onclick=\"checkAll(search_list_top);\" name=\"search_list_top\" id=\"search_list_top\"></td>";
								}

								// id column
								if($table['show_id_col'] == true)
								{
									if($sort_by == "id")
									{
										echo "<td width=\"6%\"><a href=\"";
										printf("%s?sort_by=%s&sort_order=%s%s", $current_page_url, "id",$n_sort_order, $query_string);
										echo "\" title=\"Sort By id\">Id<img src=\"../images/icons/".$n_sort_order.".gif\" border=\"0\" alt=\"\" /></a></td>";
									}
									else
									{
										echo "<td width=\"6%\"><a href=\"";
										printf("%s?sort_by=%s&sort_order=%s%s", $current_page_url, "id",$n_sort_order, $query_string);
										echo "\" title=\"Sort By id\">Id</a></td>";
									}
								}
				
								foreach ($column as $array_column) 
								{
									if($array_column['label'] == "Action")
									{
										// echo $array_column['label'];
										$colspan = $array_column['colspan'] + 1;
										echo "<td width=\"".$array_column['width']."\" colspan=\"".$colspan."\" align=\"".$array_column['align']."\">";
									}
									else if($array_column['label'] == "")
									{
										
									}
									else
									{
										echo "<td width=\"".$array_column['width']."\" colspan=\"".$array_column['colspan']."\" align=\"".$array_column['align']."\">";
									}

									if($array_column['sortable'] == 1)
									{
										if(isset($array_column['query_field']))
											$sby = $array_column['query_field'];
										else
											$sby = $array_column['db_field'];

										if($sby == $sort_by)
										{
											echo "<a href=\"";
											printf("%s?sort_by=%s&sort_order=%s%s", $current_page_url, $sby ,$n_sort_order, $query_string);


											if($n_sort_order == "desc")
											{
												$iconstring = "<i class=\"icon-chevron-up\"></i>";
											}
											else if($n_sort_order == "asc")
											{
												$iconstring = "<i class=\"icon-chevron-down\"></i>";
											}
											
											//echo "\" title=\"Sort By ".$array_column['label']."\">".$array_column['label']." <img src=\"../images/icons/".$n_sort_order.".gif\" border=\"0\" alt=\"\" /></a>";

											echo "\" title=\"Sort By ".$array_column['label']."\">".$array_column['label']." ".$iconstring." </a>";
										}
										else
										{
											echo "<a href=\"";
											printf("%s?sort_by=%s&sort_order=%s%s", $current_page_url, $sby ,"asc", $query_string);
											echo "\" title=\"Sort By ".$array_column['label']."\">".$array_column['label']."</a>";
										}
									}
									else
									{
										echo $array_column['label'];
									}
									
									if($array_column['label'] == "")
									{
										
									}
									else
									{
										echo "</td>";
									}
								}

								echo "</tr>";
								echo "</thead>";
								// header row ends
								
								// search row starts
								if($table['show_filters'] == true)
								{
									echo "<tr class='evenRow'>";
									// select column
									if($table['select_type'] == 'radio' || $table['select_type'] == 'check')
									{
										echo "<td width=\"4%\"></td>";
									}
									
									
									// id column
									if($table['show_id_col'] == true)
									{
										if($sort_by == "id")
										{
											echo "<td width=\"6%\"><a href=\"";
											printf("%s?sort_by=%s&sort_order=%s%s", $current_page_url, "id",$n_sort_order, $query_string);
											echo "\" title=\"Sort By id\">Id<img src=\"../images/icons/".$n_sort_order.".gif\" border=\"0\" alt=\"\" /></a></td>";
										}
										else
										{
											echo "<td width=\"6%\"><a href=\"";
											printf("%s?sort_by=%s&sort_order=%s%s", $current_page_url, "id",$n_sort_order, $query_string);
											echo "\" title=\"Sort By id\">Id</a></td>";
										}
									}
									
					
									foreach ($column as $array_column) 
									{
										echo "<td width=\"".$array_column['width']."\" colspan=\"".$array_column['colspan']."\" align=\"".$array_column['align']."\">";
										
										if(!isset($array_column['action_field']))
										{
											if(isset($_REQUEST["scbo_".$array_column['db_field']]))
											$filter_scbo_selected_value = $_REQUEST["scbo_".$array_column['db_field']];
											else
											$filter_scbo_selected_value = '';
											
											// making equal as default value for drop downs
											if($array_column['db_field_type'] == 'cbo' && $filter_scbo_selected_value == '')
											{
												$filter_scbo_selected_value = "Equals";
											}
											// making contains as default value for text
											else if($array_column['db_field_type'] == 'text' && $filter_scbo_selected_value == '')
											{
												$filter_scbo_selected_value = "Contains";
											}
											else if($filter_scbo_selected_value == '')
											{
												$filter_scbo_selected_value = "Equals";
											}

											echo "<select style=\"width:100%\" name=\"scbo_".$array_column['db_field']."\">";
											foreach($array_filter as $value => $label)
											{
												$extra = '';
												
												if(isset($filter_scbo_selected_value))
												{
													if($filter_scbo_selected_value == $value)
														$extra ='selected = "selected"';
												}
												echo "<option value=\"".$value."\" $extra >".$label."</option>";
											}
											echo "</select><br/><br/>";

											if(isset($_REQUEST["stxt_".$array_column['db_field']]))
											$filter_stxt_selected_value = $_REQUEST["stxt_".$array_column['db_field']];
											else
											$filter_stxt_selected_value = '';
											
											if(isset($array_column['db_field_type']) && $array_column['db_field_type'] == "datetime")
											{
												echo "<input type=\"text\"  onChange=\"submit_form();\" class=\"datepicker\" value=\"".$filter_stxt_selected_value."\" name=\"stxt_".$array_column['db_field']."\" id=\"stxt_".$array_column['db_field']."\" style=\"width:80%\" >";
											}
											else if(isset($array_column['db_field_type']) && $array_column['db_field_type'] == "text")
											{
												echo "<input type=\"text\" onChange=\"submit_form();\" align=\"left\" value=\"".$filter_stxt_selected_value."\"  name=\"stxt_".$array_column['db_field']."\" style=\"width:80%\" >";
											}
											else if(isset($array_column['db_field_type']) && $array_column['db_field_type'] == "cbo")
											{
												//echo $filter_stxt_selected_value;
											
												echo "<select name=\"stxt_".$array_column['db_field']."\" style=\"width:100%\" onChange=\"submit_form();\" >";
												
												foreach($array_column['array'] as $value => $label)
												{
													$strselected = '';
													if(isset($filter_stxt_selected_value) && $filter_stxt_selected_value != '' && $filter_stxt_selected_value != "" && $filter_stxt_selected_value != null && $filter_stxt_selected_value != 'show_all_values' )
													{
														if($filter_stxt_selected_value == $value)
															$strselected ='selected = "selected"';
														else
															$strselected = '';
													}
													else
													{
														$strselected = '';
													}
													echo "<option value=\"".$value."\" $strselected >".$label."</option>";
												}
												echo "</select>";
											}
											else
											{
												echo "<input type=\"text\" align=\"left\" value=\"".$filter_stxt_selected_value."\"  name=\"stxt_".$array_column['db_field']."\" style=\"width:80%\" >";
											}
										}
										echo "</td>";
									}

									echo "</tr>";
								}
					// data row starts
					$mcount=0;
					if ($total > 0)
					{
						do
						{
							$mcount++;
							if($mcount%2==0)
							{
								$css_class='evenRow';
							}
							else
							{
								$css_class='oddRow';
							}

							echo "<tr class=\"".$css_class."\" >";
							
							// select column
							if($table['select_type'] == 'radio')
							{
								echo "<td valign=\"top\"><input type=radio name=\"search_list[]\" id=\"search_list[".$row['id']."]\" value=\"".$row['id']."\" /></td>";
							}
							else if($table['select_type'] == 'check')
							{
								if (in_array($row['id'],$array_row_check))
									$extracss = "checked=checked";
								else
									$extracss = '';

								echo "<td valign=\"top\"><input ".$extracss." type=checkbox name=\"search_list[]\" id=\"search_list[".$row['id']."]\" value=\"".$row['id']."\" ></td>";
							}

							// id column
							if($table['show_id_col'] == true)
							{
								echo "<td width=\"6%\">".$row['id']."</td>";
							}


							foreach ($column as $array_column) 
							{
									$value = '';
									if(isset($array_column['db_field']) || isset($array_column['action_field']))
									{
										// for URL columns	
										if($array_column['db_field_type'] == "url")
										{
											if(isset($array_column['target']))
											{
												$target = "target=".$array_column['target'];

											}
											else
											{
												$target = "";
											}
											$value .= "<a ".$target." href=\"".$row[$array_column['db_field']]."\">";
										}
										
										// for Links
										if(isset($array_column['href']))
										{
											if(isset($array_column['target']))
											{
												$target = "target=".$array_column['target'];

											}
											else
											{
												$target = "";
											}
											
											if(isset($array_column['action_field']))
											{
												//$value .= "<a ".$target." rel=\"tooltip\" data-placement=\"right\" title=\"".$array_column['action_field']."\" href=\"".$array_column['href'].$row['id']."\">";
												$value .= "<a ".$target." title=\"".$array_column['action_field']."\" href=\"".$array_column['href'].$row['id']."\">";

												if($array_column['action_field'] == 'Edit')
												{
														$value .= "<i class=\"icon-pencil blue bigger-130\"></i>";
												}
												else if($array_column['action_field'] == 'Delete')
												{
														$value .= "<i class=\"icon-trash red bigger-130\"></i>";
												}
												else if($array_column['action_field'] == 'View')
												{
														$value .= "<i class=\"icon-list blue bigger-130\"></i>";
												}
											}
											else
											{
												$value .= "<a ".$target." rel=\"tooltip\" data-placement=\"right\" href=\"".$array_column['href'].$row['id']."\">".$array_column['db_field'];
											}
										}
										
										// date time
										if($array_column['db_field_type'] == "datetime" || $array_column['db_field'] == "date_added" || $array_column['db_field'] == "date_modified")
										{
											$value .= convert_mysql_datetime_to_readable_date($row[$array_column['db_field']]);
											//$value .= convert_mysql_datetime_to_readable_datetime($row[$array_column['db_field']]);
										}
										// image
										else if(isset($array_column['db_field_type']) && $array_column['db_field_type'] == "image")
										{
											$value .= "<img width=\"120px\" height=\"120px\" style=\"width :120px; height:120px \" src=\"".$row[$array_column['db_field']]."\" alt=\"..".$row[$array_column['db_field']]."\" border=\"0\" />";
										}

										// active
										else if($array_column['db_field'] == "active")
										{
											if($row['active'])
											$value .= "<span class=\"label label-success\">Yes</span>";
											else
											$value .= "<span class=\"label label-important\">No</span>";
										}
										else if($array_column['db_field'] == "display")
										{
											if($row['display'])
											$value .= "<span class=\"label label-success\">Yes</span>";
											else
											$value .= "<span class=\"label label-important\">No</span>";
										}
										else if($array_column['db_field'] == "analytics_enabled")
										{
											if($row['analytics_enabled'])
											$value .= "<span class=\"label label-success\">Yes</span>";
											else
											$value .= "<span class=\"label label-important\">No</span>";
										}
										else if(isset($array_column['query_field']) && $array_column['query_field'])
										{
											$value .= $row[$array_column['query_field']];
										}
										else if(isset($array_column['db_field']) && $array_column['db_field'])
										{
											$value .= $row[$array_column['db_field']];
										}
										if(isset($array_column['imgsrc']) && $array_column['imgsrc'] )
										{
											$exists = file_exists($array_column['imgsrc']);
											if($exists)
											$value .= "<img class=\"btn btn-xs\" src=\"".$array_column['imgsrc']."\" alt=\"".$array_column['action_field']."\" border=\"0\" />";
											else
											$value .= $array_column['action_field'];
										}	
		
										if(isset($array_column['href']))
										{
											$value .= "</a>";
										}
									}

									echo "<td  valign=\"top\"  align=\"".$array_column['align']."\">".$value."</td>";
							}
							echo "</tr>";
					}
						while($row = $stmt->fetch()); //while ($row = mysql_fetch_array( $result_limit ));
					}
					else
					{
						echo "<tr><td colspan=\"18\">No Data Available</td></tr>";
					}
					echo "</table>";
					// data row ends
					?>
					
							<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0" style="border-color: #A5ACB2">
	                            <tr>
	                            <?php if($table['select_type'] == 'radio' || $table['select_type'] == 'check')
								{
								?>
								<td colspan="8" align="left"><?php if(isset($table['show_next_button']) && $table['show_next_button'] == true)
								{
								?>
								  <div class="form-actions">
								  <button name="next" class="btn btn-primary" type="submit"  value="Next" /> <i class="icon-save"></i><!--<i class="icon-circle-arrow-right"></i>--> Save</button>
								  <button name="back" class="btn btn-primary" type="submit"  value="Back" /> <i class="icon-remove"></i><!--<i class="icon-circle-arrow-left"></i>--> Cancel</button>
	                              
								  </div>

								  <?php if ($error != '') { ?>
										<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
											<?php echo $error; ?>
										</div>
								<?php } ?>


	                             <?php
								}
								?>
								</td>
	                            <td colspan="8" align="left"><?php if($table['show_duplicate_button'] == true)
								{
								?>
	                              <input name="duplicate_submit" class="btn" type="submit" value="Duplicate" />
	                             <?php
								}
								?>
								</td>
	                            <?php
								} 
								?>
	                            <td colspan="8" align="right">
								
								 <table border="0" width="50%" align="right">
	                             <tr>
	                                <td width="23%" align="center"><?php if ($page_num > 0) { ?>
	                                  <a
									href="<?php printf("%s?page_num=%d%s", $current_page_url, 0, $query_string); ?>"><img
									alt="First" src="images/icons/First.gif" border="0" /></a>
	                                  <?php } ?></td>
	                                <td width="23%" align="center"><?php if ($page_num > 0) { ?>
	                                  <a
									href="<?php printf("%s?page_num=%d%s", $current_page_url, max(0, $page_num - 1), $query_string); ?>"><img
									alt="Previous" src="images/icons/Previous.gif" border="0" /></a>
	                                  <?php } ?></td>
	                                <td width="23%" align="center"><?php if ($page_num < $total_pages) { ?>
	                                  <a
									href="<?php printf("%s?page_num=%d%s", $current_page_url, min($total_pages, $page_num + 1), $query_string); ?>"><img
									alt="Next" src="images/icons/Next.gif" border="0" /></a>
	                                  <?php } ?></td>
	                                <td width="23%" align="center"><?php if ($page_num < $total_pages) { ?>
	                                  <a
									href="<?php printf("%s?page_num=%d%s", $current_page_url, $total_pages, $query_string); ?>"><img
									alt="Last" src="images/icons/Last.gif" border="0" /></a>
	                                  <?php } ?></td>
                                 </tr>
	                             </table>

								 </td>
							</tr>
							</table>
      <?php
				}
				else
				{
					echo '<br/><br/><h3>You do not have permission to view this page.</h3>'; //end of if show_form
				}
				?>

				<!--
		</td>

	</tr>
</table>
-->
</form>