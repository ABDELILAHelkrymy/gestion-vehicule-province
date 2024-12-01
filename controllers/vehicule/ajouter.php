<?php

use models\VehiculeModel;
use entities\Vehicule;

function addData($request, $db)
{

    $viewVars = [];
    if ($request->isPost()) {
        $vehiculeModel = new VehiculeModel($db);

        $vehicule = new Vehicule($request->getPost());

        if ($vehicule->getTypeVehicule() === 'اخر') {
            $vehicule->setTypeVehicule($request->post('type_vehicule_autre'));
        }
        if ($vehicule->getMatriculeConfirmeCartGrise() === 'نعم') {
            $vehicule->setMatriculeConfirmeCartGrise(1);
        } else {
            $vehicule->setMatriculeConfirmeCartGrise(0);
        }
        $vehiculeModel->create($vehicule->toArray());
    }

    return $viewVars;

}

$vars = addData($this->request, $this->db);

extract($vars);