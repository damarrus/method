<?php

include ("../../../config/db.php");

$block_id = mysqli_real_escape_string($link, $_POST['block_id']);

$query = "DELETE FROM blocks WHERE block_id=$block_id";

mysqli_query($link, $query);
if (mysqli_error($link)) {
    echo false;
} else {
    echo true;
}
