<?php 
function FetchAll(){
	try{
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');

			 $query = "SELECT * FROM `users`";
			 $pso = $db->query($query, PDO::FETCH_ASSOC);
				if ($pso) {
					return $pso->fetchAll();
				} else {
					var_dump($pdo->errorInfo());
					return [];
				}
					
			
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	};
}

	


function FetctUserTask($email){
	try{
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');

			 $query = "SELECT * FROM `task` WHERE `creator` = '$email'";

			 $pso = $db->query($query, PDO::FETCH_ASSOC);
				if ($pso) {
					return $pso->fetchAll();
				} else {
					var_dump($pdo->errorInfo());
					return [];
				}
					
			
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	};
}

function FetctCreatedTask($email){
	try{
		$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');

			 $query = "SELECT * FROM `task` WHERE `worker` = '$email'";

			 $pso = $db->query($query, PDO::FETCH_ASSOC);
				if ($pso) {
					return $pso->fetchAll();
				} else {
					var_dump($pdo->errorInfo());
					return [];
				}
					
			
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	};
}

?>