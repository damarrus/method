<?php

include ("../config/db.php");

$manual_id = $_REQUEST['manual_id'];

$query = "DELETE FROM manuals WHERE manual_id=$manual_id";
mysqli_query($link, $query);

header('Location: ../panel/manuals.php');