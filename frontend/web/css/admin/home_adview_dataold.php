<?php
if (!defined('__CONFIG')) {
    include_once('../config.php');
}

$show = $_REQUEST['show'];

if($show == 'last30days')
{
$start = new DateTime( "30 days ago", new DateTimeZone('UTC'));
$interval = new DateInterval( 'P1D'); 
$period = new DatePeriod( $start, $interval, 30); 
}
else if($show == 'last7days')
{
$start = new DateTime( "7 days ago", new DateTimeZone('UTC'));
$interval = new DateInterval( 'P1D'); 
$period = new DatePeriod( $start, $interval, 7); 
}
else if($show == 'lastmonth')
{
	$start = new DateTime( "first day of last month", new DateTimeZone('UTC'));
	$end = new DateTime( "first day of this month", new DateTimeZone('UTC'));
	$interval = new DateInterval( 'P1D'); 
	$period = new DatePeriod( $start, $interval, $end); 
}
else if($show == 'lastmonth')
{
	$start = new DateTime( "first day of last month", new DateTimeZone('UTC'));
	$end = new DateTime( "first day of this month", new DateTimeZone('UTC'));
	$interval = new DateInterval( 'P1D'); 
	$period = new DatePeriod( $start, $interval, $end); 
}
else if($show == 'lastweek')
{
	$start = new DateTime( "last week monday", new DateTimeZone('UTC'));
	$interval = new DateInterval( 'P1D'); 
	$period = new DatePeriod( $start, $interval, 6); 
}
else if($show == 'thismonth')
{
	$start = new DateTime( "first day of this month", new DateTimeZone('UTC'));
	$end = new DateTime( "tomorrow", new DateTimeZone('UTC'));
	$interval = new DateInterval( 'P1D'); 
	$period = new DatePeriod( $start, $interval, $end); 
}

else if($show == 'thisweek')
{
	$start = new DateTime( "monday this week", new DateTimeZone('UTC'));
	$end = new DateTime( "today", new DateTimeZone('UTC'));
	$interval = new DateInterval( 'P1D'); 
	$period = new DatePeriod( $start, $interval, 6); 
}
else if($show == 'today')
{
	$start = new DateTime( "today", new DateTimeZone('UTC'));
	$interval = new DateInterval( 'PT3600S'); 
	$period = new DatePeriod( $start, $interval, 24); 
}
else if($show == 'monthly')
{
$start = new DateTime( "365 days ago", new DateTimeZone('UTC'));
$end = new DateTime( "this month", new DateTimeZone('UTC'));
$interval = new DateInterval( 'P1M'); 
$period = new DatePeriod( $start, $interval, $end); 
}
else if($show == 'last3months')
{
$start = new DateTime( "first day of 3 month ago", new DateTimeZone('UTC'));
$end = new DateTime( "first day of this month", new DateTimeZone('UTC'));
$interval = new DateInterval( 'P1M'); 
$period = new DatePeriod( $start, $interval, $end); 
}
else
{
$start = new DateTime( "30 days ago", new DateTimeZone('UTC'));
$interval = new DateInterval( 'P1D'); 
$period = new DatePeriod( $start, $interval, 30); 
}

if($show == 'today')
{
	$todaytime = strtotime("today") * 1000;

	$sql = "select * from ad_view where collected_time > $todaytime and collected_time is not null order by collected_time";
	$stmt = $db->query($sql);
	$count = $stmt->rowCount(); 
$view_data[0] = array('Time','Male','Female','Total');
	$i = 1;

	foreach( $period as $hour) {
		$key = $hour->format( 'H');
		$view_data[$i] = array($key,(int)0,(int)0,(int)0);
		$i++;
	}

	$num = sizeof($view_data);
	while($row = $stmt->fetch())
	{
		$collected_time_milliseconds = $row[collected_time];
		$collected_time_seconds = $collected_time_milliseconds / 1000;
		if($collected_time_seconds)
		{
			$display_date = date('H', $collected_time_seconds);
			
			for ($i=1; $i < $num+1; $i++)
			{
				if($view_data[$i][0] == $display_date)
				{
					if( $row['gender'] == '1' || $row['gender'] == 1)
					$view_data[$i][1] += 1;
					else
					$view_data[$i][2] += 1;

					$view_data[$i][3] += 1;
				}
			}
		}
	}

}
else if(($show == 'monthly') || ($show == 'last3months'))
{
	$sql = "select * from ad_view where collected_time is not null order by collected_time";
	$stmt = $db->query($sql);
	$count = $stmt->rowCount(); 
	$view_data[0] = array('Month','Male','Female','Total');
	$i = 1;

foreach( $period as $month) {
    $key = $month->format( 'M');
	$view_data[$i] = array($key,(int)0,(int)0,(int)0);
	$i++;
}

	$num = sizeof($view_data);
	while($row = $stmt->fetch())
	{
		$collected_time_milliseconds = $row[collected_time];
		$collected_time_seconds = $collected_time_milliseconds / 1000;
		if($collected_time_seconds)
		{
			$display_month = date('M', $collected_time_seconds);
			
			for ($i=1; $i < $num+1; $i++)
			{
				if($view_data[$i][0] == $display_month)
				{
					if( $row['gender'] == '1' || $row['gender'] == 1)
					$view_data[$i][1] += 1;
					else
					$view_data[$i][2] += 1;

					$view_data[$i][3] += 1;
				}
			}
		}
	}

} else {
	$sql = "select * from ad_view where collected_time is not null order by collected_time";
	$stmt = $db->query($sql);
	$count = $stmt->rowCount(); 
	$view_data[0] = array('Date','Male','Female','Total');
	$i = 1;

foreach( $period as $day) {
    $key = $day->format( 'M d');
	$view_data[$i] = array($key,(int)0,(int)0,(int)0);
	$i++;
}

	$num = sizeof($view_data);
	while($row = $stmt->fetch())
	{
		$collected_time_milliseconds = $row[collected_time];
		$collected_time_seconds = $collected_time_milliseconds / 1000;
		if($collected_time_seconds)
		{
			$display_date = date('M d', $collected_time_seconds);
			
			for ($i=1; $i < $num+1; $i++)
			{
				if($view_data[$i][0] == $display_date)
				{
					if( $row['gender'] == '1' || $row['gender'] == 1)
					$view_data[$i][1] += 1;
					else
					$view_data[$i][2] += 1;

					$view_data[$i][3] += 1;
				}
			}
		}
	}

}

$jqgrid_data[0] = array();
$male = 0;
$female = 0;
$total = 0;
foreach($view_data as $key => $view_data_row) {
        $jqgrid_data[$key]['When'] =  $view_data_row[0];
		$jqgrid_data[$key]['Male'] =  $view_data_row[1];
		$jqgrid_data[$key]['Female'] =  $view_data_row[2];
		$jqgrid_data[$key]['Total'] =  $view_data_row[1] + $view_data_row[2];
		$male += $jqgrid_data[$key]['Male'];
		$female += $jqgrid_data[$key]['Female'];
		$total += $jqgrid_data[$key]['Total'];
   }
array_splice($jqgrid_data, 0, 1);

ob_clean();
ob_start();
$data = array();

$data['jqgrid_data'] = $jqgrid_data;
$data['view_data'] = $view_data;
$data['male'] = $male;
$data['female'] = $female;
$data['total'] = $total;

echo json_encode($data);
?>