<?php
    require 'head.php'; 
    $parent = $_POST["parent"];
    $child = $_POST["child"];
	$dsn = 'mysql:'.$MYSQL_ADDR.$DB_NAME;
	$dbh = new PDO($dsn, $MYSQL_USER, $MYSQL_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    $sql = 'show table status where name ='.TABLE_NAME;
    $sth = $dbh->prepare($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $auto_increment_id = $result['Auto_increment'];
    */
    try{
    $dbh->beginTransaction();
	$sql = 'INSERT INTO '.$TABLE_NAME.' (parent,child) VALUES(:parent,:child)';
	$sth = $dbh->prepare($sql);
	$inputparam = array('parent'	=>	$parent,
                        'child'     =>  $child);
    $sth->execute($inputparam);
    //$lastid = $dbh->lastInsertId();
    //$lastid = $dbh->lastInsertId('id');
    //echo json_encode($lastid);
    $sth = $dbh->query('SELECT LAST_INSERT_ID()');
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $dbh->commit();
    echo json_encode($result);
    } catch (Exception $e){
        $dbh->rollback();
        echo json_encode("Failed: " . $e->getMessage());
    }
?>
