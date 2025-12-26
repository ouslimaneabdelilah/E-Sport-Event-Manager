<?php

namespace App\Repositories;

use App\Core\Database\EntityManager;
use PDO;

class TournoiRepository
{
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all()
    {
        return $this->em->findAll(\App\Models\Tournoi::class);
    }
}
