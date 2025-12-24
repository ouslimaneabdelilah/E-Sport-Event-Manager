<?php
namespace App\Models;
use App\Engine\Column;
use App\Engine\Table;
#[Table(name:"clubs")]
class Joueur{
    #[Column(name:'id',type:'INT',primaryKey:true)]
    private int $id;
    #[Column(name:'pseudo',type:'VARCHAR')]
    private string $pseudo;
    #[Column(name:'role',type:'VARCHAR')]
    private string $role;
    #[Column(name:'salaire',type:'DECIMAL',m:10,d:2)]
    private float $salaire;
    #[Column(name:'equipe_id',type:'INT',foreignkey:true)]
    private int $equipe_id;
    #[Column(name:'created_at',type:'TIMESTAMP')]
    private int $created_at;
    public function __construct(string $pseudo,string $role,float $salaire,int $equipe_id)
    {
        $this->pseudo = $pseudo;
        $this->role = $role;
        $this->salaire = $salaire;
        $this->equipe_id = $equipe_id;
    }
}