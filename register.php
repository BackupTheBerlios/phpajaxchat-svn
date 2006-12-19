<?php
include('functions.php');
include('head.php');
if(isset($_POST['register'])) {
   $error = '';
   $username = $_POST['username'];
   $password = $_POST['password1'];
   $iconpath=$_POST['iconpath'];
   $today=date("Ymdhis");
   $signature=$_POST['signature'];
   //Debug
   /*
   print "Username: $username<br/>";
   print "Password: $password<br/>";
   print "Date: $today<br/>";
    */
   $confirm_password = $_POST['password2'];
   if(!isset($username) || !isset($password) || !isset($confirm_password)) {
      $error .= 'A required field was left blank.<br />';
   }
   if(!$password == $confirm_password) {
      $error .= 'The passwords did not match.<br />';
   }
   if(!preg_match('/[a-zA-Z_0-9{1, 20}]/', $username)) {
      $error .= 'The username can only contain letters, numbers and underscores.<br />';
   }
   if($error == '') {
      $password = md5($password);
      mysql_query('INSERT INTO `chat_users`(`username`, `password`, `date_registered`, `date_last_visited`,`icon`,`signature`) VALUES("'.$username.'", "'.$password.'", "'.$today.'", "'.$today.'", "'.$iconpath.'", "'.$signature.'")');
      echo 'Thank you for taking the time to register, <strong>'.$username.'</strong>. You can now <a href="login.php">log in.</a>';
   }else{
      echo 'The following errors were returned:<br />'.$error.'<br />';
	registerForm();
   }
}else{
	registerForm();
}
include('foot.php');
?>
