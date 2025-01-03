<?php

class Orque extends Perso implements Arme, Talent {

    // Déclaration des propriétés de la classe
    protected string $name;      // Nom de l'orc
    protected string $race;      // Race de l'orc
    protected string $classe;    // Classe (guerrier, paladin, etc.)
    protected string $arme;      // Arme équipée par l'orc
    protected int $Pv;           // Points de vie de l'orc
    protected int $force;        // Force de l'orc
    protected bool $enVie;       // Statut de vie de l'orc
    protected int $precision;    // Précision de l'orc
    protected int $agilite;      // Agilité de l'orc

    /**
     * @brief Constructeur de la classe Orque
     * @param string $name Le nom de l'orc
     * Initialise les caractéristiques de base de l'orc
     */
    public function __construct($name) {
        $this->name = $name;    
        $this->Pv = 100;        // Points de vie par défaut
        $this->force = 50;      // Force par défaut
        $this->enVie = true;    // L'orc est vivant par défaut
        $this->precision = 70;  // Précision par défaut
        $this->agilite = 20;    // Agilité par défaut
    }

    /**
     * @brief Définit le nom de l'orc
     * @param string $name Le nom de l'orc
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @brief Obtient le nom de l'orc
     * @return string Le nom de l'orc
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @brief Définit les points de vie de l'orc
     * @param int $Pv Les points de vie de l'orc
     */
    public function setPv($Pv) {
        $this->Pv = $Pv;
    }

    /**
     * @brief Obtient les points de vie de l'orc
     * @return int Les points de vie de l'orc
     */
    public function getPv() {
        return $this->Pv;
    }

    /**
     * @brief Définit la force de l'orc
     * @param int $force La force de l'orc
     */
    public function setForce($force) {
        $this->force = $force;
    }

    /**
     * @brief Obtient la force de l'orc
     * @return int La force de l'orc
     */
    public function getForce() {
        return $this->force;
    }

    /**
     * @brief Définit l'état de vie de l'orc
     * @param bool $enVie L'état de vie de l'orc
     */
    public function setEnVie($enVie) {
        $this->enVie = $enVie;
    }

    /**
     * @brief Obtient l'état de vie de l'orc
     * @return bool L'état de vie de l'orc
     */
    public function getEnVie() {
        return $this->enVie;
    }

    /**
     * @brief Définit la précision de l'orc
     * @param int $precision La précision de l'orc
     */
    public function setPrecision($precision) {
        $this->precision = $precision;
    }

    /**
     * @brief Obtient la précision de l'orc
     * @return int La précision de l'orc
     */
    public function getPrecision() {
        return $this->precision;
    }

    /**
     * @brief Définit l'agilité de l'orc
     * @param int $agilite L'agilité de l'orc
     */
    public function setAgilite($agilite) {
        $this->agilite = $agilite;
    }

    /**
     * @brief Obtient l'agilité de l'orc
     * @return int L'agilité de l'orc
     */
    public function getAgilite() {
        return $this->agilite;
    }

    /**
     * @brief Méthode pour attaquer, retourne la précision de l'orc
     * @return int La précision de l'orc
     */
    public function attaquer() {
        return $this->precision;
    }

    /**
     * @brief Méthode pour défendre, retourne l'agilité de l'orc
     * @return int L'agilité de l'orc
     */
    public function defendre() {
        return $this->agilite;
    }

    /**
     * @brief Méthode pour gérer la mort de l'orc (définir enVie à false)
     * @return bool L'état de vie de l'orc après sa mort
     */
    public function deceder() {
        $this->enVie = false;
        return $this->enVie;   
    }

    /**
     * @brief Méthode pour obtenir la classe de l'orc
     * @return string La classe de l'orc ou un message si non définie
     */
    public function getClasse() {
        if (isset($this->classe)) {
            return $this->classe;
        } else {
            return 'Classe non définie';
        }
    }

    /**
     * @brief Méthode pour définir la classe de l'orc et ajuster ses caractéristiques
     * @param string $classe La classe choisie pour l'orc
     */
    public function setClasse($classe) {

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
                echo "Classe inconnue : {$classe}<br>";
        }
    }

    /**
     * @brief Méthode pour obtenir l'arme de l'orc
     * @return string Le nom de l'arme ou un message si non définie
     */
    public function getArme() {
        if (isset($this->arme)) {
            return $this->arme;
        } else {
            return 'Arme non définie';
        }
    }

    /**
     * @brief Méthode pour définir l'arme de l'orc et ajuster ses caractéristiques
     * @param string $arme Le nom de l'arme choisie
     */
    public function setArme($arme) {

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
                echo "Arme inconnue : {$arme}<br>";
        }
    }

    /**
     * @brief Méthode pour définir la race de l'orc
     * @param string $race La race de l'orc
     */
    public function setRace($race) {
        $this->race = $race;
    }

    /**
     * @brief Méthode pour obtenir la race de l'orc
     * @return string La race de l'orc
     */
    public function getRace() {
        return $this->race;
    }

    /**
     * @brief Méthode de triche pour donner des statistiques spéciales à certains personnages
     * @details Si le nom est "Urukai", des statistiques exceptionnelles sont attribuées
     */
    public function cheatCode() {
        if ($this->name === 'Urukai') {
            $this->Pv = 1000;
            $this->force = 1000;
            $this->agilite = 1000;
            $this->precision = 1000;
        }
        if ($this->name === 'Antoine.D') {
            $this->Pv = 2000;
            $this->force = 2000;
            $this->agilite = 2000;
            $this->precision = 2000;
        }
    }
}
?>
