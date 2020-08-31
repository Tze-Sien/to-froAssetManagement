<?php
    include "../../includes/dbConnection.php";
    include "viewing_data.php";
?>
<?php

    function updateData($tableName, $idName, $dataID, $newData){
        global $database;
        $oldData = getDataByProperty($tableName, $idName, $dataID);
        $updates = $database->getReference($tableName."/".$oldData['id'])->update($newData);
    }
?>
