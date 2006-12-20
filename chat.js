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
	}
function listusers(){
	var url='listusers.php';
	var pars='';
	var target='listchatters';
	var updateUsers=new Ajax.Updater(target,url,{method:'get',paramaters:pars});
}

var streamer=new PeriodicalExecuter(listposts,3);
new Rico.Accordion( $('controlbox'), {panelHeight:300} );

