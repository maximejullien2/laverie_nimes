<html>
    <!-- Ceci représentera le nom du site , le rwd et les liens pour faire javascript,w3.css etc....-->
    <head>
        <title>Laverie nimes</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
            integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
            crossorigin=""/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <?php  include "fonction.php"; envoyeApi();?>
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
                integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
                crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <style>
            #map{
                height: 100%;
                width: 100%;
            }

            @media screen and (min-width: 601px) {
                h2.image {
                    font-size: 30px;
                }
            }

            /* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
            @media screen and (max-width: 600px) {
                h2.image {
                    font-size: 15px;
                }
            }
            #animation{
                animation-name: clignotez;
                animation-duration: 2s ;
                animation-iteration-count: infinite;
            }
            @keyframes clignotez{
                0% {color: black;}
                50% {color: white;}
                100% {color: black;}
            }
        </style>
    </head>

    <!--Il va représenter le corp de mon site web-->
    <body>
        <div class="w3-top w3-red" style="z-index: 10;">
            <div class="w3-bar w3-card">
                <a href="#nb_machine" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">Machines/Capacités/Prix</a>
                <a href="#tableau" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">Disponibilité des machines : <span id="animation">Cliquez Ici </span></a>
                <a class="w3-bar-item w3-button w3-padding-large w3-hide-large w3-right" style="height:46.5px ;" id="afficher" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            </div>
            <div id="navDemo" class="w3-bar-block  w3-hide">
                <a href="#nb_machine" class="w3-bar-item w3-button w3-padding-large">Machines/Capacités/Prix</a>
                <a href="#tableau" target="_blank" class="w3-bar-item w3-button w3-padding-large">Disponibilité des machines : <span id="animation">Cliquez Ici </span></a>
            </div>

        </div>
        <br><br>
        <div class=" w3-container w3-center">
            <p id="animation" style="font-size: 30px;"><b>Laverie de la Mairie</b></p>
            <p id="animation" style="font-size: 30px;"><b>1 Rue des Fourbisseurs - 30000 NIMES</b></p>
        </div>

        
        <div class="w3-center  w3-text-white" style="position: relative ;">
            <img src="./image_laverie/20220908_094915.jpg" id="img1" class="Affichage1" style="display: inline-block; width: 100%;">
            <img src="./image_laverie/20220916_090954.jpg" id="img2" class="Affichage1" style="display: none; width: 100%;">
            <img src="./image_laverie/20220908_095014.jpg" id="img3" class="Affichage1" style="display: none; width: 100%;">
            <img src="./image_laverie/20220916_090931.jpg" id="img4" class="Affichage1" style="display: none; width: 100%;">
            <img src="./image_laverie/20220811_094558.jpg" id="img5" class="Affichage1" style="display: none; width: 100%;">
            <div style="position: absolute ;top:50%;left:50%;transform: translate(-50%, -50%);">
                <h2 class="image" ><b>Ouvert de 7H à 22H 7j/7 <b></b></h2>
                <a class="w3-button w3-red"  href="https://www.google.fr/maps/dir//Laverie+de+la+Mairie+-+NIMES,+1+Rue+des+Fourbisseurs,+30000+N%C3%AEmes/@43.8365149,4.3259153,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x12b42d095a3eccb7:0x9abb4ec531b23256!2m2!1d4.3609347!2d43.8364583">NOUS TROUVER</a>
            </div>
        </div>

        <div class="w3-container  w3-border w3-border-black" >
            <p class="w3-center" style="font-size: 30px;">Mode de paiement :</p>
            <table style="width:100% ;" class="w3-hide-small">
                <tr>
                    <th style="width: 60%;">
                        <p>Il y a 2 modes de paiements . Le premier avec pièces ou billets . Le second étant le paiement sans contact CB.</p>
                        <p><i class="fa fa-exclamation-triangle" style="font-size:48px;color:red"></i> Les pièces de  1,2,5 centimes et les billets de 50,100,200,500 € ne sont pas pris en compte par la centrale de paiement.</p>
                    </th>
                    <th >
                        <img src="image/sticker-logo-paiement-sans-contact.jpg" >
                    </th>
                </tr>
            </table>
           <div class="w3-container w3-hide-large w3-hide-medium" style="display: inline-block; ">
                <p>Il y a 2 modes de paiements . Le premier avec pièces ou billets . Le second étant le paiement sans contact CB.</p>
                <p><i class="fa fa-exclamation-triangle" style="font-size:48px;color:red"></i> Les pièces de  1,2,5 centimes et les billets de 50,100,200,500 € ne sont pas pris en compte par la centrale de paiement.</p>
            </div>
            <div class="w3-container w3-hide-large w3-hide-medium" style="display: inline-block; ">
                <img src="image/sticker-logo-paiement-sans-contact.jpg" style="width:100%;">
            </div> 
        </div>
        <div class="w3-container  w3-border w3-border-black w3-center">
                <div style="font-size: 30px;">
                    <p>Site sous vidéo-surveillance déclaré en Préfecture</p>
                    <img src="image/panneau-d-information-attention-site-sous-video-surveillance-avec-decret.jpg" style="max-width:100% ;">
                </div>
        </div>
        

        <div class="w3-container  w3-center w3-border w3-border-black" id="nb_machine" >
            <p class="w3-center" style="font-size: 30px;">Nombre de Machines et leurs Capacités</p>
            <div class="w3-container w3-center" style="display: inline-block; ">
                <div class=" w3-grey w3-panel w3-border w3-round-xlarge w3-border-black">
                    <img src="./image_machine/machine_8kg_13.jpg" class="Affichages2" style="height: 150px;">
                    <img src="./image_machine/machine_8kg_14.jpg" class="Affichages2" style="height: 150px;">
                    <img src="./image_machine/machine_8kg_15.jpg" class="Affichages2" style="height: 150px;">
                    <img src="./image_machine/machine_8kg_16.jpg" class="Affichages2" style="height: 150px;">
                    <p >Capacité des machines : 8kg</p>
                    <p>Numéro des machines : n°13,14,15,16</p>
                    <p >Prix : <?php getPrix(0);?></p>
                </div>
            </div>
            <div class="w3-container w3-center" style="display: inline-block; ">
                <div class="w3-grey w3-panel w3-border w3-round-xlarge w3-border-black">
                    <img src="./image_machine/machine_12kg_17.jpg" style="height: 150px;">
                    <p>Capacité de la machine : 12kg</p>
                    <p>Numéro de la machine : n°17</p>
                    <p>Prix :  <?php getPrix(1);?></p>
                </div>
                
            </div>
            <div class="w3-container w3-center" style="display: inline-block; ">
                <div class="w3-grey w3-panel w3-border w3-round-xlarge w3-border-black">
                    <img src="./image_machine/machine_18kg_18.jpg" style="height: 150px;">
                    <p>Capacité de la machine : 18kg</p>
                    <p>Numéro de la machine : n°18</p>
                    <p>Prix :  <?php getPrix(2);?></p>
                </div>
            </div>
            <div class="w3-container w3-center" style="display: inline-block; ">
                <div class="w3-grey w3-panel w3-border w3-round-xlarge w3-border-black">
                    <img src="./image_machine/sechoir_11.jpg" class="Affichage3" style="height: 150px;">
                    <img src="./image_machine/sechoir_12.jpg" class="Affichage3" style="height: 150px;">
                    <p>Capacité des séchoirs : 15kg</p>
                    <p>Numéro des séchoirs : n°11,12</p>
                    <p>Prix : <?php getPrix(3);?> pour 10 minutes</p>
                </div>
            </div>
            <div class=" w3-container w3-center" style="display: inline-block; ">
                <div class="w3-grey w3-panel w3-border w3-round-xlarge w3-border-black">
                    <img src="./image_machine/lessive_assouplissant.jpg" style="height: 150px;">
                    <p>Numéro pour de la lessive : n°19 </p>
                    <p>Prix de la lessive:<?php getPrix(4);?> pour 1 dose de 2 pastilles</p>
                    <p>Numéro de l'assouplissant : n°20</p>
                    <p>Prix de l'assouplissant : <?php getPrix(5);?></p>
                </div>
            </div>
        </div>

        <div class="w3-container " id="disponibilite" style="padding-bottom: 25px;">
            <p class="w3-center" style="font-size: 30px;">Disponibilité des machines </p>
            <div  id="tableau">

            </div>
        </div>


        <div class=" w3-container w3-border w3-border-black" >
            <h3 class="w3-center" style="font-size: 30px;">Emplacement de la Laverie</h3>
            <table style="width:100%;height:50% ;" >
                <tr>
                    <th style="width: 50%; height:100%">
                        <div id="map" style="z-index: 0 " ></div>
                    </th>
                    <th style="width: 50%; height:50%" class="w3-hide-small w3-hide-medium w3-center" >
                        <p >Si vous voulez voir le trajet depuis votre téléphone vers la laverie . <br> Activez votre GPS puis cliquez sur le bouton suivant : </p>
                        <button onclick="getLocation()" >Cliquez Ici</button>
                        <br>
                        <p class="w3-hide" id="caché" >La distance à faire est de <b id="distance"></b></p>
                        <p class="w3-hide" id="caché" >Le temps pour faire cette distance est de <b id="heure"></b></p>
                    </th>
                </tr>
            </table>
            <div class="w3-hide-large w3-center" style="font-weight: bold;">
                <p >Si vous voulez voir le trajet depuis votre téléphone vers la laverie . <br> Activez votre GPS puis cliquez sur le bouton suivant : </p>
                <button onclick="getLocation()" >Cliquez Ici</button>
                <br>
                <p class="w3-hide" id="caché" >La distance à faire est de <b id="distance2"></b></p>
                <p class="w3-hide" id="caché" >Le temps pour faire cette distance est de <b id="heure2"></b></p>
            </div>
        </div>

        <div class="w3-container w3-black " >
            <table style="width:100%" class="w3-hide-small w3-hide-medium">
                <tr>
                    <th class="w3-center" style="width: 50%;">
                        <div  style="display: inline-block; " >
                            <p style="display: inline-block;color: white; " >Lien réseaux sociaux :</p>
                            <a href="https://www.facebook.com/people/Laverie-Nimes-Centre-proche-Mairie/100041585096401/" target="_blank" style="display: inline-block; "><i class="fa fa-facebook-square" style="font-size:36px ;color: white;"></i></a>
                        </div>
                    </th>
                    <th class="w3-center" style="width: 50%;">
                        <div style="display: inline-block; ">
                            <p style="color: white; ">Adresse mail de contact : <a href="mailto:laverie.sorguaise@gmail.com">laverie.sorguaise@gmail.com</a></p>
                        </div>
                    </th>
                </tr>
            </table>
            <div class="w3-hide-large" style="font-weight: bold;" >
                <p style="display: inline-block;color: white; " >Lien réseaux sociaux :</p>
                <a href="https://www.facebook.com/people/Laverie-Nimes-Centre-proche-Mairie/100041585096401/" style="display: inline-block; "><i class="fa fa-facebook-square" style="font-size:36px;color: white;"></i></a>
                <p style="color: white; ">Adresse mail de contact : <a href="mailto:laverie.sorguaise@gmail.com">laverie.sorguaise@gmail.com</a></p>
            </div> 
        </div>
    <div>
        <?php
        #De 6 a 15
        #$secheLinge=$sortie[7];
        #$machine8kg=$sortie[8];
        #$machine12kg=$sortie[12];
        #$machine18kg=$sortie[13];
        #$lessive=$sortie[14]
        #$assouplissant=$sortie[15]
        #Permet de récupérer numéro de la machine explode(",",explode(":",$sortie[7])[1])[0]
        #Permet de récupérer le type de la machine explode(",",explode(":",$sortie[7])[3])[0];
        #Permet de savoir si une machine est libre ou non explode(",",explode(":",$sortie[7])[5])[0]
        #Permet d'avoir la clé de l'api explode(",",explode(":",$sortie[1])[2])[0];
        #echo strlen($response);
        #echo $response;
        ?>
    </div>
    </body>
    
    
    <!--Sa serait par rapport au lien vers le facebook et les mentions légales-->
    <footer class="w3-container w3-pannel w3-black w3-border w3-center">
        <p><a href="mention_legale.php">Mention légales 2022-<?php echo date("Y");?></a></p>
    </footer>
    <script src="js/javascript.js">
    </script>
</html>
