<?php
    include "../../includes/dbConnection.php";
    include "../../controllers/database/viewing_data.php";
?>
<?php

    function updateData($tableName, $idName, $dataID, $newData){
        global $database;
        $oldData = getDataByProperty($tableName, $idName, $dataID);
        $updates = $database->getReference($tableName."/".$oldData['id'])->update($newData);
    }

    // Update by comparing 2 parameters
    function updateWithMultiple($tableName,$property, $cmpdata, $property2, $cmpdata2, $status) {
        global $database;
        $filteredKeyArray = [];
        $table = viewTableData($tableName);
        $newUpdate = [
            'status' => $status
        ];
        foreach($table as $element => $data) {
            if($data["$property"] == $cmpdata && $data["$property2"] == $cmpdata2){
                $updates = $database->getReference("TransDB"."/".$element)->update($newUpdate);
            }
        }
        return $filteredKeyArray;
    }
?>
