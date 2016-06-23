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

error_reporting(E_ALL);

//$user_privileges = checkUserAccess("setting");
$user_privileges = 'FULL_ACCESS';

$page_name = "City";
$page_title_bar = "City";
$show_form = true;

$all_states = array('' => 'Select State');
$sql = "SELECT * FROM state ORDER BY state";
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
     $all_states[$row['id']] = $row['state'];
}



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
	$showForm = true;
	$error = '';

if ($show_form == true)
{
		$array_status = array('' => 'Select Status');
		$sql = "SELECT * FROM status ORDER BY name";
		$stmt = $db->query($sql);
		while($row = $stmt->fetch())
		{
			$array_status[$row['value']] = $row['name'];
		}

	if (isset($_POST['Submit']) && $_POST['Submit'] == 'Submit')
	{
		if (trim($_POST['city']) != '')
			$city = trim($_POST['city']);
		else
			$error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;City Name is a required field.<br/>';

		if (trim($_POST['status']) != '')
			$status = trim($_POST['status']);

		if (trim($_POST['city_code']) != '')
			$city_code = trim($_POST['city_code']);
		else
			$city_code = '';

	   if (trim($_POST['state_id']) != 0)
            $state_id = trim($_POST['state_id']);
        else
            $error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;State is a required field.<br/>';
		
			//  check if city exists
		if(isset($city) && isset($state_id))
		{
			$sql = "SELECT * FROM city WHERE city = '$city' and state_id = '$state_id' and id != '".$_POST['id']."'"; 
			$stmt = $db->query($sql);
					$count = $stmt->rowCount();
			if($count >0)
			{
				$error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;City exists<br/>';
			}
		}

		$date_added = get_datetime_now();
		$date_modified = get_datetime_now();
		

		if (isset($_POST['id']) && !empty($_POST['id']) && $error == '')
		{
			$sql = "UPDATE city SET city = '".$city."' , active = '".$status."' , state_id = '".$state_id."' , date_modified = '".$date_modified."' ,city_code = '".$city_code."' WHERE  id = '".$_POST['id']."'";
			$result = $db->exec($sql);
			$new_id = $_POST['id'];

			header('Location: index.php?r=setting/city');
			exit();

		}
		else if ($error == '')
		{
			$sql = "INSERT INTO city (
									city,
									city_code,
									active,
									state_id,
									date_added,
									date_modified
								  )
									VALUES ('$city','$city_code','$status','$state_id','$date_added','$date_modified')";
			$result = $db->exec($sql);
			$new_id = $db->lastInsertId();

			header('Location: index.php?r=setting/city');
			exit();

		}


	}

	if ( isset($_GET['id']) )
	{
		$action = 'Edit';
		$id = (int)$_GET['id'];
		$sql = "SELECT * FROM city WHERE id = '".$id."'";
		$stmt = $db->query($sql);
		$row = $stmt->fetch();

		if(!isset($selected_status))
			$selected_status = $row['active'];

		$city = $row['city'];
		$city_code = $row['city_code'];
		$state_id = $row['state_id'];
	}
	else
	{
		$action = 'Add';
	}
}
?>

<?php  include('header.php') ;?>

<script>
$(document).ready(function() {
$('#form1').validate({
    rules: {
        city: {
            required: true,
	    },
        status: {
            required: true,
	    },
		state_id: {
            required: true,
	    },
    },
    messages: {
      	
    },
    highlight: function (element, errorClass, validClass) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    success: function (label) {
        $(label).closest('form').find('.valid').removeClass("invalid");
    },
    errorPlacement: function (error, element) {
        element.closest('.form-group').find('.help-block').html(error.text());
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
							<li class="active">City</li>
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								 <?php echo $action; ?> City
		
		
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
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<?php echo $error; ?>
            </div>
    <?php } ?>

<div class="control-group">
    <label class="control-label" for="inputEmail">City Name:<font color="#FF0000">*</font></label>
    <input type="text" class="form-control input-sm" name="city" id="city" required value="<?php echo isset($city) ? $city : ''; ?>" /><span class="help-block"></span>
    </div>



<div class="control-group">
	<label class="control-label" for="inputEmail">City Code:</label>
    <input type="text" class="form-control input-sm" name="city_code" id="city_code"  value="<?php echo isset($city_code) ? $city_code : ''; ?>" /><span class="help-block"></span>

	</div>

<div class="control-group">
	<label class="control-label" for="inputEmail">Status:<font color="#FF0000">*</font></label>
    <select class="form-control input-sm" name="status" id="status">
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
		</select><span class="help-block"></span>

	</div>

<div class="control-group">
	<label class="control-label" for="inputEmail">State:<font color="#FF0000">*</font></label>
   <select class="form-control input-sm" name="state_id" >
															<?php
															foreach ($all_states as $index => $value) {
																$extra = '';
																if (isset($state_id)) {
																	if ($state_id == $index)
																		$extra = 'selected = "selected"';
																}
																?>
																<option value="<?php echo $index; ?>" <?php echo $extra; ?> ><?php echo $value; ?></option>
																<?php
															}
															?>
													</select><span class="help-block"></span>

    </div>



	
	
    <div class="control-group">
   <div class="form-actions">

   	 <button class="btn btn-primary" type="submit" name="Submit" value="Submit"/><i class="fa fa-save"></i> Save</button>
	 <a href="city.php" class="btn btn-default"><i class="fa fa-remove"></i> Cancel</a>
     <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? (int) $_GET['id'] : ''; ?>"/>
	 <br/><br/><a href="city.php"><i class="fa fa-close"></i> Back to Manage Cities</a>
   </div>
   </div>

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>

<?php include("footer.php"); ?>
