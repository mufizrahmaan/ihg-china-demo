<?php
session_start();
if(isset($_SESSION['key'])){
	$key = $_SESSION['key'];
}
session_destroy();
if(!empty($key)){
header("Location:index.php?key=".$key);
}
else{
header("Location:index.php");
}
?>