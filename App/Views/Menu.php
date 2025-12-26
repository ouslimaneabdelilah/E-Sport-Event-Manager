<?php
namespace App\Views;
use App\Console\Console;
class Menu{
    public function __construct(
      public Console $input
    ) {}

    public function start() {
        while (true) {
            $this->header("GIGA-LEAGUE MANAGEMENT SYSTEM");
            echo "1. Gestion des Clubs\n";
            echo "2. Gestion des Équipes\n";
            echo "3. Gestion des Joueurs\n";
            echo "4. Gestion des Tournois\n";
            echo "5. Gestion des Matchs\n";
            echo "6. Gestion des Sponsors\n";
            echo "0. Quitter\n";
            
            $choice = $this->input->input("Choix une choix dans la menu :");
            if ($choice === '0') break;

            switch ($choice) {
                case '1': $this->manageClubs(); break;
                case '2': $this->manageEquipes(); break;
                case '3': $this->manageJoueurs(); break;
                case '4': $this->manageTournois(); break;
                case '5': $this->manageMatchs(); break;
                case '6': $this->manageSponsors(); break;
                default: echo "Choix invalide.\n";
            }
        }
    }

    private function manageClubs() {
        while (true) {
            $this->header("GESTION DES CLUBS");
            echo "1. Liste des Clubs\n2. Ajouter un Club\n0. Retour\n";
            $choice =$this->input->input("Choix une choix dans la menu :");
            if ($choice === '0') break;

            if ($choice === '1') {
            } elseif ($choice === '2') {
                // $nom = ;
                // $ville = ;
            }
        }
    }

    private function manageEquipes() {
        while (true) {
            $this->header("GESTION DES ÉQUIPES");
            echo "1. Liste des Équipes\n2. Ajouter une Équipe\n0. Retour\n";
            $choice =   $this->input->input("Choix une choix dans la menu :");
            if ($choice === '0') break;

            if ($choice === '1') {
            } elseif ($choice === '2') {
                
            }
        }
    }

    private function manageJoueurs() {
        while (true) {
            $this->header("GESTION DES JOUEURS");
            echo "1. Liste des Joueurs\n2. Ajouter un Joueur\n0. Retour\n";
            $choice =   $this->input->input("Choix une choix dans la menu :");
            if ($choice === '0') break;

            if ($choice === '1') {
            } elseif ($choice === '2') {
               
            }
        }
    }

    private function manageTournois() {
        while (true) {
            $this->header("GESTION DES TOURNOIS");
            echo "1. Liste des Tournois\n2. Créer un Tournoi\n0. Retour\n";
            $choice =   $this->input->input("Choix une choix dans la menu :");

            if ($choice === '0') break;

            if ($choice === '1') {
            } elseif ($choice === '2') {
               
            }
        }
    }

    private function manageMatchs() {
        while (true) {
            $this->header("GESTION DES MATCHS");
            echo "1. Résultats des Matchs\n2. Enregistrer un Match\n0. Retour\n";
            $choice =   $this->input->input("Choix une choix dans la menu :");

            if ($choice === '0') break;

            if ($choice === '1') {
            } elseif ($choice === '2') {
               
            }
        }
    }

    private function manageSponsors() {
        while (true) {
            $this->header("GESTION DES SPONSORS");
            echo "1. Liste des Sponsors\n2. Ajouter un Sponsor\n0. Retour\n";
            $choice =   $this->input->input("Choix une choix dans la menu :");

            if ($choice === '0') break;

            if ($choice === '1') {
            } elseif ($choice === '2') {
            }
        }
    }

    
    private function header($t) {
        echo "\n" . str_repeat("=", 45) . "\n";
        echo "  " . strtoupper($t) . "\n";
        echo str_repeat("=", 45) . "\n";
    }

    private function renderTable($data, $headers) {
        if (empty($data)) {
            echo "Aucune donnée disponible.\n";
            return;
        }
        echo "\n| " . implode(" | ", $headers) . " |\n";
        echo str_repeat("-", 50) . "\n";
        foreach ($data as $row) {
            echo "| " . implode(" | ", $row) . " |\n";
        }
    }
}