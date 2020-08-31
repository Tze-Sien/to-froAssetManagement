<?php

    include("../../includes/dbConnection.php");
    
    $tableName = "UserID";
    $property = "name";

    // 1. View Whole Table
    // Return Associative Array
    function viewTableData($tableName) {
        global $database;
        return $database->getReference($tableName)->getValue();
    }

    // 2. getKey by filtering
    function getFilteredKey($tableName,$property, $cmpdata) {
        $filteredKeyArray = [];
        $table = viewTableData($tableName);
        foreach($table as $element => $data) {
            if($data["$property"] == $cmpdata){
                $instances = [
                    'key' =>  $element,
                    'data' => $data
                ];
                array_push($filteredKeyArray, $instances);
            }
        }
        return $filteredKeyArray;
    }

    // 3. Get Element Details
    function filterData($tableName, $property, $cmpdata){
        $table = viewTableData($tableName);
        $filteredArray = [];
        foreach($table as $element => $data) {
            if($data["$property"] == $cmpdata){
                array_push($filteredArray, $data);
            }
        }

        return $filteredArray;
    }

    // 4. Compare Property and Return that element
    function getDataByProperty($tableName, $property, $compareData, $strict = false){
        
        // Get the whole table data
        $table = viewTableData($tableName);
        
        // Loop through each element
        foreach($table as $element => $data) {
            if($element){
                // Compare property value
                if($strict == true) {
                    if( str_replace(" ", "",(strtolower($data["$property"]))) == str_replace( " ", "",trim(strtolower($compareData) ))){
                        // Returning that row of data in Array
                        return [
                            'id' => $element,
                            'data' => $data
                        ];
                    }
                }else{
                    if($data["$property"] == $compareData){
                        // Returning that row of data in Array
                        return [
                            'id' => $element,
                            'data' => $data
                        ];
                    }
                }
                
            }
        }

        return NULL;
    }

    // 5. View with Multiple Conditions
    function viewMulCondition($tableName,$property, $cmpdata, $property2, $cmpdata2) {
        global $database;
        $filteredKeyArray = [];
        $table = viewTableData($tableName);
        $newUpdate = [
            'status' => $status
        ];
        foreach($table as $element => $data) {
            if($data["$property"] == $cmpdata && $data["$property2"] == $cmpdata2){
                $output = [
                    "key" => $element,
                    "data" => $data
                ];
                array_push($filteredKeyArray, $output);
            }
        }
        return $filteredKeyArray;
    }
    
?>