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
    $userId = htmlspecialchars($_GET['userId']);

    // 2. Validation
    if(strlen($userId) == 0){
        array_push($_SESSION['message'], "Unexpected Error. Please login before sending request");
        header('location:' . $_SERVER['HTTP_REFERER']);
    }else{
        $searchInDB = getDataByProperty("UserDB", "@userId", $userId);
        if($searchInDB != NULL) {
            deleteData("UserDB", $searchInDB['id']);
            header('location:' . $_SERVER['HTTP_REFERER']);
        }else{
            array_push($_SESSION['message'], "Invalid Item");
        }
        
    }
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>
