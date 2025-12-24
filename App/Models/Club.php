<?php
namespace App\Models;
class Club{
    public int $id;
    public string $nom;
    public string $ville;
    public int $created_at;
    public function __construct(string $nom,string $ville)
    {
        $this->nom = $nom;
        $this->ville = $ville;
    }
}