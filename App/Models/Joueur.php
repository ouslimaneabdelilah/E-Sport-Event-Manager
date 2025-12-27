<?php

namespace App\Models;

use App\Core\Database\Attributes\Column;
use App\Core\Database\Attributes\BelongsTo;
use App\Engine\Table;

#[Table(name: "joueurs")]
class Joueur
{
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'pseudo', type: 'VARCHAR')]
    private string $pseudo = "";

    #[Column(name: 'role', type: 'VARCHAR')]
    private string $role = "";

    #[Column(name: 'salaire', type: 'DECIMAL', m: 10, d: 2)]
    private float $salaire = 0.0;

    #[Column(name: 'equipe_id', type: 'INT', foreignkey: true)]
    private int $equipeId;

    #[BelongsTo(entity: Equipe::class, foreignKey: 'equipe_id')]
    private ?Equipe $equipe = null;

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

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
    public function getRole(): string
    {
        return $this->role;
    }

    public function setSalaire(float $salaire): void
    {
        $this->salaire = $salaire;
    }
    public function getSalaire(): float
    {
        return $this->salaire;
    }

    public function setEquipeId(int $equipeId): void
    {
        $this->equipeId = $equipeId;
    }
    public function getEquipeId(): int
    {
        return $this->equipeId;
    }

    public function setEquipe(?Equipe $equipe): void
    {
        $this->equipe = $equipe;
    }
    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
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
