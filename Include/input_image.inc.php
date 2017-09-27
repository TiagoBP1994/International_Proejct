<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 26, 2017 10:54:01 AM  
//

error_reporting(E_ALL);

    if (!(
          (isset($_POST['caption']) && $_POST['caption'] != '')
            && (isset($_POST['credit']) && $_POST['credit'] != '')
            && (isset($_POST['story']) && $_POST['story'] != '')
            && (isset($_POST['tags']) && $_POST['tags'] != '')
            && (isset($_FILES['img']) && $_FILES['img']['size'] > 0)
        )) {
        header('Location: ../upload_image.php?error');
    }
    
    require_once 'DbP.inc.php';
    require_once 'DbH.inc.php';
    require_once 'image.inc.php';
    $dbh = DbH::getDbH();
    
    foreach($_POST as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }
    
    $gb = new photo();
    $gb->setCaption($caption);
    $gb->setCredit($credit);
    $gb->setStory($story);
    $gb->setTags($tags);

    // Temporary file name stored on the server
    // Read in one gulp and addslashes
    $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $imagetype = $_FILES['img']['type'];
    
    $sql = 'start transaction;';
    $dbh->query($sql);
    
    $sql = 'insert into photo (caption, credit, imagedata, mimetype, story, tags) values(:caption, :credit, :imagedata, :mimetype, :story, :tags);';
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':caption', $gb->getCaption());
      $q->bindValue(':credit', $gb->getCredit());
      $q->bindValue(':story', $gb->getStory());
      $q->bindValue(':tags', $gb->getTags());
      $q->bindValue(':imagedata', $image);
      $q->bindValue(':mimetype', $imagetype);
      
      $q->execute();
    } catch(PDOException $e) {
      die("Posting the image failed.<br/>".$e->getMessage());
    }

    $sql = 'commit;';
    $dbh->query($sql);
    header('Location: ../upload_image.php?inserted');
