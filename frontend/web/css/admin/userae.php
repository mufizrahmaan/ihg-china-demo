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


$action = '';
$showForm = true;
$error = '';
$success = '';
	
$user_privileges = checkUserAccess("setting_access");

$all_user_type = array('0' => 'Select User Role');
$sql = "SELECT * FROM company_employee_role WHERE company_id = ".$_REQUEST['company_id']." ORDER BY role asc";
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
     $all_user_type[$row['id']] = $row['role'];
}

$all_status = array(0=>'Inactive',1=>'Active');

if ($showForm == true) 
{
    if (isset($_POST['Submit']) && $_POST['Submit'] == 'Submit') 
	{
        if (trim($_POST['user_first_name']) != '')
            $user_first_name = trim($_POST['user_first_name']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;First Name is a required field.<br/>';

		if (trim($_POST['user_last_name']) != '')
            $user_last_name = trim($_POST['user_last_name']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Last Name is a required field.<br/>';

		if (trim($_POST['password']) != '')
            $password = trim($_POST['password']);
 

		if (trim($_POST['user_email']) != '')
            $user_email = trim($_POST['user_email']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Email is a required field.<br/>';

		
        if (trim($_POST['role_id']) != 0)
            $role_id = trim($_POST['role_id']);
        else
            $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;User Role is a required field.<br/>';
	
		$created_date = get_datetime_now();
		$updated_date = get_datetime_now();
		
		$status_id = trim($_POST['status_id']);

        if (isset($_POST['id']) && !empty($_POST['id']) && $error == '' && $_POST['id'] != 0) 
		{
				$id = $_POST['id'];

				//  check if email is in use
				$sql = "SELECT * from company_employee where email= '" . $user_email . "' and id != '".$id."'";
				$stmt = $db->query($sql);
				$row = $stmt->fetch();
				$count = $stmt->rowCount();
				if ($count > 0) 
					{
					 $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Email is in use by another user<br/>';
					}
					else
					{
							$sql = "UPDATE company_employee SET 
							first_name = '" . $user_first_name . "',
							last_name = '" . $user_last_name . "',
							password = '" . $password . "',
							email = '" . $user_email . "',
							role_id = '" . $role_id . "',
							updated_date = '" . $updated_date . "',
							active = '" . $status_id . "'
							WHERE  id = '" . $_POST['id'] . "'";
						
							$result = $db->exec($sql);

							$new_id = $_POST['id'];
							if ($_FILES['image']['name']) {
							
							$user_email_safe = str_replace(".", "_", $user_email);
							$img = GenerateSafeFileName($user_email_safe . "_" . $new_id . ".jpg");

							move_uploaded_file($_FILES['image']['tmp_name'], "./images/users/$img") or die("error uploading image");
							$sql = "update company_employee set photo='images/users/$img' where id=$new_id";
							$result = $db->exec($sql);
							}

							header('Location: user.php?company_id='.$_REQUEST['company_id']);
							exit();
						}
			
        } 
		else if ($error == '' ) 
		{
				//  check if email is in use
				$sql = "SELECT * from company_employee where email= '" . $user_email . "'";
				$stmt = $db->query($sql);
				$count = $stmt->rowCount();
				if ($count > 0) {
					 //$row = $stmt->fetch();
					 $error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Email is in use by another user<br/>';
				}
				else
				{
					$sql = "INSERT INTO company_employee ( 
											first_name,
											last_name,
											password,
											email,
											role_id,
											company_id,
											active,
											created_date,
											updated_date
											
										  )
											VALUES ('$user_first_name',
											'$user_last_name',
											'$password',
											'$user_email',
											'$role_id',
											'$_REQUEST[company_id]',
											'$status_id',
											'$created_date',
											'$created_date')";
					$result = $db->exec($sql);
					$new_id = $db->lastInsertId();

					if ($_FILES['image']['name']) 
					{
						$user_email_safe = str_replace(".", "_", $user_email);
						$img = GenerateSafeFileName($user_email_safe . "_" . $new_id . ".jpg");

						move_uploaded_file($_FILES['image']['tmp_name'], "./images/users/$img") or die("error uploading image");
						$db->exec("update company_employee set photo='images/users/$img' where id=$new_id");
					}
					

					// send email
					$to      = $user_email;
					$subject = 'Pulse - Login Details';
					$message = 'Pulse Login Details \n\nUsername : '.$user_email.'\n\nPassword : '.$password;
					$headers = 'From: admin@mintmapp.com' . "\r\n" .
						'Reply-To: admin@mintmapp.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);

					header('Location: user.php?company_id='.$_REQUEST['company_id']);
					exit();
				}
			
        }
    }

    if (isset($_GET['id'])) {
        $action = 'Edit';
        $id = (int) $_GET['id'];
        $sql = "SELECT company_employee.*, company_employee_role.role FROM company_employee LEFT JOIN company_employee_role ON company_employee.role_id = company_employee_role.id WHERE company_employee.id = '" . $id . "'";
        $stmt = $db->query($sql);
        $row_result = $stmt->fetch();
		$user_first_name = $row_result['first_name'];
		$user_last_name = $row_result['last_name'];
		$user_email = $row_result['email'];
		$role_id = $row_result['role_id'];
		$user_type = $row_result['role'];
		//$user_location_id = $row_result['user_location_id'];
		$status_id = $row_result['active'];
		$password = $row_result['password'];
		$photo = $row_result['photo'];
    } 
	
	else {
        $action = 'Add';
    }

}

?>

<?php  include('header.php') ;?>

<script>
$(document).ready(function() {
$('#form1').validate({
    rules: {
        user_first_name: {
            required: true,
			minlength: 2,
        },
        user_last_name: {
            required: true,
			minlength: 2,
        },
		username: {
            required: true,
			minlength: 5,
        },
		password: {
          required: true,
		  minlength: 5,
        },
		user_email: {
            required: true,
			email: true,
        },
		role_id: {
            required: true
        },
		user_location_id: {
            required: true
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
							<li class="active">Add User</li>
						</ul><!-- .breadcrumb -->
						
						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div>-->
						
						<!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								<?php echo $action; ?> User
								<small>
									<i class="icon-double-angle-right"></i>
									 <?php
									if(isset($row['id']))
									{
										echo "Id: ".$row['id']." Email: ".$row['user_email'];

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
    <label class="control-label" for="inputEmail">First Name:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="text" class="input-xlarge" name="user_first_name" id="user_first_name" required value="<?php echo isset($user_first_name) ? $user_first_name : ''; ?>"/>&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="inputEmail">Last Name:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="text" class="input-xlarge" name="user_last_name" id="user_last_name" required value="<?php echo isset($user_last_name) ? $user_last_name : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="inputEmail">Email:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="email" class="input-xlarge" name="user_email" id="user_email" required value="<?php echo isset($user_email) ? $user_email : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="inputEmail">Password:<font color="#FF0000">*</font></label>
    <div class="controls">
    <input type="password" class="input-xlarge" name="password" id="password" <?php echo $extrastring; ?> required value="<?php echo isset($password) ? $password : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="inputPassword">User Role:<font color="#FF0000">*</font></label>
    <div class="controls">
	<?php if(strtoupper($username) != "ADMIN")
													{
													?>
													
													<select required  name="role_id" >
															<?php
															foreach ($all_user_type as $index => $value) {
																$extra = '';
																if (isset($role_id)) {
																	if ($role_id == $index)
																		$extra = 'selected = "selected"';
																}
																?>
																<option value="<?php echo $index; ?>" <?php echo $extra; ?> ><?php echo $value; ?></option>
																<?php
															}
															?>
														</select>

														<?php
													}
														else
													{
														?>
													<input type="text" <?php echo $extrastring; ?> name="role_id" id="role_id" value="<?php echo isset($user_type) ? $user_type : ''; ?>" />
														<input type="hidden" <?php echo $extrastring; ?> name="role_id" id="role_id" value="<?php echo isset($role_id) ? $role_id : ''; ?>" />&nbsp;&nbsp;<div class="help-block inline"></div>
														<?php
													}
														?>

    </div>
    </div>
	
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


	<?php if(isset($photo) && $photo != '')
	{
	?>
	<div class="control-group">
    <label class="control-label" for="inputEmail">Photo:</label>
    <div class="controls">
    <img src="<?php echo $photo; ?>" width="200px" style="width:200px"></img>
    </div>
    </div>
	<?php
	}
	?>

	<div class="control-group">
	 <label class="control-label" for="inputEmail">Photo:</label>
    <div class="controls">
    <input class="inp" type="file" name="image"/>&nbsp;&nbsp;<div class="help-block inline"></div>
    </div>
    </div>

    <div class="control-group">
   <div class="form-actions">
	 <button class="btn btn-primary btn-sm" type="submit" name="Submit" value="Submit"/><i class="icon-save"></i> Save</button>
	 <a href="user.php?company_id=<?php echo $_REQUEST[company_id]; ?>" class="btn btn-sm"><i class="icon-remove"></i> Cancel</a>
     <input type="hidden" name="id" value="<?php echo isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : ''; ?>"/>
	 <input type="hidden" name="company_id" value="<?php echo isset($_REQUEST['company_id']) ? (int) $_REQUEST['company_id'] : ''; ?>"/>
	 <br/><br/><a href="user.php??company_id=<?php echo $_REQUEST[company_id]; ?>"><i class="icon-reply"></i> Back to Manage Users</a>
   </div>
   </div>

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>


<?php include("footer.php"); ?>