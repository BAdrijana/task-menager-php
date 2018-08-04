<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: home.php');exit;
}
if(isset($_SESSION['username'])){
    echo 'Welcome!';
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
		<div id="all">
			
			<?php require 'readtask.php';
				$tasks = FetchAll();?>
				<!-- <?php var_dump($tasks); ?> -->
				 
					<ul>
					<?php foreach($tasks as $task) { ?>
						<li>
							<ul>
								<li> <h5>First Name:</h5>  <?=$task['first_name']; ?></li>
								<li><h5> Last Name:</h5>  <?=$task['last_name']; ?></li>
								<li><h5>E-mail :  </h5> <?=$task['email']; ?></li>
								
							</ul>
						</li>
					<?php } ?>
				</ul>
		</div>
