<?php
include('loggedin.php');
$currentpage="Stay logged in?";
include('head.php');
if($status){
?>
<h1>Do you want to stay logged in?</h1>
<a href="" onclick="logoutUser();" title="Logout">No</a>
<br>
<a href="" onclick="logoutUser();" title="Logout">No</a>
<?php
}else{
	print "You're not even logged in...";
	echo '<meta http-equiv="Refresh" Content="2; URL=index.php">';
	print "<script language='javascript'>window.close();</script>";
}
