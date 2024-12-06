<?php

use entities\Vehicule;
use models\VehiculeModel;
use services\HabFiler;



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
        $vehicule->setId($id);
        $vehiculeModel->updateById($vehicule->toArray());

        $viewVars["success"] = "تم تعديل المركبة بنجاح";
        header("Location: /board");
    }

    return $viewVars;
}

$vars = modifier($this->request, $this->db);

extract($vars);