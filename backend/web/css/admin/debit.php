<?php
if (! defined ( '__CONFIG' )) {
	include_once ('../config.php');
}
if (! checkUserLoggedIn ()) {
	header ( 'Location: login.php' );
	exit ();
}

if (getLoggedInUserId () != '') {
	$user_id = ( int ) getLoggedInUserId ();
} else {
	header ( 'location: login.php' );
	exit ();
}
function big_rand($len = 9) {
	$rand = '';
	while ( ! (isset ( $rand [$len - 1] )) ) {
		$rand .= mt_rand ();
	}
	return substr ( $rand, 0, $len );
}
function clean($string) {
	$string = str_replace ( ' ', '', $string ); // Replaces all spaces with hyphens.
	return preg_replace ( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.
}
function randomNumber($length) {
	$min = str_repeat ( 0, $length - 1 ) . 1;
	$max = str_repeat ( 9, $length );
	return mt_rand ( $min, $max );
}

$action = '';
$showForm = true;
$error = '';
$success = '';

$user_privileges = checkUserAccess ( "setting_access" );

if ($showForm == true) {
	if (isset ( $_POST ['Submit'] ) && $_POST ['Submit'] == 'Submit') {

		$id = $_POST ['id'];

		if (trim ( $_POST ['debit_amount'] ) != '')
			$debit_amount = trim ( abs($_POST ['debit_amount']) );
		else
			$error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Amount is a required field.<br/>';

	if (trim ( $_POST ['notes'] ) != '')
			$notes = trim ( $_POST ['notes'] );
		else
			$error .= '<strong><i class="icon-remove"></i></strong>&nbsp;Notes is a required field.<br/>';
		
		$created_date = get_datetime_now ();
		$updated_date = get_datetime_now ();
		
		$debit_amount = number_format($debit_amount, 2, '.', '');

		if (isset ( $_POST ['id'] ) && ! empty ( $_POST ['id'] ) && $error == '') {
			$id = $_POST ['id'];
			
			// find the account balance of the company
			$sql = "select * from company_registration WHERE  id = '" . $_POST ['id'] . "'";
			$stmt = $db->query($sql);
			$row = $stmt->fetch();
			$pre_account_balance = $row['account_balance'];
			$post_account_balance = $pre_account_balance - $debit_amount;
			$logged_in_admin_id = $_SESSION['user_id'];


			$sql = "INSERT INTO transaction_history ( amount, type, company_id, date, user_id ,pre_account_balance,post_account_balance,notes) VALUES ('$debit_amount', 'DEBIT', '$id', '$created_date','$logged_in_admin_id','$pre_account_balance','$post_account_balance','$notes')"; 
			$result = $db->exec ( $sql );
			$transaction_history_id = $db->lastInsertId();

			$sql = "UPDATE company_registration SET 
					account_balance = account_balance - " . $debit_amount . "
					WHERE  id = '" . $_POST ['id'] . "'";
			$result = $db->exec ( $sql );
			
			if(($result == 1) && ($transaction_history_id != ''))
			{
				// transaction was successful - update status
				$sql = "UPDATE transaction_history SET status = 'COMPLETED' WHERE  id = '" . $transaction_history_id . "'";
				$result = $db->exec ( $sql );

			}

			header ( 'Location: advertiser.php' );
			exit ();

		}
	}
}

if (strtoupper ( $username ) == "ADMIN") {
	$extrastring = 'readonly="readonly"';
} else {
	$extrastring = "";
}

?>
<?php  include('header.php') ;?>

<script>
$(document).ready(function() {

	jQuery.validator.addMethod("dollarsscents", function(value, element) {
    return this.optional(element) || /^\d{0,10}(\.\d{0,2})?$/i.test(value);
}, "You must include two decimal places and amount cant be more than 9999999999.99");

$('#form1').validate({
    rules: {
        debit_amount: {
            required: true,
				number: true,
				dollarsscents: true
        },
			 notes: {
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
			<li><i class="icon-home home-icon"></i> <a href="#">Home</a></li>

			<li><a href="#">Admin</a></li>
			<li class="active">Debit Note</li>
		</ul>
		<!-- .breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon"> <input type="text"
					placeholder="Search ..." class="nav-search-input"
					id="nav-search-input" autocomplete="off" /> <i
					class="icon-search nav-search-icon"></i>
				</span>
			</form>
		</div>
		<!-- #nav-search -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>
				Debit Note <small> <i class="icon-double-angle-right"></i>
									 <?php
										if (isset ( $row ['id'] )) {
											echo "Id: " . $row ['id'] . " email_id: " . $row ['email_id'];
										}
										?>
								</small>
			</h1>
		</div>
		<!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

 <?php
	if ($showForm == true) {
		?>	

	<form class="form-horizontal" name="form1" id="form1"
					action="<?php echo $_SERVER['PHP_SELF']; ?>"
					enctype="multipart/form-data" method="post">
					<fieldset>


   

	<?php if ($error != '') { ?>
			<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>
				<?php echo $error; ?>
            </div>
    <?php } ?>

	<?php if ($success != '') { ?>
			<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>
				<?php echo $success; ?>
            </div>
    <?php } ?>

	<div class="control-group">
							<label class="control-label" for="inputemail_id">Debit Amount:<font
								color="#FF0000">*</font></label>
							<div class="controls">
								<input type="text" name="debit_amount" id="debit_amount"
									required class="input-sm" value="" />&nbsp;&nbsp;
								<div class="help-block inline"></div>
							</div>
						</div>


	<div class="control-group">
							<label class="control-label" for="inputemail_id">Notes:<font
								color="#FF0000">*</font></label>
							<div class="controls">
								<textarea type="text" name="notes" id="notes"
									required class="input-sm" value="" /></textarea>
								<div class="help-block inline"></div>
							</div>
						</div>



						<div class="control-group">
							<div class="form-actions">
								<button class="btn btn-primary btn-sm" type="submit"
									name="Submit" value="Submit" />
								<i class="icon-save"></i> Apply Debit
								</button>
								<a href="advertiser.php" class="btn btn-sm"><i
									class="icon-remove"></i> Cancel</a> <input type="hidden"
									name="id"
									value="<?php echo isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : ''; ?>" />
								<br /> <br /> <a href="advertiser.php"><i class="icon-reply"></i>
									Back to Advertisers</a>
							</div>
						</div>
				
				</form>
                <?php
	} else {
		echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
	}
	?>


<?php include("footer.php"); ?>