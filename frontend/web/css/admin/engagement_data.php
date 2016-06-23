<?php
date_default_timezone_set('UTC');
if (!defined('__CONFIG')) {
    include_once('../config.php');
}

$show = $_REQUEST['show'];
$company_id = $_REQUEST['id'];
//$store_id = $_REQUEST['store_id'];
//$device_id = $_REQUEST['device_id'];
//$ad_id = $_REQUEST['ad_id'];

if($show == 'last30days')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of 30 days ago"); 
	$end_date = 1000 * strtotime("yesterday");	
}
else if($show == 'today')
{
	$todaytime = strtotime("today") * 1000;
	//$start = new DateTime( "today", new DateTimeZone('UTC'));
	//$interval = new DateInterval( 'PT3600S'); 
	//$period = new DatePeriod( $start, $interval, 24); 
}
else if($show == 'last7days')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of 7 days ago"); 
	$end_date = 1000 * strtotime("yesterday");	
	
//$start = new DateTime( "7 days ago", new DateTimeZone('UTC'));
//$interval = new DateInterval( 'P1D'); 
//$period = new DatePeriod( $start, $interval, 7); 
}
else if($show == 'lastmonth')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of last month"); 
	$end_date = 1000 * strtotime("last day of this month");
	
	//$start = new DateTime( "first day of last month", new DateTimeZone('UTC'));
	//$end = new DateTime( "first day of this month", new DateTimeZone('UTC'));
	//$interval = new DateInterval( 'P1D'); 
	//$period = new DatePeriod( $start, $interval, $end); 
}
else if($show == 'lastweek')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of last week"); 
	$end_date = 1000 * strtotime("last day of this week");
	
	//$start = new DateTime( "last week monday", new DateTimeZone('UTC'));
	//$interval = new DateInterval( 'P1D'); 
	//$period = new DatePeriod( $start, $interval, 6); 
}
else if($show == 'thismonth')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of this month"); 
	$end_date = 1000 * strtotime("first day of this month");
	
	//$start = new DateTime( "first day of this month", new DateTimeZone('UTC'));
	//$end = new DateTime( "tomorrow", new DateTimeZone('UTC'));
	//$interval = new DateInterval( 'P1D'); 
	//$period = new DatePeriod( $start, $interval, $end); 
}

else if($show == 'thisweek')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of this week"); 
	$end_date = 1000 * strtotime("last day of this week");
	
	//$start = new DateTime( "monday this week", new DateTimeZone('UTC'));
	//$end = new DateTime( "today", new DateTimeZone('UTC'));
	//$interval = new DateInterval( 'P1D'); 
	//$period = new DatePeriod( $start, $interval, 6);
}
else if($show == 'last3months')
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of 3 month ago"); 
	$end_date = 1000 * strtotime("last day of last month");	
}
else
{
	//conversion of date to milliseconds
	$start_date = 1000 * strtotime("first day of 30 days ago"); 
	$end_date = 1000 * strtotime("yesterday");	
	
//$start = new DateTime( "30 days ago", new DateTimeZone('UTC'));
//$interval = new DateInterval( 'P1D'); 
//$period = new DatePeriod( $start, $interval, 30); 
}
/*
if(isset($store_id) && $store_id != '' && $store_id != 0)
{
	// find devices
	$sql = "SELECT * FROM company_registration_device WHERE company_id = ".$_SESSION['company_id']." and company_establishment_id = '".$store_id."'";
	$stmt = $db->query($sql);
	while ($row = $stmt->fetch()) {
		 $all_devices_in_store[$row['id']] = $row['id'];
	}
	$all_devices_in_atore_str = implode(",", $all_devices_in_store);
	$where .= " and device_id in (".$all_devices_in_atore_str.")";
}

if(isset($device_id) && $device_id != '' && $device_id != 0)
$where .= " and device_id = '".$device_id."'";

if(isset($ad_id) && $ad_id != '' && $ad_id != 0)
$where .= " and ad_id = '".$ad_id."'";
*/

$qry = "SELECT id, CONCAT_WS(', ', name, info) as storeName FROM company_establishment WHERE company_id = '".$company_id."' ORDER BY company_id DESC";
$result = $db->query($qry);

if($show == 'today')
{	
	$view_data[0] = array('Store','Devices','Views','Views/Device');
	$i = 1; 
	while($store = $result->fetch()){
	    $key = $store['storeName'];
		$view_data[$i] = array($key,(int)0, (int)0);
		
		$device_details_query = "SELECT id as deviceId FROM company_registration_device WHERE company_establishment_id = '".$store['id']."' AND active = 1 ORDER BY company_establishment_id ASC";
		$device_details_result = $db->query($device_details_query);
		$total_device_count = $device_details_result->rowCount();
		$view_data[$i][1] = $total_device_count;
		
		$total_device_views = array();
		while($device_details = $device_details_result->fetch()){
			$query = "SELECT count(*) as totalViews FROM view_data WHERE device_id = '".$device_details['deviceId']."' AND collected_time > $todaytime AND collected_time is not null order by collected_time";
			$res = $db->query($query);	
			$total_views = $res->fetch();
			$total_device_views[] = $total_views['totalViews'];
		}
		$view_data[$i][2] = array_sum($total_device_views);
		$view_data[$i][3] = $view_data[$i][2]/$view_data[$i][1];
        $i++;	
	}
	
}else if($show == 'overall'){

	$view_data[0] = array('Store','Devices','Views','Views/Device');
	$i = 1; 
	while($store = $result->fetch()){
	    $key = $store['storeName'];
		$view_data[$i] = array($key,(int)0, (int)0);
		
		$device_details_query = "SELECT id as deviceId FROM company_registration_device WHERE company_establishment_id = '".$store['id']."' AND active = 1 ORDER BY company_establishment_id ASC";
		$device_details_result = $db->query($device_details_query);
		$total_device_count = $device_details_result->rowCount();
		$view_data[$i][1] = $total_device_count;
		
		$total_device_views = array();
		while($device_details = $device_details_result->fetch()){
			$query = "SELECT count(*) as totalViews FROM ad_view WHERE device_id = '".$device_details['deviceId']."' and collected_time is not null";
			$res = $db->query($query);	
			$total_views = $res->fetch();
			$total_device_views[] = $total_views['totalViews'];
		}
		$view_data[$i][2] = array_sum($total_device_views);
		$view_data[$i][3] = $view_data[$i][2]/$view_data[$i][1];
        $i++;	
	}

}
else if($show == 'last3months')
{
   
	$k=1;
	$view_data[0] = array('Store','Devices','Views', 'Views/Device');
	while($store = $result->fetch())
	{
	    $key = $store['storeName'];   
		$view_data[$k] = array($key,(int)0,(int)0);
		
		$device_details_query = "SELECT id as deviceId FROM company_registration_device WHERE company_establishment_id = '".$store['id']."' AND active = 1 ORDER BY company_establishment_id ASC";
		$device_details_result = $db->query($device_details_query);
		$total_device_count = $device_details_result->rowCount();
		$view_data[$k][1] = $total_device_count;
		
		$total_device_views = array();
		while($device_details = $device_details_result->fetch()){				
			echo $query = "SELECT count(*) as totalViews FROM ad_view WHERE device_id = '".$device_details['deviceId']."' AND collected_time BETWEEN '".$start_date."' AND '".$end_date."' AND collected_time is not null";      
			$res = $db->query($query);	
			$total_views = $res->fetch();
			$total_device_views[] = $total_views['totalViews'];				
		}		
		$view_data[$k][2] = array_sum($total_device_views);
		$view_data[$k][3] = $view_data[$k][2]/$view_data[$k][1];
		$k++;
	}

} else{

	$k=1;
	$view_data[0] = array('Store','Devices','Views','Views/Device');
	while($store = $result->fetch())
	{
	    $key = $store['storeName'];   
		$view_data[$k] = array($key,(int)0,(int)0);
		
		$device_details_query = "SELECT id as deviceId FROM company_registration_device WHERE company_establishment_id = '".$store['id']."' AND active = 1 ORDER BY company_establishment_id ASC";
		$device_details_result = $db->query($device_details_query);
		$total_device_count = $device_details_result->rowCount();
		$view_data[$k][1] = $total_device_count;
		
		$total_device_views = array();
		while($device_details = $device_details_result->fetch()){				
			echo $query = "SELECT count(*) as totalViews FROM ad_view WHERE device_id = '".$device_details['deviceId']."' AND collected_time BETWEEN '".$start_date."' AND '".$end_date."' AND collected_time is not null";      
			$res = $db->query($query);	
			$total_views = $res->fetch();
			$total_device_views[] = $total_views['totalViews'];				
		}		
		$view_data[$k][2] = array_sum($total_device_views);
		$view_data[$k][3] = $view_data[$k][2]/$view_data[$k][1];
		$k++;
	}

}

$total_devices = 0;
$total_views = 0;

//echo '<pre>'; print_r($view_data); exit;

foreach($view_data as $details){
$total_devices += $details[1];
$total_views += $details[2];
}

ob_clean();
ob_start();
$data = array();
$data['view_data'] = $view_data;
$data['total_devices'] = $total_devices;
$data['total_views'] = $total_views;

echo json_encode($data);
?>