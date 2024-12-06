<?php

use models\VehiculeModel;

function getData($request, $db)
{   
    $query = $request->get("q");
    $viewVars = [];
    $vehiculeModel = new VehiculeModel($db);
    $id = (int)$_SESSION['user']['id'];
    if($_SESSION['userrole'] === 'gouve') {
        if($query) {
            $viewVars['vehicules'] = $vehiculeModel->getByQuery([
                "num_vehicule" => [
                    "op" => "LIKE",
                    "value" => "%$query%",
                ],
            ]);
        } else {
            $viewVars['vehicules'] = $vehiculeModel->getAll();
        }
    } else {
        if($query) {
            $viewVars['vehicules'] = $vehiculeModel->getByQuery([
                "num_vehicule" => [
                    "op" => "LIKE",
                    "value" => "%$query%",
                ],
                "created_by" => [
                    "op" => "=",
                    "value" => $id,
                ],
            ]);
        } else {
            $viewVars['vehicules'] = $vehiculeModel->getByQuery([
                "created_by" => [
                    "op" => "=",
                    "value" => $id,
                ],
            ]);
        }
    }
    return $viewVars;
}

$vars = getData($this->request, $this->db);
extract($vars);