<?php

namespace App\Models;

use App\Engine\Column;
use App\Engine\Table;

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

    public function setClub_id(int $club_id): void {
        $this->club_id = $club_id;
    }

    public function getClub_id(): int {
        return $this->club_id;
    }

    public function setCreated_at(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): ?string {
        return $this->created_at;
    }
}