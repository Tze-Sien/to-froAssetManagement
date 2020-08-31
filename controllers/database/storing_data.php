<?php
    include("../../includes/dbConnection.php");

    // 1. Store Data
    function createData($tableName, $data){
        global $database;
        $createData = $database->getReference($tableName)->push($data);
    }    

?>