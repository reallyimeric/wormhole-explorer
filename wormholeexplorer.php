<?php
	define("MYSQL_SOCKET_ADDR", "/run/mysqld/mysqld.sock");
	define("MYSQL_USER", "wormholeexplorer");
	define("MYSQL_PASSWORD", "whe");
	define("DB_NAME", "wormholeexplorer");
	define("TABLE_NAME", "routing");

//	$querymethod=$_POST["querymethod"];
//	$querycontent=$_POST["querycontent"];
	$id=$_POST["id"];

	$dsn = 'mysql:unix_socket='.MYSQL_SOCKET_ADDR.';dbname='.DB_NAME;
	$dbh = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
	$sql = 'SELECT * FROM '.TABLE_NAME.' WHERE id = :id';
	$sth = $dbh->prepare($sql);
	$inputparam = array('id' => $id);
	if( $sth->execute($inputparam) ){
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		//print_r($result);
		echo json_encode($result);
		}
	else{
		$result = 'something goes wrong';
		//print_r($result);
		echo json_encode($result);
		$error = $sth->errorInfo();
		throw new Exception(json_encode($error));
		}
//	$options = array(
//	    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//	); 
//	$dbh = new PDO($dsn, $username, $password, $options);

//	$dbh = new PDO($dsn, $username, $password);

//	$con = mysql_connect(MYSQL_ADDR, MYSQL_USER, MYSQL_PASSWORD);
//
//	if (!$con){
//		die('Could not connect: ' . mysql_error());
//	}
//	mysql_select_db(DB_NAME, $con);
//	if ($querymethod=="show") {
//		$sql="SELECT * FROM ".$TABLE_NAME." WHERE id = '".$querycontent."'";
//	}
//	$result = mysql_query($sql);
//	print_r($result);

//	$sth = $dbh->prepare('SELECT *
//		FROM :table_name
//		WHERE id = :id');
//	$table_name=TABLE_NAME;
//	$sth->execute(array(':table_name' => $table_name, ':id' => $id));
?>
