<?php
    session_start();
    $_SESSION['message'] = [];
        
    //viewTableData($tableName); 
    //loopID($tableName); 
    //loopData($tableName); 
    //getDataByProperty($tableName, $property, $compareData);
    require '../database/viewing_data.php'; 
    
    //deleteData($tableName, $id);
    require '../database/deleting_data.php';
    
    //createData($tableName, $data);
    require '../database/storing_data.php';
?>

<?php

    // 1. Sanitization
    $json = file_get_contents('php://input');
    $jsonDecode = json_decode($json);

    // 2. Add Item to Cart Database
    createData("cartDB", $jsonDecode);

    // 3. Sending Response
    echo json_encode($jsonDecode);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>