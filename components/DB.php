<?php

class DB
{
    
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db.json';
        $file = fopen($paramsPath,'r');
        $params = json_decode(fread($file,filesize($paramsPath)),1);

        $dsn = "mysql:host={$params['host']};dbname={$params['db']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");
        
        return $db;
    }

}