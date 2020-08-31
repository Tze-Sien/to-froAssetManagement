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
    $tempAllUsers = viewTableData("UserDB");
    
    // Clear Secured Data
    if($tempAllUsers){
        foreach($tempAllUsers as $element => $data) {
            unset($tempAllUsers[$element]["password"]);
            unset($tempAllUsers[$element]["isAdmin"]);
        }
        // Send to Front-End Session
        $_SESSION['allUsers'] = $tempAllUsers;
        
        echo json_encode($tempAllUsers);
    }else{
        array_push($_SESSION['message'], "Empty User Database");
    }
    
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);
    }
?>