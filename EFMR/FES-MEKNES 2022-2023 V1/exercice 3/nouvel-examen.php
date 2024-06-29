<?php
require "connection.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
  $sql = "INSERT into Examen(nom , langage_id, niveau, date_examen) values(:nom, :langeid, :niv, :dateEx)";


  if(isset($_POST["nom"], $_POST["lang"], $_POST["niveau"], $_POST["date"])){
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
      [
      "nom"=> $_POST["nom"],
      "langeid"=> $_POST["lang"],
      "niv"=> $_POST["niveau"],
      "dateEx"=> $_POST["date"]
    ]);
  }

  
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    Nom: <br>
    <input type="text" placeholder="Nom de l'examen" name="nom"> <br>
    Langage: <br>
    <select name="lang">
      <?php
        $stm = $pdo->query("SELECT * from Langage");
        $stm->execute();

        while($row = $stm->fetch(PDO::FETCH_OBJ)){
          ?>
          <option value="<?=$row->id?>"><?=$row->titre?></option>
          <?php
        }
      ?>
    </select> <br>
    
    Niveau:
    
    <input type="radio" name="niveau" value="Debetant"> Debetant <br>
    <input type="radio" name="niveau" value="Moyen"> Moyen <br>
    <input type="radio" name="niveau" value="Avance"> Avance <br>
    date de l'exament: <br>
    <input type="date" name="date">
    <br>
    <input type="submit" value="Ajauter">
  </form>
</body>
</html>