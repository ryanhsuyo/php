<?php
  include "connection.php";
  $pdo = getPDO();


  $sql = "SELECT * FROM A_cake.ACCESSORIES WHERE CATEGORY = 2;SELECT * FROM A_cake.ACCESSORIES;";
 

  $statement = $pdo->prepare($sql);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>