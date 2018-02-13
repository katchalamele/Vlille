//Auteurs: KATCHALA MELE Daouda et SACI Thileli
//variables globales
var stations=null;
var descript=null;
var miniMap=null;
var first=null;

var setupListeners = function(){
  stations = document.querySelectorAll(".station");
  descript = document.getElementById("description");
  for(var i = 0; i< stations.length; i++){
    stations[i].addEventListener("click", displayStation);
    stations[i].addEventListener("click", dessinerMiniCarte);
  }
  first = document.querySelector("#stations div").className += " selected";
  document.querySelector("#stations div").click();
}
window.addEventListener("load", setupListeners);

var displayStation = function(){
  if (this.className.indexOf("selected") == -1){
    first = document.querySelector("#stations div");
    first.className = first.className.split(" ")[0];
    this.className += " selected";
    var parent = this.parentNode;
    parent.removeChild(this);
    parent.insertBefore(this, first);
  }
  var nom = this.dataset.nom;
  var commune = this.dataset.commune;
  var libelle = this.dataset.libelle;
  var adresse = this.dataset.adresse;
  var type = this.dataset.type;
  var etat = this.dataset.etat;
  var etatConnexion = this.dataset.etatconnexion;
  var nbVelosDispo = this.dataset.nbvelosdispo;
  var nbPlacesDispo = this.dataset.nbplacesdispo;

  var res = "<h3>" + nom + "</h3>\n";
  res += "<div> Libellé: "+ libelle +"</div>";
  res += "<div>Commune: "+ commune +"</div>\n";
  res += "<div> Adresse: "+ adresse +"</div>\n";
  res += "<div> Nombre de Vélos disponibles: "+ nbVelosDispo +"</div>\n";
  res += "<div> Nombre de Places disponibles: "+ nbPlacesDispo +"</div>\n";
  res += "<div> Etat de la station: "+ etat +"</div>\n";
  res += "<div> Etat de la connexion: "+ etatConnexion +"</div>\n";
  res += "<div> Type de la station: "+ type +"</div>\n";
  descript.innerHTML = res;
}

function dessinerMiniCarte(){
  var nom = this.dataset.nom;
  var commune = this.dataset.commune;
  var libelle = this.dataset.libelle;
  var lon = this.dataset.lon;
  var lat = this.dataset.lat;
  // création de la carte, centrée sur le point 50.60976, 3.13909, niveau de zoom 16
  // cette carte sera dessinée dans l'élément HTML "cartecampus"
  if(miniMap instanceof L.Map){
    miniMap.remove();
  }
  miniMap = L.map('mini-carte').setView([lon, lat], 16);

  // ajout du fond de carte OpenStreetMap
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(miniMap);

    var iconDraw = new VliveImage(this.dataset.nbvelosdispo,this.dataset.nbplacesdispo);
    var marker = L.marker([lon,lat], {icon:iconDraw.getLeafletIcon()}).addTo(miniMap);
}
