<?php
require_once('loggedin.php');
//continue setting up the page.
include('head.php');
if($status){

	if(isset($_GET['config'])) {
	$iconpath=$_GET['iconpath'];
	      mysql_query("UPDATE `chat_users` SET `icon` = '$iconpath' WHERE `username` = '$username'");
	      echo "Debug mode: $iconpath , $username <br>";
	      //echo "Change made. Return to <a href=index.php>index</a>";
	      echo "Change made.";
		configform();
	}else{
		configForm();
	}

//Otherwise, we're not logged in.  Include the login
//page
}else{
	print "You are not logged in.";
	include('loginform.php');
}
include('foot.php');
?>

