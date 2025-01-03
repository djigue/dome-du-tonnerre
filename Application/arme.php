<?php

// Définition de l'interface "Arme", qui impose aux classes qui l'implémentent de définir une méthode "setArme".
interface Arme {

    // Méthode "setArme" qui devra être définie dans toute classe implémentant l'interface "Arme".
    // Cette méthode permettra de définir l'arme d'un personnage.
    public function setArme($arme);

}
?>
