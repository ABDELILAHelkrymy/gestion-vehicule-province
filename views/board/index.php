<?php
$title = "Tableau de bord";
ob_start();
?>
<div class="container-fluid py-4">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-end">
                        <h6 class="mb-2">تتبع المركبات التي خضعت للمراقبة من طرف اللجنة الإقليمية المختلطة</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            بيانات المركبة
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            الوثائق الخاصة بالمركبة </th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            نوع سير المركبة</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            رقم المركبة</th>
                                        <th class="text-secondary"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($vehicules as $vehicule) {
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center">

                                            </td>
                                            <td class="align-middle text-center">

                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0">
                                                    <?php echo $vehicule->getTypeVehicule(); ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0">
                                                    <?php echo $vehicule->getNumVehicule(); ?>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <a href="<?php echo '/vehicule/modifier/' . $vehicule->getId(); ?>"
                                                    class="text-info font-weight-bold text-md mx-2" id="editCompte">
                                                    <?php
                                                    if ($_SESSION['userrole'] === 'gouve') {
                                                        echo 'عرض';
                                                    } else {
                                                        echo 'تعديل';
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php
include_once APP_ROOT . '/public/layout/layout.php';
?>