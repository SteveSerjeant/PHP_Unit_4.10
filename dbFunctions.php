<?php

CONST DB_SERVER = 'proj-mysql.uopnet.plymouth.ac.uk';
CONST DB_USER = 'COMP2001_SSerjeant';
CONST  DB_PASSWORD = 'ZouQ516+';
CONST DB_DATABASE = 'COMP2001_SSerjeant';

function getAll($tablename)
{
    $statement= getConnection()->prepare("SELECT * FROM ".$tablename);
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $resultSet;

}


function getConnection(){
    $dataSourceName = 'mysql:dbname='.DB_DATABASE.';host='.DB_SERVER;
    $dbConnection = null;
    try
    {
        $dbConnection = new PDO($dataSourceName, DB_USER, DB_PASSWORD);

    }catch (PDOException $err)
    {
        echo 'Connection failed: ', $err->getPrevious();
    }
    return $dbConnection;
}

?>