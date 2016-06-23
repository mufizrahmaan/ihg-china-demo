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
$query = "SELECT name FROM company_registration WHERE id='".$company_id."'";
$res = $db->query($query);
$company = $res->fetch();


$query_limit = "SELECT * FROM company_establishment WHERE company_id = '".$company_id."' AND display = 1 ";
$stmt = $db->query($query_limit);
$row = $stmt->fetch();
$total = $stmt->rowCount();
/*
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
	$query_limit = sprintf("%s LIMIT %d, %d", $qry, $start_row, $results_per_page);

	$stmt = $db->query($query_limit);
	$total = $stmt->rowCount();
	// get the first row
	$row = $stmt->fetch();
	*/
	
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
							<li>
								<a href="#"><?php echo "Publisher's (".$company['name'].")";?></a>
							</li>							
							<li class="active">Establishments</li>
						</ul>
					</div>

<div class="page-content">

						<div class="page-header">
							<h1><?php echo $company['name']."'s  Establishments";?>
								<small>
									<i class="icon-double-angle-right"></i>
								</small>
								<div class="pull-right">
							<!--<a href=<?php echo "userroleae.php"; ?> class="btn btn-success btn-xs"><i class="icon-plus"></i> Add New</a>  -->
							</div>
							</h1>
							
						</div>


<form name="frm_table" id="frm_table" method="get" action="<?php echo $current_page_url; ?>">
					
<!-- pagination code starts	----->
<!--
<table class="table table-striped table-bordered table-condensed">

					<tbody><tr>
						<td colspan="20">
						<h4><?php echo $company['name']."'s  Establishments";?></h4>
						</td>
					</tr>

					<tr>
					<td width="35%">Total Rows :  <?php echo $total;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
					<td width="50%"> </td>
    
      </tr>


	  </tbody></table>		-->				
<!-- pagination code ends ----->

						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
			
<table width="100%"  cellpadding="0" cellspacing="0" border="0px"  bgcolor="#FFFFFF">

                <tr bgcolor="#FFFFFF">

                    <td width="100%" valign="top">
                                    
                           <table class="table table-striped table-condensed">
                             
								<thead>
                                <tr>
									<!--<td width="10%">Id</td> -->
									<td width="10%">Name</td>
                                    <td width="10%">Details</td>
                                    <td width="15%">Address</td>
									<td width="5%">Active</td>
									<td width="10%">Added</td>							
                                </tr>
								</thead>
                                <?php
                                $mcount = 0;
                                if ($total > 0) {
                                    do {
                                        $mcount++;
                                        if ($mcount % 2 == 0) {
                                            $cssClass = 'evenRow';
                                        } else {
                                            $cssClass = 'oddRow';
                                        }

											//$device_id = $row['id'];
											//$sql_device = "SELECT * FROM view_data_filtered WHERE device_id = ".$device_id." ORDER BY created_date DESC LIMIT 0,1";

											//$stmt_device = $db->query($sql_device);
											//$row_device = $stmt_device->fetch();

										//	echo "<pre>";
										//	print_r($row_device);

											//$batteryLevel = $row_device['batteryLevel'];
											$display = $row['display'];
											
											if($display == '1')
											{
												$displayText = '<span class="label label-success">Yes</span>';
											
											}
											else
											{
												$displayText = '<span class="label label-success">No</span>';
											}

                                        ?>

										
							
                                        <tr  class="<?php echo $cssClass; ?>">
											<!--<td valign="top"><?php //echo stripslashes($row['id']); ?></td> -->
                                            <td valign="top"><?php echo stripslashes($row['name']); ?></td>
											<td valign="top"><?php echo stripslashes($row['info']); ?></td>
											<td valign="top"><?php echo stripslashes($row['address']); ?></td>
											<td valign="top"><?php echo $displayText; ?></td>
											<td valign="top"><?php echo stripslashes($row['created_date']); ?></td>

                                        </tr>
                                        <?php
                                    } while ($row = $stmt->fetch());
                                } else {
                                    ?>
                                    <tr><td colspan="9">No Data Available</td></tr>
                                    <?php
                                }
                                ?>
			</td>
                                </tr>
                            </table>
							
							<!--	 <table border="0" width="50%" align="right">
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
-->								 

                    </td>
                </tr>

            </table>

</form>

<?php include('footer.php'); ?>

<script>
function submit_form()
{
	//debugger;
	document.forms["frm_table"].submit();
}
</script>