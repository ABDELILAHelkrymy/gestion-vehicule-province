<?php

namespace entities;

use core\Entity;

class Vehicule extends Entity
{
	protected $id;
	protected $createdAt;
	protected $updatedAt;
	protected $dateOperation;
	protected $heureOperation;
	protected $numVehicule;
	protected $typeVehicule;
	protected $matricule;
	protected $matriculeConfirmeCartGrise;
	protected $observationMatricule;
	protected $modele;
	protected $modeleConfirmeCartGrise;
	protected $observationModele;
	protected $numeroChassis;
	protected $numeroChassisConfirmeCartGrise;
	protected $observationNumeroChassis;
	protected $nomFabricant;
	protected $nomFabricantConfirmeCartGrise;
	protected $observationNomFabricant;
	protected $nombreSiege;
	protected $nombreSiegeConfirmeCartGrise;
	protected $observationNombreSiege;
	protected $proprietaire;
	protected $proprietaireConfirmeCartGrise;
	protected $observationProprietaire;
	protected $adresseProprietaire;
	protected $adresseProprietaireConfirmeCartGrise;
	protected $observationAdresseProprietaire;
	protected $carteGrise;
	protected $observationCarteGrise;
	protected $assurance;
	protected $observationAssurance;
	protected $visiteTechnique;
	protected $observationVisiteTechnique;
	protected $taxe;
	protected $observationTaxe;
	protected $feuilleRoute;
	protected $observationFeuilleRoute;
	protected $contratOrdreTransport;
	protected $observationContratOrdreTransport;
	protected $cinChauffeur;
	protected $dateFinValiditeCin;
	protected $permisConduire;
	protected $dateFinValiditePermis;
	protected $permisConfiance;
	protected $dateFinValiditePermisConfiance;
	protected $carteConducteur;
	protected $dateFinValiditeCarteConducteur;
	protected $visiteMedicalChauffeur;
	protected $dateFinValiditeVisiteMedical;
	protected $conformiteTypeVehicule;
	protected $observationConformiteTypeVehicule;
	protected $conformiteNombrePlaces;
	protected $observationConformiteNombrePlaces;
	protected $etatRouesAvant;
	protected $observationEtatRouesAvant;
	protected $etatRouesArriere;
	protected $observationEtatRouesArriere;
	protected $roueSecours;
	protected $observationRoueSecours;
	protected $vitreProtectionAvant;
	protected $fenetreSecours;
	protected $equipementVitresAvantDroite;
	protected $equipementVitresAvantGauche;
	protected $equipementVitresArriereDroite;
	protected $equipementVitresArriereGauche;
	protected $miroirsReflecteursInternes;
	protected $miroirsReflecteursAvantDroite;
	protected $miroirsReflecteursAvantGauche;
	protected $essuieGlaceAvant;
	protected $lumieresVehicule;
	protected $observationLumieresVehicule;
	protected $reflecteursArriereOuLateraux;
	protected $observationReflecteursArriereOuLateraux;
	protected $signalLumieresBrouillard;
	protected $etatCarosserie;
	protected $observationEtatCarosserie;
	protected $siegeCabineConducteur;
	protected $observationSiegeCabineConducteur;
	protected $siegesVehicule;
	protected $ceinturesSecurite;
	protected $klaxon;
	protected $observationKlaxon;
	protected $extincteur;
	protected $observationExtincteur;
	protected $trousseSecours;
	protected $observationTrousseSecours;
	protected $portes;
	protected $observationPortes;
	protected $systemeVerrouillageAuto;
	protected $observationSystemeVerrouillageAuto;
	protected $etatMecanique;
	protected $observationEtatMecanique;
	protected $recommandationsVehicule;
	protected $recommandationsGroupeField;

}