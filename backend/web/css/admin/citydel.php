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
$page_name = "City";
$page_title_bar = "City";
$current_page = $_SERVER["PHP_SELF"];


// get the reutn url
if(isset($_POST['return_url']))
{
	$return_url = $_POST['return_url'];
}
else if(!isset($return_url) && isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'])
{
	$return_url = $_SERVER['HTTP_REFERER'];
}

if (isset($_POST['yes']) && $_POST['yes'] == 'Yes' && $_POST['id'] != '')
{	
	$sql = "DELETE FROM city WHERE id = ".$_POST['id'];	
	$result = $db->exec($sql); 
	if($result)
	{
		header('location: city.php');
		exit();
	}
	else
	{
		//echo mysql_errno();
		$error = "<strong>Not Deleted! <br/></strong>".mysql_error();
	}
}
else if (isset($_POST['no']) && $_POST['no'] == 'No')
{
	header('location: city.php');
	exit();
}
if (isset($_REQUEST['id']))
{
	$id = (int)$_REQUEST['id'];
	$sql = "SELECT * FROM city WHERE id = ".$id;
	$stmt = $db->query($sql);
          $row = $stmt->fetch();
	$title = $row['city'];
	$id = $row['id'];
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
							<li class="active">Delete City</li>
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
								 Delete City
		
		
								<small>
									<i class="icon-double-angle-right"></i>
									 <?php
										if(isset($row['id']))
										{
											echo "Id: ".$row['id']." City: ".$row['city'];

										}
									?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


 <?php
            if ($showForm == true) {
                ?>	

	<form class="form-horizontal" name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<fieldset>

		<label>Confirm Delete City <strong><?php echo isset($title) ? $title : ''; ?> </strong></label>
			<?php if ($error != '') { ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<?php echo $error; ?>
            </div>
			<?php } ?>
		 <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">				
         <input class="btn btn-danger" type="submit" name="yes" value="Yes">
         <input class="btn btn-default" type="submit" name="no" value="No">

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>

			<?php include("footer.php"); ?>



