<?php
$date = date_create("now", timezone_open("Africa/Casablanca"));


var_dump(date_timezone_get($date));

var_dump(timezone_open("Africa/Casablanca"))

?>