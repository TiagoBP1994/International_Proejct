<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        // Copy this code to any page that needs database connection.
        // Remember the surrounding PHP tags!
        require_once './Include/DbP.inc.php';
        require_once './Include/DbH.inc.php';
        $dbh = DbH::getDbH();
        ?>
        <meta charset="UTF-8">
        
        <!-- BOOTSTRAP - Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- BOOTSTRAP - Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <title>Photo Upload Project | Group 2</title>
    </head>
    <body>
        
        <?php 
        // Includes the header with navigation
        include './Include/header.inc.php'; 
        ?>
        <?php
        
        $sql  = "select caption, imagedata, mimetype, story, tags, credit";
        $sql .= " from photo";
        $r = $dbh->query($sql);
        
        echo'<div class="row">';
            // Loop Starts here
            echo'<div class="col-sm-6 col-md-4">';
              echo'<div class="thumbnail">';
                // Img here
                echo'<img src="..." alt="...">';
                echo'<div class="caption">';
                    //Caption here
                  echo'<h3>Thumbnail label</h3>';
                    // Story, tags, credit here
                  echo'<p>...</p>';
                  // Create vote function within buttons here
                  echo'<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
            // Loop ends here
          echo'</div>';
        ?>
        <?php 
        // Includes the footer
        include './Include/footer.inc.php'; 
        ?>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- BOOTSTRAP - Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>
