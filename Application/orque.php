<?php

class Orque extends Perso implements Arme, Talent{

    protected string $name;
    protected string $race;
    protected string $classe;
    protected string $arme;
    protected int $Pv;
    protected int $force;
    protected bool $enVie;
    protected int $precision;
    protected int $agilite;

    public function __construct($name) {
        $this->name = $name;    
        $this->Pv = 100;
        $this->force = 50;
        $this->enVie = true;
        $this->precision = 70;
        $this->agilite = 20;
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

    public function attaquer () {
        return $this->precision;
    }

    public function defendre() {
        return $this->agilite;
    }

    public function deceder() {
          $this->enVie = false;
          return $this->enVie;   
    }

    public function getClasse() {
        if (isset($this->classe)) {
            return $this->classe;
        } else {
            return 'Classe non définie';
        }
    }


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
    
    public function getArme() {
        if (isset($this->arme)) {
            return $this->arme;
        } else {
            return 'Arme non définie';
        }
    }

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

    public function setRace ($race) {
        $this->race = $race;
    }

    public function getRace () {
       return $this->race;
    }

    public function cheatCode () {
        if ($this->name === 'Urukai') {
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