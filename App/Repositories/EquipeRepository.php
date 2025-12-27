<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use \App\Models\Equipe;
use PDO;
class EquipeRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
        return $this->em->findAll(Equipe::class,['club']);
    }
}
?>