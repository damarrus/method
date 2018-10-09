<?php

include ("../config/db.php");
include ('../parts/func.php');

$section_id = mysqli_real_escape_string($link, $_POST['section_id']);
$block_type_id = mysqli_real_escape_string($link, $_POST['block_type_id']);

$query = "INSERT INTO blocks SET section_id=$section_id, block_type_id=$block_type_id,
          position=(SELECT (IF(MAX(position) IS NULL, 0, MAX(position)+1)) FROM (SELECT * FROM blocks) AS something WHERE section_id=$section_id)";
mysqli_query($link, $query);

printBlock($block_type_id, mysqli_insert_id($link));
