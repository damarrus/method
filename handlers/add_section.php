<?php

include ('../db.php');

$parent_id = mysqli_real_escape_string($link, $_POST['parent_id']);
$manual_id = mysqli_real_escape_string($link, $_POST['manual_id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$description = mysqli_real_escape_string($link, $_POST['description']);

$query = "INSERT INTO sections SET 
            parent_id=$parent_id, 
            manual_id=$manual_id, 
            name='$name', 
            description='$description'";

mysqli_query($link, $query);

header("Location: /parts/manual_info.php?id=$manual_id" );