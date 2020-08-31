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
    //setSpecificProperty($tableName, $property, $setValue);
    require '../database/storing_data.php';
?>

<?php
    
    // Get Asset Name ID
    $assetNameId = htmlspecialchars($_GET['assetNameId']);
    // Check if the asset valid
    $result = getDataByProperty("ItemDB", "@assetNameId",  $assetNameId);
    $asset = getDataByProperty("AssetNameDB", "@assetNameId",  $assetNameId);
    if($result){
        $singleAsset = filterData("ItemDB", "@assetNameId", $assetNameId);
        if($singleAsset){

            // Check Available Amount
            $availablity = 0;
            foreach($singleAsset as $element) {
                if($element['availability'] == 'true') {
                    $availablity++;
                };
            }

            $response = [
                'availability' => $availablity,
                'data' => $singleAsset,
                'assetName' => $asset
            ];

            echo json_encode($response);
        }else{
            array_push($_SESSION['message'], "Asset out of stock, Kindly Purchase if needed!");
        }
    }else{
        array_push($_SESSION['message'], "Invalid Asset, Please Create One");
    }

?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);
    }
?>