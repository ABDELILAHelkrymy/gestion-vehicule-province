<?php
$date = date('Y-m-d');
$title = $date . " : الإحصاء العام للسكان والسكنى - اليوم";
$route = explode('/', $_SERVER['REQUEST_URI'])[2] ?? '';
ob_start();
?>
<div class="container-fluid py-6">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-header pb-0 mb-3">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <h4 class="mb-0">المركبات التي خضعت للمراقبة من طرف اللجنة الإقليمية المختلطة</h4>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 d-flex">
                                    <input type="time" class="form-control w-50" name="heure_operation" id="heure_operation">
                                    <label for="heure_operation" class="col-md-2 col-form-label">وقت العملية</label>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <input type="date" class="form-control w-50" name="date_operation" id="date_operation">
                                    <label for="date_operation" class="col-md-2 col-form-label">تاريخ العملية</label>
                                </div>
                            </div>
                            <div class="row d-flex text-end">
                                <div class="col-md-12 text-end">
                                    <h6>نوع سير المركبة</h6>
                                </div>
                                <div class="col-md-4 d-flex">
                                    
                                </div>
                            </div>

                            <div class="row text-start">
                                <div class="col-md-6">
                                    <button type="submit"
                                        class="btn bg-gradient-success text-md w-30 mt-4 mb-0 compte-btn">أضف</button>
                                </div>
                            </div>
                        </form>
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