<?php

namespace entities;

use core\Entity;

class Vehicule extends Entity
{
    protected $id;
    protected $matricule;
    protected $modele;
    protected $typeVehicule;
    protected $numeroChassis;
    protected $nombrePlace;
    protected $nomFabricant;
    protected $nombreSiege;
    protected $proprietaire;
    protected $adresseProprietaire;

    const _TYPE_VEHICULE = [
        'النقل الحضري',
        'النقل المدرسي',
        'النقل بين الجماعات',
        'نقل المستخدمين لحساب الغير',
        'النقل بواسطة سيارة الاجرة',
        'اخر'
    ];

    public function getTypesVehicule()
    {
        return self::_TYPE_VEHICULE;
    }
}