<?php

namespace App\Models;

use App\Core\Database\Attributes\Column;
use App\Engine\Table;
use App\Core\Database\Attributes\BelongsTo;

#[Table(name: "equipes")]
class Equipe {
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'nom', type: 'VARCHAR')]
    private string $nom = "";

    #[Column(name: 'jeu', type: 'VARCHAR')]
    private string $jeu = "";

    #[Column(name: 'club_id', type: 'INT', foreignkey: true)]
    private int $club_id;

    #[BelongsTo(entity: Club::class, foreignKey: 'club_id')]
    private ?Club $club = null;

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

    public function setJeu(string $jeu): void {
        $this->jeu = $jeu;
    }

    public function getJeu(): string {
        return $this->jeu;
    }

    public function setClubId(int $club_id): void {
        $this->club_id = $club_id;
    }

    public function getClubId(): int {
        return $this->club_id;
    }

    public function setCreatedAt(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }
}