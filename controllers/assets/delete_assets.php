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

    $tableName = "AssetNameDB";
?>

<?php

    // 1. Sanitization
  
    $assetId = htmlspecialchars($_GET['assetId']);

    // 2. Validation
    if(strlen($assetId) == 0){
        array_push($_SESSION['message'], "Unexpected Error. Request invalid");
        header('location:' . $_SERVER['HTTP_REFERER']);
    }else{
        $searchInDB = getDataByProperty( $tableName, "@assetNameId", $assetId);
        if($searchInDB != NULL) {
            // 3. Delete the Asset Name
            deleteData($tableName, $searchInDB['id']);
            
            // 4. Delete items
            $searchItemDB = getFilteredKey("ItemDB","@assetNameId", $assetId);
            for($i = 0; $i < sizeof($searchItemDB); $i++){
                deleteData("ItemDB", $searchItemDB[$i]);
            }
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
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>
