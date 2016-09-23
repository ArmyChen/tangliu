<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/data/comment'; // Relative to the root

//$verifyToken = md5('unique_salt' . $_POST['timestamp']);
    
	$randomnum=NULL;
	for($j=0;$j<=5;$j++)//随机数字的长度，本例随机数长度为6
	{
		srand((double)microtime()*1000000);
		$randomnumber=rand(!$j ? 1: 0,9);//产生随机数，不以0为第一个数，有些特殊的地方0开头被系统省略
		$randomnum.=$randomnumber;
	}

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/'.$randomnum.'_' . $_FILES['Filedata']['name'];
	echo $targetFile;
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
	} else {
		echo 'Invalid file type.';
	}
	


?>