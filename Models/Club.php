<?php
namespace Models;
class Club{
    public $id;
    public $nom;
    public $ville;
    public $created_at;
    public function __construct(string $nom,string $ville)
    {
        $this->nom = $nom;
        $this->ville = $ville;
    }
}