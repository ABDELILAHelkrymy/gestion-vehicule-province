<?php

namespace entities;

use core\Entity;

class Chauffeur extends Entity
{

    protected $id;
    protected $cin;
    protected $dateFinValiditeCin;
    protected $permisConduire;
    protected $dateFinValiditePermis;
    protected $permisConfiance;
    protected $dateFinValiditePermisConfiance;
    protected $carteConducteur;
    protected $dateFinValiditeCarteConducteur;
    protected $visiteTechnique;
    protected $dateFinValiditeVisiteTechnique;
    protected $vehiculeId;
}