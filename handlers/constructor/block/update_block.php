<?php

include ("../../../config/db.php");

$block_id = mysqli_real_escape_string($link, $_POST['block_id']);
$content = $_POST['content'];

$content = serialize($content);

$query = "UPDATE blocks SET content='$content' WHERE block_id=$block_id";
mysqli_query($link, $query);

echo true;