<?php
include('loggedin.php');
$logoutsql="UPDATE `chat_users` SET `date_last_visited`='$today',`loggedin`='0' WHERE `id`='$userid'";
$update=mysql_query($logoutsql);
$_SESSION = array();
print 'You have been logged out, you are being redirected...';
echo '<meta http-equiv="Refresh" Content="2; URL=index.php">';
die();
?>
