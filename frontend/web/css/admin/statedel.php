<?php
if(!defined('__CONFIG'))
{
	require_once ('config.php');
}

if(!checkUserLoggedIn())
{
	session_unset();
	header('Location: login.php');
	exit();
}

$showForm = true;
$page_name = "State";
$page_title_bar = "State";
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
	$sql = "DELETE FROM lot_state WHERE id = ".$_POST['id'];	
	$result = $db->exec($sql);
           if($result)
	{
		header('location: index.php?r=setting/state');
		exit();
	}
}
else if (isset($_POST['no']) && $_POST['no'] == 'No')
{
	header('location: index.php?r=setting/state');
	exit();
}
if (isset($_GET['id']))
{
	$id = (int)$_GET['id'];
	$sql = "SELECT * FROM lot_state WHERE id = ".$id;
	$stmt = $db->query($sql);
          $row = $stmt->fetch();
	$title = $row['state'];
	$id = $row['id'];
}
?>




 <?php
            if ($showForm == true) {
                ?>	

	<form class="form-horizontal" name="form1" id="form1" action="<?php echo get_current_page_uri(); ?>" method="post" onsubmit="javascript:return validate();">
	<fieldset>
		<legend>
		Delete State
		
		</legend>
		<label>Confirm Delete State <strong><?php echo isset($title) ? $title : ''; ?> </strong></label>

		 <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">				
         <input class="btn btn-danger" type="submit" name="yes" value="Yes">
         <input class="btn btn-default" type="submit" name="no" value="No">

    </form>
                <?php
            } else {
                echo '<br><br><h3>You do not have required permissions to edit this page.</h3>';
            }
            ?>



