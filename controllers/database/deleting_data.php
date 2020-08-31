<?php
    include("../../includes/dbConnection.php");
    
    function deleteData($table, $id) {
        global $database;
        $removeData = $database->getReference("/" . $table . "/" . $id)->remove();
    }

?>