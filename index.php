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

//request clients avec cardNumber
$request = $database->query("SELECT * FROM `clients` WHERE `cardNumber` != 'null'");

$clientswCards = $request-> fetchAll();




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

<h2> Exercice 2 </h2>

    <ol>
    <?php 
        foreach ($topTwentyClients as $clientFromTopTwenty){
            echo '<li>' .$clientFromTopTwenty['lastName'].' '.$clientFromTopTwenty['firstName'].'</li>';
        }

    ?>
    </ol>  

<h2> Exercice 3</h2>
<!-- recup request exercice1-->
        <?php 
            foreach ($clients as $client){
                if (!empty($client['cardNumber']))
                echo '<p>' .$client['lastName'].' '.$client['firstName'].'</p>';
            }

        ?>
    <h3>2e option</h3>
        <!-- request specifique-->
        <?php 
            foreach ($clientswCards as $clientwCards){
            
                echo '<p>' .$clientwCards['lastName'].' '.$clientwCards['firstName'].'</p>';
            }

        ?>
clientswCards
    
</body>
</html>