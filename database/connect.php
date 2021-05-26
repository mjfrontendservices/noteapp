<?php

    $conn = mysqli_connect(
        'localhost',
        'root',
        '24377965donzki',
        'notes'
    );
    if(!$conn){
        echo 'Database connection error';
    }

?>