<?php

include ("../config/db.php");

$manual_id = $_REQUEST['manual_id'];

$query = "DELETE FROM blocks WHERE section_id IN (SELECT section_id FROM sections WHERE manual_id=$manual_id);";
mysqli_query($link, $query);

$query = "DELETE FROM sections WHERE manual_id=$manual_id";
mysqli_query($link, $query);

$query = "DELETE FROM manuals WHERE manual_id=$manual_id";
mysqli_query($link, $query);

header('Location: ../panel/manuals.php');