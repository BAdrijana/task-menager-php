<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: home.php');exit;
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
			<!-- task to do (to list task by worker) -->
			<?php require 'readtask.php';
				$tasks = FetctCreatedTask($email);?>
				<?php var_dump($tasks); ?>
				 
					<ul>
					<?php foreach($tasks as $task) { ?>
						<li>
							<ul>
								<li> <h5>Created by:</h5>  <?=$task['creator']; ?></li>
								<li><h5> Created for:</h5>  <?=$task['worker']; ?></li>
								<li><h5>Task title:  </h5> <?=$task['tasktitle']; ?></li>
								<li><h5>Task descriprion: </h5> <?=$task['description']?></li>
								<li><h5>Date to done: </h5>  <?=$task['date']; ?></li>
								<li><h5>Done: <form method="POST"><input type="checkbox" name="checkbox" value="y"> <button name="done">Done</button></form></h5></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
		</div>
<!-- <?php if(isset($_POST)){
	$done = $_POST['checkbox'];
	var_dump($done);
	$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
	$sql = "INSERT INTO `task` WHERE `id` = '{$task['id']}'";
				$sql .= "(`done`) ";
				$sql .= "VALUES ( '$done')";
				$db->exec($sql);
} ?> -->