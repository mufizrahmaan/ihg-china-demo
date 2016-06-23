<?php
if(!defined('__CONFIG'))
{
	require_once ('config.php');
}



$user_privileges = checkUserAccess("setting");

$page_name = "City";
$page_title_bar = "City";

$all_counteries = array('' => 'Select Country');
$sql = "SELECT * FROM lot_country ORDER BY country";
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
     $all_counteries[$row['id']] = $row['country'];
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
		$user_id = (int)getLoggedInUserId();
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
		if (trim($_POST['state']) != '')
			$state = trim($_POST['state']);
		else
			$error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;State Name is a required field.<br/>';

		if (trim($_POST['status']) != '')
			$status = trim($_POST['status']);

		if (trim($_POST['state_code']) != '')
			$state_code = trim($_POST['state_code']);
		else
			$state_code = '';

	   if (trim($_POST['country_id']) != 0)
            $country_id = trim($_POST['country_id']);
        else
            $error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;Country is a required field.<br/>';
		
		if(isset($state) && isset($country_id))
		{
		//  check if state exists
			$sql = "SELECT * FROM lot_state WHERE state = '$state' and country_id = '$country_id' and id != '".$_POST['id']."'";
			$stmt = $db->query($sql);
					$count = $stmt->rowCount();
			if($count >0)
			{
				$error .= '<strong><i class="fa fa-remove"></i></strong>&nbsp;State exists<br/>';
			}
		}

		$date_added = get_datetime_now();
		$date_modified = get_datetime_now();

		if (isset($_POST['id']) && !empty($_POST['id']) && $error == '')
		{
			$sql = "UPDATE lot_state SET state = '".$state."' , active = '".$status."' , country_id = '".$country_id."' , date_modified = '".$date_modified."' ,state_code = '".$state_code."' WHERE  id = '".$_POST['id']."'";
			$result = $db->exec($sql);
			$new_id = $_POST['id'];

			header('Location: index.php?r=setting/state');
			exit();

		}
		else if ($error == '')
		{
			$sql = "INSERT INTO lot_state (
									state,
									state_code,
									active,
									country_id,
									date_added,
									date_modified
								  )
									VALUES ('$state','$state_code','$status','$country_id','$date_added','$date_modified')";
			$result = $db->exec($sql);
			$new_id = $db->lastInsertId();
			
			header('Location: index.php?r=setting/state');
			exit();


		}

	}

	if ( isset($_GET['id']) )
	{
		$action = 'Edit';
		$id = (int)$_GET['id'];
		$sql = "SELECT * FROM lot_state WHERE id = '".$id."'";
		$stmt = $db->query($sql);
		$row = $stmt->fetch();

		if(!isset($selected_status))
			$selected_status = $row['active'];

		$state = $row['state'];
		$state_code = $row['state_code'];
		$country_id = $row['country_id'];
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
        state: {
            required: true,
	    },
        status: {
            required: true,
	    },
		country_id: {
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

	<form  name="form1" id="form1" action="<?php echo get_current_page_uri(); ?>" method="post" >
		<legend>
		<?php echo $action; ?> State
	
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
    <label class="control-label" for="inputEmail">State Name:<font color="#FF0000">*</font></label>
    <input type="text" class="form-control input-sm" name="state" id="state" required value="<?php echo isset($state) ? $state : ''; ?>"/><span class="help-block"></span>
    </div>
    </div>
	</div>

	<div class="row">
	<div class="col-sm-3">
	<div class="form-group">
	 <label class="control-label" for="inputEmail">State Code:</label>
    <input type="text" class="form-control input-sm" name="state_code" id="state_code"  value="<?php echo isset($state_code) ? $state_code : ''; ?>"/><span class="help-block"></span>
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
	<label class="control-label" for="inputEmail">Country:<font color="#FF0000">*</font></label>
    <select class="form-control input-sm" name="country_id" >
															<?php
															foreach ($all_counteries as $index => $value) {
																$extra = '';
																if (isset($country_id)) {
																	if ($country_id == $index)
																		$extra = 'selected = "selected"';
																}
																?>
																<option value="<?php echo $index; ?>" <?php echo $extra; ?> ><?php echo $value; ?></option>
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
	 <a href="index.php?r=setting/state" class="btn btn-default"><i class="fa fa-remove"></i> Cancel</a>
     <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? (int) $_GET['id'] : ''; ?>"/>
	 <br/><br/><a href="index.php?r=setting/state"><i class="fa fa-close"></i> Back to Manage States</a>
   </div>
   </div>
	</div>
    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


