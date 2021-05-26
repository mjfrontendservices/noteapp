<?php

    // add note function

    function undone($done_note_id, $noteTitle, $noteBody){
        require './database/connect.php';
        $date = date('F j, Y');
        $query = "INSERT INTO note (noteTitle, note, date)
                    VALUES ('$noteTitle', '$noteBody', '$date')";
        $remove_from_done = "DELETE FROM donenotes WHERE id = '$done_note_id'";
        mysqli_query($conn, $remove_from_done);
        mysqli_query($conn, $query);
    }

    // events

    if(isset($_REQUEST['id']) && isset($_REQUEST['note_title']) && isset($_REQUEST['note_body'])){
        undone($_REQUEST['id'], $_REQUEST['note_title'], $_REQUEST['note_body']);
        header ('Location: ./index.php');
    }

?>