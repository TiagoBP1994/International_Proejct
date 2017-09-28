<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 26, 2017 10:59:10 AM  
//

error_reporting(E_ALL);

?>
<!DOCTYPE html>
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
        
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        
        <title>Upload Image | Group 2</title>
    </head>
    <body>
        
        <div class="blur_filter"><!-- KACIA -->
            <header class="header">

            </header>
            <div class="container">
                <nav class="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="upload_image.php">Upload Photo</a></li>
                        <li><a href="#"><div class="btn">Log In / Register</div></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <div class="blur_filter">
            <div id="outerWrapper"><!-- KACIA -->
        <div id="content" class="row blur_filter">
        <h1>Upload Image</h1>
        <div class="container">
            <div class="row">
            <form action="./Include/input_image.inc.php" 
              method="post" 
              enctype="multipart/form-data">
                <p class="col-md-6">
                    <label for='caption' style="color:#000; position: inherit;">Caption</label><br/>
                    <input type='text' id='caption' name='caption' style="color:#000;" required/>
                </p>
               
                <div class="col-md-6"></div>
                <p class="col-md-6">
                    <label for='credit' style="color:#000; position: inherit;">Credit</label><br/>
                    <input type='text' id='credit' name='credit' style="color:#000;" required/>
                </p>
                <p class="col-md-6">
                    <label for='story' style="color:#000; position: inherit;">Story</label><br/>
                    <input type='text' id='story' name='story' style="color:#000;" required/>
                </p>
                <div class="col-md-6"></div>
                <p class="col-md-6">
                    <label for='tags' style="color:#000; position: inherit;">Tags</label><br/>
                    <input type='text' id='tags' name='tags' style="color:#000;" required/>
                </p>
                <div class="col-md-6"></div>
                <p class="col-md-12">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880"/>
                    <label for='bild' style="color:#000; position: inherit;">Select Image File</label><br/>
                    <input type='file' id='bild' name='img' style="color:#000;" required/>
                </p>
            <p>
                <input type='submit' class="col-md-6 submit"  name='butt' value='Submit' style="color:#000"/>
                
            </p>
            
        </form>
        </div>
        </div>
        </div>
        
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
                    <li class="tab active"><a href="#login" >Log In</a></li>
                    <li><a href="Include/logout.inc.php">Logout</a></li>
                </ul>

                <div class="tab-content">

                    <div id="login">   
                        <h1>Welcome Back!</h1>

                        <form action="index.php" method="post" autocomplete="off">

                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email" required autocomplete="off" name="email"/>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Password<span class="req">*</span>
                                </label>
                                <input type="password" required autocomplete="off" name="password"/>
                            </div>

                            <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>

                            <button class="button button-block" name="login" />Log In</button>

                        </form>

                    </div>

                    <div id="signup">   
                        <h1>Sign Up for Free</h1>

                        <form action="index.php" method="post" autocomplete="off">

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
                                    <input type="text"required autocomplete="off" name='lastname' />
                                </div>
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email"required autocomplete="off" name='email' />
                            </div>

                            <div class="field-wrap">
                                <label>
                                    Set A Password<span class="req">*</span>
                                </label>
                                <input type="password"required autocomplete="off" name='password'/>
                            </div>

                            <button type="submit" class="button button-block" name="register" />Register</button>

                        </form>

                    </div>  

                </div>

            </div> <p class="close">X</p>
        </div>
        
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
        
    </body>
</html>
