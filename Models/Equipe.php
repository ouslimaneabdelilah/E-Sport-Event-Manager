<?php
namespace Models;

class Equipe{
    public $id;
    public $nom;
    public $jeu;
    public $club_id;
    public $created_at;
    public function __construct(string $nom,string $jeu,int $club_id)
    {
        $this->nom = $nom;
        $this->jeu = $jeu;
        $this->club_id = $club_id;
    }
}