<?php

use models\VehiculeModel;
use entities\Vehicule;
use services\HabFiler;

function addData($request, $db)
{

    $viewVars = [];
    if ($request->isPost()) {
        $vehiculeModel = new VehiculeModel($db);

        $vehicule = new Vehicule($request->getPost());

        if ($vehicule->getTypeVehicule() === 'اخر') {
            $vehicule->setTypeVehicule($request->post('type_vehicule_autre'));
        }
        $vehicule->setCreatedBy($_SESSION['user']['id']);

        $pjs = $request->file('pieces_jointe');
        $filesPath= [];
        if ($pjs) {
            foreach ($pjs['name'] as $key => $fileName) {
                // Get file properties for each file
                $file = [
                    'name' => $pjs['name'][$key],
                    'type' => $pjs['type'][$key],
                    'tmp_name' => $pjs['tmp_name'][$key],
                    'error' => $pjs['error'][$key],
                    'size' => $pjs['size'][$key]
                ];

                // Process the file if there were no errors
                if ($file['error'] === 0) {
                    $fileName = $vehicule->getNumVehicule() . '_' . $fileName;

                    // Call your existing uploadFile function
                    $pjPath = HabFiler::uploadFile($file, $fileName, 'vehiculesFiles');
                    $filesPath[] = $pjPath;
                }
            }
        }

        $vehicule->setFiles(implode(',', $filesPath));
        $vehiculeModel->create($vehicule->toArray());
        header('Location: /board');
    }
    return $viewVars;

}

$vars = addData($this->request, $this->db);

extract($vars);