<?php

namespace App\Repositories;

use App\Core\Database\EntityManager;
use App\Models\Matche;
use PDO;

class MatcheRepository
{
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all()
    {
        return $this->em->findAll(Matche::class, ['equipeA', 'equipeB', 'tournoi']);
    }
}
