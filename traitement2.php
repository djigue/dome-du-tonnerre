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
    var_dump($_POST['nom']);
    var_dump($_POST['race']);
    var_dump($_POST['classe']);
    var_dump($_POST['arme']);

    switch ($race) {  
        case 'homme':
            $joueur2 = new Homme($name);
            break;
        case 'nain':
            $joueur2 = new Nain($name);
            break;
        case 'orque':
            $joueur2 = new Orque($name);
            break;  
        case 'elfe':
            $joueur2 = new Elfe($name);
            break;  
        default:
            echo "Race inconnue.";
            exit;
    }



    $joueur2->setClasse($classe);
    $joueur2->setArme($arme);
    $joueur2->setRace($race);

    $combattant2 = $_POST['combattant2'];
    $_SESSION['combattant2'] = $joueur2;
    $_SESSION['form2_submitted'] = true;

    header("Location: index.php");
    exit();
  }
}

?>
