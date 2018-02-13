//Auteurs: KATCHALA MELE Daouda et SACI Thileli

window.addEventListener("load",dessinerCarte);

function dessinerCarte(){
    var map = L.map('cartevlille').setView([50.64116, 3.06376], 12);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var stations = document.querySelectorAll(".station");
    for (var i = 0; i<stations.length; i++){
      var nom = stations[i].dataset.nom;
      var commune = stations[i].dataset.commune;
      var libelle = stations[i].dataset.libelle;
      var iconDraw = new VliveImage(stations[i].dataset.nbvelosdispo,stations[i].dataset.nbplacesdispo);
      var marker = L.marker([stations[i].dataset.lon, stations[i].dataset.lat], {icon:iconDraw.getLeafletIcon()}).addTo(map)
      .bindPopup(nom + ' <p>' + commune + '</p> <button data-libelle="' + libelle + '" type="button" value="' + nom + '">Choisir</button>');
    }
    map.on("popupopen",activerBouton);
    map.on("click",afficheCoord);
}
function activerBouton(ev) {
    var noeudPopup = ev.popup._contentNode;
    var bouton = noeudPopup.querySelector("button");
    bouton.addEventListener("click",boutonActive);
}

function boutonActive(ev) {
  var libelle = this.dataset.libelle;
  var station = document.getElementById(libelle);
  station.click();
}

function afficheCoord(ev) {
    alert(ev.latlng);
}
