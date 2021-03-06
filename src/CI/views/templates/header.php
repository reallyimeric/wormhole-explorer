<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="favicon.ico">
        <title><?php echo htmlentities($title); ?> - Wormhole Explorer</title>
        <meta name="description" content="<?php echo htmlentities($description); ?>">
        <meta charset="<?php echo htmlentities($charset); ?>">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php
    foreach($css as $acss){
        echo '        <link href="'.htmlentities($acss).'" rel="stylesheet" media="all" type="text/css">'."\n";
        }
    foreach($js as $ajs){
        echo '        <script src="'.htmlentities($ajs).'" type="text/javascript"></script>'."\n";
        }
?>
    </head>
    <body>
        <div class="container">
            <h1><?php echo htmlentities($page_header); ?></h1>
