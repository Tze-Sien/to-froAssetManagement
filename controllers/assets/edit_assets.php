<?php
    session_start();
    $_SESSION['message'] = []; 

    //viewTableData($tableName); loopID($tableName); 
    //loopData($tableName); 
    //getDataByProperty($tableName, $property, $compareData);
    // require '../database/viewing_data.php'; 
    
    //deleteData($tableName, $id);
    require '../database/deleting_data.php';
    
    //createData($tableName, $data);
    require '../database/storing_data.php';

    //updateData($tableName, $idName, $dataID, $newData){
    require '../database/updating_data.php';

    $tableName = "AssetNameDB";
    $newData = [];
?>

<?php

    // 0. Moving Photo 
    $image_name = date('h-i-s').$_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmpname = $_FILES['image']['tmp_name'];
    $image_type = pathinfo($image_name, PATHINFO_EXTENSION);

    if( strlen($_FILES['image']['name']) > 0) {
		if( $image_type == "jpg" || $image_type == "png" || $image_type == "png" || $image_type == "jpeg" ||$image_type == "svg" || $image_type == "gif" ) {
            move_uploaded_file($image_tmpname, "../../resources/img/$image_name");
		}else{
            array_push($_SESSION['message'], "Image file only");
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
        
        $newData['assetPhoto'] = $image_name;
    }
    
    // 1. Sanitize New Data
    $assetNameId = htmlspecialchars($_POST['assetNameId']);
    $newAssetName = htmlspecialchars($_POST['assetName']);

    // 2. Validation
    if(strlen($newAssetName) == 0){
        array_push($_SESSION['message'], "Asset Name cannot be Empty");
    }

    // 4. Update Data
    if($_SESSION['message'] == NULL) {
        // 5. Create Updated Data
        $newData['assetName'] = $newAssetName;
        
        // 6. Check if asset exist
        $getResult = getDataByProperty($tableName, "assetName", $newAssetName);
        if( $getResult && $getResult['data']['@assetNameId'] != $assetNameId ){
            array_push($_SESSION['message'], "Asset Name Exist, Please use other Asset Name");
            header('location:' . $_SERVER['HTTP_REFERER']);
        }else{
            // 7. Update Data
            updateData($tableName, "@assetNameId", $assetNameId , $newData);
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