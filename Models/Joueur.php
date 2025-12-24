<?php
namespace Models;

class Joueur{
    public $id;
    public $pseudo;
    public $role;
    public $salaire;
    public $equipe_id;
    public $created_at;
    public function __construct(string $pseudo,string $role,int $salaire,int $equipe_id)
    {
        $this->pseudo = $pseudo;
        $this->role = $role;
        $this->salaire = $salaire;
        $this->equipe_id = $equipe_id;
    }
}