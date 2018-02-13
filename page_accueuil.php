<?php
//Auteurs: KATCHALA MELE Daouda et SACI Thileli
require_once("lib/fonctions.php");
require_once("lib/arguments.php");

$tab = json2Tab($requete);

if($tab->nhits == 0){
  require("page_erreur.html");
  exit();
}
?>
<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
  <title>Stations V'lille</title>
  <meta name = "authors" content = "KATCHALA MELE Daouda et SACI Thileli"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
  <link rel="stylesheet" href="data/stations.css"/>
  <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
  <script src="data/scriptCarte.js"></script>
  <script src="data/VliveImage.js"></script>
    <script src="data/stations.js"></script>
  </head>
  <body>
    <div id = "stations" class ="colonne">
      <h2>Liste des stations</h2>
      <p>cliquez <a href="formulaire-recherche.html">ici</a> pour filter les stations</p>
      <p>il ya <?php echo $tab->nhits; ?> Stations</p>
      <?php
      foreach ($tab->records as $station) {
        echo station2HtmlSmall($station);
      }
      ?>
    </div>
    <div class = "colonne">
      <div id = "cartevlille" class = "droite">
      </div>
      <div id = "descriptions" class = "droite">
        <div id = "description">
        </div>
        <div id = "mini-carte">
        </div>
      </div>
  </div>
  </body>
</html>
