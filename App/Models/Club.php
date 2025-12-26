<?php

namespace App\Models;

use App\Engine\Column;
use App\Engine\Table;

#[Table(name: "clubs")]
class Club {
    #[Column(name: 'id', type: 'INT', primaryKey: true)]
    private ?int $id = null;

    #[Column(name: 'nom', type: 'VARCHAR', length: 50)]
    private string $nom;

    #[Column(name: 'ville', type: 'VARCHAR')]
    private string $ville;

    #[Column(name: 'string', type: 'TIMESTAMP')]
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

    public function setVille(string $ville): void {
        $this->ville = $ville;
    }

    public function getVille(): string {
        return $this->ville;
    }

    public function setCreated_at(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): ?string {
        return $this->created_at;
    }
}