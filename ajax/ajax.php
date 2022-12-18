<?php

switch ($_REQUEST['action']) {
	           

    case 'tabScore': {
		
 $pdo = new PDO('mysql:host=localhost;dbname=hackathon_v2', 'root', '');



            $sql = "select * from infotabscore;";
            $res = $pdo->query($sql);
            $lignes = $res->fetchAll();
            $i = 1;

            $partie = json_encode(['partie' => $lignes]);
            echo $partie;

            break;
        }

    case 'testFlag': {
            $flag = $_REQUEST['flag'];
            $numEnigme = $_REQUEST['numChallenge'];
            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_v2', 'root', '');
            $sql = "SELECT flag from enigme where numEnigme=:numEnigme;";
            // requete préparée 
            $sql = $pdo->prepare($sql);
            $res = $sql->execute(['numEnigme' => $numEnigme]);
            $lignes = $sql->fetch();

            if (password_verify($flag, $lignes['flag'])) {
                echo 'true';
            } else {
                echo 'false';
            }
            break;
        }

    case 'addPoint': {
            $numEnigme = $_REQUEST['numChallenge'];
            $idEquipe = $_REQUEST['idEquipe'];

 $pdo = new PDO('mysql:host=localhost;dbname=hackathon_v2', 'root', '');

            $sql = "INSERT INTO `validation` (idEquipe, noEnigme) VALUES (:idEquipe, :noEnigme);";
            
            $sql = $pdo->prepare($sql);
            $res = $sql->execute(['idEquipe' =>  $idEquipe , 'noEnigme' => $numEnigme]);

            //gestion des erreurrs avec une levée d'exception

            // gestion des erreurs
            if ($res1) {
                echo 'true';
            } else {
                echo 'false';
            }
            break;
        }

    default: {
            // include("vues/v_connexion.php");
            // break;
        }
}
