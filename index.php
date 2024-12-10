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

echo "<h1>Bienvenue dans le dôme du tonnerre</h1>";

if (!$_SESSION['form1_submitted']) {
echo '<form method="POST" action="traitement1.php">
        <input type="hidden" name="combattant" value="combattant1">
        <label for="nom1">Nom :</label>
        <input type="text" id="nom1" name="nom"><br>
        <label for="race1">Race :</label>
        <select id="race1" name="race">
          <option value=""></option>
          <option value="nain">Nain</option>
          <option value="elfe">Elfe</option>
          <option value="homme">Homme</option>
          <option value="orque">Orque</option>
        </select>
        <label for="classe1">Classe :</label>
        <select id="classe1" name="classe">
          <option value=""></option>
          <option value="guerrier">Guerrier</option>
          <option value="paladin">Paladin</option>
          <option value="voleur">Voleur</option>
        </select>
        <label for="arme1">Arme :</label>
        <select id="arme1" name="arme">
          <option value=""></option>
          <option value="hache">Hache</option>
          <option value="epee">Épée</option>
          <option value="dagues">Dagues</option>
        </select>
        <button type="submit">Choisir</button>
    </form>';
}

if (!$_SESSION['form2_submitted']) {
echo '<form method="POST" action="traitement2.php">
        <input type="hidden" name="combattant" value="combattant2">
        <label for="nom2">Nom :</label>
        <input type="text" id="nom2" name="nom"><br>
        <label for="race2">Race :</label>
        <select id="race2" name="race">
          <option value=""></option>
          <option value="nain">Nain</option>
          <option value="elfe">Elfe</option>
          <option value="homme">Homme</option>
          <option value="orque">Orque</option>
        </select>
        <label for="classe2">Classe :</label>
        <select id="classe2" name="classe">
          <option value=""></option>
          <option value="guerrier">Guerrier</option>
          <option value="paladin">Paladin</option>
          <option value="voleur">Voleur</option>
        </select>
        <label for="arme2">Arme :</label>
        <select id="arme2" name="arme">
          <option value=""></option>
          <option value="hache">Hache</option>
          <option value="epee">Épée</option>
          <option value="dagues">Dagues</option>
        </select>
        <button type="submit">Choisir</button>
    </form>';
}

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
    $combattant1-> cheatCode();
    echo "<h1>{$combattant1->getName()}</h1>";
    echo "Race : {$combattant1->getRace()}<br>";
    echo "Classe : {$combattant1->getClasse()}<br>";
    echo "Arme : {$combattant1->getArme()}<br>";
    echo " Force : {$combattant1->getForce()}<br>";
    echo ($_SESSION['compteur_soin1'])."/3"." PV : {$combattant1->getPv()}"." <meter value={$combattant1->getPv()} max='100' optimum='100' low='25' high='75'></meter>"."<br>";
    echo ($_SESSION['compteur_agil1'])."/3"." Agilité : {$combattant1->getAgilite()}"." <meter value={$combattant1->getAgilite()} max='100' optimum='100' low='25' high='75'></meter>"."<br>";
    echo ($_SESSION['compteur_prec1'])."/3"." Précision : {$combattant1->getPrecision()}"." <meter value={$combattant1->getPrecision()} max='100' optimum='100' low='25' high='75'></meter>"."<br>";
}

if (isset($_SESSION['combattant2'])) {
    $combattant2 = $_SESSION['combattant2'];
    $combattant2-> cheatCode();
    echo "<h1>{$combattant2->getName()}</h1>";
    echo "Race : {$combattant2->getRace()}<br>";
    echo "Classe : {$combattant2->getClasse()}<br>";
    echo "Arme : {$combattant2->getArme()}<br>";
    echo "Force : {$combattant2->getForce()}<br>";
    echo ($_SESSION['compteur_soin2'])."/3"." PV : {$combattant2->getPv()}"." <meter value={$combattant2->getPv()} max='100' optimum='100' low='25' high='75'></meter>"."<br>";
    echo ($_SESSION['compteur_agil2'])."/3"." Agilité : {$combattant2->getAgilite()}"." <meter value={$combattant2->getAgilite()} max='100' optimum='100' low='25' high='75'></meter>"."<br>";
    echo ($_SESSION['compteur_prec2'])."/3"." Précision : {$combattant2->getPrecision()}"." <meter value={$combattant2->getPrecision()} max='100' optimum='100' low='25' high='75'></meter>"."<br>";    
}

if ($_SESSION['form1_submitted'] && $_SESSION['form2_submitted'] && !$_SESSION['combat_commence']) {
    echo '<form method="POST">';
    echo creerBouton("Démarrer le combat", "debut_combat", "start", "btn-class", "start_combat");
    echo '</form>';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['debut_combat'])) {
        $_SESSION['combat_commence'] = true;
        header("Location: " . $_SERVER['PHP_SELF']); 
        exit; 
    }
}

if ($_SESSION['combat_commence']) {
    echo "<h2>{$combattant1->getName()} VS {$combattant2->getName()}</h2>";
    if ($_SESSION['tour_actuel'] === 1) {
        echo "<h3>{$combattant1->getName()}, choisissez une action :</h3>";
        echo '<form method="POST">';
        echo creerBouton('Attaquer', 'action1', 'attack1', 'btn-class', 'attaquer');
        echo creerBouton('Soigner', 'action1', 'heal1', 'btn-class', 'soigner');
        echo creerBouton('Agilité', 'action1', 'agil1', 'btn-class', 'accelerer');
        echo creerBouton('Pécision', 'action1', 'pre1', 'btn-class', 'endurer');
        echo '</form>';
    } elseif ($_SESSION['tour_actuel'] === 2) {
        echo "<h3>{$combattant2->getName()}, choisissez une action :</h3>";
        echo '<form method="POST">';
        echo creerBouton('Attaquer', 'action2', 'attack2', 'btn-class', 'attaquer');
        echo creerBouton('Soigner', 'action2', 'heal2', 'btn-class', 'soigner');
        echo creerBouton('Agilité', 'action2', 'agil2', 'btn-class', 'accelerer');
        echo creerBouton('Pécision', 'action2', 'pre2', 'btn-class', 'endurer');
        echo '</form>';
    }
}

function combattre($combattant1, $combattant2, &$tourActuel) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($tourActuel === 1 && isset($_POST['action1'])) {
            actionComb1($combattant1, $combattant2, $_POST['action1']);


            if ($combattant2->getPv() <= 0) {

                echo "{$combattant2->getName()} est mort !<br>";
                session_destroy();
                echo creerBouton("Fin Combat", "fin combat", "fin combat", "btn-class", "fin combat");
                return;
            }

            echo '<form method="POST">';
            echo '<button type="submit" name="next_turn" class="btn-class">Passer au tour suivant</button>';
            echo '</form>';
    
    
            $_SESSION['tour_actuel'] = 2;
        } elseif ($tourActuel === 2 && isset($_POST['action2'])) {
            actionComb2($combattant2, $combattant1, $_POST['action2']);


            if ($combattant1->getPv() <= 0) {

                echo "{$combattant1->getName()} est mort !<br>";
                session_destroy();
                echo creerBouton("Fin Combat", "fin combat", "fin combat", "btn-class", "fin combat");
                return;
            }

            echo '<form method="POST">';
            echo '<button type="submit" name="next_turn" class="btn-class">Passer au tour suivant</button>';
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
    
        case 'mage':
            $combattant1->setMana($combattant1->getMana() + 50);
            echo "{$combattant1->getName()} gagne 50 de mana.<br>";
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
    
        case 'mage':
            $combattant2->setMana($combattant2->getMana() + 50);
            echo "{$combattant2->getName()} gagne 50 de mana.<br>";
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
