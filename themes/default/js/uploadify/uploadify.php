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
	for($j=0;$j<=5;$j++)//������ֵĳ��ȣ��������������Ϊ6
	{
		srand((double)microtime()*1000000);
		$randomnumber=rand(!$j ? 1: 0,9);//���������������0Ϊ��һ��������Щ����ĵط�0��ͷ��ϵͳʡ��
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