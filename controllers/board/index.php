<?php

use models\VehiculeModel;

function getData($request, $db)
{
    $viewVars = [];
    $vehiculeModel = new VehiculeModel($db);
    $viewVars['vehicules'] = $vehiculeModel->getAll();
    return $viewVars;
}

$vars = getData($this->request, $this->db);
extract($vars);