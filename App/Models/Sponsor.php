<?php

namespace App\Models;

use App\Engine\Column;
use App\Engine\Table;

#[Table(name: "sponsors")]
class Sponsor {
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'nom', type: 'VARCHAR')]
    private string $nom = "";

    #[Column(name: 'contribution_financiere', type: 'DECIMAL', m: 10, d: 2)]
    private float $contribution_financiere = 0.0;

    #[Column(name: 'tournoi_id', type: 'INT', foreignkey: true)]
    private int $tournoi_id;

    #[Column(name: 'created_at', type: 'TIMESTAMP')]
    private ?string $created_at = null;

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setContribution_financiere(float $contribution_financiere): void {
        $this->contribution_financiere = $contribution_financiere;
    }

    public function getContribution_financiere(): float {
        return $this->contribution_financiere;
    }

    public function setTournoi_id(int $tournoi_id): void {
        $this->tournoi_id = $tournoi_id;
    }

    public function getTournoi_id(): int {
        return $this->tournoi_id;
    }

    public function setCreated_at(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): ?string {
        return $this->created_at;
    }
}