<?php

    function deletepermanently($noteId){
        require './database/connect.php';
        $date = date('F j, Y');
        // remove from done note table
        $removeToDoneNotesQuery = "DELETE FROM donenotes WHERE id='$noteId'";
        // queries...
        mysqli_query($conn, $removeToDoneNotesQuery);
    }

    if(isset($_REQUEST['id'])){
        deletepermanently($_REQUEST['id']);
        header ('Location: ./donepage.php');
    }

?>