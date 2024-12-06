<?php
$title = "Tableau de bord";
ob_start();
?>
<div class="container-fluid py-4">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-6 text-end">
                        <h6 class="mb-2">تتبع المركبات التي خضعت للمراقبة من طرف اللجنة الإقليمية المختلطة</h6>
                    </div>
                    <div class="col-md-3 text-end">
                        <a class="btn bg-gradient-primary mb-0 export-vehicule-btn" href="javascript:;">
                            <i class='bx bxs-file-export'></i>&nbsp;&nbsp;استخراج البيانات</a>
                        </a>
                    </div>
                    <?php
                    if($_SESSION['userrole'] === 'caid') {
                    ?>
                        <div class="col-md-3 text-start">
                            <h4 class="mb-0">
                                <a href="/vehicule/ajouter" class="btn btn-primary">أضف مركبة</a>
                            </h4>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-secondary"></th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            رقم المركبة</th>
                                            <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            نوع سير المركبة</th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            بيانات المركبة
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2 text-center">
                                            الوثائق الخاصة بالمركبة </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($vehicules as $vehicule) {
                                        ?>
                                        <tr>
                                        <td class="align-middle text-start">
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
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0">
                                                    <?php echo $vehicule->getNumVehicule(); ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0">
                                                    <?php echo $vehicule->getTypeVehicule(); ?>
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">

                                            </td>
                                            <td class="align-middle text-center">

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