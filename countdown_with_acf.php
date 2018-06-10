<?php
	$event = get_field('countdown');
	$date = strtotime($event);
	//$date = strtotime("August 25, 2016 10:00 AM");
	$remaining = $date - time();
	$days_remaining = floor($remaining / 86400);
	$hours_remaining = floor(($remaining % 86400) / 3600);
?>
<h3><span>Days 'til Event</span> <br /><?php echo $days_remaining; ?></h3>