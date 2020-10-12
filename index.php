<?php
include 'includes/header.php';

$url = (isset($_GET['url'])) ? $_GET['url'] : "includes/lista.php";
$url = array_filter(explode('/', $url));
$file = 'includes/' . $url[0] . '.php';

if (is_file($file)) {
    include $file;
}else{
    include "includes/lista.php";
}

include 'includes/footer.php';
