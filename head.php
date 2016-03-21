<?php
    //$MYSQL_ADDR = 'unix_socket='.$_ENV["/path/to/socket"].';';
    //$MYSQL_ADDR = 'host='.$_ENV["MYSQL_PORT_3306_TCP_ADDR"].';'.'port='.$_ENV["MYSQL_PORT_3306_TCP_PORT"].';';
    //$DB_NAME = $_ENV["MYSQL_INSTANCE_NAME"];
    $MYSQL_TCP_ADDR = $_ENV["MYSQL_PORT_3306_TCP_ADDR"];                                            //ip addr (or maybe domain name?), e.g., '127.0.0.1'
    $MYSQL_TCP_PORT = $_ENV["MYSQL_PORT_3306_TCP_PORT"];                                            //tcp port, e.g., '3306'
    //$MYSQL_SOCKET = $_ENV["/path/to/socket"];                                                       //path to socket, e.g., '/run/mysql.socket'
    $MYSQL_DB_NAME = $_ENV["MYSQL_INSTANCE_NAME"];                                                  //database name, e.g., 'wormholeexplorer'
    $DSN_MYSQL_TCP = 'mysql:' . 'host=' . $MYSQL_TCP_ADDR . ';' . 'port=' . $MYSQL_TCP_PORT . ';';
    //$DSN_MYSQL_SOCKET = 'mysql:' . 'unix_socket=' . $DSN_SOCKET . ';';
    $DSN_MYSQL = $DSN_MYSQL_TCP;
    $TABLE_NAME = "routing";
    $MYSQL_USER = $_ENV["MYSQL_USERNAME"];
    $MYSQL_PASSWORD = $_ENV["MYSQL_PASSWORD"];
?>
