<?php

abstract class Perso {
    
    protected string $name;
    protected string $race;
    protected string $classe;
    protected string $arme;
    protected int $Pv;
    protected int $endurance;
    protected int $force;
    protected bool $enVie;
    protected int $mana;
    protected int $magie;
    protected int $vitesse;
    protected int $precision;
    protected int $agilite;

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

    public function setName ($name) {
        $this->name = $name;
    }

    public function getName () {
       return $this->name;
    }

    public function setPv ($Pv) {
        $this->Pv = $Pv;
    }

    public function getPv () {
       return $this->Pv;
    }

    public function setEndurance ($endurance) {
        $this->endurance = $endurance;
    }

    public function getEndurance () {
       return $this->endurance;
    }

    public function setForce ($force) {
        $this->force = $force;
    }

    public function getForce () {
       return $this->force;
    }

    public function setEnVie ($enVie) {
        $this->enVie = $enVie;
    }

    public function getEnVie () {
        return $this->enVie;
     }  
     

    public function setMana ($mana) {
        $this->mana = $mana;
    }

    public function getMana () {
       return $this->mana;
    }

    public function setMagie ($magie) {
        $this->magie = $magie;
    }

    public function getMagie () {
       return $this->magie;
    }

    public function setVitesse ($vitesse) {
        $this->vitesse = $vitesse;
    }

    public function getVitesse () {
       return $this->vitesse;
    }

    public function setPrecision ($precision) {
        $this->precision = $precision;
    }

    public function getPrecision () {
       return $this->precision;
    }

    public function setAgilite ($agilite) {
        $this->agilite = $agilite;
    }

    public function getAgilite () {
       return $this->agilite;
    }

    public function attaquer () {}

    public function defendre () {}

    public function deceder () {}

    


}