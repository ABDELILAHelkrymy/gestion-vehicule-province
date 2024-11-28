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
    `matricule` varchar(50) NULL,
    `modele` varchar(50) NULL,
    type_vehicule ENUM('النقل الحضري', 'النقل المدرسي', 'النقل بين الجماعات', 'نقل المستخدمين لحساب الغير', 'النقل بواسطة سيارة الاجرة', 'اخر') NULL,
    numero_chassis varchar(50) NULL,
    nombre_place int NULL,
    nom_fabricant varchar(50) NULL,
    nombre_siege int NULL,
    proprietaire varchar(50) NULL,
    adresse_proprietaire varchar(50) NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table `Chauffeurs`
CREATE TABLE
  IF NOT EXISTS `Chauffeurs` (
    `id` int NOT NULL AUTO_INCREMENT,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `cin` varchar(50) NULL,
    `date_fin_validite_cin` DATE NULL,
    `permis_conduire` varchar(50) NULL,
    `date_fin_validite_permis` DATE NULL,
    `permis_confiance` varchar(50) NULL,
    `date_fin_validite_permis_confiance` DATE NULL,
    `carte_conducteur` varchar(50) NULL,
    `date_fin_validite_carte_conducteur` DATE NULL,
    `visite_technique` varchar(50) NULL,
    `date_fin_validite_visite_technique` DATE NULL,
    `vehicule_id` int NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`vehicule_id`) REFERENCES `Vehicules` (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


-- Table `Document-vehicules`
CREATE TABLE
  IF NOT EXISTS `Document_vehicules` (
    `id` int NOT NULL AUTO_INCREMENT,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `nom` varchar(50) NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Insertion des documents de vehicules
INSERT INTO `Document_vehicules` (`nom`) 
VALUES ('البطاقة الرمادية'), ('شهادة التأمين'), ('العقد مع الأمر بالنقل'), ('ورقة السير'), ('وصل أداء الضريبة'), ('شهادة الفحص الفني');

-- Table `Document-vehicules-vehicules`
CREATE TABLE
  IF NOT EXISTS `Document_vehicules_vehicules` (
    `id` int NOT NULL AUTO_INCREMENT,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `vehicule_id` int NULL,
    `document_vehicule_id` int NULL,
    `observation` varchar(50) NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`vehicule_id`) REFERENCES `Vehicules` (`id`) on delete cascade,
    FOREIGN KEY (`document_vehicule_id`) REFERENCES `Document_vehicules` (`id`) on delete cascade
  ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;