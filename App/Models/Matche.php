<?php

namespace App\Models;

use App\Core\Database\Attributes\Column;
use App\Core\Database\Attributes\BelongsTo;
use App\Engine\Table;

#[Table(name: "matches")]
class Matche
{
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'score_a', type: 'INT')]
    private int $scoreA = 0;

    #[Column(name: 'score_b', type: 'INT')]
    private int $scoreB = 0;

    #[Column(name: 'equipe_a_id', type: 'INT', foreignkey: true)]
    private int $equipeAId;

    #[BelongsTo(entity: Equipe::class, foreignKey: 'equipe_a_id')]
    private ?Equipe $equipeA = null;

    #[Column(name: 'equipe_b_id', type: 'INT', foreignkey: true)]
    private int $equipeBId;

    #[BelongsTo(entity: Equipe::class, foreignKey: 'equipe_b_id')]
    private ?Equipe $equipeB = null;

    #[Column(name: 'tournoi_id', type: 'INT', foreignkey: true)]
    private int $tournoiId;

    #[BelongsTo(entity: Tournoi::class, foreignKey: 'tournoi_id')]
    private ?Tournoi $tournoi = null;

    #[Column(name: 'winer_id', type: 'INT', foreignkey: true)]
    private ?int $winerId = null;

    #[BelongsTo(entity: Equipe::class, foreignKey: 'winer_id')]
    private ?Equipe $winner = null;

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

    public function setScoreA(int $scoreA): void
    {
        $this->scoreA = $scoreA;
    }
    public function getScoreA(): int
    {
        return $this->scoreA;
    }

    public function setScoreB(int $scoreB): void
    {
        $this->scoreB = $scoreB;
    }
    public function getScoreB(): int
    {
        return $this->scoreB;
    }

    public function setEquipeAId(int $equipeAId): void
    {
        $this->equipeAId = $equipeAId;
    }
    public function getEquipeAId(): int
    {
        return $this->equipeAId;
    }

    public function setEquipeA(?Equipe $equipeA): void
    {
        $this->equipeA = $equipeA;
    }
    public function getEquipeA(): ?Equipe
    {
        return $this->equipeA;
    }

    public function setEquipeBId(int $equipeBId): void
    {
        $this->equipeBId = $equipeBId;
    }
    public function getEquipeBId(): int
    {
        return $this->equipeBId;
    }

    public function setEquipeB(?Equipe $equipeB): void
    {
        $this->equipeB = $equipeB;
    }
    public function getEquipeB(): ?Equipe
    {
        return $this->equipeB;
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

    public function setWinerId(?int $winerId): void
    {
        $this->winerId = $winerId;
    }
    public function getWinerId(): ?int
    {
        return $this->winerId;
    }

    public function setWinner(?Equipe $winner): void
    {
        $this->winner = $winner;
    }
    public function getWinner(): ?Equipe
    {
        return $this->winner;
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
