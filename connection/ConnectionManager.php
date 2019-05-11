<?php
header("Access-Control-Allow-Origin: *");
require_once "Connection.php";
    
class ConnectionManager
{
    static $connection = null;
    public static function getInstance()
    {
        if(ConnectionManager::$connection == null)
            ConnectionManager::$connection = new Connection();
        return ConnectionManager::$connection;
    }
    
    private function __construct()
    {
        
    }
    
    private function __clone()
    {
        
    }
}

?>