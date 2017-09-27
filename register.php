<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
    require_once './Include/DbP.inc.php';
    require_once './Include/DbH.inc.php';
    //require_once './Include/Authentication.inc.php';
    $dbh = DbH::getDbH();
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register New User</title>
    </head>
    <body>
        <main>
          <form action="./Include/register.inc.php" method="post">
            <table>
                <tr>
                  <td>First Name</td>
                  <td><input type="text" name="firstname" required/>*</td>
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td><input type="text" name="lastname" required/>*</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input type="email" name="email" required/>*</td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input type="password" name="pw1" required/>*</td>
                </tr>
                <tr>
                  <td>Repeat password</td>
                  <td><input type="password" name="pwd2" required/>*</td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" value="OK"/>
                  </td>
                </tr>
            </table>
          </form>
        </main>
  </body>
</html>

