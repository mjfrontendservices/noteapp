<?php

    // add note function

    function addNote($noteTitle, $noteBody){
        require './database/connect.php';
        $date = date('F j, Y');
        $query = "INSERT INTO note (noteTitle, note, date)
                    VALUES ('$noteTitle', '$noteBody', '$date')";
        return mysqli_query($conn, $query);
    }

    // events

    if(isset($_REQUEST['add'])){
        addNote($_REQUEST['note_title'], $_REQUEST['note_body']);
        header ('Location: ./index.php');
    }

?>