<?php
namespace App\Models;
use App\Engine\Column;
use App\Engine\Table;
#[Table(name:"clubs")]
class Tournoi
{
    #[Column(name:'id',type:'INT',primaryKey:true)]
    private int $id;
    #[Column(name:'title',type:'VARCHAR')]
    private string $title;
    #[Column(name:'cashprize',type:'DECIMAL',m:10,d:2)]
    private int $cashprize;
    #[Column(name:'format',type:'VARCHAR')]
    private string $format;
    #[Column(name:'created_at',type:'TIMESTAMP')]
    private int $created_at;

    public function __construct(string $title, int $cashprize, string $format)
    {
        $this->title = $title;
        $this->cashprize = $cashprize;
        $this->format = $format;
    }
}
