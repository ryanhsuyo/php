<?php

    include "connection.php";

    $pdo = getPDO();

    $pdo->exec("SET NAMES UTF8"); 

    $sql = "SELECT * FROM CAKE;";

    $statement =  $pdo->query($sql);

    $data = $statement->fetchAll();

    echo json_encode($data);

    // echo "test123456";

?>
