<?php

require "connexionBd.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function isAllowed($perm)
{
    return isset($_SESSION['droits']) && array_key_exists($perm, $_SESSION['droits']);
}

function isLogged()
{
    return isset($_SESSION['connect']);
}

function veriferMail($mail){
    $bdd = getConnexion();
    $reqmail = $bdd->prepare("select * FROM user WHERE emailUser = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();
    if ($mailexist == 0) {
      $ouiNon = true;
    }else {
      $ouiNon = false;
    }
    return $ouiNon;
}

function creerUser($nomUser, $prenomUser, $emailUser, $mdpUser){
  $bdd = getConnexion();
  $salt = uniqid();
  $mdphash = sha1($mdpUser.$salt);
  $insertUser = $bdd->prepare("INSERT INTO user (nomUser, prenomUser, emailUser, mdpUser, saltUser) VALUES (?,?,?,?,?)");
  $insertUser->execute(array($nomUser,$prenomUser,$emailUser,$mdphash,$salt));

}
