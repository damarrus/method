<?php



$query = "SELECT manual_id as id, name, description FROM manuals";
$result = mysqli_query($link, $query);
$manuals = mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($manuals as $manual) {
    echo 
    '<div>
        <h2><a href="/parts/manual_info.php?id='.$manual['id'].'">'.$manual['id'].' '.$manual['name'].'</a></h2>
        <p>'.$manual['description'].'</p>
    </div>';    
}

?>