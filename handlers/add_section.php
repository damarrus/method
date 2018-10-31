<?php

include ("../config/db.php");

$manual_id = mysqli_real_escape_string($link, $_POST['manual_id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$description = 'Описание раздела'; //mysqli_real_escape_string($link, $_POST['description']);
$position = mysqli_real_escape_string($link, $_POST['position']);

$query = "INSERT INTO sections SET 
            parent_id=NULL, 
            manual_id=$manual_id, 
            name='$name', 
            description='$description',
            position=$position";

mysqli_query($link, $query);
echo mysqli_insert_id($link);

//header("Location: ../panel/manual.php?id=$manual_id");