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
    // 1. Sanitize Search Query
    $query = htmlspecialchars($_POST['searchAssets']);
    
    // 2. Find Data with Same AssetName
    $result = getDataByProperty("AssetNameDB", "assetName", $query, true);

    // 3. Checking
    if( $result == "" ){
        $_SESSION['assetQuerySession'] = "Asset Not Found";
    }else{
        // 5. Sending Back to Front-End
        $_SESSION['assetQuerySession'] = $result;
    }

?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);
    }
?>