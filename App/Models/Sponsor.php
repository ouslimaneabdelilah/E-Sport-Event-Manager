<?php

namespace App\Models;

use App\Core\Database\Attributes\Column;
use App\Core\Database\Attributes\BelongsTo;
use App\Engine\Table;

#[Table(name: "sponsors")]
class Sponsor
{
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'nom', type: 'VARCHAR')]
    private string $nom = "";

    #[Column(name: 'contribution_financiere', type: 'DECIMAL', m: 10, d: 2)]
    private float $contributionFinanciere = 0.0;

    #[Column(name: 'tournoi_id', type: 'INT', foreignkey: true)]
    private int $tournoiId;

    #[BelongsTo(entity: Tournoi::class, foreignKey: 'tournoi_id')]
    private ?Tournoi $tournoi = null;

    #[Column(name: 'created_at', type: 'TIMESTAMP')]
    private ?string $createdAt = null;

    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setContributionFinanciere(float $contributionFinanciere): void
    {
        $this->contributionFinanciere = $contributionFinanciere;
    }
    public function getContributionFinanciere(): float
    {
        return $this->contributionFinanciere;
    }

    public function setTournoiId(int $tournoiId): void
    {
        $this->tournoiId = $tournoiId;
    }
    public function getTournoiId(): int
    {
        return $this->tournoiId;
    }

    public function setTournoi(?Tournoi $tournoi): void
    {
        $this->tournoi = $tournoi;
    }
    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }
}
