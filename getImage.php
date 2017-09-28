<?php
    require_once './Include/DbP.inc.php';
    require_once './Include/DbH.inc.php';
    $dbh = DbH::getDbH();

    foreach($_GET as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }
    if(isset($photoid)) {
            $sql  = "select mimetype, imagedata";
            $sql .= " from photo";
            $sql .= " where photoid = :photoid";
        try {    
            $q = $dbh->prepare($sql);
            $q->bindValue(':photoid', $photoid);
            $q->execute();
            $out = $q->fetch();
        } catch(PDOException $e)  {
            printf("Error getting image.<br/>". $e->getMessage(). '<br/>' . $sql);
            die('');
        }

        $out['imagedata'] = stripslashes($out['imagedata']);
        header("Content-type: " . $out['mimetype']);
        echo $out['imagedata'];	
    } else {
        echo 'X';
    }