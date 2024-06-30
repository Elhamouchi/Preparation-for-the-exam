<!-- 
checkdate(int $moonth, int day, int year);

Checks the validity of the date formed by the arguments. A date is considered valid if each parameter is properly defined.

Parameters 
month
The month is between 1 and 12 inclusive.

day
The day is within the allowed number of days for the given month. Leap years are taken into consideration.

year
The year is between 1 and 32767 inclusive.


Return Values 
Returns true if the date given is valid; otherwise returns false
-->


<?php
echo "\n";
var_dump(checkdate(12, 12, 12)); // bool(true);
echo "\n";

var_dump(checkdate(-1, 14, 2024)); // bool(false)

echo "\n";
var_dump(checkdate(2, 31, 2024)); // bool(false)

echo "\n";
var_dump(checkdate(3, 3, 32767)); // bool(true);

echo "\n";
var_dump(checkdate(3, 3, 32768)) // bool(false);



?>