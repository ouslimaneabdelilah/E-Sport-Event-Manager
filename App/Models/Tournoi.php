<?php
namespace App\Models;

class Tournoi
{
    public int $id;
    public string $title;
    public int $cashprize;
    public string $format;
    public int $created_at;

    public function __construct(string $title, int $cashprize, string $format)
    {
        $this->title = $title;
        $this->cashprize = $cashprize;
        $this->format = $format;
    }
}
