<?php
	session_start();
	$_SESSION['message'] = []; 

	//viewTableData($tableName); loopID($tableName); 
	// filterData($tableName, $property, $cmpdata)
	//getDataByProperty($tableName, $property, $compareData);
	// require '../database/viewing_data.php'; 

	//deleteData($tableName, $id);
	require '../database/deleting_data.php';

	//createData($tableName, $data);
	require '../database/storing_data.php';

	//updateData($tableName, $idName, $dataID, $newData){
	require '../database/updating_data.php';

	$tableName = "AssetNameDB";
?>

<?php

	// 1. Sanitize Data
    $assetNameId = htmlspecialchars($_GET['assetNameId']);
    
	// 2. Validation
    if(strlen($assetNameId) == 0){
        array_push($_SESSION['message'], "Invalid Adding Request");
    }
	
	if(!$_SESSION['message']){
					
        // 3.1 Get the item by comparing $assetNameId  
        $filteredItem = filterData("ItemDB", "@assetNameId", $assetNameId);
        if(sizeof($filteredItem) != 0){
            $newItemId = end($filteredItem)['@itemId'] + 1;
            $array = [
                '@assetNameId' => $assetNameId,
                '@itemId' => $newItemId,
                'availability' => true,
            ];
        }else{
            array_push($_SESSION['message'], "Invalid Assset!");
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
                
        // 4. Create an Item
        createData("ItemDB", $array);
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
    
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>
