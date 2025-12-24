<?php
namespace App\Models;

class Equipe{
    public int $id;
    public string $nom;
    public string $jeu;
    public int $club_id;
    public int $created_at;
    public function __construct(string $nom,string $jeu,int $club_id)
    {
        $this->nom = $nom;
        $this->jeu = $jeu;
        $this->club_id = $club_id;
    }
}