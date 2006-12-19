function scrollDown(){
	var objDiv2 = document.getElementById("chatlist");
	objDiv2.scrollTop=objDiv2.scrollHeight;
	}

function refresh(){
	alert('refresh');
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

//This next function show the new events box
function showNewEventBox(whichLayer){
	
	if (document.getElementById){
		// this is the way the standards work
		var style2 = document.getElementById(whichLayer).style;
		style2.display = style2.display? "":"block";
		style2.visibility= style2.visibility?"":"visible";
	}
	else if (document.all){
		// this is the way old msie versions work
		var style2 = document.all[whichLayer].style;
		style2.display = style2.display? "":"block";
		style2.visibility= style2.visibility?"":"visible";
	}
	else if (document.layers){
		// this is the way nn4 works
		var style2 = document.layers[whichLayer].style;
		style2.display = style2.display? "":"block";
		style2.visibility= style2.visibility?"":"visible";
	}
}	
var streamer=new PeriodicalExecuter(listposts,3);

