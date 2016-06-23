<?php
	error_reporting(0);
   // $host = '127.0.0.1:8082';
   //   $host = '182.50.129.125';

   /*
    $host = 'localhost';
    $db_user = 'root';
	$db_password ='';
    $db_name = 'pulse_app';
	*/

	/*
	$host = 'localhost';
    $db_user = 'root';
	$db_password ='';
    $db_name = 'mintm_restaurant';
*/
    $host = 'localhost';
    $db_user = 'MintShelf_live';
	$db_password ='MinTmsh3lfL!v3';
    $db_name = 'shelf_live';

    $link = mysql_connect($host,$db_user,$db_password);
    if (!$link) {
    die('Could not connect: ' . mysql_error());
    }
    else{
       $db = mysql_select_db($db_name);
        if(!$db){
            echo 'database not found';
            exit();
        }
    }
?>
