<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 26, 2017 10:54:32 AM  
//

error_reporting(E_ALL);

 require_once 'DbP.inc.php';
    require_once 'DbH.inc.php';
    $dbh = DbH::getDbH();
    
    foreach($_POST as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }
    
    $sql = 'insert into voter (email, firstname, lastname, password)';
    $sql .= ' values(:email, :firstname, :lastname, :password);';
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':email', $email);
      $q->bindValue(':firstname', $firstname);
      $q->bindValue(':lastname', $lastname);
      $q->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
      $q->execute();
    } catch(PDOException $e) {
      die("Posting failed. Call a friend.<br/>".$e->getMessage());
    }
    header('Location: ../login_register.php?userinserted');
