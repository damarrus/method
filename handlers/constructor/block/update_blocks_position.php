<?php

include ("../../../config/db.php");

foreach ($_REQUEST['blocks'] as $block) {
    $query = "UPDATE blocks SET position={$block['position']} WHERE block_id={$block['block_id']}";
    mysqli_query($link, $query);
} 

echo true;