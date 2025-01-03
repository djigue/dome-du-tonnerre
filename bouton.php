<?php

/**
 * Crée un bouton HTML dans un formulaire POST.
 *
 * @param string $texte Le texte affiché sur le bouton.
 * @param string $name Le nom du bouton, utilisé pour identifier le bouton dans le formulaire (clé de la variable $_POST).
 * @param string $id L'identifiant unique du bouton, utilisé pour le style CSS ou la manipulation JavaScript.
 * @param string $classe La ou les classes CSS appliquées au bouton pour la mise en forme.
 * @param string $value La valeur envoyée avec le formulaire lorsque le bouton est cliqué.
 *
 * @return string Le code HTML du formulaire contenant le bouton.
 */
function creerBouton($texte, $name, $id, $classe, $value) {
    // Retourne un code HTML contenant un formulaire avec un bouton de soumission.
    return "
        <form method='post' action='index.php'>
            <button type='submit' name='$name' id='$id' class='$classe' value='$value'>$texte</button>
        </form>
    ";
}
