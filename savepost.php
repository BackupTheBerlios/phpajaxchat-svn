<?php
include('loggedin.php');
if($status){
	savepost($_GET['user'],$_GET['message']);
	print chatlist();
}else{
	print "Not logged in";
}
