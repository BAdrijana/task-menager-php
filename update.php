<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	
	require 'db.php';

	$updatetask = [

		'creator' => '',
		'worker' => '',
		'tasktitle' => '',
		'description' => '',
		'date' => '',
		
	];

	
	$updatetask = array_merge($updatetask, $_POST);

	var_dump($updatetask);
	$errors = [];
	var_dump($updatetask['creator']);
	var_dump($email);
	if (trim($updatetask['creator']) == '') {
		$errors['creator'] = 'Please enter your email';
	}else if($updatetask['creator'] != $email){
		$errors['creator'] = 'Please enter your email valid';
	}
	
	if (trim($updatetask['worker']) == '') {
		$errors['worker'] = 'Please enter worker email';
	}
	if(trim($updatetask['tasktitle']) == '') {
		$errors['tasktitle'] = 'Please enter Task title';
	}
	if (trim($updatetask['description']) == '') {
		$errors['description'] = 'Please enter task descripion';
	}
	if (trim($updatetask['date']) == '') {
		$errors['date'] = 'Please enter date';
	}else if (DateTime::createFromFormat('Y-m-d', $updatetask['date']) === false) {
 		$errors['date'] = 'Date format: yyyy-mm-dd';
 	}


var_dump($errors);
var_dump($updatetask);
	try{
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
				
				$sql = "UPDATE `task` WHERE ";
				$sql .= "(`creator` = {$updatetask['creator']}', worker = '{$updatetask['worker']}', tasktitle = '{$updatetask['tasktitle']}', description = '{$updatetask['description']}', date =  '{$updatetask['date']}') ";
				var_dump($sql);
				
				
				if ($db->exec($sql)) {
					var_dump($sgl);
					header('Location: index.php');exit;
				}else {
				var_dump($db->errorInfo());
			
				$_SESSION['updatetask'] = $updatetask;
				$_SESSION['errors'] = $errors;
				header('Location: index.php');exit;

				}
		          
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	};


}

?>
