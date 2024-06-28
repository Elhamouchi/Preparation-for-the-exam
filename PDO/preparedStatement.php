<?php
include "connection.php";

// $sql = 'INSERT INTO users VALUES(?,?,?)';

// $statement = $pdo->prepare($sql);
// $statement->execute(['Sandra', 'Aamodklt', "sdfwe"]);

// =================== Using named placeholders


// $sql = 'INSERT INTO users VALUES(:Uname,:email,:pass)';

// $statement = $pdo->prepare($sql);
// $statement->execute(["Uname"=> "anass", ":email"=> "a@g.net", ":pass"=> "asdfw"]);


// =================== Bound values

$sql = 'INSERT INTO users VALUES(:name,:email,:pass)';

$statement = $pdo->prepare($sql);
$statement->bindValue("name", "ahmed");
$statement->bindValue("email", "ahmed@g.com");
$statement->bindValue("pass", "ahmed@g.com");
$statement->execute();


