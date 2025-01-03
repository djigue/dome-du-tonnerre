<?php

class Nain extends Perso implements Arme, Talent{

    // Déclaration des propriétés
    protected string $name;
    protected string $race;
    protected string $classe;
    protected string $arme;
    protected int $Pv;
    protected int $force;
    protected bool $enVie;
    protected int $precision;
    protected int $agilite;

    /**
     * Constructeur de la classe Nain
     *
     * @param string $name Nom du nain
     */
    public function __construct($name) {
        $this->name = $name;    
        $this->Pv = 100;
        $this->force = 50;
        $this->enVie = true;
        $this->precision = 70;
        $this->agilite = 20;
    }

    /**
     * Définit le nom du nain
     *
     * @param string $name Nom du nain
     */
    public function setName ($name) {
        $this->name = $name;
    }

    /**
     * Récupère le nom du nain
     *
     * @return string Le nom du nain
     */
    public function getName () {
       return $this->name;
    }

    /**
     * Définit les points de vie du nain
     *
     * @param int $Pv Points de vie
     */
    public function setPv ($Pv) {
        $this->Pv = $Pv;
    }

    /**
     * Récupère les points de vie du nain
     *
     * @return int Points de vie
     */
    public function getPv () {
       return $this->Pv;
    }

    /**
     * Définit la force du nain
     *
     * @param int $force Force du nain
     */
    public function setForce ($force) {
        $this->force = $force;
    }

    /**
     * Récupère la force du nain
     *
     * @return int Force du nain
     */
    public function getForce () {
       return $this->force;
    }

    /**
     * Définit l'état de vie du nain
     *
     * @param bool $enVie Etat de vie (true = vivant, false = mort)
     */
    public function setEnVie ($enVie) {
        $this->enVie = $enVie;
    }

    /**
     * Récupère l'état de vie du nain
     *
     * @return bool Etat de vie du nain
     */
    public function getEnVie () {
       return $this->enVie;
    }

    /**
     * Définit la précision du nain
     *
     * @param int $precision Précision du nain
     */
    public function setPrecision ($precision) {
        $this->precision = $precision;
    }

    /**
     * Récupère la précision du nain
     *
     * @return int Précision du nain
     */
    public function getPrecision () {
       return $this->precision;
    }

    /**
     * Définit l'agilité du nain
     *
     * @param int $agilite Agilité du nain
     */
    public function setAgilite ($agilite) {
        $this->agilite = $agilite;
    }

    /**
     * Récupère l'agilité du nain
     *
     * @return int Agilité du nain
     */
    public function getAgilite () {
       return $this->agilite;
    }

    /**
     * Effectue une attaque basée sur la force du nain
     *
     * @return int Force utilisée pour l'attaque
     */
    public function attaquer () {
        return $this->force;
    }

    /**
     * Effectue une défense basée sur l'agilité du nain
     *
     * @return int Agilité utilisée pour la défense
     */
    public function defendre() {
        return $this->agilite;
    }

    /**
     * Marque la mort du nain (enVie devient false)
     *
     * @return bool Etat de vie du nain après la mort
     */
    public function deceder() {
        $this->enVie = false;
        return $this->enVie;   
    }

    /**
     * Récupère la classe du nain
     *
     * @return string Classe du nain ou message si non définie
     */
    public function getClasse() {
        if (isset($this->classe)) {
            return $this->classe;
        } else {
            return 'Classe non définie';
        }
    }

    /**
     * Définit la classe du nain et ajuste ses caractéristiques
     *
     * @param string $classe Classe à attribuer (guerrier, paladin, voleur, etc.)
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
     * Récupère l'arme du nain
     *
     * @return string Arme équipée du nain
     */
    public function getArme() {
        if (isset($this->arme)) {
            return $this->arme;
        } else {
            return 'Arme non définie';
        }
    }

    /**
     * Définit l'arme du nain et ajuste ses caractéristiques
     *
     * @param string $arme Arme à attribuer (hache, épée, dagues, etc.)
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
                $this->arme= 'Epée';
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
     * Définit la race du nain
     *
     * @param string $race Race du nain
     */
    public function setRace ($race) {
        $this->race = $race;
    }

    /**
     * Récupère la race du nain
     *
     * @return string Race du nain
     */
    public function getRace () {
       return $this->race;
    }

    /**
     * Active un code de triche pour donner des statistiques exceptionnelles
     *
     * @note Si le nom du nain est "Gimli" ou "Antoine.D", les statistiques sont augmentées de manière significative
     */
   public function cheatCode () {
      if ($this->name === 'Gimli') {
          $this->Pv = 1000;
          $this->force = 1000;
          $this->agilite = 1000;
          $this->precision = 1000;
      }
      if ($this->name === 'Antoine.D') {
        $this->Pv =2000;
        $this->force = 2000;
        $this->agilite = 2000;
        $this->precision = 2000;
    }
    }
}
?>
