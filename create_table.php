<?
require_once('connect2.php');
mysql_query('CREATE TABLE `users` (
	`id` int NOT NULL auto_increment,
	`username` varchar(20) NOT NULL default "",
	`password` varchar(32) NOT NULL default "",
	`date_registered` int(10) NOT NULL default "0",
	`last_seen` int(10) NOT NULL default "0",
	PRIMARY KEY (`id`)
)');
echo 'Table created';
?>
