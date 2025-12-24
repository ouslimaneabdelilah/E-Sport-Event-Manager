<?php
namespace App\Models;
use App\Engine\Column;
use App\Engine\Table;
#[Table(name:"clubs")]
class Matche{
    #[Column(name:'id',type:'INT',primaryKey:true)]
    private int $id;
    #[Column(name:'score_a',type:'INT',foreignkey:true)]
    private int $score_a;
    #[Column(name:'score_b',type:'INT',foreignkey:true)]
    private int $score_b;
    #[Column(name:'equipe_a_id',type:'INT',foreignkey:true)]
    private int $equipe_a_id;
    #[Column(name:'equipe_b_id',type:'INT',foreignkey:true)]
    private int $equipe_b_id;
    #[Column(name:'tournoi_id',type:'INT',foreignkey:true)]
    private int $tournoi_id;
    #[Column(name:'winer_id',type:'INT',foreignkey:true)]
    private int $winer_id;
    #[Column(name:'created_at',type:'TIMESTAMP')]
    private int $created_at;
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