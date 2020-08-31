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
    $json = file_get_contents('php://input');
    $jsonDecode = json_decode($json); //userId; assetNameId ;assetName; quantity;

    // 2. Check available item and mark them as unavailable, after mark, add the item into transaction db instantly
    function updateDataMulCondition($userId,$tableName, $idName, $dataID, $propertyName, $propertyValue, $setCondition, $quantity){
        global $database;
        global $jsonDecode;
        $table = viewTableData($tableName);
        $count = 0;
        $cart = [
            "userId" =>  $userId,
            "assetNameId" => $jsonDecode->assetNameId,
            "assetName" => $jsonDecode->assetName,
            "quantity" => $quantity
        ];
        createData("cartDB", $cart);
        foreach($table as $element => $data){
            // echo $data["@assetNameId"];
            // find assetNameId && availability 
            if($data[$idName] == $dataID && $data[$propertyName] == $propertyValue){
                $array = [
                    'availability' => "$setCondition"
                ];
                $transaction = [
                    "@userId" => $userId,
                    "@itemId" => $data["@itemId"],
                    "@assetNameId" => $data["@assetNameId"],
                    "assetName" => $jsonDecode->assetName,
                    "status" => "cart",
                    "dueDate" => "",
                    "penalty" => ""
                ];
               
                updateData($tableName, "@itemId", $data["@itemId"], $array);
                createData("TransDB", $transaction);
                
                $count++;
                if($count == $quantity){
                    break;
                }
            }
        }
    }   
    updateDataMulCondition($jsonDecode->userId, "ItemDB", "@assetNameId", $jsonDecode->assetNameId, "availability", "true", "false", $jsonDecode->quantity);

    // 3. Sending Response
    echo json_encode($jsonDecode);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>