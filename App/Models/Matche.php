<?php

namespace App\Models;

use App\Engine\Column;
use App\Engine\Table;

#[Table(name: "matches")]
class Matche {
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'score_a', type: 'INT')]
    private int $score_a = 0;

    #[Column(name: 'score_b', type: 'INT')]
    private int $score_b = 0;

    #[Column(name: 'equipe_a_id', type: 'INT', foreignkey: true)]
    private int $equipe_a_id;

    #[Column(name: 'equipe_b_id', type: 'INT', foreignkey: true)]
    private int $equipe_b_id;

    #[Column(name: 'tournoi_id', type: 'INT', foreignkey: true)]
    private int $tournoi_id;

    #[Column(name: 'winer_id', type: 'INT', foreignkey: true)]
    private ?int $winer_id = null;

    #[Column(name: 'created_at', type: 'TIMESTAMP')]
    private ?string $created_at = null;

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setScore_a(int $score_a): void {
        $this->score_a = $score_a;
    }

    public function getScore_a(): int {
        return $this->score_a;
    }

    public function setScore_b(int $score_b): void {
        $this->score_b = $score_b;
    }

    public function getScore_b(): int {
        return $this->score_b;
    }

    public function setEquipe_a_id(int $equipe_a_id): void {
        $this->equipe_a_id = $equipe_a_id;
    }

    public function getEquipe_a_id(): int {
        return $this->equipe_a_id;
    }

    public function setEquipe_b_id(int $equipe_b_id): void {
        $this->equipe_b_id = $equipe_b_id;
    }

    public function getEquipe_b_id(): int {
        return $this->equipe_b_id;
    }

    public function setTournoi_id(int $tournoi_id): void {
        $this->tournoi_id = $tournoi_id;
    }

    public function getTournoi_id(): int {
        return $this->tournoi_id;
    }

    public function setWiner_id(?int $winer_id): void {
        $this->winer_id = $winer_id;
    }

    public function getWiner_id(): ?int {
        return $this->winer_id;
    }

    public function setCreated_at(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): ?string {
        return $this->created_at;
    }
}