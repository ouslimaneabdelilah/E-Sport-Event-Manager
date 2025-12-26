<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use PDO;
class EquipeRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
        $sql = "SELECT e.*, c.nom as club_name FROM equipes e LEFT JOIN clubs c ON e.club_id = c.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>