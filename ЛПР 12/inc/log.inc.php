<?php
$dt = date("d:m:Y H:i:s");
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'] ?? '';
$path = "$dt|$page|$ref\n";
file_put_contents('log/path.log', $path, FILE_APPEND);

?>