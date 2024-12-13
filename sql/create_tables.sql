CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE
);

CREATE TABLE packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE versions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    version_number VARCHAR(50) NOT NULL,
    package_id INT NOT NULL,
    release_date DATETIME,
    FOREIGN KEY (package_id) REFERENCES packages(id) -- Contrainte de clé étrangère
);

CREATE TABLE collaborations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author_id INT NOT NULL, -- Correction de la faute de frappe
    package_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors(id), -- Contrainte de clé étrangère
    FOREIGN KEY (package_id) REFERENCES packages(id)  -- Contrainte de clé étrangère
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL -- Il est recommandé d'utiliser VARCHAR(255) pour les mots de passe hachés
);