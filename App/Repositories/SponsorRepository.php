<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use PDO;
class SponsorRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
        $sql = "SELECT s.*, t.title as tournoi_title FROM sponsors s JOIN tournois t ON s.tournoi_id = t.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}