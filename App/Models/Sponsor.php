<?php
namespace App\Models;

class Sponsor
{
    public int $id;
    public string $nom;
    public int $contribution_financiere;
    public int $tournoi_id;
    public int $created_at;

    public function __construct(string $nom, int $contribution_financiere, int $tournoi_id)
    {
        $this->nom = $nom;
        $this->contribution_financiere = $contribution_financiere;
        $this->tournoi_id = $tournoi_id;
    }
}
