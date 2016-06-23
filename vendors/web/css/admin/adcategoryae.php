<?php
if (!defined('__CONFIG')) {
    include_once('../config.php');
}

if(!checkUserLoggedIn())
{
	header('Location: login.php');
	exit();
}

$array_all_access = array('NO_ACCESS'=>"No Access", 'READONLY_ACCESS'=>"Read Only Access", 'RESTRICTED_ACCESS'=>"Restricted Access",'FULL_ACCESS'=>"Full Access");

$page_name = "AD Category";
$page_title_bar = "AD Category";
$showForm = true;

$user_privileges = checkUserAccess("setting_access");

// get the reutn url
if(isset($_POST['return_url']))
{
	$return_url = $_POST['return_url'];
}
else if(!isset($return_url) && isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'])
{
	$return_url = $_SERVER['HTTP_REFERER'];
}

if (getLoggedInUserId() != '')
{
		$uid = (int)getLoggedInUserId();
}
else
{
	header('location: login.php');
	exit();
}

	$action = '';
	$show_form = true;
	$error = '';

if ($show_form == true)
{
		$array_status = array('0' => 'Select Status');
		$sql = "SELECT * FROM status ORDER BY name";
		$stmt = $db->query($sql);
		while($row = $stmt->fetch())
		{
			$array_status[$row['value']] = $row['name'];
		}
	if (isset($_POST['Submit']) && $_POST['Submit'] == 'Submit')
	{
		if (trim($_POST['ad_category']) != '')
            $ad_category = trim($_POST['ad_category']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;AD Category is a required field.<br/>';

		if (trim($_POST['status']) != '')
			$status = trim($_POST['status']);
		
		$created_date = get_datetime_now();
		$updated_date = get_datetime_now();
		
		
        if (isset($_POST['id']) && !empty($_POST['id']) && $error == '') {
            $sql = "UPDATE ad_category SET 
			ad_category = '" . $ad_category . "',
			active = '" . $status . "',
			updated_date = '" . $updated_date . "'
			WHERE  id = '" . $_POST['id'] . "'";


            $result = $db->exec($sql);

            header('Location: adcategory.php');
            exit();
        } else if ($error == '') {
            $sql = "INSERT INTO ad_category ( 
									ad_category,
									active,
									created_date,
									updated_date
								
								  )
									VALUES (
									'$ad_category',
									'$status',
									'$created_date',
									'$updated_date'
								)";

            $result = $db->exec($sql);
			$new_id = $db->lastInsertId();

			header('Location: adcategory.php');
	        exit();
        }
    }

    if (isset($_GET['id'])) {
        $action = 'Edit';
        $id = (int) $_GET['id'];
        $sql = "SELECT * FROM ad_category WHERE id = '" . $id . "'";
        $stmt = $db->query($sql);
        $row = $stmt->fetch();
		if(!isset($selected_status))
			$selected_status = $row['active'];
		$ad_category=$row['ad_category'];
		
    } else {
        $action = 'Add';
    }
}
?>

<?php  include('header.php') ;?>

<script>
$(document).ready(function() {
$('#form1').validate({
    rules: {
        role: {
            required: true,
	    },
        status: {
            required: true,
	    },
    },
    messages: {
      	
    },
    highlight: function (element, errorClass, validClass) {
        $(element).closest('.control-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).closest('.control-group').removeClass('has-error').addClass('has-success');
    },
    success: function (label) {
        $(label).closest('form').find('.valid').removeClass("invalid");
    },
    errorPlacement: function (error, element) {
        element.closest('.control-group').find('.help-block').html(error.text());
    }
});
});
</script>

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
							<li class="active">AD Category</li>
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
								 <?php echo $action; ?> AD Category
		
		
								<small>
									<i class="icon-double-angle-right"></i>
									 <?php
				if(isset($row['id']))
				{
					echo "Id: ".$row['id'];

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
		

		<?php
			if(isset($role) && strtoupper($role) == "ADMIN")
			{
				$extrastring = "disabled='disabled'";
			}
			else
			{
				$extrastring = "";
			}
			?>

	<?php if ($error != '') { ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
				<?php echo $error; ?>
            </div>
    <?php } ?>

	<div class="control-group">
    <label class="control-label" for="inputEmail">AD Category:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="text" name="ad_category" id="ad_category" <?php echo $extrastring; ?> required value="<?php echo isset($ad_category) ? $ad_category : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>



	
	
	<div class="control-group">
    <label class="control-label" for="inputEmail">Status:<font color="#FF0000">*</font></label>
    <div class="controls">
    <select <?php echo $extrastring; ?> name="status" id="status">
										<?php
											foreach($array_status as $index => $value)
											{
												$extra = '';
												if(isset($selected_status))
												{
													if($selected_status == $index)
														$extra ='selected = "selected"';
												}
											?>
												<option value="<?php echo $index;?>" <?php echo $extra;?> ><?php echo $value;?></option>
										<?php
											}
										?>
		</select>&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>



	

    <div class="control-group">
   <div class="form-actions">
	 <button class="btn btn-primary btn-sm" <?php echo $extrastring; ?> type="submit" name="Submit" value="Submit"/><i class="icon-save"></i> Save</button>
	 <a href="adcategory.php" class="btn btn-sm"><i class="icon-remove"></i> Cancel</a>
     <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? (int) $_GET['id'] : ''; ?>"/>
	 <br/><br/><a href="adcategory.php"><i class="icon-reply"></i> Back to AD Categories</a>
   </div>
   </div>

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


<?php include("footer.php"); ?>