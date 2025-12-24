CREATE DATABASE esport_db
USE esport_db
CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    ville VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE equipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    jeu VARCHAR(100),
    club_id INT,
    FOREIGN KEY (club_id) REFERENCES clubs(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE joueurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    role VARCHAR(50),
    salaire DECIMAL(10,2),
    equipe_id INT,
    FOREIGN KEY (equipe_id) REFERENCES equipes(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE tournois (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    cashprize DECIMAL(12,2),
    format VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    score_a INT,
    score_b INT,
    equipe_a_id INT NOT NULL,
    equipe_b_id INT NOT NULL,
    tournoi_id INT NOT NULL,
    winer_id INT,
    FOREIGN KEY (equipe_a_id) REFERENCES equipes(id),
    FOREIGN KEY (equipe_b_id) REFERENCES equipes(equipe_id),
    FOREIGN KEY (tournoi_id) REFERENCES tournois(tournoi_id),
    FOREIGN KEY (winer_id) REFERENCES equipes(equipe_id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sponsors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    contribution_financiere DECIMAL(12,2),
    tournoi_id INT,
    FOREIGN KEY (tournoi_id) REFERENCES tournois(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

