<?php
    session_start();
    $_SESSION['message'] = [];
        
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
    $json = file_get_contents('php://input');
    $jsonDecode = json_decode($json); //userId;assetNameId;
    foreach($jsonDecode->assetNameId as $element){
        updateWithMultiple("TransDB","@userId", $jsonDecode->userId, "@assetNameId", $element, "pendingApprove");
    }
    
    $array = getFilteredKey("cartDB","userId", $jsonDecode->userId);
    foreach($array as $element){
        deleteData("cartDB", $element['key']);
    }

    echo json_encode($jsonDecode);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>