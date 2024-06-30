<?php

$birthDay = date_create("2004/8/2");
$now = date_create("now");


$myAge = date_diff($birthDay, $now);


echo "<pre>";
print_r($myAge);
echo "</pre>";

echo "years: "  . $myAge->y;
echo "<br>";
echo "months: "  . $myAge->m;
echo "<br>";
echo "days: "  . $myAge->d;
echo "<br>";
echo "hours: "  . $myAge->h;
