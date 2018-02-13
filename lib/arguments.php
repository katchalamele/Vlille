<?php
//Auteurs: KATCHALA MELE Daouda et SACI Thileli
$requete = "https://opendata.lillemetropole.fr/api/records/1.0/search/?dataset=vlille-realtime&timezone=Europe/Paris&rows=250";
$args = array();
if(isset($_GET["nom"]) && $_GET["nom"] != ""){
  $args[] = "nom:".$_GET["nom"];
}
if(isset($_GET["commune"]) && $_GET["commune"] != ""){
  $args[] = "commune:".$_GET["commune"];
}

if(isset($_GET["nbVelosDispo"])){
  $args[] = "nbVelosDispo>=".$_GET["nbVelosDispo"];
}

if(isset($_GET["nbPlacesDispo"])){
  $args[] = "nbPlacesDispo>=".$_GET["nbPlacesDispo"];
}

if(isset($_GET["type"])){
  $args[] = "type:".$_GET["type"];
}

if(isset($_GET["etat"])){
  $args[] = "etat:".$_GET["etat"];
}

if(count($args) != 0){
  $requete .= "&q=".implode(" and ",$args);
}
?>
