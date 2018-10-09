<?php

include ("../../../config/db.php");

$name = mysqli_real_escape_string($link, $_POST['name']);
$description = mysqli_real_escape_string($link, $_POST['description']);

$query = "INSERT INTO manuals SET name='$name', description='$description'";
mysqli_query($link, $query);

header('Location: ../../../panel/manual.php?id=' . mysqli_insert_id($link));