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
    $userId = htmlspecialchars($_GET['userId']);
    $assetNameId = htmlspecialchars($_GET['assetNameId']);

    $filterUserId = getFilteredKey("cartDB","userId",  $userId);


    foreach($filterUserId as $element){
        if($element['data']['assetNameId'] == $assetNameId){
            deleteData("cartDB", $element['key']);
        }
    }
    header('location:' . $_SERVER['HTTP_REFERER']);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>