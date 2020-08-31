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

	//1. Sanitize Data
	$email = strtolower(htmlspecialchars($_POST['email']));
	$password = htmlspecialchars($_POST['password']);
	
	//2. Validation
	if(strlen($email) == 0){
        array_push($_SESSION['message'], "Email cannot be Empty");
	}
	
	if(strlen($password) == 0){
        array_push($_SESSION['message'], "Password cannot be Empty");
	}

	// 3. Encrypt the password
	$encPassword = md5($password);
	// 4. Check if the Email and Password Correct
	if(sizeof($_SESSION['message']) == 0){
		$result = getDataByProperty("UserDB", "email", $email);
		if($encPassword == $result['data']['password']){
			unset($result['data']['password']);
			$_SESSION['user'] = $result['data'];
			if($result['data']['isAdmin'] == true) {
				header("location: /views/admin/dashboard.php");
			}else{
				header("location: /views/user/items_catalog.php");
			}
		}else{
			array_push($_SESSION['message'], "Email and Password Not Match. Please Try Again!");
		}
	}

?>

<?php
    // Error Helper
    if($_SESSION['message']){
		var_dump($_SESSION['message']);
		header("location: /");
	}
?>