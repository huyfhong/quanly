<?php

 class Database{
     
       public $connect;
       public function __construct(){
    
        $configPath = __DIR__ . '/config.ini';
        if (file_exists($configPath)) {
            $init = parse_ini_file($configPath);
        } else {
             // Fallback or error handling if config is missing in the same dir
             // Try looking one level up or default values
             $init = parse_ini_file("config.ini"); 
        }
        
        $servername = $init["servername"];
        $dbname = $init["dbname"];
        $username = $init["username"];
        $password = $init["password"]; 
        
        $opt= array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ);
        $this->connect = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4",$username,$password,$opt);          
        }
    }
    
   
 