<?php
//Auteur: KATCHALA  MELE Daouda et SACI Thileli

/*$configContext = array(
  'http' => array(
    'proxy' => 'tcp://cache.univ-lille1.fr:3128',
    'request_fulluri' => true
  )
);
stream_context_set_default($configContext);*/

//renvoie sous forme de tableau les données d'un fichier json
function json2Tab($json){
  $file = fopen($json, "r");
  $tab = json_decode(fgets($file));
  fclose($file);
  return $tab;
}

//revoie le code html d'une station mais pas en détails
function station2HtmlSmall($station){
  $libelle = $station->fields->libelle;
  $nom = $station->fields->nom;
  $commune = $station->fields->commune;
  $adresse = $station->fields->adresse;
  $lon = $station->fields->geo[0];
  $lat = $station->fields->geo[1];
  $type = $station->fields->type;
  $etat = $station->fields->etat;
  $etatConnexion = $station->fields->etatconnexion;
  $nbVelosDispo = $station->fields->nbvelosdispo;
  $nbPlacesDispo = $station->fields->nbplacesdispo;
  $res = '<div id = "'.$libelle.'" class = "station" data-libelle = "'.$libelle.'" data-nom ="'.$nom.'" data-commune = "'.$commune.'" data-adresse ="'.$adresse.'" data-lon = "'.$lon.'" data-lat = "'.$lat.'" data-type = "'.$type.'" data-etat = "'.$etat.'" data-etatConnexion = "'.$etatConnexion.'" data-nbVelosDispo = "'.$nbVelosDispo.'" data-nbPlacesDispo = "'.$nbPlacesDispo.'">'."\n";
  $res .= "<span class = \"titre\">".$nom."</span>\n";
  $res .= '<span class = "commune"> Commune: '.$commune.'</span>'."\n";
  $res .= '<span class = "veloDispo"> Vélos Disponibles: <span class = "nb">'.$nbVelosDispo."</span></span>\n";
  $res .= '<span class = "placesDispo"> Places Disponibles: <span class = "nb">'.$nbPlacesDispo."</span></span>\n";
  $res .= "</div>\n";
  return $res;
}

//renvoie le code html d'une station détaillée
function station2html($station){

}

//revoie une station à partir de son id
function stationById($id){
  $tab = json2Tab('https://opendata.lillemetropole.fr/api/records/1.0/search/?dataset=vlille-realtime&timezone=Europe/Paris&rows=250&q=recordid:'.$id);
  return $tab->records[0];
}
?>
