<?php
namespace App\Models;

use App\Engine\Column;
use App\Engine\Table;
#[Table(name:"clubs")]
class Club{
    #[Column(name:'id',type:'INT',primaryKey:true)]
    private int $id;
    #[Column(name:'nom',type:'VARCHAR',length:50)]
    private string $nom;
    #[Column(name:'ville',type:'VARCHAR')]
    private string $ville;
    #[Column(name:'string',type:'TIMESTAMP')]
    private string $created_at;
    public function __construct(string $nom,string $ville)
    {
        $this->nom = $nom;
        $this->ville = $ville;
    }
    public function setName($nom){
        $this->nom = $nom;
    }
    public function setVille($ville){
        $this->ville = $ville;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getName(){
        return $this->ville;
    }
}