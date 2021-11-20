<?php
  include "connection.php";
  $pdo = getPDO();

  $memberId = htmlspecialchars($_POST["memberId"]);

  $sql = "SELECT * FROM A_cake.ORDER WHERE MEMBER_ID = ?;";

  $statement = $pdo->prepare($sql);
  $statement->bindValue(1, $memberId);
  $statement->execute();
  $data = $statement->fetchAll();

  echo json_encode($data);

?>