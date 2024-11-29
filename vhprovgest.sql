CREATE DATABASE IF NOT EXISTS vhprovgest;

USE vhprovgest;

SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";
  
-- Table `roles`
CREATE TABLE
  IF NOT EXISTS `roles` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO `roles` (`nom`) VALUES ('gouve'), ('caid');

-- Table `users`
CREATE TABLE
  IF NOT EXISTS `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `username` varchar(50) NOT NULL,
    `password` varchar(175) NOT NULL,
    `role_id` int,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`),
    FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO `users` (`username`, `password`, `role_id`) VALUES ('gouve', 'gouve', 1), ('caid', 'caid', 2);

-- Table `Vehicules`
CREATE TABLE
  IF NOT EXISTS `Vehicules` (
    `id` int NOT NULL AUTO_INCREMENT,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    date_operation DATE NULL,
    heure_operation TIME NULL,
    type_vehicule varchar(50) NULL,
    `matricule` varchar(50) NULL,
    matricule_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_matricule varchar(50) NULL,
    `modele` varchar(50) NULL,
    modele_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_modele varchar(50) NULL,
    numero_chassis varchar(50) NULL,
    numero_chassis_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_numero_chassis varchar(50) NULL,
    nombre_place int NULL,
    nombre_place_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_nombre_place varchar(50) NULL,
    nom_fabricant varchar(50) NULL,
    nom_fabricant_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_nom_fabricant varchar(50) NULL,
    nombre_siege int NULL,
    nombre_siege_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_nombre_siege varchar(50) NULL,
    proprietaire varchar(50) NULL,
    proprietaire_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_proprietaire varchar(50) NULL,
    adresse_proprietaire varchar(50) NULL,
    adresse_proprietaire_confirme_cart_grise BOOLEAN DEFAULT FALSE,
    observation_adresse_proprietaire varchar(50) NULL,
    carte_grise BOOLEAN DEFAULT FALSE,
    observation_carte_grise varchar(50) NULL,
    assurance BOOLEAN DEFAULT FALSE,
    observation_assurance varchar(50) NULL,
    visite_technique BOOLEAN DEFAULT FALSE,
    observation_visite_technique varchar(50) NULL,
    taxe BOOLEAN DEFAULT FALSE,
    observation_taxe varchar(50) NULL,
    feulle_route BOOLEAN DEFAULT FALSE,
    observation_feulle_route varchar(50) NULL,
    contrat_ordre_transport BOOLEAN DEFAULT FALSE,
    observation_contrat_ordre_transport varchar(50) NULL,
    `cin_chauffeur` varchar(50) NULL,
    `date_fin_validite_cin` DATE NULL,
    `permis_conduire` varchar(50) NULL,
    `date_fin_validite_permis` DATE NULL,
    `permis_confiance` varchar(50) NULL,
    `date_fin_validite_permis_confiance` DATE NULL,
    `carte_conducteur` varchar(50) NULL,
    `date_fin_validite_carte_conducteur` DATE NULL,
    `visite_technique_chauffeur` varchar(50) NULL,
    `date_fin_validite_visite_technique` DATE NULL,
    `conformite_type_vehicule` VARCHAR(255) NULL,
    `conformite_nombre_places` VARCHAR(255) NULL,
    `etat_roues_avant` VARCHAR(255) NULL,
    `etat_roues_arriere` VARCHAR(255) NULL,
    `roue_secours` VARCHAR(255) NULL,
    `vitre_protection_avant` VARCHAR(255) NULL,
    `fenetre_secours` VARCHAR(255) NULL,
    `equipement_vitres_avant_droite` VARCHAR(255) NULL,
    `equipement_vitres_avant_gauche` VARCHAR(255) NULL,
    `equipement_vitres_arriere_droite` VARCHAR(255) NULL,
    `equipement_vitres_arriere_gauche` VARCHAR(255) NULL,
    `miroirs_reflecteurs_internes` VARCHAR(255) NULL,
    `miroirs_reflecteurs_avant_droite` VARCHAR(255) NULL,
    `miroirs_reflecteurs_avant_gauche` VARCHAR(255) NULL,
    `essuie_glace_avant` VARCHAR(255) NULL,
    `lumieres_vehicule` VARCHAR(255) NULL,
    `reflecteurs_arriere_ou_lateraux` VARCHAR(255) NULL,
    `signal_lumieres_brouillard` VARCHAR(255) NULL,
    `etat_carosserie` VARCHAR(255) NULL,
    `siege_cabine_conducteur` VARCHAR(255) NULL,
    `sieges_vehicule` VARCHAR(255) NULL,
    `ceintures_securite` VARCHAR(255) NULL,
    `klaxon` VARCHAR(255) NULL,
    `extincteur` VARCHAR(255) NULL,
    `trousse_secours` VARCHAR(255) NULL,
    `portes` VARCHAR(255) NULL,
    `systeme_verrouillage_auto` VARCHAR(255) NULL,
    `etat_mecanique` VARCHAR(255) NULL,
    `recommandations_vehicule` TEXT NULL,
    `recommandations_groupe_field` TEXT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;