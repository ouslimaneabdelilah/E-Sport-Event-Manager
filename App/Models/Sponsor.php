<?php
namespace App\Models;
use App\Engine\Column;
use App\Engine\Table;
#[Table(name:"clubs")]
class Sponsor
{
    #[Column(name:'id',type:'INT',primaryKey:true)]
    private int $id;
    #[Column(name:'nom',type:'VARCHAR')]
    private string $nom;
    #[Column(name:'contribution_financiere',type:'DECIMAL',m:10,d:2)]
    private int $contribution_financiere;
    #[Column(name:'tournoi_id',type:'INT',foreignkey:true)]
    private int $tournoi_id;
    #[Column(name:'created_at',type:'TIMESTAMP')]
    private int $created_at;

    public function __construct(string $nom, int $contribution_financiere, int $tournoi_id)
    {
        $this->nom = $nom;
        $this->contribution_financiere = $contribution_financiere;
        $this->tournoi_id = $tournoi_id;
    }
}
