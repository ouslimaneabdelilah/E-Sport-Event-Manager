<?php
namespace App\Models;

class Joueur{
    public int $id;
    public string $pseudo;
    public string $role;
    public float $salaire;
    public int $equipe_id;
    public int $created_at;
    public function __construct(string $pseudo,string $role,float $salaire,int $equipe_id)
    {
        $this->pseudo = $pseudo;
        $this->role = $role;
        $this->salaire = $salaire;
        $this->equipe_id = $equipe_id;
    }
}