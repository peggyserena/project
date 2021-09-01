<?php
// https://crontab.guru
// https://github.com/mtdowling/cron-expression

require_once './vendor/autoload.php';
require_once __DIR__ . './parts/config.php';

// Ignore user aborts and allow the script
// to run forever
ignore_user_abort(true);
set_time_limit(0);

while(true)
{
	$loop_time = 24*60*60; // time to execute a loop
	$sql = "SELECT * FROM `crontab`";
	$crontab_list = $pdo->query($sql)->fetchAll();
	$date_format = "Y-m-d";
	$current_date = date($date_format);

	foreach($crontab_list as $crontab){
		$id = $crontab['id'];
		$next_run_date = $crontab['nextRunDate'];
		$execute_path = $crontab['path'];
		$rule = $crontab['rule']; 
		
		// get new  next_run_date
		$cron = Cron\CronExpression::factory($rule);
		$next_run_date_new = $cron->getNextRunDate()->format($date_format);
		// check if update
		if ($next_run_date <= $current_date){
			// update $next_run_date
			$sql = "UPDATE `crontab` SET `nextRunDate` = '$next_run_date_new' WHERE `id` = $id";
			$pdo->query($sql);
		}
		// check if execute
		if ($next_run_date === $current_date){
			// execute and avoid conflict
			exec_path($execute_path);
		}
	}
	
	break;
	// Sleep for 1 day
    sleep($loop_time);
}

function exec_path($execute_path){
	include $execute_path;
}