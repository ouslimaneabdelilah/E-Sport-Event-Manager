<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use PDO;
class JoueurRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
        $sql = "SELECT j.*, e.nom as equipe_name FROM joueurs j LEFT JOIN equipes e ON j.equipe_id = e.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>