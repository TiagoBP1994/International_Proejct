<?php
        session_start();
        require_once './Include/authentication.inc.php';
        // Copy this code to any page that needs database connection.
        // Remember the surrounding PHP tags!
        require_once './Include/DbP.inc.php';
        require_once './Include/DbH.inc.php';
        $dbh = DbH::getDbH();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- BOOTSTRAP - Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- BOOTSTRAP - Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        
        <title>Photo Upload Project | Group 2</title>
    </head>
    <body>
        
        <div class="blur_filter"><!-- KACIA -->
            <header class="header">

            </header>
            <div class="container">
                <nav class="nav">
            <ul class="nav">
                <li><a href="./index.php">Home</a></li>
                    <?php
                        if (!Authentication::isAuthenticated()) {
                            printf("%16s<li><a href='#'><div class='btn'>Log In / Register</div></a></li>\n", " ");
                        } else { 
                            printf("%16s<li><a href='upload_image.php'>Upload Image</a></li>\n", " ");
                            printf("%16s<li><a href='./Include/logout.inc.php'>Logout</a></li>\n", " ");
                            
                        }
                    ?>
            </ul>
                </nav>
            </div>
        </div>
        <div class="blur_filter">
            <div id="outerWrapper"><!-- KACIA -->
        <?php
        
        $sql  = "select photoid,  caption, story, tags, credit";
        $sql .= " from photo";
        $sql .= " order by rand()";
        $r = $dbh->query($sql);
        
        echo'<div id="content" class="row blur_filter">';
        foreach ($r as $sql){
            echo'<div class="col-sm-6 col-md-6">';
              echo'<div class="thumbnail" style="height:600px;">';
                // Img here
                echo'<img src="getImage.php?photoid='.$sql['photoid'].'" style="max-height: 20em;">';
                echo'<div class="caption">';
                    //Caption here
                  echo'<p>'.$sql['caption'].', '.$sql['story'].', '.$sql['credit'].', '.$sql['tags'].'</p>';
                  // Create vote function within buttons here
                  echo'<p><a href="#" class="btn btn-primary" role="button">Vote</a></p>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
            }
          echo'</div>';
        ?>
        <?php 
        // Includes the footer
        include './Include/footer.inc.php'; 
        ?>
                
                </div>
        </div>
        
        <div class="flex_box">

        <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="./Include/login.inc.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              First Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="user"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="pwd"/>
          </div>
                 
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="./Include/register.inc.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name='pw1'/>
          </div>
              
          <div class="field-wrap">
            <label>
                Repeat Password<span class="req">*</span>
            </label>
                  <input type="password" name="pwd2" required/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form>

        </div>  
        
      </div>


            </div> <p class="close">X</p>
        </div> 
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- BOOTSTRAP - Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script>
        $(function () {
            $('.btn').click(function (e) {
                $('.form').addClass('appear');
                $('.close').addClass('appear');
                $('.blur_filter').addClass('blur-filter');

            });
    
            $('.close').click(function (e) {
                $('.form').removeClass('appear');
                $('.close').removeClass('appear');
                $('.blur_filter').removeClass('blur-filter');


            });
        });

    </script>
    
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="./js/login.js"></script>
        
    </body>
</html>
