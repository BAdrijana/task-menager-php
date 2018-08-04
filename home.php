<?php 
require 'db.php'; 
	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$errors = [];
		
		try {
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');

		$sql = "SELECT * FROM `users` WHERE `email` = '$email' ";

		$pso = $db->query($sql, PDO::FETCH_ASSOC);
		$user = $pso->fetch();
		var_dump($user);
		$hash = $user['password'];
		var_dump($hash);
		if ($user === false) {
			$errors['error'] = 'Username/password not correct';
		} else {
			var_dump($password);

			var_dump(password_verify($password, $hash));

			if (password_verify($password, $hash)) {
				$_SESSION['email'] = $user['email'];
				header('Location: index.php');exit;
			} else {
				$errors['error'] = 'password not correct';	
					var_dump($errors);		
			}
		}

	// 	$db = null;
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}



	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<header>
		<nav class="nav-home">
			<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><form method="POST">
				<li><label><input type="email" name="email" placeholder="email"></label></li>
				<li><label><input type="password" name="password" placeholder="password"></label></li>
				<li><button type="submit" name="login" >Login</button></li>
			</form></li>
			</ul>
		</nav>
</head>
	</header>

</body>
</html>