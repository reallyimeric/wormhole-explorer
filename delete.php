<?php
    require 'head.php'; 
    $id = $_POST["id"];
	$dsn = 'mysql:'.MYSQL_ADDR.DB_NAME;
	$dbh = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
    $sql_check = 'SELECT * FROM '.TABLE_NAME.' WHERE id=:id';
    $sql_work = 'DELETE FROM '.TABLE_NAME.' WHERE id=:id';
    $sth_check = $dbh->prepare($sql_check);
	$sth_work = $dbh->prepare($sql_work);
	$inputparam = array('id'    	=>	$id);
    if( $sth_check->execute($inputparam) ){
        $before = $sth_check->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
        echo json_encode("check before failed,no change made to record");
        return 1;
    }
	if( $sth_work->execute($inputparam) ){
		    if( $sth_check->execute($inputparam) ){
                $after = $sth_check->fetchAll(PDO::FETCH_ASSOC);
            }
            else
            {
                echo json_encode("check after failed,no change made to record");
                return 3;
            }
    }
	else{
		$result = $sth->errorInfo();
		echo json_encode($result);
        return 2;
    }
?>
