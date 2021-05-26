<?php

    function delete($noteId, $noteTitle, $noteBody){
        require './database/connect.php';
        $date = date('F j, Y');
        // add to the done notes table
        $addToRestorableNoteQuery = "INSERT INTO restorablenotes (noteTitle, note, date)
                            VALUES ('$noteTitle', '$noteBody', '$date')";
        // remove from note table
        $removeToNotesQuery = "DELETE FROM note WHERE id='$noteId'";
        // queries...
        mysqli_query($conn, $addToRestorableNoteQuery);
        mysqli_query($conn, $removeToNotesQuery);
    }

    if(isset($_REQUEST['id']) && isset($_REQUEST['note_title']) && isset($_REQUEST['note_body'])){
        delete($_REQUEST['id'], $_REQUEST['note_title'], $_REQUEST['note_body']);
        header ('Location: ./index.php');
    }

?>