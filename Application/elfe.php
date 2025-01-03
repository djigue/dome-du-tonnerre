<?php

// La classe Elfe hérite de la classe Perso et implémente les interfaces Arme et Talent
class Elfe extends Perso implements Arme, Talent {

    // Déclaration des propriétés de la classe
    protected string $name;      // Nom de l'elfe
    protected string $race;      // Race de l'elfe
    protected string $classe;    // Classe (guerrier, voleur, etc.)
    protected string $arme;      // Arme équipée par l'elfe
    protected int $Pv;           // Points de vie de l'elfe
    protected int $force;        // Force de l'elfe
    protected bool $enVie;       // Statut de vie de l'elfe
    protected int $precision;    // Précision de l'elfe
    protected int $agilite;      // Agilité de l'elfe

    // Constructeur qui initialise l'elfe avec des valeurs de base
    /**
     * @param string $name Le nom de l'elfe
     */
    public function __construct($name) {
        $this->name = $name;    
        $this->Pv = 100;        // Points de vie par défaut
        $this->force = 20;      // Force par défaut
        $this->enVie = true;    // L'elfe est vivant par défaut
        $this->precision = 80;  // Précision par défaut
        $this->agilite = 50;    // Agilité par défaut
    }

    // Méthode pour définir le nom de l'elfe
    /**
     * @param string $name Le nom à assigner à l'elfe
     */
    public function setName ($name) {
        $this->name = $name;
    }

    // Méthode pour obtenir le nom de l'elfe
    /**
     * @return string Le nom de l'elfe
     */
    public function getName () {
       return $this->name;
    }

    // Méthode pour définir les points de vie de l'elfe
    /**
     * @param int $Pv Points de vie à assigner à l'elfe
     */
    public function setPv ($Pv) {
        $this->Pv = $Pv;
    }

    // Méthode pour obtenir les points de vie de l'elfe
    /**
     * @return int Les points de vie de l'elfe
     */
    public function getPv () {
       return $this->Pv;
    }

    // Méthode pour définir la force de l'elfe
    /**
     * @param int $force Force à assigner à l'elfe
     */
    public function setForce ($force) {
        $this->force = $force;
    }

    // Méthode pour obtenir la force de l'elfe
    /**
     * @return int La force de l'elfe
     */
    public function getForce () {
       return $this->force;
    }

    // Méthode pour définir l'état de vie de l'elfe
    /**
     * @param bool $enVie Statut de vie à assigner à l'elfe
     */
    public function setEnVie ($enVie) {
        $this->enVie = $enVie;
    }

    // Méthode pour obtenir l'état de vie de l'elfe
    /**
     * @return bool L'état de vie de l'elfe
     */
    public function getEnVie () {
       return $this->enVie;
    }

    // Méthode pour définir la précision de l'elfe
    /**
     * @param int $precision Précision à assigner à l'elfe
     */
    public function setPrecision ($precision) {
        $this->precision = $precision;
    }

    // Méthode pour obtenir la précision de l'elfe
    /**
     * @return int La précision de l'elfe
     */
    public function getPrecision () {
       return $this->precision;
    }

    // Méthode pour définir l'agilité de l'elfe
    /**
     * @param int $agilite Agilité à assigner à l'elfe
     */
    public function setAgilite ($agilite) {
        $this->agilite = $agilite;
    }

    // Méthode pour obtenir l'agilité de l'elfe
    /**
     * @return int L'agilité de l'elfe
     */
    public function getAgilite () {
       return $this->agilite;
    }

    // Méthode pour attaquer, retourne la force de l'elfe
    /**
     * @return int La force de l'elfe utilisée pour attaquer
     */
    public function attaquer () {
        return $this->force;
    }

    // Méthode pour défendre, retourne l'agilité de l'elfe
    /**
     * @return int L'agilité de l'elfe utilisée pour défendre
     */
    public function defendre() {
        return $this->agilite;
    }

    // Méthode pour gérer la mort de l'elfe (définir enVie à false)
    /**
     * @return bool L'état de vie de l'elfe après sa mort
     */
    public function deceder() {
        $this->enVie = false;
        return $this->enVie;  
    }

    // Méthode pour obtenir la classe de l'elfe
    /**
     * @return string La classe de l'elfe ou 'Classe non définie' si non définie
     */
    public function getClasse() {
        if (isset($this->classe)) {
            return $this->classe;
        } else {
            return 'Classe non définie';  // Retourne un message si la classe n'est pas définie
        }
    }

    // Méthode pour définir la classe de l'elfe et ajuster ses caractéristiques
    /**
     * @param string $classe Classe à assigner à l'elfe
     */
    public function setClasse($classe) {

        // Ajuste les caractéristiques de l'elfe en fonction de la classe choisie
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

    // Méthode pour obtenir l'arme de l'elfe
    /**
     * @return string L'arme de l'elfe ou 'Arme non définie' si non définie
     */
    public function getArme() {
        if (isset($this->arme)) {
            return $this->arme;
        } else {
            return 'Arme non définie';  // Retourne un message si l'arme n'est pas définie
        }
    }

    // Méthode pour définir l'arme de l'elfe et ajuster ses caractéristiques
    /**
     * @param string $arme Arme à assigner à l'elfe
     */
    public function setArme($arme) {

        // Ajuste les caractéristiques de l'elfe en fonction de l'arme choisie
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

    // Méthode pour définir la race de l'elfe
    /**
     * @param string $race Race à assigner à l'elfe
     */
    public function setRace ($race) {
        $this->race = $race;
    }

    // Méthode pour obtenir la race de l'elfe
    /**
     * @return string La race de l'elfe
     */
    public function getRace () {
       return $this->race;
    }

    // Méthode de triche pour donner des statistiques spéciales à certains personnages
    /**
     * @return void Modifie les statistiques de certains personnages en fonction de leur nom
     */
    public function cheatCode () {
        // Si le nom de l'elfe est "Legolas", lui attribuer des statistiques exceptionnelles
        if ($this->name === 'Legolas') {
            $this->Pv = 500;
            $this->force = 500;
            $this->agilite = 500;
            $this->precision = 500;
        }
        // Si le nom de l'elfe est "Antoine.D", lui attribuer des statistiques exceptionnelles
        if ($this->name === 'Antoine.D') {
            $this->Pv = 2000;
            $this->force = 2000;
            $this->agilite = 2000;
            $this->precision = 2000;
        }
    }
}
?>
