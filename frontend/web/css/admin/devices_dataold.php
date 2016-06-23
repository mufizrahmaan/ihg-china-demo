<?php
if (!defined('__CONFIG')) {
    include_once('../config.php');
}

date_default_timezone_set('UTC');
$last24h_date = date('Y-m-d H:i:s', strtotime("24 hours ago"));

$qry = "SELECT count(distinct device_id) as count FROM view_data_filtered WHERE created_date > '".$last24h_date."' ";
$res = $db->query($qry);
$active_device = $res->fetch();

$qry1 = " select count(*) as count from company_registration_device as crd join
 ( select max(created_date) as updated_date, device_id, batteryState from view_data_filtered group by device_id ) as vdf 
 on crd.id = vdf.device_id WHERE crd.active = 1 AND vdf.updated_date < '".$last24h_date."' AND vdf.batteryState = '1.0' ";
$res1 = $db->query($qry1);
$no_connection_device = $res1->fetch();


$qry2 = "select count(*) as count from company_registration_device as crd join
 ( select max(created_date) as updated_date, device_id, batteryState from view_data_filtered group by device_id ) as vdf 
 on crd.id = vdf.device_id WHERE crd.active = 1 AND vdf.batteryState = '0.0' ";
$res2 = $db->query($qry2);
$not_charging_device = $res2->fetch();

/*
$qry3 = "select count(*) as count from company_registration_device as crd join
 ( select max(created_date) as updated_date, device_id, batteryState from view_data_filtered group by device_id ) as vdf 
 on crd.id = vdf.device_id WHERE crd.active = 1 AND vdf.updated_date = '' ";
*/
$qry3 = "SELECT count(*) as count FROM company_registration_device WHERE id not in(SELECT distinct device_id FROM view_data_filtered) and active = 1";
$res3 = $db->query($qry3);
$not_initiated_device = $res3->fetch();

$view_data[0] = array('Device Status', 'Count');
$view_data[] = array('Active', $active_device['count']);
$view_data[] = array('No Connection', $no_connection_device['count']);
$view_data[] = array('No Charging', $not_charging_device['count']);
$view_data[] = array('Not initiated', $not_initiated_device['count']);

//print_r($view_data); exit;

ob_clean();
ob_start();
echo json_encode($view_data, JSON_NUMERIC_CHECK);
?>
