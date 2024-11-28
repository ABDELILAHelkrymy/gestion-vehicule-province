<?php



function addData($request, $db)
{

    $viewVars = [];
    if ($request->isPost()) {

        try {

            $_SESSION["message"] = "تمت الإضافة بنجاح";
            header("Location: /dataCollect");
        } catch (Exception $e) {
            $_SESSION['error'] = "حدث خطأ أثناء الإضافة";
        }
    }

    return $viewVars;

}

$vars = addData($this->request, $this->db);

extract($vars);