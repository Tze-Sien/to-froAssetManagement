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
    $due = htmlspecialchars($_GET['due']);

    $newData = [
        "availability" => 'true'
    ];
    // Make the item available
    updateData("ItemDB", "@itemId", $itemId, $newData);
    updateWithMultiple("TransDB","@itemId", $itemId, "@userId", $userId, "returned");
    header('location:' . $_SERVER['HTTP_REFERER']);

    // if Due set the status to payment, and make the book available
  
    // else, set the status to returned, and make the book available   
    // updateWithMultiple("TransDB","@itemId", $itemId, "@userId", $userId, "pendingReturn");
    
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>