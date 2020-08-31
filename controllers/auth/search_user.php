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
    $query = htmlspecialchars($_POST['searchUser']);
    
    // 2. Find Data with Same UserID
    $result = getDataByProperty("UserDB", "@userId", $query);
    // 3. Checking
    if($result == "" ){
        $_SESSION['userQuerySession'] = "User Not Found";
    }else{

        // 4. Set Secure Data Null
        unset($result['data']['password']);
        unset($result['data']['isAdmin']);
        
        // 5. Sending Back to Front-End
        $_SESSION['userQuerySession'] = $result;
        
    }

    echo json_encode($result);
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);

    }
?>