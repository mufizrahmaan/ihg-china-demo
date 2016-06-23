<?php
if (!defined('__CONFIG')) {
    include_once('../config.php');
}

if(!checkUserLoggedIn())
{
    header('Location: login.php');
    exit();
} else {
    $user_id = getLoggedInUserId();
}

if (isset($_POST) && isset($_POST['user_role_access']))
{
	foreach ($_POST['user_role_access'] as $column_name => $access_array) 
	{
			foreach ($access_array as $role_id => $value) 
			{
				$sql = "UPDATE company_employee_role set $column_name = '$value' WHERE id = $role_id";
				$db->exec($sql);
			}
	}
	$success = "Saved Sucessfully.";
}

$array_all_access = array('NO_ACCESS'=>"No Access", 'READONLY_ACCESS'=>"Read Only Access", 'RESTRICTED_ACCESS'=>"Restricted Access",'FULL_ACCESS'=>"Full Access");

$showForm = '';
$locs = 0;
$total = 0;
$success = '';

//if (strtoupper (getLoggedInUserName()) == 'ADMIN') {
	if (true) {
    $showForm = '1';
    // For sorting date

    $currentPage = $_SERVER["PHP_SELF"];
    $maxRows = 100;
    $pageNum = 0;
    if (isset($_GET['pageNum'])) {
        $pageNum = $_GET['pageNum'];
    }
    $startrow = $pageNum * $maxRows;

    $query = "SELECT * from company_employee_role where company_id = ".$_SESSION['company_id']." order by role";
    $query_limit = sprintf("%s LIMIT %d, %d", $query, $startrow, $maxRows);
	$stmt = $db->query($query_limit);
    $row = $stmt->fetch();
    $total = $stmt->rowCount();
	
    if (isset($_GET['totalRows'])) {
        $totalRows = $_GET['totalRows'];
    } else {

        $stmt = $db->query($query);
		$row = $stmt->fetch();
        $totalRows = $stmt->rowCount();
    }
	 $totalPages = ceil($totalRows / $maxRows) - 1;

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
							<li class="active">Role Based Access Control Matrix </li>
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
						<div class="page-header">
							<h1>
								Role Based Access Control Matrix 
								<small>
									<i class="icon-double-angle-right"></i>
									Manage user roles
								</small>
								<div class="pull-right">
							<a href=<?php echo "userroleae.php"; ?> class="btn btn-success btn-xs"><i class="icon-plus"></i> Add New</a> 
							</div>
							</h1>
							
						</div>

						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
			
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1" id="form1">

<table width="100%"  cellpadding="0" cellspacing="0" border="0px"  bgcolor="#FFFFFF">

                <tr bgcolor="#FFFFFF">

                    <td width="100%" valign="top">
                        <?php
                        if ($showForm == '1') {
                            ?>
	


						   <?php if (isset($success) && ($success != '')) { ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
									<?php echo $success; ?>
								</div>
							<?php } ?>
                                    
                           <table class="table table-striped table-condensed">
                             
								<thead>
                                <tr>
									<!--<td width="10%">Id</td> -->
									<td width="20%">Role</td>
                                    <td width="10%">Active</td>
                                    <td width="10%">Analytics</td>
									<td width="10%">Campaigns</td>
									<td width="10%">Admin Settings</td>
									<td width="20%">Action</td>
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

											//echo "<pre>";
											//print_r($row);

											// for admin disable the row
											if($row['role'] == 'admin')
											{
												$disablerow = "disabled";
											}
											else
											{
												$disablerow = '';
											}
                                        ?>


							
                                        <tr  class="<?php echo $cssClass; ?>">
											<!--<td valign="top"><?php echo stripslashes($row['id']); ?></td> -->
                                            <td valign="top"><?php echo stripslashes($row['role']); ?></td>
											<td valign="top">
											
											<?php 
											
											if($row['active'])
											echo "<span class=\"label label-success\">Yes</span>";
											else
											echo "<span class=\"label label-important\">No</span>";
											
											?>
											
											</td>

											<td valign="top">

										<select class="input-medium" <?php echo $disablerow; ?> name="user_role_access[analytic_access][<?php echo $row['id']; ?>]" id="user_role_access[analytic_access][<?php echo $row['id']; ?>]" onchange="document.form1.submit();">
										<?php	
											foreach($array_all_access as $index => $id)
											{
												$extra = '';
												if(isset($row['analytic_access']))
												{
													if($row['analytic_access'] == $index)
														$extra ='selected = "selected"';
												}
												
												if($index == NO_ACCESS)
												{
													$color= "red";
												}
												else if($index == RESTRICTED_ACCESS)
												{
													$color = "brown";
												}
												else if($index == FULL_ACCESS)
												{
													$color = "green";
												}
												else
												{
													$color = "";
												}
											?>
											<option style="color:<?php echo $color; ?>" value="<?php echo $index;?>" <?php echo $extra;?> ><?php echo $id;?></option>
										<?php
											}
										?>
										</select>

                                            </td>

											<td valign="top">

										<select class="input-medium" <?php echo $disablerow; ?> name="user_role_access[campaign_access][<?php echo $row['id']; ?>]" id="user_role_access[campaign_access][<?php echo $row['id']; ?>]" onchange="document.form1.submit();">
										<?php	
											foreach($array_all_access as $index => $id)
											{
												$extra = '';
												if(isset($row['campaign_access']))
												{
													if($row['campaign_access'] == $index)
														$extra ='selected = "selected"';
												}
												if($index == NO_ACCESS)
												{
													$color= "red";
												}
												else if($index == FULL_ACCESS)
												{
													$color = "green";
												}
												else
												{
													$color = "";
												}
											?>
											<option style="color:<?php echo $color; ?>" value="<?php echo $index;?>" <?php echo $extra;?> ><?php echo $id;?></option>
										<?php
											}
										?>
										</select>

                                            </td>

											<td valign="top">

										<select class="input-medium" <?php echo $disablerow; ?> name="user_role_access[setting_access][<?php echo $row['id']; ?>]" id="user_role_access[setting_access][<?php echo $row['id']; ?>]" onchange="document.form1.submit();">
										<?php	
											foreach($array_all_access as $index => $id)
											{
												$extra = '';
												if(isset($row['setting_access']))
												{
													if($row['setting_access'] == $index)
														$extra ='selected = "selected"';
												}
												if($index == NO_ACCESS)
												{
													$color= "red";
												}
												else if($index == FULL_ACCESS)
												{
													$color = "green";
												}
												else
												{
													$color = "";
												}
											?>
											<option style="color:<?php echo $color; ?>" value="<?php echo $index;?>" <?php echo $extra;?> ><?php echo $id;?></option>
										<?php
											}
										?>
										</select>

                                            </td>
											<td valign="top">
											<a title="Edit" href="userroleae.php?id=<?php echo $row['id']; ?>" ><i class="icon-pencil blue bigger-130"></i></a>&nbsp;&nbsp;&nbsp;
											<a title="Edit" href="userroledel.php?id=<?php echo $row['id']; ?>" ><i class="icon-trash red bigger-130"></i></a>
											</td>
                                        </tr>
                                        <?php
                                    } while ($row = $stmt->fetch());
                                } else {
                                    ?>
                                    <tr><td colspan="9">No Data Available</td></tr>
                                    <?php
                                }
                                ?>
<!--
								 <tr>
			<td>&nbsp;</td>
				<td colspan="5" align="left">
					<button class="btn btn-primary" type="submit" name="Submit" value="Submit"/><i class="icon-save"></i> Save</button>
				</td>
			</tr>
		
	-->				</td>
                                </tr>
                            </table>

									
									<table border="0" width="50%" align="center">
                                            <tr>
                                                <td width="23%" align="center"><?php if ($pageNum > 0) { // Show if not first page   ?>
                                                        <a href="<?php printf("%s?pageNum=%d%s", $currentPage, 0, $queryString); ?>"><img alt="First" src="images/First.gif" border=0 /></a>
                                                    <?php } // Show if not first page ?>            </td>
                                                <td width="31%" align="center"><?php if ($pageNum > 0) { // Show if not first page   ?>
                                                        <a href="<?php printf("%s?pageNum=%d%s", $currentPage, max(0, $pageNum - 1), $queryString); ?>"><img alt="Previous" src="images/Previous.gif" border=0 /></a>
                                                    <?php } // Show if not first page ?>            </td>
                                                <td width="23%" align="center"><?php if ($pageNum < $totalPages) { // Show if not last page   ?>
                                                        <a href="<?php printf("%s?pageNum=%d%s", $currentPage, min($totalPages, $pageNum + 1), $queryString); ?>"><img alt="Next" src="images/Next.gif" border=0 /></a>
                                                    <?php } // Show if not last page ?>            </td>
                                                <td width="23%" align="center"><?php if ($pageNum < $totalPages) { // Show if not last page   ?>
                                                        <a href="<?php printf("%s?pageNum=%d%s", $currentPage, $totalPages, $queryString); ?>"><img alt="Last" src="images/Last.gif" border=0 /></a>
                                                    <?php } // Show if not last page ?>            </td>
                                            </tr>
                                        </table>
										

										<div class="well">
										
										<font color="red"> No Access : User will not be able to access the pages <br/> </font>
										<font color="grey"> Read Only Access : User will be able to only view the pages, can not edit <br/> </font>
										<font color="brown"> Restricted Access : User will be able to view the pages, edit the pages, can not delete <br/> </font>
										<font color="green"> Full Access : User will be able to add, edit, delete & will have full access to the system settings <br/> </font>
										</div>
						
                            <?php
                        } else {
                            echo '<br/><br/><h4>You do not have privileges to view this page.</h4>'; //end of if showForm
                        }
                        ?>
                    </td>
                </tr>

            </table>

</form>


<?php include('footer.php'); ?>
