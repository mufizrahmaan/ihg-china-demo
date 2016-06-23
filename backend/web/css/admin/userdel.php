<?php
if (!defined('__CONFIG')) {
    include_once('../config.php');
}
if (!checkUserLoggedIn() && (isset($_SESSION['Admin']) && $_SESSION['Admin'] != 'Admin')) {
    session_unset();
    header('Location: login.php');
    exit();
}

$showForm = true;
if (isset($_POST['yes']) && $_POST['yes'] == 'Yes' && $_POST['id'] != '') {

	$sql = "SELECT * FROM company_employee e,company_employee_role r WHERE e.id = '" . $_POST['id']."' and e.role_id = r.id" ;
//	echo $sql;

    $stmt = $db->query($sql);
    $row = $stmt->fetch();
	$role = $row['role'];

	if(strtoupper($role) != 'ADMIN')
	{
		$sql = "DELETE FROM company_employee WHERE id = " . $_POST['id'];
		//$result = $db->exec($sql);
		if ($result) 
		{
			header('Location: user.php?company_id='.$_REQUEST['company_id']);
			exit();
		}
		else
		{
		?>
		<script type="text/javascript">
		alert("<?php echo 'Cannot delete a parent row. This is being used'; ?>");
		history.back();
		</script>
		<?php
		}
	}
	else
	{
		$logger->debug("DELETE ATTEMPT ADMIN USER");
		?>
		<script type="text/javascript">
			alert("<?php echo 'Cannot delete ADMIN User'; ?>");
			history.back();
		</script>
		<?php
		//header('location: user.php');
		//exit();
	}
} 
else if (isset($_POST['no']) && $_POST['no'] == 'No') {
    header('Location: user.php?company_id='.$_REQUEST['company_id']);
    exit();
}

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM company_employee WHERE id = " . $id;
	$stmt = $db->query($sql);
	$row = $stmt->fetch();
    $email = $row['email'];
}

?>
<?php  include('header.php') ;?>
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
							<li class="active">Delete User</li>
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
								 Delete User
		
		
								<small>
									<i class="icon-double-angle-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

 <?php
            if ($showForm == true) {
                ?>	

	<form class="form-horizontal" name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="javascript:return validate();">
	<fieldset>
		<label>Confirm Delete User <strong><?php echo isset($row[first_name]) ? $row[first_name] : ''; ?> </strong></label>

		 <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">	&nbsp;&nbsp;&nbsp;
		  <input type="hidden" name="company_id" value="<?php echo isset($_REQUEST['company_id']) ? (int) $_REQUEST['company_id'] : ''; ?>"/>
         <input class="btn btn-danger btn-sm" type="submit" name="yes" value="Yes">
         <input class="btn btn-sm" type="submit" name="no" value="No">

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


<?php include("footer.php"); ?>