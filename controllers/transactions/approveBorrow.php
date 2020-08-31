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
    $userId = htmlspecialchars($_GET['userId']);
    $itemId = htmlspecialchars($_GET['itemId']);

    // add 3 days to date
    $dueDate=Date('yy.d.m', strtotime('+7 days'));

    
    updateWithMultiple("TransDB","@itemId", $itemId, "@userId", $userId, $dueDate, "dueDate");
    updateWithMultiple("TransDB","@itemId", $itemId, "@userId", $userId, "pendingReturn");
    header('location:' . $_SERVER['HTTP_REFERER']);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>