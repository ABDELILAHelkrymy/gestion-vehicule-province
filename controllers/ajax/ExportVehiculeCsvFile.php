<?php

use models\VehiculeModel;
use entities\Vehicule;

require_once APP_ROOT . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function exportCompteCsvFile($request, $db)
{
    // get the CompteModel
    $vehiculeModel = new VehiculeModel($db);

    // get data from post request body
    $rawData = file_get_contents('php://input');

    // if the data is not a valid json
    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => 'Invalid data format'];
    }

    $vehicules = [];

    
    $vehicules = $vehiculeModel->getAll();
   


    // create a new PhpSpreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // set the first row with the column names
    $sheet->setCellValue('A1', 'رقم المركبة ');
    $sheet->setCellValue('B1', 'نوع سير المركبة');
    $sheet->setCellValue('C1', 'البطاقة الرمادية');
    $sheet->setCellValue('D1', 'ملاحظات');
    $sheet->setCellValue('E1', 'شهادة التأمين');
    $sheet->setCellValue('F1', 'ملاحظات');
    $sheet->setCellValue('G1', 'شهادة الفحص التقني');
    $sheet->setCellValue('H1', 'ملاحظات');
    $sheet->setCellValue('I1', 'وصل أداء الضريبة');
    $sheet->setCellValue('J1', 'ملاحظات');
    $sheet->setCellValue('K1', 'ورقة السير');
    $sheet->setCellValue('L1', 'ملاحظات');
    $sheet->setCellValue('M1', 'العقد مع الآمر بالنقل');
    $sheet->setCellValue('N1', 'ملاحظات');
    $sheet->setCellValue('O1', 'رقم تسجيل المركبة');
    $sheet->setCellValue('P1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('Q1', 'ملاحظات');
    $sheet->setCellValue('R1', 'رقم الإطار الحديدي');
    $sheet->setCellValue('S1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('T1', 'ملاحظات');
    $sheet->setCellValue('U1', 'اسم الصانع');
    $sheet->setCellValue('V1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('W1', 'ملاحظات');
    $sheet->setCellValue('X1', 'عدد المقاعد');
    $sheet->setCellValue('Y1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('Z1', 'ملاحظات');
    $sheet->setCellValue('AA1', 'النموذج');
    $sheet->setCellValue('AB1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('AC1', 'ملاحظات');
    $sheet->setCellValue('AD1', 'مالك المركبة');
    $sheet->setCellValue('AE1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('AF1', 'ملاحظات');
    $sheet->setCellValue('AG1', 'عنوان مالك المركبة');
    $sheet->setCellValue('AH1', 'تطابق مع البطاقة الرمادية');
    $sheet->setCellValue('AI1', 'ملاحظات');
    $sheet->setCellValue('AJ1', 'رقم بطاقة التعريف');
    $sheet->setCellValue('AK1', 'تاريخ نهاية الصلاحية');
    $sheet->setCellValue('AL1', 'رخصة السياقة');
    $sheet->setCellValue('AM1', 'تاريخ نهاية الصلاحية');
    $sheet->setCellValue('AN1', 'رخصة الثقة');
    $sheet->setCellValue('AO1', 'تاريخ نهاية الصلاحية');
    $sheet->setCellValue('AP1', 'بطاقة السائق المهني');
    $sheet->setCellValue('AQ1', 'تاريخ نهاية الصلاحية');
    $sheet->setCellValue('AR1', 'شهادة الفحص الطبي');
    $sheet->setCellValue('AS1', 'تاريخ نهاية الصلاحية');
    $sheet->setCellValue('AT1', 'تطابق بين مواصفات المركبة و نوع السير المسجل');
    $sheet->setCellValue('AU1', 'ملاحظات');
    $sheet->setCellValue('AV1', 'تطابق عدد المقاعد مع وثائق المركبة');
    $sheet->setCellValue('AW1', 'ملاحظات');
    $sheet->setCellValue('AX1', 'العجلات الأمامية');
    $sheet->setCellValue('AY1', 'العجلات الخلفية');
    $sheet->setCellValue('AZ1', 'ملاحظات');
    $sheet->setCellValue('BA1', 'العجلة الاحتياطية');
    $sheet->setCellValue('BB1', 'ملاحظات');
    $sheet->setCellValue('BC1', 'الزجاجة الواقية الأمامية');
    $sheet->setCellValue('BD1', 'نوافذ الإغاثة');
    $sheet->setCellValue('BE1', 'التجهيزات الزجاجية الأخرى الأمامية في اليمين');
    $sheet->setCellValue('BF1', 'التجهيزات الزجاجية الأخرى الأمامية في اليسار');
    $sheet->setCellValue('BG1', 'التجهيزات الزجاجية الأخرى الخلفية في اليمين');
    $sheet->setCellValue('BH1', 'التجهيزات الزجاجية الأخرى الخلفية في اليسار');
    $sheet->setCellValue('BI1', 'المرايا العاكسة الداخلية');
    $sheet->setCellValue('BJ1', 'المرايا العاكسة الامامية في اليمين');
    $sheet->setCellValue('BK1', 'المرايا العاكسة الامامية في اليسار');
    $sheet->setCellValue('BL1', 'ماسحة الزجاج الامامية');
    $sheet->setCellValue('BM1', 'أضواء المركبة');
    $sheet->setCellValue('BN1', 'زجاجة انعكاس الضوء الخلفية أو الجانبية');
    $sheet->setCellValue('BO1', 'منبه أضواء الضباب');
    $sheet->setCellValue('BP1', 'البنية الفوقية و الهيكل ');
    $sheet->setCellValue('BQ1', 'ملاحظات');
    $sheet->setCellValue('BR1', 'مقعد حجرة القيادة');
    $sheet->setCellValue('BS1', 'ملاحظات');
    $sheet->setCellValue('BT1', 'مقاعد المركبة');
    $sheet->setCellValue('BU1', 'ملاحظات');
    $sheet->setCellValue('BV1', 'أحزمة السلامة');
    $sheet->setCellValue('BW1', 'المنبه الصوتي');
    $sheet->setCellValue('BX1', 'مطفأة الحريق');
    $sheet->setCellValue('BY1', 'ملاحظات');
    $sheet->setCellValue('BZ1', 'علبة الاسعافات الاولية');
    $sheet->setCellValue('CA1', 'ملاحظات');
    $sheet->setCellValue('CB1', 'أبواب المركبة');
    $sheet->setCellValue('CC1', 'ملاحظات');
    $sheet->setCellValue('CD1', 'نظام قفل الابواب الاوتوماتيكي');
    $sheet->setCellValue('CE1', 'ملاحظات');
    $sheet->setCellValue('CF1', 'الحالة الميكانيكية');
    $sheet->setCellValue('CG1', 'التوصيات الخاصة بالمركبة موضوع المراقبة');
    $sheet->setCellValue('CH1', 'التوصيات الخاصة بالجولة الميدانية');
    $sheet->setCellValue('CI1', 'تاريخ العملية');

    // Set columns to auto size
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);
    $sheet->getColumnDimension('I')->setAutoSize(true);
    $sheet->getColumnDimension('J')->setAutoSize(true);
    $sheet->getColumnDimension('K')->setAutoSize(true);
    $sheet->getColumnDimension('L')->setAutoSize(true);
    $sheet->getColumnDimension('M')->setAutoSize(true);
    $sheet->getColumnDimension('N')->setAutoSize(true);
    $sheet->getColumnDimension('O')->setAutoSize(true);
    $sheet->getColumnDimension('P')->setAutoSize(true);
    $sheet->getColumnDimension('Q')->setAutoSize(true);
    $sheet->getColumnDimension('R')->setAutoSize(true);
    $sheet->getColumnDimension('S')->setAutoSize(true);
    $sheet->getColumnDimension('T')->setAutoSize(true);
    $sheet->getColumnDimension('U')->setAutoSize(true);
    $sheet->getColumnDimension('V')->setAutoSize(true);
    $sheet->getColumnDimension('W')->setAutoSize(true);
    $sheet->getColumnDimension('X')->setAutoSize(true);
    $sheet->getColumnDimension('Y')->setAutoSize(true);
    $sheet->getColumnDimension('Z')->setAutoSize(true);
    $sheet->getColumnDimension('AA')->setAutoSize(true);
    $sheet->getColumnDimension('AB')->setAutoSize(true);
    $sheet->getColumnDimension('AC')->setAutoSize(true);
    $sheet->getColumnDimension('AD')->setAutoSize(true);
    $sheet->getColumnDimension('AE')->setAutoSize(true);
    $sheet->getColumnDimension('AF')->setAutoSize(true);
    $sheet->getColumnDimension('AG')->setAutoSize(true);
    $sheet->getColumnDimension('AH')->setAutoSize(true);
    $sheet->getColumnDimension('AI')->setAutoSize(true);
    $sheet->getColumnDimension('AJ')->setAutoSize(true);
    $sheet->getColumnDimension('AK')->setAutoSize(true);
    $sheet->getColumnDimension('AL')->setAutoSize(true);
    $sheet->getColumnDimension('AM')->setAutoSize(true);
    $sheet->getColumnDimension('AN')->setAutoSize(true);
    $sheet->getColumnDimension('AO')->setAutoSize(true);
    $sheet->getColumnDimension('AP')->setAutoSize(true);
    $sheet->getColumnDimension('AQ')->setAutoSize(true);
    $sheet->getColumnDimension('AR')->setAutoSize(true);
    $sheet->getColumnDimension('AS')->setAutoSize(true);
    $sheet->getColumnDimension('AT')->setAutoSize(true);
    $sheet->getColumnDimension('AU')->setAutoSize(true);
    $sheet->getColumnDimension('AV')->setAutoSize(true);
    $sheet->getColumnDimension('AW')->setAutoSize(true);
    $sheet->getColumnDimension('AX')->setAutoSize(true);
    $sheet->getColumnDimension('AY')->setAutoSize(true);
    $sheet->getColumnDimension('AZ')->setAutoSize(true);
    $sheet->getColumnDimension('BA')->setAutoSize(true);
    $sheet->getColumnDimension('BB')->setAutoSize(true);
    $sheet->getColumnDimension('BC')->setAutoSize(true);
    $sheet->getColumnDimension('BD')->setAutoSize(true);
    $sheet->getColumnDimension('BE')->setAutoSize(true);
    $sheet->getColumnDimension('BF')->setAutoSize(true);
    $sheet->getColumnDimension('BG')->setAutoSize(true);
    $sheet->getColumnDimension('BH')->setAutoSize(true);
    $sheet->getColumnDimension('BI')->setAutoSize(true);
    $sheet->getColumnDimension('BJ')->setAutoSize(true);
    $sheet->getColumnDimension('BK')->setAutoSize(true);
    $sheet->getColumnDimension('BL')->setAutoSize(true);
    $sheet->getColumnDimension('BM')->setAutoSize(true);
    $sheet->getColumnDimension('BN')->setAutoSize(true);
    $sheet->getColumnDimension('BO')->setAutoSize(true);
    $sheet->getColumnDimension('BP')->setAutoSize(true);
    $sheet->getColumnDimension('BQ')->setAutoSize(true);
    $sheet->getColumnDimension('BR')->setAutoSize(true);
    $sheet->getColumnDimension('BS')->setAutoSize(true);
    $sheet->getColumnDimension('BT')->setAutoSize(true);
    $sheet->getColumnDimension('BU')->setAutoSize(true);
    $sheet->getColumnDimension('BV')->setAutoSize(true);
    $sheet->getColumnDimension('BW')->setAutoSize(true);
    $sheet->getColumnDimension('BX')->setAutoSize(true);
    $sheet->getColumnDimension('BY')->setAutoSize(true);
    $sheet->getColumnDimension('BZ')->setAutoSize(true);
    $sheet->getColumnDimension('CA')->setAutoSize(true);
    $sheet->getColumnDimension('CB')->setAutoSize(true);
    $sheet->getColumnDimension('CC')->setAutoSize(true);
    $sheet->getColumnDimension('CD')->setAutoSize(true);
    $sheet->getColumnDimension('CE')->setAutoSize(true);
    $sheet->getColumnDimension('CF')->setAutoSize(true);
    $sheet->getColumnDimension('CG')->setAutoSize(true);
    $sheet->getColumnDimension('CH')->setAutoSize(true);
    $sheet->getColumnDimension('CI')->setAutoSize(true);



    // populate the rows with the materiels data
    $row = 2;
    foreach ($vehicules as $vehicule) {
        $vehicule = new Vehicule($vehicule);

        $sheet->setCellValue("A$row", $vehicule->getNumVehicule());
        $sheet->setCellValue("B$row", $vehicule->getTypeVehicule());
        $sheet->setCellValue("C$row", $vehicule->getCarteGrise());
        $sheet->setCellValue("D$row", $vehicule->getObservationCarteGrise());
        $sheet->setCellValue("E$row", $vehicule->getAssurance());
        $sheet->setCellValue("F$row", $vehicule->getObservationAssurance());
        $sheet->setCellValue("G$row", $vehicule->getVisiteTechnique());
        $sheet->setCellValue("H$row", $vehicule->getObservationVisiteTechnique());
        $sheet->setCellValue("I$row", $vehicule->getTaxe());
        $sheet->setCellValue("J$row", $vehicule->getObservationTaxe());
        $sheet->setCellValue("K$row", $vehicule->getFeuilleRoute());
        $sheet->setCellValue("L$row", $vehicule->getObservationFeuilleRoute());
        $sheet->setCellValue("M$row", $vehicule->getContratOrdreTransport());
        $sheet->setCellValue("N$row", $vehicule->getObservationContratOrdreTransport());
        $sheet->setCellValue("O$row", $vehicule->getMatricule());
        $sheet->setCellValue("P$row", $vehicule->getMatriculeConfirmeCartGrise());
        $sheet->setCellValue("Q$row", $vehicule->getObservationMatricule());
        $sheet->setCellValue("R$row", $vehicule->getNumeroChassis());
        $sheet->setCellValue("S$row", $vehicule->getNumeroChassisConfirmeCartGrise());
        $sheet->setCellValue("T$row", $vehicule->getObservationNumeroChassis());
        $sheet->setCellValue("U$row", $vehicule->getNomFabricant());
        $sheet->setCellValue("V$row", $vehicule->getNomFabricantConfirmeCartGrise());
        $sheet->setCellValue("W$row", $vehicule->getObservationNomFabricant());
        $sheet->setCellValue("X$row", $vehicule->getNombreSiege());
        $sheet->setCellValue("Y$row", $vehicule->getNombreSiegeConfirmeCartGrise());
        $sheet->setCellValue("Z$row", $vehicule->getObservationNombreSiege());
        $sheet->setCellValue("AA$row", $vehicule->getModele());
        $sheet->setCellValue("AB$row", $vehicule->getModeleConfirmeCartGrise());
        $sheet->setCellValue("AC$row", $vehicule->getObservationModele());
        $sheet->setCellValue("AD$row", $vehicule->getProprietaire());
        $sheet->setCellValue("AE$row", $vehicule->getProprietaireConfirmeCartGrise());
        $sheet->setCellValue("AF$row", $vehicule->getObservationProprietaire());
        $sheet->setCellValue("AG$row", $vehicule->getAdresseProprietaire());
        $sheet->setCellValue("AH$row", $vehicule->getAdresseProprietaireConfirmeCartGrise());
        $sheet->setCellValue("AI$row", $vehicule->getObservationAdresseProprietaire());
        $sheet->setCellValue("AJ$row", $vehicule->getCinChauffeur());
        $sheet->setCellValue("AK$row", $vehicule->getDateFinValiditeCin());
        $sheet->setCellValue("AL$row", $vehicule->getPermisConduire());
        $sheet->setCellValue("AM$row", $vehicule->getDateFinValiditePermis());
        $sheet->setCellValue("AN$row", $vehicule->getPermisConfiance());
        $sheet->setCellValue("AO$row", $vehicule->getDateFinValiditePermisConfiance());
        $sheet->setCellValue("AP$row", $vehicule->getCarteConducteur());
        $sheet->setCellValue("AQ$row", $vehicule->getDateFinValiditeCarteConducteur());
        $sheet->setCellValue("AR$row", $vehicule->getVisiteMedicalChauffeur());
        $sheet->setCellValue("AS$row", $vehicule->getDateFinValiditeVisiteMedical());
        $sheet->setCellValue("AT$row", $vehicule->getConformiteTypeVehicule());
        $sheet->setCellValue("AU$row", $vehicule->getObservationConformiteTypeVehicule());
        $sheet->setCellValue("AV$row", $vehicule->getConformiteNombrePlaces());
        $sheet->setCellValue("AW$row", $vehicule->getObservationConformiteNombrePlaces());
        $sheet->setCellValue("AX$row", $vehicule->getEtatRouesAvant());
        $sheet->setCellValue("AY$row", $vehicule->getEtatRouesArriere());
        $sheet->setCellValue("AZ$row", $vehicule->getObservationEtatRouesArriere());
        $sheet->setCellValue("BA$row", $vehicule->getRoueSecours());
        $sheet->setCellValue("BB$row", $vehicule->getObservationRoueSecours());
        $sheet->setCellValue("BC$row", $vehicule->getVitreProtectionAvant());
        $sheet->setCellValue("BD$row", $vehicule->getFenetreSecours());
        $sheet->setCellValue("BE$row", $vehicule->getEquipementVitresAvantDroite());
        $sheet->setCellValue("BF$row", $vehicule->getEquipementVitresAvantGauche());
        $sheet->setCellValue("BG$row", $vehicule->getEquipementVitresArriereDroite());
        $sheet->setCellValue("BH$row", $vehicule->getEquipementVitresArriereGauche());
        $sheet->setCellValue("BI$row", $vehicule->getMiroirsReflecteursInternes());
        $sheet->setCellValue("BJ$row", $vehicule->getMiroirsReflecteursAvantDroite());
        $sheet->setCellValue("BK$row", $vehicule->getMiroirsReflecteursAvantGauche());
        $sheet->setCellValue("BL$row", $vehicule->getEssuieGlaceAvant());
        $sheet->setCellValue("BM$row", $vehicule->getLumieresVehicule());
        $sheet->setCellValue("BN$row", $vehicule->getReflecteursArriereOuLateraux());
        $sheet->setCellValue("BO$row", $vehicule->getSignalLumieresBrouillard());
        $sheet->setCellValue("BP$row", $vehicule->getEtatCarosserie());
        $sheet->setCellValue("BQ$row", $vehicule->getObservationEtatCarosserie());
        $sheet->setCellValue("BR$row", $vehicule->getSiegeCabineConducteur());
        $sheet->setCellValue("BS$row", $vehicule->getObservationSiegeCabineConducteur());
        $sheet->setCellValue("BT$row", $vehicule->getSiegesVehicule());
        $sheet->setCellValue("BU$row", $vehicule->getCeinturesSecurite());
        $sheet->setCellValue("BV$row", $vehicule->getKlaxon());
        $sheet->setCellValue("BW$row", $vehicule->getObservationKlaxon());
        $sheet->setCellValue("BX$row", $vehicule->getExtincteur());
        $sheet->setCellValue("BY$row", $vehicule->getObservationExtincteur());
        $sheet->setCellValue("BZ$row", $vehicule->getTrousseSecours());
        $sheet->setCellValue("CA$row", $vehicule->getObservationTrousseSecours());
        $sheet->setCellValue("CB$row", $vehicule->getPortes());
        $sheet->setCellValue("CC$row", $vehicule->getObservationPortes());
        $sheet->setCellValue("CD$row", $vehicule->getSystemeVerrouillageAuto());
        $sheet->setCellValue("CE$row", $vehicule->getObservationSystemeVerrouillageAuto());
        $sheet->setCellValue("CF$row", $vehicule->getEtatMecanique());
        $sheet->setCellValue("CG$row", $vehicule->getRecommandationsVehicule());
        $sheet->setCellValue("CH$row", $vehicule->getRecommandationsGroupeField());
        $sheet->setCellValue("CI$row", $vehicule->getDateOperation() . ' ' . $vehicule->getHeureOperation());
        $row++;
    }

    // create a new Xlsx object
    $writer = new Xlsx($spreadsheet);

    // set the headers to download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="vehicules.xlsx"');
    header('Cache-Control: max-age=0');

    // write the file to the output
    $writer->save('php://output');
    exit;
}

// Assuming $this->request and $this->db are correctly set
exportCompteCsvFile($this->request, $this->db);