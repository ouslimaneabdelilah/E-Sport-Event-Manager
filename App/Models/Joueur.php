<?php

namespace App\Models;

use App\Engine\Column;
use App\Engine\Table;

#[Table(name: "joueurs")]
class Joueur {
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'pseudo', type: 'VARCHAR')]
    private string $pseudo = "";

    #[Column(name: 'role', type: 'VARCHAR')]
    private string $role = "";

    #[Column(name: 'salaire', type: 'DECIMAL', m: 10, d: 2)]
    private float $salaire = 0.0;

    #[Column(name: 'equipe_id', type: 'INT', foreignkey: true)]
    private int $equipe_id;

    #[Column(name: 'created_at', type: 'TIMESTAMP')]
    private ?string $created_at = null;

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setPseudo(string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setSalaire(float $salaire): void {
        $this->salaire = $salaire;
    }

    public function getSalaire(): float {
        return $this->salaire;
    }

    public function setEquipe_id(int $equipe_id): void {
        $this->equipe_id = $equipe_id;
    }

    public function getEquipe_id(): int {
        return $this->equipe_id;
    }

    public function setCreated_at(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): ?string {
        return $this->created_at;
    }
}