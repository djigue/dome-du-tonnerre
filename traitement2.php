<?php
// Inclusion du fichier d'autoload pour charger automatiquement les classes nécessaires
include("autoLoader.php");
// Démarrage de la session PHP pour pouvoir stocker des données utilisateur
session_start();

// Vérifie si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie que tous les champs requis du formulaire sont présents
    if (isset($_POST['nom']) && isset($_POST['race']) && isset($_POST['classe']) && isset($_POST['arme'])) {
        // Récupère les valeurs des champs du formulaire
        $name = $_POST['nom'];
        $race = $_POST['race'];
        $classe = $_POST['classe'];
        $arme = $_POST['arme'];

        // Vérifie si le champ nom est vide, dans ce cas, affiche un message d'erreur et arrête l'exécution du script
        if (empty($_POST['nom'])) {
            echo "Le nom est obligatoire.";
            exit; // Arrête l'exécution si le nom est vide
        }

        // Affiche les valeurs soumises pour le débogage (à supprimer en production)
        var_dump($_POST['nom']);
        var_dump($_POST['race']);
        var_dump($_POST['classe']);
        var_dump($_POST['arme']);

        // Sélectionne la classe du joueur en fonction de la race choisie
        switch ($race) {  
            case 'homme':
                $joueur2 = new Homme($name); // Crée un objet Homme avec le nom fourni
                break;
            case 'nain':
                $joueur2 = new Nain($name); // Crée un objet Nain avec le nom fourni
                break;
            case 'orque':
                $joueur2 = new Orque($name); // Crée un objet Orque avec le nom fourni
                break;  
            case 'elfe':
                $joueur2 = new Elfe($name); // Crée un objet Elfe avec le nom fourni
                break;  
            default:
                echo "Race inconnue."; // Si la race est invalide, affiche un message d'erreur
                exit; // Arrête l'exécution du script
        }

        // Définit les attributs de la classe du joueur (classe, arme, race)
        $joueur2->setClasse($classe);
        $joueur2->setArme($arme);
        $joueur2->setRace($race);

        // Enregistre l'objet joueur dans la session pour pouvoir y accéder plus tard
        $combattant2 = $_POST['combattant2']; // Récupère les informations du combattant 2
        $_SESSION['combattant2'] = $joueur2; // Sauvegarde l'objet joueur dans la session
        // Marque que le formulaire a bien été soumis pour le combattant 2
        $_SESSION['form2_submitted'] = true;

        // Redirige l'utilisateur vers la page index.php après la soumission du formulaire
        header("Location: index.php");
        exit(); // Arrête l'exécution du script après la redirection
    }
}
?>
