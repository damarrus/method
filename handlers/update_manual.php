<?php

include ("../config/db.php");

$manual_id = mysqli_real_escape_string($link, $_POST['manual_id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$description = mysqli_real_escape_string($link, $_POST['description']);

$query = "UPDATE manuals SET name='$name', description='$description' WHERE manual_id=$manual_id";
mysqli_query($link, $query);

header('Location: ../panel/manual.php?id=' . $manual_id);