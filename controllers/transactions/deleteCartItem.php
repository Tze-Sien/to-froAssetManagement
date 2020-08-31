<?php
    session_start();
    $_SESSION['message'] = [];
    include "../../includes/dbConnection.php";
    //viewTableData($tableName); 
    //loopID($tableName); 
    //loopData($tableName); 
    //getDataByProperty($tableName, $property, $compareData);
    // require '../database/viewing_data.php'; 
    
    //deleteData($tableName, $id);
    require '../database/deleting_data.php';
    
    //createData($tableName, $data);
    require '../database/storing_data.php';

    //updateData($tableName, $idName, $dataID, $newData)
    require '../database/updating_data.php';
?>

<?php

    // 1. Sanitization
    $userId = htmlspecialchars($_GET['userId']);
    $assetNameId = htmlspecialchars($_GET['assetNameId']);
    $quantity = htmlspecialchars($_GET['quantity']);
    
    $filterUserIdTrans = getFilteredKey('TransDB','@userId', $userId);

    foreach($filterUserIdTrans as $element){
        if($element["data"]['@assetNameId'] == $assetNameId){
            $newData = [
                'availability' => 'true'
            ];
            updateData("ItemDB", '@itemId', $element["data"]['@itemId'] , $newData);
            // Delete from Transaction Record
            deleteData("TransDB", $element['key']);
        }
    }

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