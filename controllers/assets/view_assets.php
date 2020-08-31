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
    
    // Get User Data
    $allAssets = viewTableData("AssetNameDB");
    
    if($allAssets){
        // Send to Front-End Session
        $_SESSION['allAssets'] = $allAssets;
        echo json_encode($allAssets);
    }else{
        array_push($_SESSION['message'], "The is No Assets in you company yet! Try to Add it now!");
    }

?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);
    }
?>