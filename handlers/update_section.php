<?php

include ('../config/db.php');

$section_id = mysqli_real_escape_string($link, $_POST['section_id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$description = mysqli_real_escape_string($link, $_POST['description']);

$query = "UPDATE sections SET name='$name', description='$description' WHERE section_id=$section_id";
mysqli_query($link, $query);

header('Location: ../panel/section.php?id=' . $section_id);