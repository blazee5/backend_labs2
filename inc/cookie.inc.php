<?php
$visitCounter = 0;
$visitCounter = $_COOKIE['visitCounter'] ?? 0;
$visitCounter++;
$lastVisit = "";
$date = date("d:m:Y");
setcookie('visitCounter', $visitCounter);
setcookie('lastVisit', $date);
?>