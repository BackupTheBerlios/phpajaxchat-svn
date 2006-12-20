<?php
include_once('loggedin.php');
$current_page="File Browser";
include('head.php');
if(!$status){
	print "Please Login";
	print login_form();
}else{
   function file_type($file){
	$path_chunks = explode("/", $file);
	$thefile = $path_chunks[count($path_chunks) - 1];
	$dotpos = strrpos($thefile, ".");
	return strtolower(substr($thefile, $dotpos + 1));
	}
   // Start list_files function
   function list_files(){
	$path = "images/";
	$file_types = array('jpeg', 'jpg', 'ico', 'png', 'gif', 'bmp');
	$p = opendir($path);
	while (false !== ($filename = readdir($p))) {
		$files[] = $filename;
	}
	sort($files);
	foreach ($files as $file) {
		$extension = file_type($file);
		if($file != '.' && $file != '..' && array_search($extension, $file_types)){
			$file_count++;
			echo '<a href="'.$path.$file.'"><img src="'.$path.$file.'"></a> <br/>';
		}
	}
   }
   //End of list_files function
   list_files();
}

	
