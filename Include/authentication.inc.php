<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 27, 2017 3:32:38 PM  
//

error_reporting(E_ALL);

require_once 'AuthA.inc.php'; // include the login parent

class Authentication extends AuthA {
    const DISPVAR = 'waldo42';
    private $name;

    private function __construct($user, $pwd) {
        try {
            self::dbLookUp($user, $pwd);         // invoke auth
            $_SESSION[self::SESSVAR] = $this->getUserId(); // if succesfull
            $_SESSION[self::DISPVAR] = $this->getName();   // if succesfull
        }
        catch (Exception $e) {
            self::$logInstance = NULL;
        }    
    }

    public static function authenticate($user, $pwd) {
        if (self::$logInstance === NULL) {
            self::$logInstance = new Authentication($user, $pwd);
        }
        return self::$logInstance;
    }
    
    protected function dbLookUp($user, $pwdtry) {
      // Using prepared statements to prevent SQL injection
        $db = DbH::getDbH();
        $sql = "select firstname, password, voterid 
                from voter
                where firstname = :firstname";
        try {
            $q = $db->prepare($sql);
            $q->bindValue(':firstname', $user);
            $q->execute();
            $row = $q->fetch();
            if ($row['firstname'] === $user
                    && password_verify($pwdtry, $row['password'])) { 
                $this->name = $row['firstname'];
                $this->userId = $user;
            } else {
                throw new Exception("Not authenticated", 42);
            }
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    
    private function getName() {
        return $this->name;
    }
    
    public static function getDispvar() {
        return $_SESSION[self::DISPVAR];
    }
}