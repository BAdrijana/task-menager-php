<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: home.php');exit;
}
	//EDIT
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		var_dump($id);
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
		$query = "SELECT * FROM `task` WHERE `id` = '$id'";
		var_dump($query);
		$pso = $db->query($query, PDO::FETCH_ASSOC);		
		$user = $pso->fetch();
		var_dump($user);
		$_SESSION['user'] = $user;
		header('Location:index.php');exit;
	}else{
		echo "try again";
	}
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$update = true;
		var_dump($id);
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
		$query = "DELETE FROM `task` WHERE `id` = '$id'";
		var_dump($query);
		if( $db->query($query)===true){
			echo "deleted";
		}else{
			echo "try again";
		}
		
		
	}else{
		echo "try again";
	}


if(isset($_SESSION['username'])){
    echo 'Welcome!';
} else {
    echo '<a href="login.php">Login</a><br />
    <a  href="login.php">Register</a>';
}
var_dump($_SESSION['email']);
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Wellcome</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header class="nav">
		<div class="header-wrap">
			<h3 class="left">Wellcome</h3>
			<p class="right">	<a href="logout">Logout</a> </p>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">CreateNewTask</a></li>
				<li><a href="todo.php">TaskToDo</a></li>
				<li><a href="task.php">CreatedTask</a></li>
				<li><a href="users.php">AllUsers</a></li>
			</ul>
		</nav>

	</header>
		<div id="created">
			<!-- created task (to list task by creator) -->
			<?php require 'readtask.php';
				$tasks = FetctUserTask($email);?>
					<ul>
					<?php foreach($tasks as $task) { ?>
						<li> <?php echo $task['id']; ?>
							<ul>
								<li> <h5>Created by:</h5>  <?=$task['creator']; ?></li>
								<li><h5> Created for:</h5>  <?=$task['worker']; ?></li>
								<li><h5>Task title:  </h5> <?=$task['tasktitle']; ?></li>
								<li><h5>Task descriprion: </h5> <?=$task['description']?></li>
								<li><h5>Date to done: </h5>  <?=$task['date']; ?></li>
								<li> <a class="edit" name="edit" href="task.php?edit=<?php echo $task['id']; ?>" class="edit_btn" >Edit</a> <a class="edit" name="delete" href="task.php?delete=<?php echo $task['id']; ?>"  >Delete</a> </li>
							</ul>
						</li>
					<?php } ?>
				</ul>	
		</div>