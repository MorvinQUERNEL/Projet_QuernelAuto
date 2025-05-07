<?php
require_once '../includes/dbconnect.php';

// Fonction pour créer les tables
function createTables($pdo) {
    try {
        $queries = [
            "DROP DATABASE IF EXISTS QuernelAuto;",
            "CREATE DATABASE QuernelAuto;",
            "USE QuernelAuto;",
            "CREATE TABLE client(
   id_client INT AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   email VARCHAR(255) NOT NULL,
   telephone VARCHAR(20) NOT NULL,
   adresse VARCHAR(255) NOT NULL,
   pays VARCHAR(50) NOT NULL,
   date_inscription DATE NOT NULL,
   PRIMARY KEY(id_client),
   UNIQUE(email)
);",

            "CREATE TABLE demande(
   id_demande INT AUTO_INCREMENT,
   date_demande DATE NOT NULL,
   specifications TEXT,
   budget_max DECIMAL(10,2) NOT NULL,
   active BOOLEAN NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_demande),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);",

            "CREATE TABLE transaction(
   id_transaction INT AUTO_INCREMENT,
   date_transaction DATE NOT NULL,
   montant_total DECIMAL(10,2) NOT NULL,
   type_transaction VARCHAR(50) NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_transaction),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);",

            "CREATE TABLE type_vehicule(
   id_type_vehicule INT AUTO_INCREMENT,
   type_vehicule VARCHAR(50) NOT NULL,
   description TEXT,
   PRIMARY KEY(id_type_vehicule)
);",

            "CREATE TABLE vehicule(
   id_vehicule VARCHAR(50),
   vin VARCHAR(17) NOT NULL,
   immatriculation VARCHAR(20) NOT NULL,
   kilometrage INT NOT NULL,
   annee SMALLINT NOT NULL,
   prix_achat DECIMAL(10,2),
   prix_vente DECIMAL(10,2),
   couleur VARCHAR(30) NOT NULL,
   carburant VARCHAR(20) NOT NULL,
   transmission VARCHAR(20) NOT NULL,
   description TEXT,
   disponible BOOLEAN NOT NULL,
   marque VARCHAR(50) NOT NULL,
   model VARCHAR(50) NOT NULL,
   id_transaction INT NOT NULL,
   PRIMARY KEY(id_vehicule),
   UNIQUE(vin),
   UNIQUE(immatriculation),
   FOREIGN KEY(id_transaction) REFERENCES transaction(id_transaction)
);",

            "CREATE TABLE photos(
   id_photo INT AUTO_INCREMENT,
   url VARCHAR(255),
   principale BOOLEAN NOT NULL,
   date_ajout DATE,
   id_vehicule VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_photo),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id_vehicule)
);",

            "CREATE TABLE frais(
   id_frais INT AUTO_INCREMENT,
   type_frais VARCHAR(50) NOT NULL,
   montant_frais INT NOT NULL,
   id_vehicule VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_frais),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id_vehicule)
);",

            "CREATE TABLE dependre(
   id_demande INT,
   id_type_vehicule INT,
   PRIMARY KEY(id_demande, id_type_vehicule),
   FOREIGN KEY(id_demande) REFERENCES demande(id_demande),
   FOREIGN KEY(id_type_vehicule) REFERENCES type_vehicule(id_type_vehicule)
);"
        ];

        foreach ($queries as $query) {
            $pdo->exec($query);
            echo "Requête exécutée avec succès: " . substr($query, 0, 50) . "...<br>";
        }

        return true;
    } catch (PDOException $e) {
        echo "Erreur lors de la création des tables: " . $e->getMessage() . "<br>";
        return false;
    }
}

// Initialisation de la base de données
try {
    if (createTables($pdo)) {
        echo "<h2>Base de données QuernelAuto initialisée avec succès !</h2>";
    } else {
        echo "<h2>Échec de l'initialisation de la base de données.</h2>";
    }
} catch (Exception $e) {
    echo "<h2>Erreur générale: " . $e->getMessage() . "</h2>";
}