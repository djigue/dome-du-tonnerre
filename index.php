<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dôme du Tonnerre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
include("autoLoader.php");
include("bouton.php");

session_start();

if (!isset($_SESSION['tour_actuel'])) {
    $_SESSION['tour_actuel'] = 1; 
}

if (!isset($_SESSION['combat_commence'])) {
    $_SESSION['combat_commence'] = false;
}

if (!isset($_SESSION['form1_submitted'])) {
    $_SESSION['form1_submitted'] = false;
}

if (!isset($_SESSION['form2_submitted'])) {
    $_SESSION['form2_submitted'] = false;
}

if (!isset($_SESSION['compteur_agil1'])) {
    $_SESSION['compteur_agil1'] = 3;
}
if (!isset($_SESSION['compteur_soin1'])) {
    $_SESSION['compteur_soin1'] = 3;
}
if (!isset($_SESSION['compteur_prec1'])) {
    $_SESSION['compteur_prec1'] = 3;

}
if (!isset($_SESSION['compteur_agil2'])) {
    $_SESSION['compteur_agil2'] = 3;
}
if (!isset($_SESSION['compteur_soin2'])) {
    $_SESSION['compteur_soin2'] = 3;
}
if (!isset($_SESSION['compteur_prec2'])) {
    $_SESSION['compteur_prec2'] = 3;
}

echo "<h1 class='text-4xl font-bold text-center mt-8 text-red-900'>Bienvenue dans le dôme du tonnerre</h1>";

echo "<div class='relative h-screen'>";
if (!$_SESSION['form1_submitted']) {
    echo '<form method="POST" action="traitement1.php" class="absolute top-10 left-10 w-1/4 p-6 bg-gray-800 bg-opacity-50 shadow-md rounded-lg">
        <input type="hidden" name="combattant1" value="combattant1">
        
        <label for="nom1" class="block font-medium text-white">Nom :</label>
        <input type="text" id="nom1" name="nom" class="w-full mt-2 p-2 border border-gray-300 rounded-md"><br>

        <label for="race1" class="block mt-4 font-medium text-white">Race :</label>
        <select id="race1" name="race" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="nain">Nain</option>
          <option value="elfe">Elfe</option>
          <option value="homme">Homme</option>
          <option value="orque">Orque</option>
        </select>

        <label for="classe1" class="block mt-4 font-medium text-white">Classe :</label>
        <select id="classe1" name="classe" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="guerrier">Guerrier</option>
          <option value="paladin">Paladin</option>
          <option value="voleur">Voleur</option>
        </select>

        <label for="arme1" class="block mt-4 font-medium text-white">Arme :</label>
        <select id="arme1" name="arme" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="hache">Hache</option>
          <option value="epee">Épée</option>
          <option value="dagues">Dagues</option>
        </select>

        <button type="submit" class="mt-6 w-full bg-red-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Choisir</button>
    </form>';
}

if (!$_SESSION['form2_submitted']) {
    echo '<form method="POST" action="traitement2.php" class="absolute top-10 right-10 w-1/4 p-6 bg-gray-800 bg-opacity-50 shadow-md rounded-lg">
        <input type="hidden" name="combattant2" value="combattant2">
        
        <label for="nom2" class="block font-medium text-red-900">Nom :</label>
        <input type="text" id="nom2" name="nom" class="w-full mt-2 p-2 border border-gray-300 rounded-md"><br>

        <label for="race2" class="block mt-4 font-medium text-white">Race :</label>
        <select id="race2" name="race" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="nain">Nain</option>
          <option value="elfe">Elfe</option>
          <option value="homme">Homme</option>
          <option value="orque">Orque</option>
        </select>

        <label for="classe2" class="block mt-4 font-medium text-white">Classe :</label>
        <select id="classe2" name="classe" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="guerrier">Guerrier</option>
          <option value="paladin">Paladin</option>
          <option value="voleur">Voleur</option>
        </select>

        <label for="arme2" class="block mt-4 font-medium text-white">Arme :</label>
        <select id="arme2" name="arme" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
          <option value=""></option>
          <option value="hache">Hache</option>
          <option value="epee">Épée</option>
          <option value="dagues">Dagues</option>
        </select>

        <button type="submit" class="mt-6 w-full bg-red-900 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Choisir</button>
    </form>';
}

echo "</div>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['combattant']) && $_POST['combattant'] === 'combattant1') { 
    $_SESSION['form1_submitted'] = true; 
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['combattant']) && $_POST['combattant'] === 'combattant2') {

    $_SESSION['form2_submitted'] = true; 
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit;
}

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

    // Détermination de l'image en fonction de la race
    $imagePath = '';
    switch (strtolower($race)) {
        case 'homme':
            $imagePath = 'images/homme.jpg';
            break;
        case 'nain':
            $imagePath = 'images/nain.jpg';
            break;
        case 'orque':
            $imagePath = 'images/orque.jpg';
            break;
        case 'elfe':
            $imagePath = 'images/elfe.jpg';
            break;
        default:
            $imagePath = 'images/default.jpg'; // Image par défaut si la race est inconnue
            break;
    }

    // Affichage des informations
    echo "
        <!-- Conteneur pour les informations -->
        <div class='absolute top-36 left-36 text-red-900 border border-black w-1/4'>
            <h1 class='text-xl font-bold ml-4'>$name</h1>
            <p class='ml-2'>Race : $race</p>
            <p class='ml-2'>Classe : $classe</p>
            <p class='ml-2'>Arme : $arme</p>
            <p class='ml-2'>Force : $force</p>
            <p class='ml-2'>$compteurSoin PV : $pv 
                <meter value='$pv' max='100' optimum='100' low='25' high='75' class='w-1/4'></meter>
            </p>
            <p class='ml-2'>$compteurAgil Agilité : $agilite 
                <meter value='$agilite' max='100' optimum='100' low='25' high='75' class='w-1/4'></meter>
            </p>
            <p class='ml-2'>$compteurPrec Précision : $precision 
                <meter value='$precision' max='100' optimum='100' low='25' high='75' class='w-1/4'></meter>
            </p>
        </div>
        
        <!-- Image de combattant -->
        <div class='absolute bottom-4 left-36 border border-blue-500 w-1/6'>
            <img src='$imagePath' alt='Image de $race' class='mt-4 w-auto h-auto rounded shadow-md'>
        </div>
    ";    
}



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

    // Détermination de l'image en fonction de la race
    $imagePath = '';
    switch (strtolower($race)) {
        case 'homme':
            $imagePath = 'images/homme.jpg';
            break;
        case 'nain':
            $imagePath = 'images/nain.jpg';
            break;
        case 'orque':
            $imagePath = 'images/orque.jpg';
            break;
        case 'elfe':
            $imagePath = 'images/elfe.jpg';
            break;
        default:
            $imagePath = 'images/default.jpg'; // Image par défaut si la race est inconnue
            break;
    }

    // Affichage des informations
    echo "
        <div class='absolute top-36 right-36 text-red-900 border border-black w-1/4'>
            <h1 class='text-xl font-bold mr-4'>$name</h1>
            <p class='mr-2'>Race : $race</p>
            <p class='mr-2'>Classe : $classe</p>
            <p class='mr-2'>Arme : $arme</p>
            <p class='mr-2'>Force : $force</p>
            <p class='mr-2'>$compteurSoin PV : $pv 
                <meter value='$pv' max='100' optimum='100' low='25' high='75' class='1/4'></meter>
            </p>
            <p class='mr-2'>$compteurAgil Agilité : $agilite 
                <meter value='$agilite' max='100' optimum='100' low='25' high='75' class='1/4'></meter>
            </p>
            <p class='mr-2'>$compteurPrec Précision : $precision 
                <meter value='$precision' max='100' optimum='100' low='25' high='75' class='1/4'></meter>
            </p>
        </div>
         <div class='absolute bottom-4 right-36 border border-blue-500 w-1/6'>
            <img src='$imagePath' alt='Image de $race' class='mt-4 w-auto h-auto rounded shadow-md'>
        </div>
    ";
}


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

if ($_SESSION['combat_commence']) {
   
    echo "<h2 class='absolute top-44 left-1/2 transform -translate-x-1/2'>{$combattant1->getName()} VS {$combattant2->getName()}</h2>";
    if ($_SESSION['tour_actuel'] === 1) {
        echo "<div class='absolute bottom-52 left-1/3'>";
        echo "<h3>Choisissez une action :</h3>";
        echo '<form method="POST">';
        echo creerBouton('Attaquer', 'action1', 'attack1', "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'attaquer');
        echo creerBouton('Soigner', 'action1', 'heal1', "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'soigner');
        echo creerBouton('Agilité', 'action1', 'agil1', "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'accelerer');
        echo creerBouton('Pécision', 'action1', 'pre1', "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'endurer');
        echo '</form>';
        echo "</div>";
    } elseif ($_SESSION['tour_actuel'] === 2) {
        echo "<div class='absolute bottom-52 right-1/4'>";
        echo "<h3>Choisissez une action :</h3>";
        echo '<form method="POST">';
        echo creerBouton('Attaquer', 'action2', 'attack2',"bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'attaquer');
        echo creerBouton('Soigner', 'action2', 'heal2',"bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'soigner');
        echo creerBouton('Agilité', 'action2', 'agil2',"bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'accelerer');
        echo creerBouton('Pécision', 'action2', 'pre2',"bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", 'endurer');
        echo '</form>';
        echo "</div>";
    }
}

function combattre($combattant1, $combattant2, &$tourActuel) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($tourActuel === 1 && isset($_POST['action1'])) {
            actionComb1($combattant1, $combattant2, $_POST['action1']);


            if ($combattant2->getPv() <= 0) {

                echo "{$combattant2->getName()} est mort !<br>";
                session_destroy();
                echo creerBouton("Fin Combat", "fin combat", "fin combat", "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2","fin combat");
                return;
            }

            echo '<form method="POST">';
            echo '<button type="submit" name="next_turn" class="bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2">Passer au tour suivant</button>';
            echo '</form>';
    
    
            $_SESSION['tour_actuel'] = 2;
        } elseif ($tourActuel === 2 && isset($_POST['action2'])) {
            actionComb2($combattant2, $combattant1, $_POST['action2']);


            if ($combattant1->getPv() <= 0) {

                echo "{$combattant1->getName()} est mort !<br>";
                session_destroy();
                echo creerBouton("Fin Combat", "fin combat", "fin combat", "bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2", "fin combat");
                return;
            }

            echo '<form method="POST">';
            echo '<button type="submit" name="next_turn" class="bg-red-900 text-white font-bold py-2 px-4 rounded hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2">Passer au tour suivant</button>';
            echo '</form>';    
    
            $_SESSION['tour_actuel'] = 1;
        }
    }
}

function actionComb1($combattant1, $combattant2, $action1) {
    switch ($action1) {
        case 'attaquer':
    
            if ($combattant1->getPrecision() >= $combattant2->getAgilite()) {
                $combattant2->setPv(max(0, $combattant2->getPv() - $combattant1->getForce()));
                echo "{$combattant1->getName()} inflige {$combattant1->getForce()} points de dégâts. ";
                echo "{$combattant2->getName()} a maintenant {$combattant2->getPv()} PV.<br>";
            } else {
                $combattant2->setAgilite(max(0, $combattant2->getAgilite() - 50));
                echo "{$combattant2->getName()} a esquivé l'attaque.<br>";
            }
            break;
    
        case 'soigner':
            if ($_SESSION['compteur_soin1'] > 0) {
            $combattant1->setPv($combattant1->getPv() + 50);
            $_SESSION['compteur_soin1']--;
            echo "{$combattant1->getName()}, Vous gagnez 50 PV, <br>
                  il vous reste {$_SESSION['compteur_soin1']} potions de soin.<br>";
            }else {
            echo "{$combattant1->getName()}, Vous n'avez plus de potions de soin !";
            }
            break;
    
        case 'accelerer':
            if ($_SESSION['compteur_agil1'] > 0) {
            $combattant1->setAgilite($combattant1->getAgilite() + 50);
            $_SESSION['compteur_agil1']--;
            echo "{$combattant1->getName()}, Vous gagnez 50 d'Agilité,<br>
                  il vous reste {$_SESSION['compteur_agil1']} potions d'agilité.<br>";
            }else {
            echo "{$combattant1->getName()}, Vous n'avez plus de potions d'accélération !";
            }
            break;
    
        case 'endurer':
            if ($_SESSION['compteur_prec1'] > 0) {
            $combattant1->setPrecision($combattant1->getPrecision() + 50);
            $_SESSION['compteur_prec1']--;
            echo "{$combattant1->getName()}, Vous gagnez 50 de précision,<br>
                  il vous reste {$_SESSION['compteur_prec1']} potions de précision.<br>";
            }else {
            echo "{$combattant1->getName}, Vous n'avez plus de potions de précision";
            }
            break;
    
        default:
            echo "{$combattant1->getName()} n'a pas choisi une action valide.<br>";
            break;
    }
    
    $_SESSION['combattant1'] = $combattant1;
    $_SESSION['combattant2'] = $combattant2;
    }
    
    $action2 = $_POST['action2'] ?? null;
    
    function actionComb2($combattant2, $combattant1, $action2) {
    
    switch ($action2) {
        case 'attaquer':
    
            if ($combattant2->getPrecision() >= $combattant1->getAgilite()) {
                $combattant1->setPv(max(0, $combattant1->getPv() - $combattant2->getForce()));
                echo "{$combattant2->getName()} inflige {$combattant2->getForce()} dégâts. ";
                echo "{$combattant1->getName()} a maintenant {$combattant1->getPv()} PV.<br>";
            } else {
                $combattant1->setAgilite(max(0, $combattant1->getAgilite() - 50));
                echo "{$combattant1->getName()} a esquivé l'attaque.<br>";
            }
            break;
    
        case 'soigner':
            if($_SESSION['compteur_soin2'] > 0) {
            $combattant2->setPv($combattant2->getPv() + 50);
            $_SESSION['compteur_soin2']--;
            echo "{$combattant2->getName()}, Vous gagnez 50 PV,<br>
                  il vous reste {$_SESSION['compteur_soin2']} potions de soin.<br>";
            }else {
            echo "{$combattant2->getName()}, vous n'avez plus de potions de soin ! <br>";
            }
            break;
    
        case 'accelerer':
            if($_SESSION['compteur_agil2'] > 0) {
            $combattant2->setAgilite($combattant2->getAgilite() + 50);
            $_SESSION['compteur_agil2']--;
            echo "{$combattant2->getName()}, Vous gagnez 50 d'agilité,<br>
                  il vous reste {$_SESSION['compteur_agil2']} potions d'agilité.<br>";
            }else {
            echo "{$combattant2->getName()}, Vous n'avez plus de potion d'agilité !<br>";
            }
            break;
    
        case 'endurer':
            if($_SESSION['compteur_prec2'] > 0) {
            $combattant2->setPrecision($combattant2->getPrecision() + 50);
            $_SESSION['compteur_prec2']--;
            echo "{$combattant2->getName()}, Vous gagnez 50 de précision,<br>
                  il vous reste {$_SESSION['compteur_prec2']} potions de précision.<br>";
            }else {
            echo "{$combattant2->getname()}, Vous n'avez plus de potion de précision !<br>";
            }
            break;
    
        default:
            echo "{$combattant2->getName()} n'a pas choisi une action valide.<br>";
            break;
    }
    
    $_SESSION['combattant1'] = $combattant1;
    $_SESSION['combattant2'] = $combattant2;
    }
    

combattre($combattant1 ?? null, $combattant2 ?? null, $_SESSION['tour_actuel']);

?>
</body>
</html>
