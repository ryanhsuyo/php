<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: *");
  header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
  function getPDO(){

    // $db_host = "127.0.0.1";
    // $db_user = "root";
    // $db_pass = "p@ssw0rd";
    // $db_select = "A_cake";
    $db_host = "w3epjhex7h2ccjxx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $db_user = "tpcdp5e9a1tquwz0";
    $db_pass = "s104xcrlaf2k65i8";
    $db_select = "ocwzm2vv4tro9w0w";
    // $dsn = "mysql://tpcdp5e9a1tquwz0:s104xcrlaf2k65i8@w3epjhex7h2ccjxx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ocwzm2vv4tro9w0w";
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;

    return $pdo = new PDO($dsn, $db_user, $db_pass);
    // return $pdo = new PDO($dsn);

  }

?>