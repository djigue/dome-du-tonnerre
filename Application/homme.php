<?php

// La classe Homme hérite de la classe Perso et implémente les interfaces Arme et Talent
class Homme extends Perso implements Arme, Talent {

    // Déclaration des propriétés de la classe
    protected string $name;      // Nom de l'homme
    protected string $race;      // Race de l'homme
    protected string $classe;    // Classe (guerrier, voleur, etc.)
    protected string $arme;      // Arme équipée par l'homme
    protected int $Pv;           // Points de vie de l'homme
    protected int $force;        // Force de l'homme
    protected bool $enVie;       // Statut de vie de l'homme
    protected int $precision;    // Précision de l'homme
    protected int $agilite;      // Agilité de l'homme

    /**
     * Constructeur qui initialise l'homme avec des valeurs de base
     *
     * @param string $name Le nom de l'homme
     */
    public function __construct($name) {
        $this->name = $name;   
        $this->Pv = 100;        // Points de vie par défaut
        $this->force = 40;      // Force par défaut
        $this->enVie = true;    // L'homme est vivant par défaut
        $this->precision = 80;  // Précision par défaut
        $this->agilite = 70;    // Agilité par défaut
    }

    /**
     * Méthode pour définir le nom de l'homme
     *
     * @param string $name Le nom de l'homme
     */
    public function setName ($name) {
        $this->name = $name;
    }

    /**
     * Méthode pour obtenir le nom de l'homme
     *
     * @return string Le nom de l'homme
     */
    public function getName () {
       return $this->name;
    }

    /**
     * Méthode pour définir les points de vie de l'homme
     *
     * @param int $Pv Les points de vie de l'homme
     */
    public function setPv ($Pv) {
        $this->Pv = $Pv;
    }

    /**
     * Méthode pour obtenir les points de vie de l'homme
     *
     * @return int Les points de vie de l'homme
     */
    public function getPv () {
       return $this->Pv;
    }

    /**
     * Méthode pour définir la force de l'homme
     *
     * @param int $force La force de l'homme
     */
    public function setForce ($force) {
        $this->force = $force;
    }

    /**
     * Méthode pour obtenir la force de l'homme
     *
     * @return int La force de l'homme
     */
    public function getForce () {
       return $this->force;
    }

    /**
     * Méthode pour définir l'état de vie de l'homme
     *
     * @param bool $enVie Statut de vie de l'homme
     */
    public function setEnVie ($enVie) {
        $this->enVie = $enVie;
    }

    /**
     * Méthode pour obtenir l'état de vie de l'homme
     *
     * @return bool Statut de vie de l'homme
     */
    public function getEnVie () {
       return $this->enVie;
    }

    /**
     * Méthode pour définir la précision de l'homme
     *
     * @param int $precision La précision de l'homme
     */
    public function setPrecision ($precision) {
        $this->precision = $precision;
    }

    /**
     * Méthode pour obtenir la précision de l'homme
     *
     * @return int La précision de l'homme
     */
    public function getPrecision () {
       return $this->precision;
    }

    /**
     * Méthode pour définir l'agilité de l'homme
     *
     * @param int $agilite L'agilité de l'homme
     */
    public function setAgilite ($agilite) {
        $this->agilite = $agilite;
    }

    /**
     * Méthode pour obtenir l'agilité de l'homme
     *
     * @return int L'agilité de l'homme
     */
    public function getAgilite () {
       return $this->agilite;
    }

    /**
     * Méthode pour attaquer, retourne la force de l'homme
     *
     * @return int La force de l'homme
     */
    public function attaquer () {
        return $this->force;
    }

    /**
     * Méthode pour défendre, retourne l'agilité de l'homme
     *
     * @return int L'agilité de l'homme
     */
    public function defendre() {
        return $this->agilite;
    }

    /**
     * Méthode pour gérer la mort de l'homme (définir enVie à false)
     *
     * @return bool Statut de vie de l'homme après sa mort
     */
    public function deceder() {
        $this->enVie = false;
        return $this->enVie;   
    }

    /**
     * Méthode pour obtenir la classe de l'homme
     *
     * @return string La classe de l'homme ou un message si non définie
     */
    public function getClasse() {
        if (isset($this->classe)) {
            return $this->classe;
        } else {
            return 'Classe non définie';  // Retourne un message si la classe n'est pas définie
        }
    }

    /**
     * Méthode pour définir la classe de l'homme et ajuster ses caractéristiques
     *
     * @param string $classe La classe choisie (guerrier, paladin, voleur, etc.)
     */
    public function setClasse($classe) {
        // Ajuste les caractéristiques de l'homme en fonction de la classe choisie
        switch ($classe) {
            case 'guerrier':
                $this->classe = 'Guerrier';
                $this->force += 30;
                $this->precision += 5;
                $this->agilite -= 5;
                break;
            case 'paladin':
                $this->classe = 'Paladin';
                $this->force += 20;
                $this->precision += 5;
                $this->agilite += 5;
                break;
            case 'voleur':
                $this->classe = 'Voleur';
                $this->force += 10;
                $this->precision += 10;
                $this->agilite += 10;
                break;
            default:
                echo "Classe inconnue : {$classe}<br>";  // Si la classe n'est pas reconnue, afficher un message d'erreur
        }
    }

    /**
     * Méthode pour obtenir l'arme de l'homme
     *
     * @return string L'arme de l'homme ou un message si non définie
     */
    public function getArme() {
        if (isset($this->arme)) {
            return $this->arme;
        } else {
            return 'Arme non définie';  // Retourne un message si l'arme n'est pas définie
        }
    }

    /**
     * Méthode pour définir l'arme de l'homme et ajuster ses caractéristiques
     *
     * @param string $arme L'arme choisie (hache, épée, dagues, etc.)
     */
    public function setArme($arme) {
        // Ajuste les caractéristiques de l'homme en fonction de l'arme choisie
        switch ($arme) {
            case 'hache':
                $this->arme = 'Hâche';
                $this->force += 30;
                $this->precision += 5;
                $this->agilite -= 5; 
                break;
            case 'epee':
                $this->arme = 'Epée';
                $this->force += 20;
                $this->precision += 10;
                $this->agilite += 5;
                break;
            case 'dagues':
                $this->arme = 'Dagues';
                $this->force += 10;
                $this->precision += 20;
                $this->agilite += 20;
                break;
            default:
                echo "Arme inconnue : {$arme}<br>";  // Si l'arme n'est pas reconnue, afficher un message d'erreur
        }
    }

    /**
     * Méthode pour définir la race de l'homme
     *
     * @param string $race La race de l'homme
     */
    public function setRace ($race) {
        $this->race = $race;
    }

    /**
     * Méthode pour obtenir la race de l'homme
     *
     * @return string La race de l'homme
     */
    public function getRace () {
       return $this->race;
    }

    /**
     * Méthode de triche pour donner des statistiques spéciales à certains personnages
     *
     * @return void
     */
    public function cheatCode () {
        // Si le nom de l'homme est "Aragorn", lui attribuer des statistiques exceptionnelles
        if ($this->name === 'Aragorn') {
            $this->Pv = 1000;
            $this->force = 1000;
            $this->agilite = 1000;
            $this->precision = 1000;
        }
        // Si le nom de l'homme est "Antoine.D", lui attribuer des statistiques exceptionnelles
        if ($this->name === 'Antoine.D') {
            $this->Pv = 2000;
            $this->force = 2000;
            $this->agilite = 2000;
            $this->precision = 2000;
        }
    }
}
?>
