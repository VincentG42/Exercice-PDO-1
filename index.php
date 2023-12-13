<?php

require_once('./treatment/database_connect.php');

//request  liste clients
$request = $database->query('SELECT * FROM `clients`');

$clients = $request-> fetchAll();

//

// request type spectacles
$request = $database->query('SELECT * FROM `showtypes`');

$typesSpectacles = $request-> fetchAll();

//

// request 20 1ers clients

$request = $database->query('SELECT * FROM `clients` LIMIt 20');

$topTwentyClients = $request-> fetchAll();

//request clients avec carte fidelite
$request = $database->query("SELECT * FROM `clients` INNER JOIN cards ON clients.cardNumber = cards.cardNumber WHERE cardTypesId=1;");

$clientswCards = $request-> fetchAll();

// request clients Nom commence apr M
$request = $database->query("SELECT * FROM `clients` WHERE lastName LIKE 'm%' ORDER BY lastName");

$clientsbeginsWM = $request-> fetchAll();



// request shows tri par artiste

$request = $database->query("SELECT * FROM `shows` ORDER BY `performer`");

$showsByPerformer = $request-> fetchAll();

//request client inner join cards
$request = $database->query("SELECT * FROM `clients` LEFT JOIN cards ON clients.cardNumber = cards.cardNumber");

$clientsAvecCarte = $request-> fetchAll();




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO-1</title>
</head>
<body>

<h2> Exercice 1 </h2>

        <?php 
            foreach ($clients as $client){
                echo '<p>' .$client['lastName'].' '.$client['firstName'].'</p>';
            }

        ?>
<h2> Exercice 2 </h2>

    <?php 
        foreach ($typesSpectacles as $typeSpectacle){
            echo '<p>' .$typeSpectacle['type'].' </p>';
        }

    ?>

<h2> Exercice 3 </h2>

    <ol>
    <?php 
        foreach ($topTwentyClients as $clientFromTopTwenty){
            echo '<li>' .$clientFromTopTwenty['lastName'].' '.$clientFromTopTwenty['firstName'].'</li>';
        }

    ?>
    </ol>  

<h2> Exercice 4 </h2>

        <!-- request specifique-->
        <?php 
            foreach ($clientswCards as $clientwCards){
            
                echo '<p>' .$clientwCards['lastName'].' '.$clientwCards['firstName'].'</p>';
            }
        ?>
<h2> Exercice 5 </h2>
        <?php 
            foreach ($clientsbeginsWM as $clientbeginWM){
            
                echo '<p>Nom: ' .$clientbeginWM['lastName'].' - Prénom: '.$clientbeginWM['firstName'].'</p>';
            }
        ?>

<h2> Exercice 6 </h2>

        <?php 
            foreach ($showsByPerformer as $showByPerformer){
            
                echo '<p>' .$showByPerformer['title'].' par '.$showByPerformer['performer'].', le '.$showByPerformer['date'].' à '.$showByPerformer['startTime'].'</p>';
            }
        ?>
<h2> Exercice 7 </h2>
                <!-- recup request exercice1-->
      <?php 
            // foreach ($clients as $client){
            //    
            
            // }
                // var_dump($clientsAvecCarte);
            foreach ($clientsAvecCarte as $clientaveccarte){
                // var_dump($clientaveccarte);
                echo '<p> Nom: '. $clientaveccarte['lastName'].' Prenom: '. $clientaveccarte['firstName'].'</p>';
          
                    if ($clientaveccarte['cardTypesId'] == 1){
                        echo '<p> Carte: Oui</p>';
                        echo '<p> N°: '. $clientaveccarte['cardNumber'].'</p>';
                        echo '<hr>';
                    } else{
                        echo '<p> Carte: Non</p>';
                        echo '<hr>';
                    }
            }
        ?> 


</body>
</html>