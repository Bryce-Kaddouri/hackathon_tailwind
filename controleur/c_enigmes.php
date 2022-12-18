<?php

/**
 * Application CTF Hackathon 2022
 * BTS SIO
 * Lycée de Bellepierre
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = '';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'afficherEnigmes': {
            $numSession = 1;
            $infoDateSession = $pdo->getInfoDateSession($numSession);
            $dateNow = $infoDateSession['dateNow'];
            $dateDebut = $infoDateSession['dateDebut'];
            $dateFin = $infoDateSession['dateFin'];

            $timerDebut = $pdo->getTimer($dateNow, $dateDebut);
            $timerFin = $pdo->getTimer($dateNow, $dateFin);
            echo "<script>console.log('timerDebut = " . $timerDebut . "')</script>";
            echo "<script>console.log('timerFin = " . $timerFin . "')</script>";

            if ($timerDebut > 0){
                include("vues/v_beforeStart.php");
                break;
            }else{
                if ($timerFin <0){
                    include("vues/v_endPage.php");
                    break;
                }else {  
                    include("vues/v_profile.php");
                    $categories = $pdo->getCategories();
                     include("vues/v_categories.php");
                     $idEquipe = $pdo->getIdEquipe($_SESSION['login']);
                    $enigmesNonResolues = $pdo->getEnigmesNonResolues($idEquipe);
                    $enigmesResolues = $pdo->getEnigmesResolues($idEquipe);  
                     include("vues/v_enigmes.php");
                    break;
                }
            }       
        }
    case 'focusEnigme': {
        $numSession = 1;
        $infoDateSession = $pdo->getInfoDateSession($numSession);
        $dateNow = $infoDateSession['dateNow'];
        $dateDebut = $infoDateSession['dateDebut'];
        $dateFin = $infoDateSession['dateFin'];

        $timerDebut = $pdo->getTimer($dateNow, $dateDebut);
        $timerFin = $pdo->getTimer($dateNow, $dateFin);
        if ($timerDebut > 0){
            include("vues/v_beforeStart.php");
            break;
        }else{
            if ($timerFin <0){
                include("vues/v_endPage.php");
                break;
            }else {  
            include("vues/v_profile.php");
            $categories = $pdo->getCategories();
              $idEquipe = $pdo->getIdEquipe($_SESSION['login']);
            $sessionEnCours = $pdo->getSessionEnCours($idEquipe);
            // var_dump($sessionEnCours);
            // die();

            $numEnigme = $_REQUEST['numChallenge'];
            // $sessionEncours = $pdo->getSessionEnCours($idEquipe);
            

            include("vues/v_categories.php");
            $enigme = $pdo->getUneEnigme($numEnigme);

            include("vues/v_focusEnigme.php");
            break;
        }
    }
            break; 
        }
    case 'triEnigme': {
        $numSession = 1;
        $infoDateSession = $pdo->getInfoDateSession($numSession);
        $dateNow = $infoDateSession['dateNow'];
        $dateDebut = $infoDateSession['dateDebut'];
        $dateFin = $infoDateSession['dateFin'];

        $timerDebut = $pdo->getTimer($dateNow, $dateDebut);
        $timerFin = $pdo->getTimer($dateNow, $dateFin);
        if ($timerDebut > 0){
            include("vues/v_beforeStart.php");
            break;
        } else {
            if ($timerFin < 0) {
                    include("vues/v_endPage.php");
                    break;
                } else {
                    $idEquipe = $pdo->getIdEquipe($_SESSION['login']);
                    $noCategorie = $_REQUEST['niveau'];
                    include("vues/v_profile.php");
                    $categories = $pdo->getCategories();
                    include("vues/v_categories.php");


                    // $enigmes = $pdo->triEnigmes($noCategorie);
                    $enigmesNonResolues = $pdo->getEnigmesNonResoluesByCateg($idEquipe, $noCategorie);
                    $enigmesResolues = $pdo->getEnigmesResoluesByCateg($idEquipe, $noCategorie);
                    include("vues/v_enigmes.php");
                    break;
                }
            }
        }

    default: {
            include("vues/v_connexion.php");
            break;
        }
}
