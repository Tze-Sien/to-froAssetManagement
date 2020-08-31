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

?>

<?php
    
    // 1. Sanitize New Data
    $userId = htmlspecialchars($_POST['userId']);
    $newFirstName = htmlspecialchars($_POST['firstName']);
    $newLastName = htmlspecialchars($_POST['lastName']);
    $newPassword = htmlspecialchars($_POST['password']);
    
    // 2. Validation
    if(strlen($newFirstName) == 0){
        array_push($_SESSION['message'], "First Name cannot be Empty");
    }
    if(strlen($newLastName) == 0){
        array_push($_SESSION['message'], "Last Name cannot be Empty");
    }
    if(strlen($newPassword)> 0 && strlen($newPassword) < 6){
        array_push($_SESSION['message'], "Password cannot be less than 6 characters");
    }

    // 3. Password Encrypt
    $encNewPassword = md5($newPassword);

    // 4. Update Data
    if($_SESSION['message'] == NULL) {
        // 5. Create Updated Data
        if(strlen($newPassword)>= 6){
            $newData = [
                'firstName' => $newFirstName,
                'lastName' => $newLastName,
                'password' => $encNewPassword
            ];
        }else{
            $newData = [
                'firstName' => $newFirstName,
                'lastName' => $newLastName,
            ];
        }

        // 6. Update Data
        updateData("UserDB", "@userId", $userId, $newData);
        header('location:' . $_SERVER['HTTP_REFERER']);
    }else{
        array_push($_SESSION['message'], "Update Failed! Please Try Again");
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

?>

<?php
    // Error Helper
    // if($_SESSION['message']){
    //     var_dump($_SESSION['message']);
        
    // }
?>