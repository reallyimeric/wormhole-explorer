<? php
	echo "php working";
	define("MYSQL_SOCKET_ADDR", "/run/mysqld/mysqld.sock");
	define("MYSQL_USER", "wormholeexplorer");
	define("MYSQL_PASSWORD", "whe");
	define("DB_NAME", "wormholeexplorer");
	define("TABLE_NAME", "routing");

	$querymethod=$_POST["querymethod"];
	$querycontent=$_POST["querycontent"];

	$dsn = 'mysql:unix_socket='.MYSQL_SOCKET_ADDR.';dbname='.DB_NAME;
	$username = $MYSQL_USER;
	$password = $MYSQL_PASSWORD;
/*//	$options = array(
//	    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//	); 
//	$dbh = new PDO($dsn, $username, $password, $options);
*/
	$dbh = new PDO($dsn, $username, $password);

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

	$sth = $dbh->prepare('SELECT all
	    FROM :table_name
	    WHERE id = :querycontent');
	);
	$sth->execute(array(':table_name' => TABLE_NAME, ':querycontent' => $querycontent));
	$result = $sth->fetch(PDO::FETCH_ASSOC);
	print_r($result);
?>
