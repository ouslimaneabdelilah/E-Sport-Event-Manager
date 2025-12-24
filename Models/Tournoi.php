<?php
namespace Models;

class Tournoi
{
    public $id;
    public $title;
    public $cashprize;
    public $format;
    public $created_at;

    public function __construct(string $title, int $cashprize, string $format)
    {
        $this->title = $title;
        $this->cashprize = $cashprize;
        $this->format = $format;
    }
}
