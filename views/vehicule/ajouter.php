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
                        <div class="col-md-6 text-end">
                            <h3 class="mb-0">ملأ البيانات الخاصة الإحصاء العام للسكان والسكنى</h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group text-end">
                                        <label for="example-text-input"
                                            class="form-control-label text-xl-center">الدواوير / الأحياء
                                            المحصية</label>
                                        <input class="form-control text-end" dir="rtl" id="list_douar" name="list_douar"
                                            type="text" value="" required>
                                    </div>
                                    <p class="error-prenom text-danger text-xs error-text"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-end">
                                        <label for="example-text-input" class="form-control-label">عدد المساكن
                                            المحصية</label>
                                        <input class="form-control text-end" name="nbr_menage" type="number" value=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-end">
                                        <label for="example-text-input" class="form-control-label">عدد الأسر
                                            المحصية</label>
                                        <input class="form-control text-end" name="nbr_famille" type="number" value=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-end">
                                        <label for="example-text-input" class="form-control-label">ملاحظات</label>
                                        <textarea class="form-control text-end" dir="rtl" name="observations"
                                            rows="3"></textarea>
                                    </div>
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