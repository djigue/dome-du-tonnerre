<?php

/**
 * @abstract
 * @brief Classe abstraite représentant un personnage
 */
abstract class Perso {

    // Déclaration des propriétés de la classe
    protected string $name;       // Nom du personnage
    protected string $race;       // Race du personnage
    protected string $classe;     // Classe du personnage
    protected string $arme;       // Arme équipée par le personnage
    protected int $Pv;            // Points de vie du personnage
    protected int $endurance;     // Endurance du personnage
    protected int $force;         // Force du personnage
    protected bool $enVie;        // Statut de vie du personnage
    protected int $mana;          // Mana du personnage
    protected int $magie;         // Magie du personnage
    protected int $vitesse;       // Vitesse du personnage
    protected int $precision;     // Précision du personnage
    protected int $agilite;       // Agilité du personnage

    /**
     * @brief Constructeur de la classe Perso
     * @param string $name Nom du personnage
     * @param int $Pv Points de vie du personnage
     * @param int $endurance Endurance du personnage
     * @param int $force Force du personnage
     * @param bool $enVie Statut de vie du personnage
     * @param int $mana Mana du personnage
     * @param int $magie Magie du personnage
     * @param int $vitesse Vitesse du personnage
     * @param int $precision Précision du personnage
     * @param int $agilite Agilité du personnage
     * @param string $race Race du personnage
     * @param string $classe Classe du personnage
     * @param string $arme Arme équipée par le personnage
     */
    public function __construct($name, $Pv, $endurance, $force, $enVie, $mana, $magie, $vitesse, $precision, $agilite, $race, $classe, $arme) {
        $this->name = $name;    
        $this->Pv = $Pv;
        $this->endurance = $endurance;
        $this->force = $force;
        $this->enVie = $enVie;
        $this->mana = $mana;
        $this->magie = $magie;
        $this->vitesse = $vitesse;
        $this->precision = $precision;
        $this->agilite = $agilite;
        $this->race = $race;
        $this->classe = $classe;
        $this->arme = $arme;
    }

    /**
     * @brief Définit le nom du personnage
     * @param string $name Le nom du personnage
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @brief Obtient le nom du personnage
     * @return string Le nom du personnage
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @brief Définit les points de vie du personnage
     * @param int $Pv Les points de vie du personnage
     */
    public function setPv($Pv) {
        $this->Pv = $Pv;
    }

    /**
     * @brief Obtient les points de vie du personnage
     * @return int Les points de vie du personnage
     */
    public function getPv() {
        return $this->Pv;
    }

    /**
     * @brief Définit l'endurance du personnage
     * @param int $endurance L'endurance du personnage
     */
    public function setEndurance($endurance) {
        $this->endurance = $endurance;
    }

    /**
     * @brief Obtient l'endurance du personnage
     * @return int L'endurance du personnage
     */
    public function getEndurance() {
        return $this->endurance;
    }

    /**
     * @brief Définit la force du personnage
     * @param int $force La force du personnage
     */
    public function setForce($force) {
        $this->force = $force;
    }

    /**
     * @brief Obtient la force du personnage
     * @return int La force du personnage
     */
    public function getForce() {
        return $this->force;
    }

    /**
     * @brief Définit l'état de vie du personnage
     * @param bool $enVie L'état de vie du personnage (true si vivant, false si mort)
     */
    public function setEnVie($enVie) {
        $this->enVie = $enVie;
    }

    /**
     * @brief Obtient l'état de vie du personnage
     * @return bool L'état de vie du personnage
     */
    public function getEnVie() {
        return $this->enVie;
    }

    /**
     * @brief Définit le mana du personnage
     * @param int $mana Le mana du personnage
     */
    public function setMana($mana) {
        $this->mana = $mana;
    }

    /**
     * @brief Obtient le mana du personnage
     * @return int Le mana du personnage
     */
    public function getMana() {
        return $this->mana;
    }

    /**
     * @brief Définit la magie du personnage
     * @param int $magie La magie du personnage
     */
    public function setMagie($magie) {
        $this->magie = $magie;
    }

    /**
     * @brief Obtient la magie du personnage
     * @return int La magie du personnage
     */
    public function getMagie() {
        return $this->magie;
    }

    /**
     * @brief Définit la vitesse du personnage
     * @param int $vitesse La vitesse du personnage
     */
    public function setVitesse($vitesse) {
        $this->vitesse = $vitesse;
    }

    /**
     * @brief Obtient la vitesse du personnage
     * @return int La vitesse du personnage
     */
    public function getVitesse() {
        return $this->vitesse;
    }

    /**
     * @brief Définit la précision du personnage
     * @param int $precision La précision du personnage
     */
    public function setPrecision($precision) {
        $this->precision = $precision;
    }

    /**
     * @brief Obtient la précision du personnage
     * @return int La précision du personnage
     */
    public function getPrecision() {
        return $this->precision;
    }

    /**
     * @brief Définit l'agilité du personnage
     * @param int $agilite L'agilité du personnage
     */
    public function setAgilite($agilite) {
        $this->agilite = $agilite;
    }

    /**
     * @brief Obtient l'agilité du personnage
     * @return int L'agilité du personnage
     */
    public function getAgilite() {
        return $this->agilite;
    }

    /**
     * @brief Fonction d'attaque du personnage
     * @details Cette fonction peut être implémentée dans les classes dérivées
     */
    public function attaquer() {}

    /**
     * @brief Fonction de défense du personnage
     * @details Cette fonction peut être implémentée dans les classes dérivées
     */
    public function defendre() {}

    /**
     * @brief Fonction qui gère la mort du personnage
     * @details Cette fonction peut être implémentée dans les classes dérivées
     */
    public function deceder() {}

}
?>
