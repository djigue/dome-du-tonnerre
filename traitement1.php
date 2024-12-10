<a href="index.php">retour</a>
<?php
include("autoLoader.php");
session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['nom']) && isset($_POST['race']) && isset($_POST['classe']) && isset($_POST['arme'])) {
            $name = $_POST['nom'];
            $race = $_POST['race'];
            $classe = $_POST['classe'];
            $arme = $_POST['arme'];
        
      if (empty($_POST['nom'])) {
        echo "Le nom est obligatoire.";
        exit;
      }
    
    switch ($race) {  
        case 'homme':
            $joueur1 = new Homme($name);
            break;
        case 'nain':
            $joueur1 = new Nain($name);
            break;
        case 'orque':
            $joueur1 = new Orque($name);
            break;  
        case 'elfe':
            $joueur1 = new Elfe($name);
            break;  
        default:
            echo "Race inconnue.";
            exit;
    }



    $joueur1->setClasse($classe);
    $joueur1->setArme($arme);
    $joueur1->setRace($race);

    $_SESSION['combattant1'] = $joueur1;
    $_SESSION['form1_submitted'] = true;

    header("Location: index.php");
    exit();
  }
}

?>
