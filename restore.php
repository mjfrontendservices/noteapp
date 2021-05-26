<?php

    // add note function

    function restore($restorable_note_id, $noteTitle, $noteBody){
        require './database/connect.php';
        $date = date('F j, Y');
        $query = "INSERT INTO note (noteTitle, note, date)
                    VALUES ('$noteTitle', '$noteBody', '$date')";
        $remove_from_restobalenotes = "DELETE FROM restorablenotes WHERE id = '$restorable_note_id'";
        mysqli_query($conn, $remove_from_restobalenotes);
        mysqli_query($conn, $query);
    }

    // events

    if(isset($_REQUEST['id']) && isset($_REQUEST['note_title']) && isset($_REQUEST['note_body'])){
        restore($_REQUEST['id'], $_REQUEST['note_title'], $_REQUEST['note_body']);
        header ('Location: ./deletedpage.php');
    }

?>