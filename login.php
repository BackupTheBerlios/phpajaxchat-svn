<?php
require_once('loggedin.php');
include('head.php');
if(isset($_POST['login'])) {
   $error = '';
   $username = $_POST['username'];
   $password = $_POST['password'];
   $today=date("Ymdhis");
   if(!isset($username) || !isset($password)) {
      $error .= 'A required field was left blank.<br />';
   }
   $password = md5($password);
   if(get_magic_quotes_gpc()) {
      $username = $username;
   }else{
      $username = addslashes($username);
   }
   $result = mysql_query('SELECT * FROM `chat_users` WHERE `username`="'.$username.'" AND `password`="'.$password.'"');
   $valid_login = mysql_num_rows($result);
   if($valid_login == 0) {
      $error .= 'The supplied username and/or password was incorrect.<br />';
   }
   if($error == '') {
      $data = mysql_fetch_array($result);
      $userid=$data['id'];
      $_SESSION[$chatname.'_username'] = $data['username'];
      $loginsql = 'UPDATE `chat_users` SET `date_last_visited` = \''.$today.'\', `loggedin` = \'1\' WHERE `id` ='.$data['id'].' LIMIT 1;';
      $update=mysql_query($loginsql);
      $loginfo="INSERT INTO `chat_log` VALUES('','$loginsql');";
      $logquery=mysql_query($loginfo);
      echo '<meta http-equiv="Refresh" Content="2; URL=index.php">';
   }else{
      echo 'The following errors were returned:<br />'.$error.'<br />';
      include('loginform.php');
   }
}else{
	include('loginform.php');
}
include('foot.php');
?>
