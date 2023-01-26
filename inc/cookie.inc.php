<?php
$visitCounter = 0;
$visitCounter = $_COOKIE['visitCounter'] ?? 0;
$visitCounter++;
$lastVisit = "";
$date = date_create();
setcookie('visitCounter', $visitCounter);
setcookie('lastVisit', date_timestamp_get($date));

echo $visitCounter . "<br>";
echo $_COOKIE['lastVisit'];
?>