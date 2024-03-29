
//mettre le zoom au début vers la laverie
var map = L.map('map').setView([43.836456236001645, 4.361006177896979],25);

var marker= L.marker([43.836456236001645, 4.361006177896979]).addTo(map);


var control = null;
marker.bindPopup("Laverie de la Mairie - 1 Rue des Fourbisseurs, 30000 NIMES");
//mettre le titre openstreetmap contributor sur la map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

//Sert a cloné les étapes à faires pour aller vers la laverie
function clonage(){
  if (control != null)
    map.removeControl(control);
  control = null;
};

//C'est pour activer la geolocalisation
var x =  document.getElementById("localisation");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

//Sert pour mettre la position du tel et créer un parcours entre la position du tel et la laverie
function showPosition(position) {
  if (control != null)
    clonage();
  control = L.Routing.control({
    waypoints: [
      L.latLng(position.coords.latitude,position.coords.longitude),
      L.latLng(43.836456236001645, 4.361006177896979)
    ],
    router : new L.Routing.osrmv1({
      language : 'fr'
    }),
    routeWhileDragging: true
  }).addTo(map);
  $(".leaflet-top").remove();
  map.setView([position.coords.latitude,position.coords.longitude]);
  control.on('routeselected', function (e) {
    var routes = e.route;
    var summary = routes.summary;
    // alert distance and time in km and minutes
    $("#caché").removeClass();
    var distance = summary.totalDistance;
    var text;
    if ( distance > 1000){
      text = (distance/1000) + " km"
    }
    else{
      text = distance +" m";
    }
    $("#distance").empty();
    $("#distance").append(text);
    $("#distance2").empty();
    $("#distance2").append(text);
    if ( Math.round(summary.totalTime) > 3600){
      var variable =  Math.round(summary.totalTime / 3600);
      text = variable + " h " + ((Math.round(summary.totalTime)-3600*variable) / 60) + "min";
    }
    else{
      text = Math.round(summary.totalTime / 60 ) + ' min';
    }
    $("#heure").empty();
    $("#heure").append(text);
    $("#heure2").empty();
    $("#heure2").append(text);
  });
};

var Affichageindex1 = 0 ;
var Affichageindex2 = 0 ;
var Affichageindex3 = 0 ;

Automatic();
function Automatic(){
  var x = document.getElementsByClassName("Affichage1");
  for (var i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  Affichageindex1++;
  if (Affichageindex1 > x.length) {Affichageindex1 = 1}
  x[Affichageindex1-1].style.display = "inline-block";

  var t = document.getElementsByClassName("Affichages2");
  for (var i = 0; i < t.length; i++) {
    t[i].style.display = "none";
  }
  Affichageindex2++;
  if (Affichageindex2 > t.length) {Affichageindex2 = 1}
  t[Affichageindex2-1].style.display = "inline-block";

  var a = document.getElementsByClassName("Affichage3");
  for (var i = 0; i < a.length; i++) {
    a[i].style.display = "none";
  }
  Affichageindex3++;
  if (Affichageindex3 > a.length) {Affichageindex3 = 1}
  a[Affichageindex3-1].style.display = "inline-block";

  setTimeout(Automatic, 5000);
}




function myFunction() {//Pris de w3schools
  var x = document.getElementById("navDemo");// Permet d'afficher ou d'enlever la sidebar
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

min=6;
max=15;
let tableau1=[];
let actionTemps=[];
for (i=0;i<16;i++){
  tableau1[i]=0;
  actionTemps[i]=0;
}

function update(){
  $.post("update.php","html").done(function (data) {
    document.getElementById("tableau").outerHTML=data;
    for (i=min;i<=max;i++) {
      if (document.getElementById("Temps"+i) != null) {
        tableau1[i] = document.getElementById("Temps"+i).innerText;
        resultat = tableau1[i] % 60;
        minute = (tableau1[i] - resultat) / 60;
        if(minute>0) {
          document.getElementById("Temps" + i).innerHTML = minute + " min " + resultat + " sec ";
        }
        else{
          document.getElementById("Temps" + i).innerHTML =  resultat + " sec ";
        }
        if(actionTemps[i]==0) {
          actionTemps[i]=1;
          setTimeout(diminutionTemps.bind(this, i), 1000);
        }
      }
    }
  });
  setTimeout(update,60000);
}

function diminutionTemps(valeur){
  tableau1[valeur]=tableau1[valeur]-1;
  resultat=tableau1[valeur]%60;
  minute=(tableau1[valeur]-resultat)/60;
  if(minute>0) {
    document.getElementById("Temps" + valeur).innerHTML = minute + " min " + resultat + " sec ";
  }
  else{
    document.getElementById("Temps" + valeur).innerHTML =  resultat + " sec ";
  }
  if(tableau1[valeur]>0){
    setTimeout(diminutionTemps.bind(this,valeur), 1000);
  }
  else{
    if(document.getElementById("Temps"+valeur)!=null){
      actionTemps[valeur]=0;
      document.getElementById("Temps"+valeur).innerHTML="Libre";
    }
  }
}

update();

function dimension(){
  if(screen.width<1500){
    document.getElementById("tableau").style.marginLeft="0";
    document.getElementById("tableau").style.marginRight="0";
  }
  else{
    document.getElementById("tableau").style.marginLeft="10%";
    document.getElementById("tableau").style.marginRight="10%";
  }
  setTimeout(dimension,1000);
}
dimension();