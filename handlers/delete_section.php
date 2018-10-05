<?php

include ("../config/db.php");


$section_id = mysqli_real_escape_string($link, $_POST['section_id']);

$query = "DELETE FROM sections WHERE section_id=$section_id";

mysqli_query($link, $query);
if (mysqli_error($link)) {
    echo false;
} else {
    echo true;
}
