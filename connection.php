<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: *");
  header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
  function getPDO(){

    $db_host = "http://localhost";
    $db_user = "tibamefe_since2021";
    $db_pass = "vwRBSb.j&K#E";
    $db_select = "tibamefe_tfd103g2";

    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    return $pdo = new PDO($dsn, $db_user, $db_pass);

  }

?>