<?php
DEFINE('DB_HOST',"localhost");
DEFINE('DB_NAME',"imprimante");
DEFINE('DB_USER',"root");
DEFINE('DB_PASS',"");

function getConnexion(){
  static $dbb = null;
  if ($dbb===null) {
    try{
    $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME."";
    $dbb = new PDO ($connectionString, DB_USER, DB_PASS);
    $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    die('Erreur : ' . $e->getMessage());
  }
  }
    return $dbb;
}
