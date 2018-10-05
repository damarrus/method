<?php

//echo true;

//var_dump($_REQUEST);

include ('../db.php');

foreach ($_REQUEST['blocks'] as $block) {
    $data = serialize($block);
    $query = "UPDATE blocks SET parent_id={$section['parent_id']}, position={$section['position']}
              WHERE section_id={$section['section_id']}";
    mysqli_query($link, $query);
}

echo true;