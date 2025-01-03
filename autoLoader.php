<?php
/**
 * Enregistre une fonction de chargement automatique des classes.
 * Cette fonction est appelée lorsque PHP tente de charger une classe qui n'a pas encore été définie.
 * 
 * @param string $class Le nom de la classe à charger.
 * 
 * La fonction va tenter de charger le fichier correspondant à la classe en utilisant son nom et son emplacement.
 * Si le fichier existe dans le répertoire `./Application/`, il sera inclus dans le script.
 */
spl_autoload_register(function ($class) {
    // Vérifie si le fichier correspondant à la classe existe dans le répertoire './Application/'
    if (file_exists('./Application/' . $class . '.php')) :
        // Inclut le fichier PHP de la classe
        include './Application/' . $class . '.php';
    endif;
});
