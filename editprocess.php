<?php

    // add note function

    function saveedit($edit_id, $new_note_title, $new_note_body){
        require './database/connect.php';
        $date = date('F j, Y');
        $query = "UPDATE note SET noteTitle = '$new_note_title', note = '$new_note_body'
                    WHERE id = '$edit_id'";
        return mysqli_query($conn, $query);
    }

    // events

    if(isset($_REQUEST['id'])){
        saveedit($_REQUEST['id'], $_REQUEST['newTitle'], $_REQUEST['newNoteBody']);
        header ('Location: ./index.php');
    }

?>