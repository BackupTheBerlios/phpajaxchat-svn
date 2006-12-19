<?php
session_start();
include('functions.php');
require_once('connect2.php');
if($_SESSION[$chatname.'_username']) {
	$data = mysql_fetch_array(mysql_query('SELECT * FROM `chat_users` WHERE `username`="'.$_SESSION[$chatname.'_username'].'"'));
	$status=true;
	$username=$_SESSION[$chatname.'_username'];
	$userid=$data['id'];
	$first_name=$data['first_name'];
	$last_name=$data['last_name'];
	$email=$data['email'];
	$icon=$data['icon'];
	$last_login=$data['date_last_visited'];
	$date_registered=$data['date_registered'];
	$today=date("Ymdhis");
}else{
	$status=false;
}
?>
