<?php

$manual_id = mysqli_real_escape_string($link, $_GET['id']);

$query = "SELECT * FROM manuals WHERE manual_id=$manual_id";
$result = mysqli_query($link, $query);
$manual = mysqli_fetch_assoc($result);

$sections = getSections($link, $manual_id);
$sections = $sections ? $sections : [];

printViewSections($sections);