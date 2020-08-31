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

    // 1. Get User Id
    $json = file_get_contents('php://input');
    $jsonDecode = json_decode($json);
    $userId = $jsonDecode->userId;

    // 2. Get Data from Database
    $result = filterData("cartDB", "userId", $userId);

    // 3. Sending Response
    echo json_encode($result);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>