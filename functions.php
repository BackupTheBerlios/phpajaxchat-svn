<?php
include('connect2.php');
function userinfo($id){
	$finduser="SELECT * FROM chat_users WHERE id='".$id."' LIMIT 1;";
	$userresults=mysql_query($finduser);
	$user=mysql_fetch_array($userresults);
	return $user;
}

function chatlist(){
	//Set The number of posts you want to see here in the variable $viewableposts
	$viewableposts=5;
	$postsearch = 'SELECT * FROM `chat_list` ORDER BY id ASC';
	$postresults=mysql_query($postsearch);
	$numposts=mysql_num_rows($postresults);
	$startingpost=$numposts-$viewableposts;
	$x=0;
	while ($row=mysql_fetch_array($postresults)){
		if($startingpost>0 && $x<$startingpost){
		}else{
			$userinfo=userinfo($row['user_id']);
			$msg.="<div class='post'><table border=1 width=99%>\n";
			$msg.="<tr><td rowspan=2 width=450><div class='postusericon'><img src='".$userinfo['icon']."'></div></td>\n";
			$msg.="<td><div class='postuserinfo'>\n";
			$msg.="<div class='postuser'>".$userinfo['username']."</div></td>\n";
			$msg.="<td><div class='postdate'>".$row['date_posted']."</div></td></tr>\n";
			$msg.="<tr><td colspan=2><div class='postmessage'>".$row['message']."</div></td></tr>\n";
			$msg.="<tr><td><div class='postsignature'>".$userinfo['signature']."</div></tr></td>\n";
			$msg.="</div>\n</table></div><br>\n";
			$msg.=$message;
		}
		$x++;
	}
	$msg.="<p id='bottom'></p>";
	return $msg;
}
function listofchatters(){
	$usersearch="SELECT * FROM chat_users WHERE loggedin=1";
	$results=mysql_query($usersearch);
	$numposts=mysql_num_rows($results);
	while ($row=mysql_fetch_array($results)){
		$msg.="<div class='listicon'><img src='".$row['icon']."' height='40'></div>";
		$msg.="<div class='listname'>".$row['username']."</div>";
	}
	return $msg;
}
function newpostbox($un){
	$msg="";
	$msg.='<form action="" onsubmit="savepost(\''.$un.'\',this.message.value);return false;">';
	$msg.='<textarea name="message" cols="40" rows="4"></textarea>';
	$msg.='<input type="submit" value="newpost">';
	$msg.='</form>';
	return $msg;
}
function savepost($user,$post){
	$currdate=date("Ymdhis");
	$savequery="INSERT INTO chat_list VALUES('','$user','$post','$currdate')";
	$saveResult=mysql_query($savequery)or die("Couldn't save Post");
}
function registerForm(){
?>
<form action="register.php" method="post">
<table class="container" align="center" cellspacing="0" cellpadding="0">
   <tr>
      <td colspan="2" style="text-align:center;"><h1>Register</h1></td>
   </tr>
   <tr>
      <td>Username:</td>
      <td><input type="text" name="username" maxlength="20" /></td>
   </tr>
   <tr>
      <td>Icon File Path:</td>
      <td><input type="text" name="iconpath" /></td>
   </tr>

   <tr>
      <td>Password:</td>
      <td><input type="password" name="password1" /></td>
   </tr>
   <tr>
      <td>Confirm Password:</td>
      <td><input type="password" name="password2" /></td>
   </tr>
	<tr>
		<td colspan=2>Signature (254 characters max)</td>
	</tr>
	<tr >
		<td colspan=2><textarea name="signature" cols=35 rows=15></textarea></td>
	</tr>
   <tr>
      <td colspan="2" style="text-align:center;"><input name="register" type="submit" value="Register" /></td>
   </tr>
   <tr>
      <td colspan="2" style="text-align:center;"><a href="login.php">Log In</a> | <a href="index.php">Index</a></td>
   </tr>
</table>
</form>
<?
}
function configForm(){
?>
<form action="" onSubmit="saveconfig(this.iconpath.value); return false;" method="post">
<table class="characterconfig" align="center" cellspacing="0" cellpadding="0">
   <tr>
      <td colspan="2" style="text-align:center;"><h1>Character Configuration</h1></td>
   </tr>
   <tr>
      <td>Icon File Path:</td>
      <td><input type="text" name="iconpath" /></td>
   </tr>
<tr>
	<td>Click <a href="" title="filebrowser" onclick="popWindow('filebrowser.php');">here</a> to view files currently
	on the system.
	</td>
</tr>
   <tr>
      <td colspan="2" style="text-align:center;"><input name="config" type="submit" value="Submit" /></td>
   </tr>
</table>
</form>
<?
}
?>
