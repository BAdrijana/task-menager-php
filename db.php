<?php
class DB {
	const DB_HOST = 'localhost';
	const DB_USERNAME = 'root';
	const DB_PASSWORD = '';
	const DB_NAME = 'project';
	protected $db;

	public function __construct() {
		try {
			$this->db = new \PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8',self::DB_USERNAME,self::DB_PASSWORD);
			echo "MySQL connection established";
		} catch (\PDOException $e) {
			var_dump( $e->getMessage() );
		}
	}

	public function __destruct() {
		$this->db = null;
	}
}

function FetchEmail($email){
	$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
	$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
	$pso = $db->query($sql, PDO::FETCH_ASSOC);
	if ($pso) {
		return $pso->fetch();
	} else {
		var_dump($db->errorInfo());
	}
}
function FetchEmailAll($email){
	$db = new PDO('mysql:host=localhost;dbname=project;harset=utf8','root', '');
	$sql = "SELECT `email` FROM `users`";
	$pso = $db->query($sql, PDO::FETCH_ASSOC);
	if ($pso) {
		return $pso->fetchAll();
	} else {
		var_dump($db->errorInfo());
	}
}

?>