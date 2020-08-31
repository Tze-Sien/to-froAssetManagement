<?php
	session_start();
	$_SESSION['message'] = []; 

	//viewTableData($tableName); loopID($tableName); 
	// filterData($tableName, $property, $cmpdata)
	//getDataByProperty($tableName, $property, $compareData);
	// require '../database/viewing_data.php'; 

	//deleteData($tableName, $id);
	require '../database/deleting_data.php';

	//createData($tableName, $data);
	require '../database/storing_data.php';

	//updateData($tableName, $idName, $dataID, $newData){
	require '../database/updating_data.php';

	$tableName = "AssetNameDB";
?>

<?php

	// 0. Moving Photo 
	$image_name = date('h-i-s').$_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
    $image_tmpname = $_FILES['image']['tmp_name'];
	$image_type = pathinfo($image_name, PATHINFO_EXTENSION);

    if( strlen($_FILES['image']['name']) > 0) {
		if( $image_type == "jpg" || $image_type == "png" || $image_type == "png" || $image_type == "jpeg" ||$image_type == "svg" || $image_type == "gif" ) {
            move_uploaded_file($image_tmpname, "../../resources/img/$image_name");
		}else{
			array_push($_SESSION['message'], "Image file only");
		}
    }else{
        array_push($_SESSION['message'], "Please Upload an Image");
    }

	// 1. Sanitize Data
	$assetName = htmlspecialchars($_POST['assetName']);
	$quantity = htmlspecialchars($_POST['quantity']);
	$photoFileName = $image_name;
	
	// 2. Validation
    if(strlen($assetName) == 0){
        array_push($_SESSION['message'], "Asset Name cannot be Empty");
    }
    
    if(strlen($quantity) == 0){
        array_push($_SESSION['message'], "Asset Quantity cannot be Empty");
    }	
	
	if(!$_SESSION['message']){
		
		// 3. Check if the Asset Name Exist
		if(getDataByProperty($tableName, "assetName", $assetName )){
			array_push($_SESSION['message'], "Asset Name exist! Please register with other Asset Name!");
		}else{
			
			// 3.1Generate Asset ID
			$a = 0;
			$i = 1;
			$asset = viewTableData($tableName); 
			foreach($asset as $key){
				$a++;
			}
			for($b = 0; $b < $a; $b++){
				foreach($asset as $key => $data){
					if($data['@assetNameId'] == $i){
						$i++;
					}
				}
			}     

			$array = [
				'@assetNameId' => $i,
				'assetName' => $assetName,
				'assetPhoto' => $photoFileName
			];
			
			// 4. Create an Asset
			createData($tableName, $array);

			// 5. Create Item
			// 5.1 Check the last existing Assets with same AssetNameId
			$filteredArray = filterData("ItemDB", "@assetNameId", $i);
			if(sizeof($filteredArray) == 0){
				// 5.2 Create New Id & Insert into Database
				for($h = 1; $h <= $quantity; $h++){
					$data = [
						'@itemId' => $i.$h,
						'@assetNameId' => $i,
						'availability' => true
					];
					createData("ItemDB", $data);
					header('location:' . $_SERVER['HTTP_REFERER']);
				}			
			}
		}
	}
?>

<?php
    // Error Helper
    if($_SESSION['message']){
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
?>
