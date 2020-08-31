<?php
    session_start();
    $_SESSION['message'] = [];
        
    //viewTableData($tableName); 
    //loopID($tableName); 
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
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = strtolower(htmlspecialchars($_POST['email']));
    $password = htmlspecialchars($_POST['password']);
    $isAdmin = false;


    // 2. Validation
    if(strlen($firstName) == 0){
        array_push($_SESSION['message'], "First Name cannot be Empty");
    }
    
    if(strlen($lastName) == 0){
        array_push($_SESSION['message'], "Last Name cannot be Empty");
    }
    
    if(strlen($email) == 0){
        array_push($_SESSION['message'], "Email cannot be Empty");
    }
    
    if(strlen($password) < 6){
        array_push($_SESSION['message'], "Password cannot be less than 6 characters");
    }
    
    // 3. Add User to Database
    if(!$_SESSION['message']){
        // 3.1 Check if Email Exist
        if(getDataByProperty("UserDB", "email", $email)){
            array_push($_SESSION['message'], "Email exist! Please register with other Email!");
            
        }else{
            // 3.2 Generate UserID
            $a = 0;
            $i = 1;
            $user = viewTableData("UserDB"); 
            foreach($user as $key){
                $a++;
            }
            for($b = 0; $b < $a; $b++){
                foreach($user as $key => $data){
                    if($data['@userId'] == $i){
                        $i++;
                    }
                }
            }            

            // 3.3 Create an Associative Array
            $array = [
                '@userId' => $i,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => md5($password),
                'isAdmin' => false
            ];

            // 3.4 Create User
            createData("UserDB", $array);
            header('location:' . $_SERVER['HTTP_REFERER']);
        }  
    }
    
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        var_dump($_SESSION['message']);
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>