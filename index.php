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


		<div id="create">
<?php 
	
$errors = $addtask = $user = [
	    'creator' => '',
		'worker' => '',
		'tasktitle' => '',
		'description' => '',
		'date' => '',
];

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	var_dump($user);
	};

if (isset($_SESSION['addtask'])) {
	//elementite od vtorata niza ako se so isti klucevi gi prebrishuvaat elementite od prvata niza
	$addtask = array_merge($addtask, $_SESSION['addtask']);
	unset($_SESSION['addtask']);
}

if (isset($_SESSION['errors'])) {
	//elementite od vtorata niza ako se so isti klucevi gi prebrishuvaat elementite od prvata niza
	$errors = array_merge($errors, $_SESSION['errors']); var_dump($errors);
	echo "Try again";
	unset($_SESSION['errors']);
}
 ?>

			<form class="addtask" action="addtask.php" method="POST">
				
				<label><input type="email" name="creator" placeholder="Creator email"  value="<?=$user['creator']?> <?=$addtask['creator']; ?> "></label>
				 <p class="error"><?php echo isset($errors['creator']) ? $errors['creator'] : ''; ?></p>
				
				<label><input type="text" name="worker" placeholder="Worker"value="<?=$user['worker']?> <?=$addtask['worker']; ?> " ></label>
				 <p class="error"><?php echo isset($errors['worker']) ? $errors['worker'] : ''; ?></p>
				
				<label><input type="text" name="tasktitle" placeholder="Title" value="<?=$addtask['tasktitle']?> <?=$user['tasktitle']?>"></label>
				 <p class="error"><?php echo isset($errors['tasktitle']) ? $errors['tasktitle'] : ''; ?></p>
				
				<label><input type="text" name="description" placeholder="Description" value="<?=$addtask['tasktitle']?> <?=$user['description'];?>"></label>
				 <p class="error"><?php echo isset($errors['description']) ? $errors['description'] : ''; ?></p>
				
				<label><input type="text" name="date" placeholder="Date" value="<?=$user['date']?>"></label>
				 <p class="error"><?php echo isset($errors['date']) ? $errors['date'] : ''; ?></p>

				<label><input type="checkbox" name="done" value="n"> Finished </label>
	 
	  			<input type="submit" value="Submit" name="submit">
			</form>
		</div>


	


</body>
</html>