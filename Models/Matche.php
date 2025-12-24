<?php
namespace Models;

class Matche{
    public $id;
    public $score_a;
    public $score_b;
    public $equipe_a_id;
    public $equipe_b_id;
    public $tournoi_id;
    public $winer_id;
    public $created_at;
    public function __construct(int $score_a,int $score_b,int $equipe_a_id,int $equipe_b_id,int $tournoi_id,int $winer_id)
    {
        $this->score_a = $score_a;
        $this->score_b = $score_b;
        $this->equipe_a_id = $equipe_a_id;
        $this->equipe_b_id = $equipe_b_id;
        $this->tournoi_id = $tournoi_id;
        $this->winer_id = $winer_id;
    }
}