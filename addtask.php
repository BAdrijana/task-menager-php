<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();	
	$email = $_SESSION['email']; 
	require 'db.php';

	

	if(isset($_SESSION['user'])){
		var_dump($_SESSION['user']);
	$user = $_SESSION['user'];
	var_dump($user['id']);
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
	}else if (!FetchEmailAll($email)){
		$errors['worker'] = 'Please enter corect worker email';
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
				
				$sql = "UPDATE `task` SET `creator` = '{$updatetask['creator']}', worker = '{$updatetask['worker']}', tasktitle = '{$updatetask['tasktitle']}', description = '{$updatetask['description']}', date =  '{$updatetask['date']}' WHERE `id` = '{$user['id']}' ";

				
				
				if ($db->exec($sql)) {
					unset($_SESSION['user']);
					header('Location: index.php');exit;
					
				}else {
				var_dump($db->errorInfo());
				$_SESSION['updatetask'] = $updatetask;
				$_SESSION['errors'] = $errors;
				header('Location: index.php');exit;

				}
		          
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}; //END OF CATCH

	}



	$addtask = [
		'creator' => '',
		'worker' => '',
		'tasktitle' => '',
		'description' => '',
		'date' => '',
		
	];

	
	$addtask = array_merge($addtask, $_POST);

	var_dump($addtask);
	$errors = [];
	var_dump($addtask['creator']);
	var_dump($email);
	if (trim($addtask['creator']) == '') {
		$errors['creator'] = 'Please enter your email';
	}else if($addtask['creator'] != $email){
		$errors['creator'] = 'Please enter your email valid';
	}
	
	if (trim($addtask['worker']) == '') {
		$errors['worker'] = 'Please enter worker email';
	}else if (!FetchEmailAll($email)){
		$errors['worker'] = 'Please enter corect worker email';
	}
	if(trim($addtask['tasktitle']) == '') {
		$errors['tasktitle'] = 'Please enter Task title';
	}
	if (trim($addtask['description']) == '') {
		$errors['description'] = 'Please enter task descripion';
	}
	if (trim($addtask['date']) == '') {
		$errors['date'] = 'Please enter date';
	}else if (DateTime::createFromFormat('Y-m-d', $addtask['date']) === false) {
 		$errors['date'] = 'Date format: yyyy-mm-dd';
 	}


var_dump($errors);
var_dump($addtask);
	try{
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
				
				$sql = "INSERT INTO `task` ";
				$sql .= "(creator, worker, tasktitle, description, date) ";
				$sql .= "VALUES ( '{$addtask['creator']}', '{$addtask['worker']}', '{$addtask['tasktitle']}', '{$addtask['description']}', '{$addtask['date']}')";
				
				if ($db->exec($sql)) {

					header('Location: index.php');exit;
				}else {
				var_dump($db->errorInfo());
			
				$_SESSION['addtask'] = $addtask;
				$_SESSION['errors'] = $errors;
				header('Location: index.php');exit;

				}
		          
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}; // end try/catch

	




} // end of if $_servermethod

?>

