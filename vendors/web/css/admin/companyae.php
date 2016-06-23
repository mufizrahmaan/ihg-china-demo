<?php
if (!defined('__CONFIG')) {
    include_once('../config.php');
}
if(!checkUserLoggedIn())
{
    header('Location: login.php');
    exit();
}

if (getLoggedInUserId() != '') {
    $user_id = (int) getLoggedInUserId();
} else {
    header('location: login.php');
    exit();
}
function big_rand( $len = 9 ) {
    $rand   = '';
    while( !( isset( $rand[$len-1] ) ) ) {
        $rand   .= mt_rand( );
    }
    return substr( $rand , 0 , $len );
}

function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function randomNumber($length) {
        $min = str_repeat(0, $length-1) . 1;
        $max = str_repeat(9, $length);
        return mt_rand($min, $max);   
    }

$action = '';
$showForm = true;
$error = '';
$success = '';
	
$user_privileges = checkUserAccess("setting_access");
/*
$all_user_type = array('0' => 'Select User Role');
$sql = "SELECT * FROM company_registration_role ORDER BY role";
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
     $all_user_type[$row['id']] = $row['role'];
}
*/

/*
$all_locations = array('0' => 'Select User Location');
$sql = "SELECT * FROM tbl_location ORDER BY location";
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
     $all_locations[$row['id']] = $row['location'];
}
*/

$all_status = array(0=>'Inactive',1=>'Active');

if ($showForm == true) {
    if (isset($_POST['Submit']) && $_POST['Submit'] == 'Submit') {
        if (trim($_POST['name']) != '' && strlen($_POST['name']) > 3)
            $name = trim($_POST['name']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Publisher Name is a required field.<br/>';

		if (trim($_POST['password']) != '')
            $password = trim($_POST['password']);
 

		if (trim($_POST['email_id']) != '')
            $email_id = trim($_POST['email_id']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Email is a required field.<br/>';

		if (trim($_POST['contact_no']) != '')
            $contact_no = trim($_POST['contact_no']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Contact Number is a required field.<br/>';
   
		$created_date = get_datetime_now();
		$updated_date = get_datetime_now();
		
		$status_id = trim($_POST['status_id']);

        if (isset($_POST['id']) && !empty($_POST['id']) && $error == '') {
			$id = $_POST['id'];

				//  check if email_id is in use
				$sql = "SELECT * from company_registration where email_id= '" . $email_id . "' and id != '".$id."'";
				$stmt = $db->query($sql);
				$row = $stmt->fetch();
				$count = $stmt->rowCount();
				if ($count > 0) {
					 $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Email is in use by another user<br/>';
				}
				else
				{
					$sql = "UPDATE company_registration SET 
					name = '" . $name . "',
					email_id = '" . $email_id . "',
					contact_no = '" . $contact_no . "',
					updated_date = '" . $updated_date . "',
					active = '" . $status_id . "'
					WHERE  id = '" . $_POST['id'] . "'";
				
					$result = $db->exec($sql);
					
					$new_id = $_POST['id'];
					if ($_FILES['image']['name']) {
					$email_id_safe = str_replace(".", "_", $email_id);
					$img = GenerateSafeFileName($email_id_safe . "_" . $new_id . ".jpg");
					move_uploaded_file($_FILES['image']['tmp_name'], "./../manage/images/$img") or die("error uploading image");
					$sql = "update company_registration set company_logo='images/$img' where id=$new_id";
					$result = $db->exec($sql);
					}

					// update status
					$sql = "UPDATE company_employee_role SET active = '" . $status_id . "' WHERE company_id = '" . $_POST['id'] . "'";
					$result = $db->exec($sql);

					$sql = "UPDATE company_employee SET active = '" . $status_id . "' WHERE company_id = '" . $_POST['id'] . "'";
					$result = $db->exec($sql);

					header('Location: company.php');
					exit();
				}
			
        } else if ($error == '') {

				//  check if email_id is in use
				$sql = "SELECT * from company_registration where email_id= '" . $email_id . "'";
				$stmt = $db->query($sql);
				$count = $stmt->rowCount();
				if ($count > 0) {
					 //$row = $stmt->fetch();
					 $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;email_id is in use by another user<br/>';
				}
				else
				{

					//$publisher_id = strtoupper(substr(clean($name), 0, 3)."-".randomNumber(10));
					$publisher_id = "pub-".big_rand(10);

					$sql = "INSERT INTO company_registration ( 
											name,
											contact_no,
											email_id,
											active,
											created_date,
											publisher,
											publisher_id
											
										  )
											VALUES ('$name',
											'$contact_no',
											'$email_id',
											'$status_id',
											'$created_date',
											'1',
											'$publisher_id')";

					$result = $db->exec($sql);
					
					$new_id = $db->lastInsertId();

					if ($_FILES['image']['name']) {
					$email_id_safe = str_replace(".", "_", $email_id);
					$img = GenerateSafeFileName($email_id_safe . "_" . $new_id . ".jpg");
					move_uploaded_file($_FILES['image']['tmp_name'], "./../manage/images/$img") or die("error uploading image");
					$db->exec("update company_registration set company_logo='images/$img' where id=$new_id");
					}

					// create company role
					$sql = "INSERT INTO company_employee_role ( 
									role,
									active,
									company_id,
									analytic_access,
									campaign_access,
								 	setting_access,
									created_date,
									updated_date
								
								  )
									VALUES (
									'admin',
									'$status_id',
									'$new_id',
									'FULL_ACCESS',
									'FULL_ACCESS',
									'FULL_ACCESS',
									'$created_date',
									'$updated_date'
								)";

					$result = $db->exec($sql);
					$new_role_id = $db->lastInsertId();


					// create company user
					$sql = "INSERT INTO company_employee ( 
											first_name,
											last_name,
											password,
											email,
											role_id,
											company_id,
											active,
											created_date
											
										  )
											VALUES ('$name',
											'Admin',
											'$password',
											'$email_id',
											'$new_role_id',
											'$new_id',
											'$status_id',
											'$created_date')";

					$result = $db->exec($sql);
					
					$new_user_id = $db->lastInsertId();

					// feedback settings

					$sql = "insert into company_settings 
					(
					is_anonymous,
					name,
					name_mandatory,
					emailid,
					emailid_mandatory,
					mobilenumber,
					mobilenumber_mandatory,
					ageinyear,
					ageinyear_mandatory,
					updated_date,
					company_id
					)
					values
					(
					'1',
					'1',
					'1',
					'1',
					'1',
					'1',
					'1',
					'1',
					'1',
					'$created_date',
					'$new_id'
					)";
					echo $sql;
					$result = $db->exec($sql);
					
									


					// send email to user / company
					$to      = $email_id;
					$subject = 'New Publisher Added in Shelf - Login Details';
					$message = 'New Publisher Added in Shelf <br/><br/>'.'Publisher Name : '.$name.'<br/><br/>Username : '.$email_id.'<br/><br/>Password : '.$password;
					$headers = 'From: admin@mintmapp.com' . "\r\n" .
						'Reply-To: admin@mintmapp.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);

					header('Location: company.php');
					exit();
				}
			
        }
    }

    if (isset($_GET['id'])) {
        $action = 'Edit';
        $id = (int) $_GET['id'];
        $sql = "SELECT company_registration.* FROM company_registration WHERE company_registration.id = '" . $id . "'";
        $stmt = $db->query($sql);
        $row_result = $stmt->fetch();
		$name = $row_result['name'];
		$email_id = $row_result['email_id'];
		$contact_no = $row_result['contact_no'];
		$status_id = $row_result['active'];
		$company_logo = $row_result['company_logo'];

    } else {
        $action = 'Add';
		$email_id="";
		if (isset($_POST['email_id']) && trim($_POST['email_id']) != '')
            $email_id = trim($_POST['email_id']);
    }

	if(strtoupper($username) == "ADMIN")
	{
		$extrastring = 'readonly="readonly"';
	}
	else
	{
		$extrastring = "";
	}
}
?>
<?php  include('header.php') ;?>

<script>
$(document).ready(function() {
$('#form1').validate({
    rules: {
        name: {
            required: true,
			minlength: 4,
        },
		password: {
          required: true,
		  minlength: 5,
        },
		email_id: {
            required: true,
			email: true,
        },
		contact_no: {
            required: true,
        },
		status_id: {
            required: true
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
							<li class="active"><?php echo $action; ?> Publisher</li>
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
								<?php echo $action; ?> Publisher
								<small>
									<i class="icon-double-angle-right"></i>
									 <?php
				if(isset($row['id']))
				{
					echo "Id: ".$row['id']." email_id: ".$row['email_id'];

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

	<form class="form-horizontal" name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
	<fieldset>


   

	<?php if ($error != '') { ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
				<?php echo $error; ?>
            </div>
    <?php } ?>

	<?php if ($success != '') { ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
				<?php echo $success; ?>
            </div>
    <?php } ?>

	<div class="control-group">
    <label class="control-label" for="inputemail_id">Name:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="text" name="name" id="name" required class="input-xxlarge" value="<?php echo isset($name) ? $name : ''; ?>"/>&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="inputemail_id">Email:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="email" name="email_id" id="email_id" class="input-xlarge" required value="<?php echo isset($email_id) ? $email_id : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="inputemail_id">Contact Number:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="text" name="contact_no" id="contact_no" class="input-xlarge" required value="<?php echo isset($contact_no) ? $contact_no : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>
	
	<?php

	 if (isset($_REQUEST['id']))
	 {
		// show nothing
	 }
	 else
	 {
		 ?>
	<div class="control-group">
    <label class="control-label" for="inputemail_id">Password:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="password" name="password" id="password" class="input-xlarge" <?php echo $extrastring; ?> required value="<?php echo isset($password) ? $password : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div> <i>(This will create an admin user with login as the email & entered password) </i>
    </div>
    </div>
	<?php
	 }
	?>
	

	

	<div class="control-group">
    <label class="control-label" for="inputPassword">Status:<font color="#FF0000">*</font></label>
    <div class="controls">
    <select name="status_id" required>
															<?php
															foreach ($all_status as $index => $value) {
																$extra = '';
																if (isset($status_id)) {
																	if ($status_id == $index)
																		$extra = 'selected = "selected"';
																}
																?>
																<option value="<?php echo $index; ?>" <?php echo $extra; ?> ><?php echo $value; ?></option>
																<?php
															}
															?>
														</select>
    </div>
    </div>


	<?php if(isset($company_logo) && $company_logo != '')
	{
	?>
	<div class="control-group">
    <label class="control-label" for="inputemail_id">Logo:</label>
    <div class="controls">
    <img src="<?php echo './../manage/'.$company_logo; ?>" width="200px" style="width:200px"></img>
    </div>
    </div>
	<?php
	}
	?>

	<div class="control-group">
	 <label class="control-label" for="inputemail_id">Logo:</label>
    <div class="controls">
    <input class="inp" type="file" name="image"/>&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

    <div class="control-group">
   <div class="form-actions">
	 <button class="btn btn-primary btn-sm" type="submit" name="Submit" value="Submit"/><i class="icon-save"></i> Save</button>
	 <a href="company.php" class="btn btn-sm"><i class="icon-remove"></i> Cancel</a>
     <input type="hidden" name="id" value="<?php echo isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : ''; ?>"/>
	 <br/><br/><a href="company.php"><i class="icon-reply"></i> Back to Publishers</a>
   </div>
   </div>

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


<?php include("footer.php"); ?>