<?php
namespace App\Repositories;
use \App\Models\Club;
use App\Core\Database\EntityManager;
use PDO;
class ClubRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() { 
        return $this->em->findAll(Club::class,["equipes"]); 
    }
}
?>