<?php
require 'vendor/autoload.php';
use MrShan0\PHPFirestore\FirestoreClient;
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

$sortie = explode("{",$response); ?>

<div style="margin-left: 10%;margin-right: 10%;" id="tableau">
    <table class="w3-centered w3-table-all w3-border-all">
        <tr>
            <th>Numéro de la Machine</th>
            <th>Type de la Machine</th>
            <th>Disponibilité</th>
        </tr>
        <?php
        for ($i=6;$i<16;$i++){ ?>
            <tr >
                <td><?php echo explode(",",explode(":",$sortie[$i])[1])[0]; ?></td>
                <td><?php echo explode(",",explode(":",$sortie[$i])[3])[0]; ?></td>
                <?php if(explode(",",explode(":",$sortie[$i])[5])[0]=="\"Free\"" or explode(",",explode(":",$sortie[$i])[5])[0]=="\"Unkown\"") {
                    ?> <td id="Libre<?php echo $i;?>">Libre</td>
                <?php }
                else if(explode(",",explode(":",$sortie[$i])[5])[0]=="\"Busy\""){ ?>
                    <td>Occupé</td>
                <?php }
                else{
                    ?>
                    <td id="Temps<?php echo $i;?>">
                        <?php
                        $temps=explode(",",explode(":",$sortie[$i])[6])[0];
                        echo $temps;?>
                    </td>
                <?php } ?>
            </tr>
        <?php }
        ?>
    </table>
</div>