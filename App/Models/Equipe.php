<?php
namespace App\Models;
use App\Engine\Column;
use App\Engine\Table;
#[Table(name:"clubs")]
class Equipe{
    #[Column(name:'id',type:'INT',primaryKey:true)]
    private int $id;
    #[Column(name:'nom',type:'VARCHAR')]
    private string $nom;
    #[Column(name:'id',type:'VARCHAR')]
    private string $jeu;
    #[Column(name:'club_id',type:'INT',foreignkey:true)]
    private int $club_id;
    #[Column(name:'created_at',type:'TIMESTAMP')]
    private string $created_at;

    public function __construct(string $nom,string $jeu,int $club_id)
    {
        $this->nom = $nom;
        $this->jeu = $jeu;
        $this->club_id = $club_id;
    }l
    
}