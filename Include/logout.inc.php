<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 27, 2017 3:58:39 PM  
//

error_reporting(E_ALL);

session_start();
    require_once 'authentication.inc.php';
    
    if (Authentication::isAuthenticated()) {
        Authentication::Logout();
    }
    header('Location: ../index.php?notAuth');
