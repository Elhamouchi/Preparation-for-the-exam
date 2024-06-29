<!-- ferch -->


<?php
require_once "connection.php";
$sql = "SELECT * FROM users";
/*

$stmt = $pdo->prepare($sql);

$stmt->execute();

echo "<pre>";
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
  var_dump($row);
  echo $row->user_name . "<br>";
  echo $row->user_email . "<br>";

}

echo "</pre>";


*/
?>


<!-- fetch All -->

<?php

  // $stmt = $pdo->prepare($sql);

  // $stmt->execute();
  // $user_table = $stmt->fetchAll(PDO::FETCH_OBJ);

  // echo "<pre>";
  // var_dump($user_table);
  // echo"</pre>";
?>


<!-- fetch column -->

<?php

// $stmt = $pdo->prepare($sql);

//   $stmt->execute();


//   while($user_name = $stmt->fetchColumn(1)){
//     var_dump($user_name);
//   };

?>


<!-- fetch object -->


<?php


// class User{
//   public $user_name,$user_email, $user_password;
  
//   function sayHi(){
//     echo "hello " . $this->user_name;
//   }
// }


// $stmt = $pdo->prepare($sql);

// $stmt->execute();

// do($obj = $stmt->fetchObject("USER")){
//   echo $obj;
// }while($obj);





// do {
//   $obj = $stmt->fetchObject("USER");
//   echo "<pre>";
//   var_dump($obj);
//   if($obj){
//     $obj->sayHi();
//   }
//   echo"</pre>";
// }while($obj);
?>



<!-- PDO FETCH_KEY_PAIR -->

<?php

$sql = "SELECT user_name, user_password FROM users";


$stm = $pdo->prepare($sql);
$stm->execute();
$users_password = $stm->fetchAll(PDO::FETCH_KEY_PAIR);


var_dump($users_password)

?>


<select name="Upass">
  <?php foreach ($users_password as $user=>$pass):?>
  <option value="<?=$pass?>"><?=$user?></option>
  <?php endforeach; ?>
</select>