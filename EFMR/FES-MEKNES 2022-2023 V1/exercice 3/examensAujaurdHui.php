<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>examens</title>
</head>
<body>
  <h1>liste des examens a passer le <?= date("d/m/Y")?></h1>
  <hr>
  <?php
  require "connection.php";

  $stm = $pdo->prepare("SELECT * from langage inner join Examen on langage.id = Examen.langage_id where date_examen = curdate()");
  $stm->execute();

  while($row = $stm->fetch(PDO::FETCH_OBJ)){
    ?>
    <h4><?=$row->nom?></h4>
    <p><?=$row->titre . "(" . $row->niveau . ")"?></p>
    <hr>
    <?php
  }
  
  ?>
</body>
</html>