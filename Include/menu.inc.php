<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 28, 2017 1:24:00 PM  
//

error_reporting(E_ALL);

        require_once 'authentication.inc.php';

        require_once 'DbP.inc.php';
        require_once 'DbH.inc.php';
        $dbh = DbH::getDbH();

?>
        <header>
            <ul class="nav">
                <li><a href="./index.php">Home</a></li>
<?php
                if (!Authentication::isAuthenticated()) {
                    printf("%16s<li><a href='#'><div class='btn'>Log In / Register</div></a></li>\n", " ");
                } else { 
                    printf("%16s<li><a href='logout.inc.php'>
                                        Logout</a></li>\n", " ");
                }
?>
            </ul>
<?php
//                print("<p></p>");
                if (Authentication::isAuthenticated()) {
                    printf("<div>Welcome %s</div>", 
                            Authentication::getDispvar());
                }
?>
        </header>
