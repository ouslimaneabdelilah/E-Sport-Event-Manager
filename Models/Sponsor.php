<?php
namespace Models;

class Sponsor
{
    public $id;
    public $nom;
    public $contribution_financiere;
    public $tournoi_id;
    public $created_at;

    public function __construct(string $nom, int $contribution_financiere, int $tournoi_id)
    {
        $this->nom = $nom;
        $this->contribution_financiere = $contribution_financiere;
        $this->tournoi_id = $tournoi_id;
    }
}
