<?php
require 'vendor/autoload.php';
use MrShan0\PHPFirestore\FirestoreClient;
$sortie="";
$secheLinge="";
$machine12kg="";
$machine8kg="";
$machine18kg="";
$lessive="";
$assouplissant="";
function envoyeApi(){
    global $sortie,$machine18kg,$machine8kg,$machine12kg,$secheLinge,$lessive,$assouplissant;
    $curl = curl_init();
    $firestoreClient = new FirestoreClient('calcium-firefly-398318', '7e301f2f057de3e3e3873e63805694fd27342c33', [
        'database' => '(default)',
    ]);

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.api.wi-line.fr/centrales/21150491628A2457/status',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$firestoreClient->getDocument('api_keys/1')->toArray()["keys"]
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    $sortie = explode("{",$response);
    $secheLinge=$sortie[7];
    $machine8kg=$sortie[8];
    $machine12kg=$sortie[12];
    $machine18kg=$sortie[13];
    $lessive=$sortie[14];
    $assouplissant=$sortie[15];
}
function getPrix($type){
    global $machine18kg,$machine8kg,$machine12kg,$secheLinge,$lessive,$assouplissant;
    $list=array($machine8kg,$machine12kg,$machine18kg,$secheLinge,$lessive,$assouplissant);

    $prix=explode(",",explode(":",$list[$type])[14]);
    for ($i=0;$i<strlen($prix[0])-2;$i++){
        echo $prix[0][$i];
    }
    if($i==0){
        echo "0";
    }
    echo ".";
    for ($i;$i<strlen($prix[0]);$i++){
        echo $prix[0][$i];
    }
    echo "€";
}
?>