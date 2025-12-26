<?php

namespace App\Models;

use App\Core\Database\Attributes\Column;
use App\Engine\Table;

#[Table(name: "tournois")]
class Tournoi {
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'title', type: 'VARCHAR')]
    private string $title = "";

    #[Column(name: 'cashprize', type: 'DECIMAL', m: 10, d: 2)]
    private float $cashprize = 0.0;

    #[Column(name: 'format', type: 'VARCHAR')]
    private string $format = "";

    #[Column(name: 'created_at', type: 'TIMESTAMP')]
    private ?string $created_at = null;

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setCashprize(float $cashprize): void {
        $this->cashprize = $cashprize;
    }

    public function getCashprize(): float {
        return $this->cashprize;
    }

    public function setFormat(string $format): void {
        $this->format = $format;
    }

    public function getFormat(): string {
        return $this->format;
    }

    public function setCreated_at(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): ?string {
        return $this->created_at;
    }
}