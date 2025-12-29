<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use App\Models\Joueur;
use PDO;
class JoueurRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
       return $this->em->findAll(Joueur::class, ['equipe']);
    }
}
?>