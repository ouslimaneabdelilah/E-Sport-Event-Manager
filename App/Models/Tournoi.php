<?php

namespace App\Models;

use App\Core\Database\Attributes\Column;
use App\Core\Database\Attributes\OneToMany;
use App\Engine\Table;

#[Table(name: "tournois")]
class Tournoi
{
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'title', type: 'VARCHAR')]
    private string $title = "";

    #[Column(name: 'cashprize', type: 'DECIMAL', m: 10, d: 2)]
    private float $cashprize = 0.0;

    #[Column(name: 'format', type: 'VARCHAR')]
    private string $format = "";

    #[OneToMany(entity: Matche::class, foreignKey: 'tournoi_id')]
    private array $matches = [];

    #[OneToMany(entity: Sponsor::class, foreignKey: 'tournoi_id')]
    private array $sponsors = [];

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

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setCashprize(float $cashprize): void
    {
        $this->cashprize = $cashprize;
    }
    public function getCashprize(): float
    {
        return $this->cashprize;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }
    public function getFormat(): string
    {
        return $this->format;
    }

    public function setMatches(array $matches): void
    {
        $this->matches = $matches;
    }
    public function getMatches(): array
    {
        return $this->matches;
    }

    public function setSponsors(array $sponsors): void
    {
        $this->sponsors = $sponsors;
    }
    public function getSponsors(): array
    {
        return $this->sponsors;
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
