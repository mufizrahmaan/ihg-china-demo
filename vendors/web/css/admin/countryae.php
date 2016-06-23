<?php
if(!defined('__CONFIG'))
{
	require_once ('config.php');
}



$page_name = "Country";
$page_title_bar = "Country";

$user_privileges = checkUserAccess("setting");

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

if ($showForm == true)
{
		$array_status = array('0' => 'Select Status');
		$sql = "SELECT * FROM lot_status ORDER BY name";
		$stmt = $db->query($sql);
		while($row = $stmt->fetch())
		{
			$array_status[$row['value']] = $row['name'];
		}

	if (isset($_POST['Submit']) && $_POST['Submit'] == 'Submit')
	{
		if (trim($_POST['country']) != '')
			$country = trim($_POST['country']);
		else
			$error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;Country Name is a required field.<br/>';

		if (trim($_POST['status']) != '')
			$status = trim($_POST['status']);

		if (trim($_POST['country_code']) != '')
			$country_code = trim($_POST['country_code']);
		else
			$country_code = '';

		$date_added = get_datetime_now();
		$date_modified = get_datetime_now();
		

		if (isset($_POST['id']) && !empty($_POST['id']) && $error == '')
		{
			$sql = "UPDATE lot_country SET country = '".$country."' , active = '".$status."' , date_modified = '".$date_modified."' ,country_code = '".$country_code."' WHERE  id = '".$_POST['id']."'";
			$result = $db->exec($sql);
			$new_id = $_POST['id'];
		}
		else if ($error == '')
		{
			$sql = "INSERT INTO lot_country (
									country,
									country_code,
									active,
									region_id,
									date_added,
									date_modified
								  )
									VALUES ('$country','$country_code','$status','1','$date_added','$date_modified')";
			$result = $db->exec($sql);
			$new_id = $db->lastInsertId();

		}

		header('Location: index.php?r=setting/country');
		exit();
	}

	if ( isset($_GET['id']) )
	{
		$action = 'Edit';
		$id = (int)$_GET['id'];
		$sql = "SELECT * FROM lot_country WHERE id = '".$id."'";
		$stmt = $db->query($sql);
		$row = $stmt->fetch();

		$country = $row['country'];
		$country_code = $row['country_code'];

		if(!isset($selected_status))
			$selected_status = $row['active'];
	}
	else
	{
		$action = 'Add';
	}
}
?>


<script>
$(document).ready(function() {
$('#form1').validate({
    rules: {
        country: {
            required: true,
	    },
        status: {
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



 <?php
            if ($showForm == true) {
                ?>	

	<form name="form1" id="form1" action="<?php echo get_current_page_uri(); ?>" method="post" >
		<legend>
		<?php echo $action; ?> Country

		</legend>

	<?php if ($error != '') { ?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<?php echo $error; ?>
            </div>
    <?php } ?>

	<div class="row">
	<div class="col-sm-3">
	<div class="form-group">
    <label class="control-label" for="inputEmail">Country Name:<font color="#FF0000">*</font></label>

    <input type="text" class="form-control input-sm" name="country" id="country" required value="<?php echo isset($country) ? $country : ''; ?>" /><span class="help-block"></span>
    </div>
    </div>
	</div>

	<div class="row">
	<div class="col-sm-3">
	<div class="form-group">
	<label class="control-label" for="inputEmail">Country Code:</label>

    <input type="text" class="form-control input-sm" name="country_code" id="country_code"  value="<?php echo isset($country_code) ? $country_code : ''; ?>" />
    </div>
    </div>
	</div>

	<div class="row">
	<div class="col-sm-3">
	<div class="form-group">
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
    </div>
	</div>

	<div class="row">
	<div class="col-sm-3">
	

    <div class="form-group">

	 <button class="btn btn-primary" type="submit" name="Submit" value="Submit"/><i class="fa fa-save"></i> Save</button>
	 <a href="index.php?r=setting/country" class="btn btn-default"><i class="fa fa-remove"></i> Cancel</a>
     <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? (int) $_GET['id'] : ''; ?>"/>
	 <br/><br/><a href="index.php?r=setting/country"><i class="fa fa-close"></i> Back to Manage Countries</a>
   </div>
   </div>
	</div>
    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


