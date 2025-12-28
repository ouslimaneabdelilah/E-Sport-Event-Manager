<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use App\Models\Sponsor;
use PDO;
class SponsorRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
        return $this->em->findAll(Sponsor::class, ['tournoi']);
    }
}