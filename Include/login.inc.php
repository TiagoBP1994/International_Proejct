<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 27, 2017 3:33:33 PM  
//

error_reporting(E_ALL);

session_start();
    require_once 'DbP.inc.php';
    require_once 'DbH.inc.php';
    require_once 'authentication.inc.php';
    $auth = FALSE;
    $err = '';

    if (!Authentication::isAuthenticated() 
          && Authentication::areCookiesEnabled()) { 
        if (isset($_POST['user']) && isset($_POST['pwd'])) {
            $auth = Authentication::authenticate($_POST['user'], $_POST['pwd']);
            if (!Authentication::isAuthenticated()) {
                $err = 'Error at login, please retry';
            }
        }
    }

    if (Authentication::isAuthenticated()) {  // am I logged on?
        header("Location: ../index.php");
    }                               

                if ($err != '') {
                  printf("<tr><td colspan='2' class='err'>%s.</td></tr>\n", $err);
                }
                if (!Authentication::areCookiesEnabled()) {
                  print("<tr><td colspan='2' class='err'>Cookies 
                      from this domain must be 
                      enabled before attempting login.</td></tr>");
                }
?>