<?php
include('connect2.php');
require_once('loggedin.php'); 
$current_page="Chat";  
include('head.php'); 
if($status){
	// This is where you customize the index file for your chat.  Will, 
	// you had the "welcome to...." all way through "changelog info"  here
?>
	<div id="chatlist"><?php print chatlist();?></div>
	<div id="listofchatters"><?php print listofchatters();?></div>
<center> <div id="newpostbox"> <?php print newpostbox($userid);?></div>
	<div id="controlbox">
		<div id="functionsPanel">
	<a href="#" onclick="popWindow('config.php');" title="Configuration Panel">Configuration</a> | <a href="logout.php">Logout</a>
		</div>
		<div id="configurationPanel">
			<?php /*configform();*/ ?>
		</div>
	</div></center>
<?php
//Otherwise, we're not logged in.  Include the login
//page
}else{
	print "You are not logged in.";
	include('loginform.php');
}

include('foot.php');
?>    