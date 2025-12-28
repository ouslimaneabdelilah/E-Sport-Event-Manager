<?php

namespace App\Repositories;

use App\Core\Database\EntityManager;
use App\Models\Tournoi;
use PDO;

class TournoiRepository
{
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all()
    {
        return $this->em->findAll(Tournoi::class,["matches","sponsors"]);
    }
}
