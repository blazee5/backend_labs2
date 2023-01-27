<?php
$lines = file("log/path.log");
echo "<ul>";
foreach ($lines as $link) {
    echo "<li>$link</li>";
}
echo "</ul>";
?>