<?php

//The following line calls the script loggedin.php
//which checks to see whether or not we are logged 
//in.  If we are, several variables will be defined.
//$username
//$first_name
//$last_name
//$email_address
//$icon -- the url to the user's icon graphic
//$last_login
//$date_registered
//$status -- true if we're logged in, false in not
//
require_once('loggedin.php');
//This line sets the title of this page.
$current_page="Chat";
//This is the file containing all the header information.
//It uses the variable $current_page as the title of 
//the page.  If $current_page is not defined, it will
//set the title to the name of the current file.
include('head.php');
//If we're logged in, load additional functions and
//continue setting up the page.
if($status){

if(isset($_POST['config'])) {
$iconpath=$_POST['iconpath'];
      mysql_query("UPDATE `chat_users` SET `icon` = '$iconpath' WHERE `username` = '$username'");
      echo "Debug mode: $iconpath , $username <br>";
      echo "Change made. Return to <a href=index.php>index</a>";

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

