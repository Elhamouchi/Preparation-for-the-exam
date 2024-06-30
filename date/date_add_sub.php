<!-- 
This function is an alias of: DateTime::add()

-->

<?php 
include "./date_interval_create_from_date_string.php";
$date = date("d/m/y");

$create_date = date_create();

var_dump($date);


echo "<pre>";

var_dump($create_date);

echo"</pre>";

date_add($create_date, $interval);

echo "<h1>after add date</h1>";
echo "<pre>";

var_dump($create_date);

echo"</pre>";

date_sub($create_date, $interval);
echo "<h1>after sub date</h1>";
echo "<pre>";

var_dump($create_date);

echo"</pre>";

?>