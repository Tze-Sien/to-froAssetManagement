<?php
    session_start();
    $_SESSION['message'] = []; 
    
    //viewTableData($tableName); loopID($tableName); 
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
    $itemId = htmlspecialchars($_GET['itemId']);

    // 2. Validation
    if(strlen($itemId) == 0){
        array_push($_SESSION['message'], "Unexpected Error. Request invalid");
        header('location:' . $_SERVER['HTTP_REFERER']);
    }else{
        $searchInDB = getDataByProperty( "ItemDB", "@itemId", $itemId);
        var_dump($searchInDB);
        if($searchInDB != NULL) {
            // 3. Delete the Item
            deleteData("ItemDB", $searchInDB['id']);
            header('location:' . $_SERVER['HTTP_REFERER']);
        }else{
            array_push($_SESSION['message'], "Invalid Item");
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    }
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);
    }
?>
