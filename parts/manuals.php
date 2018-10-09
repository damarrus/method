<?php

$query = "SELECT manual_id as id, name, description FROM manuals";
$result = mysqli_query($link, $query);
$manuals = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo '<h1>Методички</h1>';
echo '<ul>';
foreach ($manuals as $manual) {
    echo 
    '<li>
        <h2><a href="/panel/manual.php?id='.$manual['id'].'">'.$manual['id'].' '.$manual['name'].'</a></h2>
        <p>'.$manual['description'].'</p>
    </li>';    
}
echo '</ul>';

?>