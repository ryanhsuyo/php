<?php

    include "connection.php";

    $pdo = getPDO();

    $memberId = htmlspecialchars($_POST["memberId"]);
    $name = htmlspecialchars($_POST["name"]);
    $nickname = htmlspecialchars($_POST["nickname"]);
    $birthday = htmlspecialchars($_POST["birthday"]);
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["address"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $password = htmlspecialchars($_POST["password"]);

    $sql = "UPDATE `A_cake`.`MEMBER` SET `NAME` = ?, `NICKNAME` = ?, `BIRTHDAY` = ?, `EMAIL` = ?, `ADDRESS` = ?, `PHONE` = ?, `PASSWORD` = ? WHERE MEMBER_ID = ?;";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $name);
    $statement->bindValue(2, $nickname);
    $statement->bindValue(3, $birthday);
    $statement->bindValue(4, $email);
    $statement->bindValue(5, $address);
    $statement->bindValue(6, $phone);
    $statement->bindValue(7, $password);
    $statement->bindValue(8, $memberId);
    $statement->execute();

    echo $phone;

?>
