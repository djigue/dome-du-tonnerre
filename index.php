<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dôme du Tonnerre</title>
    <!-- Inclusion de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./images/fond.jpg')] bg-cover bg-center h-screen">
<?php
// Inclusion des fichiers nécessaires
include("autoLoader.php");
include("bouton.php");

// Démarrage de la session pour gérer les données utilisateur
session_start();

/**
 * Initialise une session si elle n'existe pas encore
 * 
 * @param string $key Nom de la session
 * @param mixed $default Valeur par défaut à assigner si la session n'existe pas
 */
function initSessionVariable($key, $default) {
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = $default;
    }
}

// Initialisation des variables de session nécessaires
initSessionVariable('tour_actuel', 1);
initSessionVariable('combat_commence', false);
initSessionVariable('form1_submitted', false);
initSessionVariable('form2_submitted', false);
initSessionVariable('compteur_agil1', 3);
initSessionVariable('compteur_soin1', 3);
initSessionVariable('compteur_prec1', 3);
initSessionVariable('compteur_agil2', 3);
initSessionVariable('compteur_soin2', 3);
initSessionVariable('compteur_prec2', 3);

// Affichage du titre principal de la page
echo "<h1 class='text-4xl font-bold text-center sm:mt-2 mt-8 text-red-900 text-6xl font-bold'>Bienvenue dans le dôme du tonnerre</h1>";

// Conteneur principal
echo "<div class='relative h-screen'>";

// Affichage du formulaire pour le combattant 1 si non soumis
if (!$_SESSION['form1_submitted']) {
    echo '<form method="POST" action="traitement1.php" class="absolute top-10 left-10 w-1/4 p-6 bg-gray-800 bg-transparent shadow-md rounded-lg text-red-900">
        <!-- Champ caché pour identifier le combattant -->
        <input type="hidden" name="combattant1" value="combattant1">
        
        <!-- Champ pour saisir le nom -->
        <label for="nom1" class="block font-medium">Nom :</label>
        <input type="text" id="nom1" name="nom" class="w-full mt-2 p-2 border border-gray-300 rounded-md"><br>

        <!-- Sélection de la race -->
        <label for="race1" class="block mt-4 font-medium">Race :</label>
        <select id="race1" name="race" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="nain">Nain</option>
          <option value="elfe">Elfe</option>
          <option value="homme">Homme</option>
          <option value="orque">Orque</option>
        </select>

        <!-- Sélection de la classe -->
        <label for="classe1" class="block mt-4 font-medium">Classe :</label>
        <select id="classe1" name="classe" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="guerrier">Guerrier</option>
          <option value="paladin">Paladin</option>
          <option value="voleur">Voleur</option>
        </select>

        <!-- Sélection de larme -->
        <label for="arme1" class="block mt-4 font-medium">Arme :</label>
        <select id="arme1" name="arme" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="hache">Hache</option>
          <option value="epee">Épée</option>
          <option value="dagues">Dagues</option>
        </select>

        <!-- Bouton de soumission -->
        <button type="submit" class="mt-6 w-full bg-red-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Choisir</button>
    </form>';
}

// Affichage du formulaire pour le combattant 2 si non soumis
if (!$_SESSION['form2_submitted']) {
    echo '<form method="POST" action="traitement2.php" class="absolute top-10 right-10 w-1/4 p-6 bg-gray-800 bg-transparent shadow-md rounded-lg text-red-900">
        <!-- Champ caché pour identifier le combattant -->
        <input type="hidden" name="combattant2" value="combattant2">
        
        <!-- Champ pour saisir le nom -->
        <label for="nom2" class="block font-medium">Nom :</label>
        <input type="text" id="nom2" name="nom" class="w-full mt-2 p-2 border border-gray-300 rounded-md"><br>

        <!-- Sélection de la race -->
        <label for="race2" class="block mt-4 font-medium">Race :</label>
        <select id="race2" name="race" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="nain">Nain</option>
          <option value="elfe">Elfe</option>
          <option value="homme">Homme</option>
          <option value="orque">Orque</option>
        </select>

        <!-- Sélection de la classe -->
        <label for="classe2" class="block mt-4 font-medium">Classe :</label>
        <select id="classe2" name="classe" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="guerrier">Guerrier</option>
          <option value="paladin">Paladin</option>
          <option value="voleur">Voleur</option>
        </select>

        <!-- Sélection de larme -->
        <label for="arme2" class="block mt-4 font-medium">Arme :</label>
        <select id="arme2" name="arme" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="hache">Hache</option>
          <option value="epee">Épée</option>
          <option value="dagues">Dagues</option>
        </select>

        <!-- Bouton de soumission -->
        <button type="submit" class="mt-6 w-full bg-red-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Choisir</button>
    </form>';
}
echo "</div>";

// Vérifie si le formulaire pour le combattant 1 a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['combattant']) && $_POST['combattant'] === 'combattant1') { 
    $_SESSION['form1_submitted'] = true; 
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

// Vérifie si le formulaire pour le combattant 2 a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['combattant']) && $_POST['combattant'] === 'combattant2') {
    $_SESSION['form2_submitted'] = true; 
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

// @traitementCombattant1 Récupère et affiche les informations pour le combattant 1
if (isset($_SESSION['combattant1'])) {
    $combattant1 = $_SESSION['combattant1'];
    $combattant1->cheatCode();

    // Récupération des données du combattant
    $name = $combattant1->getName();
    $race = $combattant1->getRace();
    $classe = $combattant1->getClasse();
    $arme = $combattant1->getArme();
    $force = $combattant1->getForce();
    $pv = $combattant1->getPv();
    $agilite = $combattant1->getAgilite();
    $precision = $combattant1->getPrecision();
    $compteurSoin = $_SESSION['compteur_soin1'] . "/3";
    $compteurAgil = $_SESSION['compteur_agil1'] . "/3";
    $compteurPrec = $_SESSION['compteur_prec1'] . "/3";

    // Détermine l'image en fonction de la race
    $imagePath = '';
    switch (strtolower($race)) {
        case 'homme':
            $imagePath = 'images/homme2.png';
            break;
        case 'nain':
            $imagePath = 'images/nain2.png';
            break;
        case 'orque':
            $imagePath = 'images/orque2.png';
            break;
        case 'elfe':
            $imagePath = 'images/elfe2.png';
            break;
        default:
            $imagePath = 'images/default.jpg'; // Image par défaut si la race est inconnue
            break;
    }

    // Affiche les informations du combattant 1
    echo "
        <div class='absolute top-16 left-48 w-1/4 font-bold text-white'>
            <h1 class='text-3xl font-bold ml-20'>$name</h1>
            <p class='ml-2'>Race : $race</p>
            <p class='ml-2'>Classe : $classe</p>
            <p class='ml-2'>Arme : $arme</p>
            <p class='ml-2'>Force : $force</p>
            <p class='ml-2 '>$compteurSoin PV : $pv 
                <meter value='$pv' max='100' optimum='100' low='25' high='75' class='w-1/4 ml-8'></meter>
            </p>
            <p class='ml-2'>$compteurAgil Agilité : $agilite 
                <meter value='$agilite' max='100' optimum='100' low='25' high='75' class='w-1/4 ml-4'></meter>
            </p>
            <p class='ml-2 '>$compteurPrec Précision : $precision 
                <meter value='$precision' max='100' optimum='100' low='25' high='75' class='w-1/4'></meter>
            </p>
        </div>
        
        <div class='absolute bottom-2 left-52 w-1/6'>
            <img src='$imagePath' alt='Image de $race' class='mt-4 w-auto h-auto rounded shadow-md'>
        </div>
    ";    
}

// @traitementCombattant2 Récupère et affiche les informations pour le combattant 2
if (isset($_SESSION['combattant2'])) {
    $combattant2 = $_SESSION['combattant2'];
    $combattant2->cheatCode();

    // Récupération des données du combattant
    $name = $combattant2->getName();
    $race = $combattant2->getRace();
    $classe = $combattant2->getClasse();
    $arme = $combattant2->getArme();
    $force = $combattant2->getForce();
    $pv = $combattant2->getPv();
    $agilite = $combattant2->getAgilite();
    $precision = $combattant2->getPrecision();
    $compteurSoin = $_SESSION['compteur_soin2'] . "/3";
    $compteurAgil = $_SESSION['compteur_agil2'] . "/3";
    $compteurPrec = $_SESSION['compteur_prec2'] . "/3";

    // Détermine l'image en fonction de la race
    $imagePath = '';
    switch (strtolower($race)) {
        case 'homme':
            $imagePath = 'images/homme2.png';
            break;
        case 'nain':
            $imagePath = 'images/nain2.png';
            break;
        case 'orque':
            $imagePath = 'images/orque2.png';
            break;
        case 'elfe':
            $imagePath = 'images/elfe2.png';
            break;
        default:
            $imagePath = 'images/default.jpg'; // Image par défaut si la race est inconnue
            break;
    }

    // Affiche les informations du combattant 2
    echo "
        <div class='absolute top-16 right-20 w-1/4 font-bold text-white'>
            <h1 class='text-3xl font-bold ml-8'>$name</h1>
            <p class='ml-32'>Race : $race</p>
            <p class='ml-32'>Classe : $classe</p>
            <p class='ml-32'>Arme : $arme</p>
            <p class='ml-32'>Force : $force</p>
            <p class='ml-2'> 
                <meter value='$pv' max='100' optimum='100' low='25' high='75' class='w-1/4 mr-2'></meter>
                $compteurSoin PV : $pv
            </p>
            <p class='ml-2'> 
                <meter value='$agilite' max='100' optimum='100' low='25' high='75' class='w-1/4 mr-2'></meter>
                $compteurAgil Agilité : $agilite
            </p>
            <p class='ml-2'> 
                <meter value='$precision' max='100' optimum='100' low='25' high='75' class='w-1/4 mr-2'></meter>
                $compteurPrec Précision : $precision
            </p>
        </div>
         <div class='absolute bottom-2 right-80 sm:right-52 w-1/6'>
            <img src='$imagePath' alt='Image de $race' class='mt-4 w-auto h-auto rounded shadow-md'>
        </div>
    ";
}

// @verificationCombat Vérifie si les deux formulaires sont soumis et démarre le combat
if ($_SESSION['form1_submitted'] && $_SESSION['form2_submitted'] && !$_SESSION['combat_commence']) {
    echo '<form method="POST" class="absolute top-1/4 left-1/2 transform -translate-x-1/2">';
    echo creerBouton("Démarrer le combat", "debut_combat", "start", "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", "start_combat");
    echo '</form>';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['debut_combat'])) {
        $_SESSION['combat_commence'] = true;
        header("Location: " . $_SERVER['PHP_SELF']); 
        exit; 
    }
}

// @affichageCombat Affiche les actions possibles lors du combat
if ($_SESSION['combat_commence']) {
    echo "<h2 class='absolute top-20 left-1/2 transform -translate-x-1/2 text-red-800 text-5xl font-bold'>{$combattant1->getName()} VS {$combattant2->getName()}</h2>";
    if ($_SESSION['tour_actuel'] === 1) {
        echo "<div class='absolute bottom-20 left-1/3'>";
        echo "<h3 class='text-red-900 text-xl font-bold '><strong>Choisissez une action :</strong></h3>";
        echo '<form method="POST">';
        echo creerBouton('Attaquer', 'action1', 'attack1', "bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'attaquer');
        echo creerBouton('Soigner', 'action1', 'heal1', "bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'soigner');
        echo creerBouton('Agilité', 'action1', 'agil1', "bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'accelerer');
        echo creerBouton('Précision', 'action1', 'pre1', "bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'endurer');
        echo '</form>';
        echo "</div>";
    } elseif ($_SESSION['tour_actuel'] === 2) {
        echo "<div class='absolute bottom-20 right-1/4'>";
        echo "<h3 class='text-red-900 text-xl font-bold'>Choisissez une action :</h3>";
        echo '<form method="POST">';
        echo creerBouton('Attaquer', 'action2', 'attack2',"bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'attaquer');
        echo creerBouton('Soigner', 'action2', 'heal2',"bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'soigner');
        echo creerBouton('Agilité', 'action2', 'agil2',"bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'accelerer');
        echo creerBouton('Précision', 'action2', 'pre2',"bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'endurer');
        echo '</form>';
        echo "</div>";
    }
}

/**
 * Gère le déroulement du combat entre deux combattants en fonction des actions sélectionnées.
 *
 * @param object $combattant1 Le premier combattant participant au combat.
 * @param object $combattant2 Le deuxième combattant participant au combat.
 * @param int &$tourActuel Une référence à la variable représentant le tour actuel (1 ou 2).
 *
 * @return void
 */
function combattre($combattant1, $combattant2, &$tourActuel) {
    // Vérifie si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Gestion du tour du combattant 1
        if ($tourActuel === 1 && isset($_POST['action1'])) {
            actionComb1($combattant1, $combattant2, $_POST['action1']);

            // Vérifie si le combattant 2 est mort après l'action
            if ($combattant2->getPv() <= 0) {
                // Affiche le message de fin pour le combattant 2
                echo "<div class='absolute top-1/3 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold'>";
                echo "{$combattant2->getName()} est mort !<br>";
                session_destroy();
                echo creerBouton("Fin Combat", "fin combat", "fin combat", "bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2","fin combat");
                echo "</div>";
                return;
            }

            // Prépare le passage au tour suivant
            echo '<div class="absolute bottom-1/2 left-1/2 transform -translate-x-1/2 text-center">';
            echo '<form method="POST">';
            echo '<button type="submit" name="next_turn" class="bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2">Passer au tour suivant</button>';
            echo '</form>';
            echo "</div>";

            $_SESSION['tour_actuel'] = 2;
        } 
        // Gestion du tour du combattant 2
        elseif ($tourActuel === 2 && isset($_POST['action2'])) {
            actionComb2($combattant2, $combattant1, $_POST['action2']);

            // Vérifie si le combattant 1 est mort après l'action
            if ($combattant1->getPv() <= 0) {
                // Affiche le message de fin pour le combattant 1
                echo "<div class='absolute top-1/3 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold'>";
                echo "{$combattant1->getName()} est mort !<br>";
                session_destroy();
                echo creerBouton("Fin Combat", "fin combat", "fin combat", "bg-red-900 text-white font-bold py-2 px-4 mt-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2","fin combat");
                echo "</div>";
                return;
            }

            // Prépare le passage au tour suivant
            echo '<div class="absolute bottom-1/2 left-1/2 transform -translate-x-1/2 text-center">';
            echo '<form method="POST">';
            echo '<button type="submit" name="next_turn" class="bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2">Passer au tour suivant</button>';
            echo '</form>';
            echo "</div>";

            $_SESSION['tour_actuel'] = 1;
        }
    }
}

/**
 * Gère l'action du combattant 1 pendant son tour de combat.
 *
 * @param object $combattant1 Le premier combattant qui effectue l'action.
 * @param object $combattant2 Le deuxième combattant qui subit l'action.
 * @param string $action1 L'action choisie par le combattant 1 (ex: attaquer, soigner, etc.).
 *
 * @return void
 */
function actionComb1($combattant1, $combattant2, $action1) {
    // Traite l'action de combat selon le choix du joueur 1
    switch ($action1) {
        // Si l'action est "attaquer"
        case 'attaquer':
            // Si la précision du combattant 1 est supérieure ou égale à l'agilité du combattant 2
            if ($combattant1->getPrecision() >= $combattant2->getAgilite()) {
                // Le combattant 2 subit des dégâts
                $combattant2->setPv(max(0, $combattant2->getPv() - $combattant1->getForce()));
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()} inflige {$combattant1->getForce()} points de dégâts.<br>";
                echo "{$combattant2->getName()} a maintenant {$combattant2->getPv()} PV.<br>";
                echo "</div>";
            } else {
                // Si l'attaque échoue, l'agilité du combattant 2 est réduite
                $combattant2->setAgilite(max(0, $combattant2->getAgilite() - 50));
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()} a esquivé l'attaque.<br>";
                echo "</div>";
            }
            break;

        // Si l'action est "soigner"
        case 'soigner':
            // Si le combattant 1 a des potions de soin restantes
            if ($_SESSION['compteur_soin1'] > 0) {
                // Le combattant 1 gagne des points de vie
                $combattant1->setPv($combattant1->getPv() + 50);
                $_SESSION['compteur_soin1']--;
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()}, Vous gagnez 50 PV,<br>
                      il vous reste {$_SESSION['compteur_soin1']} potions de soin.<br>";
                echo "</div>";
            } else {
                // Si plus de potions de soin, affiche un message d'erreur
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()}, vous n'avez plus de potions de soin ! <br>";
                echo "</div>";
            }
            break;

        // Si l'action est "accelerer"
        case 'accelerer':
            // Si le combattant 1 a des potions d'agilité restantes
            if ($_SESSION['compteur_agil1'] > 0) {
                // Augmente l'agilité du combattant 1
                $combattant1->setAgilite($combattant1->getAgilite() + 50);
                $_SESSION['compteur_agil1']--;
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()}, Vous gagnez 50 d'agilité,<br>
                      il vous reste {$_SESSION['compteur_agil1']} potions d'agilité.<br>";
                echo "</div>";
            } else {
                // Si plus de potions d'agilité, affiche un message d'erreur
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()}, Vous n'avez plus de potion d'agilité !<br>";
                echo "</div>";
            }
            break;

        // Si l'action est "endurer"
        case 'endurer':
            // Si le combattant 1 a des potions de précision restantes
            if ($_SESSION['compteur_prec1'] > 0) {
                // Augmente la précision du combattant 1
                $combattant1->setPrecision($combattant1->getPrecision() + 50);
                $_SESSION['compteur_prec1']--;
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()}, Vous gagnez 50 de précision,<br>
                      il vous reste {$_SESSION['compteur_prec1']} potions de précision.<br>";
                echo "</div>";
            } else {
                // Si plus de potions de précision, affiche un message d'erreur
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()}, Vous n'avez plus de potion de précision !<br>";
                echo "</div>";
            }
            break;

        // Si l'action n'est pas reconnue
        default:
            echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
            echo "{$combattant1->getName()} n'a pas choisi une action valide.<br>";
            echo "</div>";
            break;
    }

    // Met à jour les combattants dans la session
    $_SESSION['combattant1'] = $combattant1;
    $_SESSION['combattant2'] = $combattant2;
}

/**
 * Gère l'action du combattant 2 pendant son tour de combat.
 *
 * @param object $combattant2 Le deuxième combattant qui effectue l'action.
 * @param object $combattant1 Le premier combattant qui subit l'action.
 * @param string $action2 L'action choisie par le combattant 2 (ex: attaquer, soigner, etc.).
 *
 * @return void
 */
function actionComb2($combattant2, $combattant1, $action2) {
    // Traite l'action de combat selon le choix du joueur 2
    switch ($action2) {
        // Si l'action est "attaquer"
        case 'attaquer':
            // Si la précision du combattant 2 est supérieure ou égale à l'agilité du combattant 1
            if ($combattant2->getPrecision() >= $combattant1->getAgilite()) {
                // Le combattant 1 subit des dégâts
                $combattant1->setPv(max(0, $combattant1->getPv() - $combattant2->getForce()));
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()} inflige {$combattant2->getForce()} dégâts.<br>";
                echo "{$combattant1->getName()} a maintenant {$combattant1->getPv()} PV.<br>";
                echo "</div>";
            } else {
                // Si l'attaque échoue, l'agilité du combattant 1 est réduite
                $combattant1->setAgilite(max(0, $combattant1->getAgilite() - 50));
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant1->getName()} a esquivé l'attaque.<br>";
                echo "</div>";
            }
            break;

        // Si l'action est "soigner"
        case 'soigner':
            // Si le combattant 2 a des potions de soin restantes
            if ($_SESSION['compteur_soin2'] > 0) {
                // Le combattant 2 gagne des points de vie
                $combattant2->setPv($combattant2->getPv() + 50);
                $_SESSION['compteur_soin2']--;
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()}, Vous gagnez 50 PV,<br>
                      il vous reste {$_SESSION['compteur_soin2']} potions de soin.<br>";
                echo "</div>";
            } else {
                // Si plus de potions de soin, affiche un message d'erreur
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()}, vous n'avez plus de potions de soin ! <br>";
                echo "</div>";
            }
            break;

        // Si l'action est "accelerer"
        case 'accelerer':
            // Si le combattant 2 a des potions d'agilité restantes
            if ($_SESSION['compteur_agil2'] > 0) {
                // Augmente l'agilité du combattant 2
                $combattant2->setAgilite($combattant2->getAgilite() + 50);
                $_SESSION['compteur_agil2']--;
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()}, Vous gagnez 50 d'agilité,<br>
                      il vous reste {$_SESSION['compteur_agil2']} potions d'agilité.<br>";
                echo "</div>";
            } else {
                // Si plus de potions d'agilité, affiche un message d'erreur
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()}, Vous n'avez plus de potion d'agilité !<br>";
                echo "</div>";
            }
            break;

        // Si l'action est "endurer"
        case 'endurer':
            // Si le combattant 2 a des potions de précision restantes
            if ($_SESSION['compteur_prec2'] > 0) {
                // Augmente la précision du combattant 2
                $combattant2->setPrecision($combattant2->getPrecision() + 50);
                $_SESSION['compteur_prec2']--;
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()}, Vous gagnez 50 de précision,<br>
                      il vous reste {$_SESSION['compteur_prec2']} potions de précision.<br>";
                echo "</div>";
            } else {
                // Si plus de potions de précision, affiche un message d'erreur
                echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
                echo "{$combattant2->getName()}, Vous n'avez plus de potion de précision !<br>";
                echo "</div>";
            }
            break;

        // Si l'action n'est pas reconnue
        default:
            echo '<div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 text-center text-xl font-bold">';
            echo "{$combattant2->getName()} n'a pas choisi une action valide.<br>";
            echo "</div>";
            break;
    }

    // Met à jour les combattants dans la session
    $_SESSION['combattant1'] = $combattant1;
    $_SESSION['combattant2'] = $combattant2;
}

combattre($combattant1 ?? null, $combattant2 ?? null, $_SESSION['tour_actuel']);

?>
</body>
</html>