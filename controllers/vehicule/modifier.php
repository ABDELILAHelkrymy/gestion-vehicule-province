<?php

use entities\Vehicule;
use models\VehiculeModel;



function modifier($request, $db)
{
    $vehiculeModel = new VehiculeModel($db);

    $id = $request->getParam('id');

    $vehicule = $vehiculeModel->getById($id);

    $viewVars["vehicule"] = $vehicule;
    $attachements = explode(',', $vehicule->getFiles());
    $viewVars["attachements"] = $attachements;

    if ($request->isPost()) {
        $vehicule = new Vehicule($request->getPost());
        if ($vehicule->getTypeVehicule() === 'اخر') {
            $vehicule->setTypeVehicule($request->post('type_vehicule_autre'));
        }
        $vehicule->setId($id);
        $vehiculeModel->updateById($vehicule->toArray());

        $viewVars["success"] = "تم تعديل المركبة بنجاح";
        header("Location: /board");
    }

    return $viewVars;
}

$vars = modifier($this->request, $this->db);

extract($vars);