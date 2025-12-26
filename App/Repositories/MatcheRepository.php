<?php
namespace App\Repositories;

use App\Core\Database\EntityManager;
use PDO;
class MatcheRepository {
    public function __construct(private EntityManager $em, private PDO $db) {}
    public function all() {
        $sql = "SELECT m.*, ea.nom as team_a, eb.nom as team_b, t.title as tournoi_title 
                FROM matches m 
                JOIN equipes ea ON m.equipe_a_id = ea.id 
                JOIN equipes eb ON m.equipe_b_id = eb.id 
                JOIN tournois t ON m.tournoi_id = t.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}