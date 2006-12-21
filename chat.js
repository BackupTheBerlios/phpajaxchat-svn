function scrollDown(){
	var objDiv2 = document.getElementById("chatlist");
	objDiv2.scrollTop=objDiv2.scrollHeight;
	}

function refresh(){
	var url='newpostform.php';
	var pars='';
	var target='newpostbox';
	var myAjax = new Ajax.Updater(target,url,{method:'get',parameters:pars});
	setTimeout("scrollDown();",1000);
}
function listposts(){
	var url = 'listposts.php';
	var pars='';
	var target = 'chatlist';
	var myAjax = new Ajax.Updater(target, url, {method: 'get', parameters: pars});
	listusers();
}
function savepost(user,post){
	var url = 'savepost.php';
	var pars = 'user='+escape(user)+'&message='+escape(post);
	var target = 'chatlist';
	var myAjax = new Ajax.Updater(target, url, {method: 'get', parameters: pars});
	refresh();
	stopper();
	}

// A timeout function.  If the user is idle for 10 minutes, they will be asked if they
// want to remain logged in.

var timer; 
function idletimer(){
	timer = setTimeout("asktologout()",5000);
}

function stopper(){
	clearTimeout(time);
}

function asktologout() {
	var logoutWin=window.open('prompt.php','Logout?','height=200,width=400');
	if (window.focus) {logoutWin.focus();}
}
idletimer();
// End of timeout functions
function listusers(){
	var url='listusers.php';
	var pars='';
	var target='listchatters';
	var updateUsers=new Ajax.Updater(target,url,{method:'get',paramaters:pars});
}

function saveconfig(iconpath){
	var url='config.php';
	var pars='config=1&iconpath='+escape(iconpath);
	alert(pars);
	var target='configurationPanel';
	var updateConfig=new Ajax.Updater(target,url,{method:'get', parameters:pars});
	stopper();
}

var streamer=new PeriodicalExecuter(listposts,3);
var newwindow;
function popWindow(url){
	newwindow=window.open(url,'name','height=400,width=400');
	if (window.focus) {newwindow.focus();}
}

