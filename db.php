<?php

$link = mysqli_connect("localhost", "root", "", "manual");
//$link = mysqli_connect("localhost", "id7358100_root", "123456", "id7358100_manual");
mysqli_set_charset($link, 'utf8');

function dump($object) {echo '<pre>';var_dump($object);echo '</pre>';}