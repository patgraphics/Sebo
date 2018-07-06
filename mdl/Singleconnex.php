<?php

class Singleconnex {
    private static $host='localhost';
    private static $user = 'root';
    private static $password = 'root';
    private static $database = 'Sebo';
    private static $connex; // variable pour ce connecter a la base de donne
    private static $port = "8888";
    private static $instance=null; // variable qui servira pour obtenir chaque connexion unique
    
    private function __construct() {
        self::connexion();
}
    
    public static function identifier ($user, $password)
    {
        self::$user = $user;
        self::$password = $password;
        self::connexion();
    }

    private static function connexion (){
        //connexion unique privee a la base de donees mysql
        try {
            
           // self::$connex = new PDO('mysql:host=localhost;port=8888;dbname=Sebo;charset=utf8', 'root', 'root');
           $s = 'mysql:host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$database . ';charset=utf8'; 
           self::$connex =  new PDO ($s, self::$user, self::$password);
           //echo ($s);
        }
        //si pas de connexion on arrete le processus et on affiche une erreur
        catch (Exception $exc) {
            die ("exception " . $exc->getMessage());
        }
        
    }
    
    public static function getInstance (){
        if (self::$instance == null)
        {
            self::$instance = new Singleconnex();
            
            // printf(self::$instance) ;
            
        }
        return self::$connex;
      
    }
    
    public static function close(){
        if(isset(self::$connex)){
            self::$connex=NULL;

        }
    }
}