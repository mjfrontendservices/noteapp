<?php

    function done($noteId, $noteTitle, $noteBody){
        require './database/connect.php';
        $date = date('F j, Y');
        // add to the done notes table
        $addToDoneQuery = "INSERT INTO donenotes (noteTitle, note, date)
                            VALUES ('$noteTitle', '$noteBody', '$date')";
        // remove from note table
        $removeToNotesQuery = "DELETE FROM note WHERE id='$noteId'";
        // queries...
        mysqli_query($conn, $addToDoneQuery);
        mysqli_query($conn, $removeToNotesQuery);
    }

    if(isset($_REQUEST['id']) && isset($_REQUEST['note_title']) && isset($_REQUEST['note_body'])){
        done($_REQUEST['id'], $_REQUEST['note_title'], $_REQUEST['note_body']);
        header ('Location: ./index.php');
    }

?>