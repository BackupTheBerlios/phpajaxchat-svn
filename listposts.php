<?php
require_once('loggedin.php');
if($status){
	print chatlist();
}else{
	print "Not logged in";
}
