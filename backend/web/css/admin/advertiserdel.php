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
	
	/*
	$sql = "SELECT * FROM advertiser WHERE id = " . $_POST['id'];
    $stmt = $db->query($sql);
    $row = $stmt->fetch();
	*/
		$id = $_POST['id'];
		
		if($id)
		{
		echo "Deleting advertiser with ID : ".$id;
		
		$sql = "DELETE FROM advertiser WHERE id = '" . $id."'";
		$result = $db->exec($sql);

		if ($result) 
		{
			header('location: advertiser.php');
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


} 
else if (isset($_POST['no']) && $_POST['no'] == 'No') {
    header('location: advertiser.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM advertiser WHERE id = " . $id;
	$stmt = $db->query($sql);
	$row = $stmt->fetch();
    $name = $row['name'];
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
							<li class="active">Delete Advertiser</li>
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
						<div class="page-header">
							<h1>
								 Delete Advertiser
		
		
								<small>
									<i class="icon-double-angle-right"></i>
									 <?php
										if(isset($row['id']))
										{
											echo "Id: ".$row['id'];

										}
									?>

									&nbsp;&nbsp;&nbsp;<font color="red">(Warning! Deleting Advertiser will delete all the associated data for this Advertiser, once deleted this cant be UNDONE) </font>
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
		<label>Confirm Delete Advertiser <strong><?php echo isset($row[name]) ? $row[name] : ''; ?> </strong></label>

		 <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">	&nbsp;&nbsp;&nbsp;			
         <input class="btn btn-danger btn-sm" type="submit" name="yes" value="Yes">
         <input class="btn btn-sm" type="submit" name="no" value="No">

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


<?php include("footer.php"); ?>