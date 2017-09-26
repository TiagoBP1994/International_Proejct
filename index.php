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
                
        <link rel="stylesheet" type="text/css" href="./slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"/>
        
        <title>Photo Upload Project | Group 2</title>
    </head>
    <body>
        
        <?php 
        // Includes the header with navigation
        include './Include/header.inc.php'; 
        ?>
        
        <?php
        // Retrieving Images from Database for Display 
            $sql  = "select color, dimples, noinstock";
            $sql .= " from golfballs";
            $sql .= " order by color, dimples";
            $r = $dbh->query($sql);
            $a = array();
            while ($out = $r->fetch()) {
                $g = new GolfBall();
                $g->setColor($out['color']);
                $g->setDimples($out['dimples']);
                $g->addStock($out['noinstock']);
                array_push($a, $g);
            }
        ?>
        
            <div class="slider-for">
                
                <?php
                    //The Loop to print each image to the slider
                    printf("    <header><h1>%s</h1></header>\n", $title);            // put your code here
                    print("    <table>\n");
                    foreach ($a as $gb) {
                        print($gb);
                    }
                    print("    </table>\n");
                ?>
                
                <div>your content</div>
                <div>your content</div>
                <div>your content</div>
            </div>
        
            <div class="slider-nav">
                <div>your content</div>
                <div>your content</div>
                <div>your content</div>
            </div>
        
        <?php 
        // Includes the footer
        include './Include/footer.inc.php'; 
        ?>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- BOOTSTRAP - Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="./slick/slick.min.js"></script>
        
        <script type="text/javascript">
         $('.slider-for').slick({
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
          });
          $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
          });
        </script>
        
    </body>
</html>
