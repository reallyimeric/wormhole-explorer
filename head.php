<?php
	//$MYSQL_ADDR = 'unix_socket='.$_ENV["/path/to/socket"].';';
	$MYSQL_ADDR = 'host='.$_ENV["MYSQL_PORT_3306_TCP_ADDR"].';'.'port='.$ENV["MYSQL_PORT_3306_TCP_PORT"].';';
	$DB_NAME = $_ENV["MYSQL_INSTANCE_NAME"];
	$TABLE_NAME = "routing";
	$MYSQL_USER = $_ENV["MYSQL_USERNAME"];
	$MYSQL_PASSWORD = $_ENV["MYSQL_PASSWORD"];
?>
