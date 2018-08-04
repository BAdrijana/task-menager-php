<?php
session_start();

if(isset($_POST['signup'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$errors=[];
		if (trim($firstname) == '') {
			$errors['firstname'] = 'Name is required';
			} else if (strlen($firstname) > 200) {
				$errors['name'] = 'Max 200 chars for name';
		}
		 if (strlen($lastname) == 0) {
			$errors['lastname'] = 'Name is required';
			} else if (strlen($lastname) > 200) {
				$errors['lastname'] = 'Max 200 chars for name';
		}

		if (strlen($email) == 0) {
			$errors['email'] = 'Email is required';
		}

	 	if (strlen($password) == 0) {
			$errors['password'] = 'Password is required';
		}

	if(empty($errors)){
		try{
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
			$password = password_hash($password, PASSWORD_BCRYPT);

			 $query = "SELECT * FROM `users` WHERE `email` = '{$email}' ";
			 $pso = $db->query($query, PDO::FETCH_ASSOC);
			 $user = $pso->fetch(); //only one row
			 var_dump($user) ;
			 var_dump($errors);
			if ($user === false){		
				$sql = "INSERT INTO `users` ";
				$sql .= "(email, password, first_name, last_name) ";
				$sql .= "VALUES ( '$email', '$password', '$firstname', '$lastname')";
			
				var_dump($db->exec($sql));
				var_dump($db->errorInfo());
		
				$_SESSION['username'] = $firstname;
				$_SESSION['email'] = $email;
				header('Location: index.php');

		$db = null;}else{
			$errors['email'] = 'use another email';
		}
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}
}}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="">About</a></li>
		</ul>
	</nav>
	<div class="container">
	<div class="register-wrap">
		<h3>SignIn</h3>
		<div class="register">
			 <form action = "" method = "post">
                  <label>FirstName</label><input type = "text" name = "firstname" placeholder="FirstName" />
                  <p class="error"><?php echo isset($errors['firstname']) ? $errors['firstname'] : ''; ?></p>

                   <label>LastName</label><input type = "text" name = "lastname" placeholder="LastName" />
                  <p class="error"><?php echo isset($errors['lastname']) ? $errors['lastname'] : ''; ?></p>

                   <label>E-mail</label><input type = "email" name = "email" placeholder="e-mail" />
                   <p class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></p>

                  <label>Password</label><input type = "password" name = "password" placeholder="Password" /><br/><br >
                  <p class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></p>

                  <button type="submit" name="signup">SignUp</button> <br />
               </form>
		</div> <!-- end of regisrer -->
	

	
</div><!-- end of register-wrap-->

</div><!-- end of container -->

</body>
</html>