<?php
require('_app/Config.inc.php');
include 'inc/header.php';

$url = (isset($_GET['url'])) ? $_GET['url'] : 'inc/lista.php';
$url = array_filter(explode('/', $url));
$file = 'inc/' . $url[0] . '.php';

if (is_file($file)) {
    include $file;
}else{
    include 'inc/lista.php';
}

include 'inc/footer.php';
