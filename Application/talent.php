<?php

/**
 * @interface
 * @brief Interface Talent, représentant un comportement lié à la classe d'un personnage.
 */
interface Talent {

    /**
     * @brief Définit la classe du personnage
     * @param string $classe La classe du personnage (ex : Guerrier, Paladin, etc.)
     */
    public function setClasse($classe);

}
?>
