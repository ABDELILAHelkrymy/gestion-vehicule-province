<?php
$date = date('Y-m-d');
$title = $date . " : اليوم";
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
                                <div class="col-md-4 text-end">
                                    <label for="heure_operation" class="form-label">وقت العملية</label>
                                    <input type="time" class="form-control" name="heure_operation" id="heure_operation">
                                </div>
                                <div class="col-md-4 text-end">
                                    <label for="date_operation" class="form-label">تاريخ العملية</label>
                                    <input type="date" class="form-control" name="date_operation" id="date_operation">
                                </div>
                                <div class="col-md-4 text-end">
                                    <label for="num_vehicule" class="form-label">رقم المركبة</label>
                                    <input type="text" class="form-control" name="num_vehicule" id="num_vehicule">
                                </div>
                            </div>

                            <div class="row mt-3 d-flex justify-content-start flex-row-reverse">
                                <div class="col-md-12 text-end">
                                    <h6>نوع سير المركبة</h6>
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">النقل الحضري</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule" value="النقل الحضري">
                                </div>

                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">النقل المدرسي</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule" value="النقل المدرسي">
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label"> النقل بين الجماعات</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule"
                                        value="النقل بين الجماعات">
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">نقل المستخدمين لحساب الغير</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule"
                                        value="نقل المستخدمين لحساب الغير">
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">النقل بواسطة سيارة الاجرة </label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule"
                                        value="النقل بواسطة سيارة الاجرة">
                                </div>
                                <div class="col-md-4 d-flex flex-row-reverse justify-content-around align-items-center">
                                    <div>
                                        <label for="type_vehicule" class="form-label">اخر</label>
                                        <input type="radio" name="type_vehicule" id="type_vehicule_autre" value="اخر">
                                    </div>
                                    <input type="text" class="form-control w-60" dir="rtl" name="type_vehicule_autre"
                                        id="type_vehicule_input_autre">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6>الوثائق الخاصة بالمركبة </h6>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-6 text-end">
                                            <label for="carte_grise" class="form-label">البطاقة الرمادية</label>
                                            <input type="checkbox" name="carte_grise" id="carte_grise" value="1">
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_carte_grise"
                                                id="assuobservation_carte_griserance">
                                            <label for="observation_carte_grise" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-6 text-end">
                                            <label for="assurance" class="form-label">شهادة التأمين</label>
                                            <input type="checkbox" name="assurance" id="assurance" value="1">
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_assurance"
                                                id="observation_assurance">
                                            <label for="observation_assurance" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-6 text-end">
                                            <label for="visite_technique" class="form-label">شهادة الفحص التقني</label>
                                            <input type="checkbox" name="visite_technique" id="visite_technique"
                                                value="نعم">
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_visite_technique"
                                                id="observation_visite_technique">
                                            <label for="observation_visite_technique" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-6 text-end">
                                            <label for="taxe" class="form-label">وصل أداء الضريبة</label>
                                            <input type="checkbox" name="taxe" id="taxe" value="1">
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_taxe"
                                                id="observation_taxe">
                                            <label for="observation_taxe" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-6 text-end">
                                            <label for="feulle_route" class="form-label">ورقة السير</label>
                                            <input type="checkbox" name="feulle_route" id="feulle_route" value="1">
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_feulle_route"
                                                id="observation_feulle_route">
                                            <label for="observation_feulle_route" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-6 text-end">
                                            <label for="contrat_ordre_transport" class="form-label">العقد مع الآمر
                                                بالنقل</label>
                                            <input type="checkbox" name="contrat_ordre_transport"
                                                id="contrat_ordre_transport" value="1">
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <input type="text" class="form-control"
                                                name="observation_contrat_ordre_transport"
                                                id="observation_contrat_ordre_transport">
                                            <label for="observation_contrat_ordre_transport"
                                                class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6>بيانات المركبة</h6>
                                </div>
                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="matricule" class="form-label">رقم تسجيل المركبة</label>
                                            <input type="text" class="form-control w-60" name="matricule"
                                                id="matricule">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for=" matricule" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="matricule_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="matricule_confirme_cart_grise"
                                                id="matricule_confirme_cart_grise" value="1">
                                            <label for="matricule_confirme_cart_grise">لا</label>
                                            <input type="radio" name="matricule_confirme_cart_grise"
                                                id="matricule_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_matricule"
                                                id="observation_matricule">
                                            <label for="observation_matricule" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="numero_chassis" class="form-label">رقم الإطار الحديدي</label>
                                            <input type="text" class="form-control w-60" name="numero_chassis"
                                                id="numero_chassis">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="numero_chassis_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="numero_chassis_confirme_cart_grise"
                                                id="numero_chassis_confirme_cart_grise" value="1">
                                            <label for="numero_chassis_confirme_cart_grise">لا</label>
                                            <input type="radio" name="numero_chassis_confirme_cart_grise"
                                                id="numero_chassis_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_matricule"
                                                id="observation_matricule">
                                            <label for="observation_matricule" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="nom_fabricant" class="form-label">اسم المصنع</label>
                                            <input type="text" class="form-control w-60" name="nom_fabricant"
                                                id="nom_fabricant">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="nom_fabricant_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="nom_fabricant_confirme_cart_grise"
                                                id="nom_fabricant_confirme_cart_grise" value="1">
                                            <label for="nom_fabricant_confirme_cart_grise">لا</label>
                                            <input type="radio" name="nom_fabricant_confirme_cart_grise"
                                                id="nom_fabricant_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_nom_fabricant"
                                                id="observation_nom_fabricant">
                                            <label for="observation_nom_fabricant" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="modele" class="form-label">النموذج</label>
                                            <input type="text" class="form-control w-60" name="modele" id="modele">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="modele_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="modele_confirme_cart_grise"
                                                id="modele_confirme_cart_grise" value="1">
                                            <label for="modele_confirme_cart_grise">لا</label>
                                            <input type="radio" name="modele_confirme_cart_grise"
                                                id="modele_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_modele"
                                                id="observation_modele">
                                            <label for="observation_modele" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="nombre_siege" class="form-label">عدد المقاعد</label>
                                            <input type="text" class="form-control w-60" name="nombre_siege"
                                                id="nombre_siege">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="nombre_siege_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="nombre_siege_confirme_cart_grise"
                                                id="nombre_siege_confirme_cart_grise" value="1">
                                            <label for="nombre_siege_confirme_cart_grise">لا</label>
                                            <input type="radio" name="nombre_siege_confirme_cart_grise"
                                                id="nombre_siege_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_nombre_siege"
                                                id="observation_nombre_siege">
                                            <label for="observation_nombre_siege" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="proprietaire" class="form-label">اسم المالك</label>
                                            <input type="text" class="form-control w-60" name="proprietaire"
                                                id="proprietaire">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="proprietaire_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="proprietaire_confirme_cart_grise"
                                                id="proprietaire_confirme_cart_grise" value="1">
                                            <label for="proprietaire_confirme_cart_grise">لا</label>
                                            <input type="radio" name="proprietaire_confirme_cart_grise"
                                                id="proprietaire_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control" name="observation_proprietaire"
                                                id="observation_proprietaire">
                                            <label for="observation_proprietaire" class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row flex-row-reverse">
                                        <div class="col-md-4 text-end d-flex flex-row-reverse justify-content-around">
                                            <label for="adresse_proprietaire" class="form-label">عنوان المالك</label>
                                            <input type="text" class="form-control w-60" name="adresse_proprietaire"
                                                id="adresse_proprietaire">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="adresse_proprietaire_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="adresse_proprietaire_confirme_cart_grise"
                                                id="adresse_proprietaire_confirme_cart_grise" value="1">
                                            <label for="adresse_proprietaire_confirme_cart_grise">لا</label>
                                            <input type="radio" name="adresse_proprietaire_confirme_cart_grise"
                                                id="adresse_proprietaire_confirme_cart_grise" value="0">
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <input type="text" class="form-control"
                                                name="observation_adresse_proprietaire"
                                                id="observation_adresse_proprietaire">
                                            <label for="observation_adresse_proprietaire"
                                                class="form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 flex-row-reverse">
                                <div class="col-md-12 text-end">
                                    <h6>سائق المركبة </h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="cin_chauffeur" class="form-label">رقم بطاقة التعريف</label>
                                    <input type="text" class="form-control" name="cin_chauffeur" id="cin_chauffeur">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_cin" class="form-label">تاريخ انتهاء بطاقة
                                        التعريف</label>
                                    <input type="date" class="form-control" name="date_fin_validite_cin"
                                        id="date_fin_validite_cin">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="permis_conduire" class="form-label">رخصة السياقة</label>
                                    <input type="text" class="form-control" name="permis_conduire" id="permis_conduire">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_permis" class="form-label">تاريخ انتهاء رخصة
                                        السياقة</label>
                                    <input type="date" class="form-control" name="date_fin_validite_permis"
                                        id="date_fin_validite_permis">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="permis_confiance" class="form-label">رخصة الثقة</label>
                                    <input type="text" class="form-control" name="permis_confiance"
                                        id="permis_confiance">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_permis_confiance" class="form-label">تاريخ انتهاء
                                        رخصة الثقة</label>
                                    <input type="date" class="form-control" name="date_fin_validite_permis_confiance"
                                        id="date_fin_validite_permis_confiance">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="carte_conducteur" class="form-label">بطاقة السائق المهني</label>
                                    <input type="text" class="form-control" name="carte_conducteur"
                                        id="carte_conducteur">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_carte_conducteur" class="form-label">تاريخ انتهاء
                                        بطاقة السائق المهني</label>
                                    <input type="date" class="form-control" name="date_fin_validite_carte_conducteur"
                                        id="date_fin_validite_carte_conducteur">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="visite_medical_chauffeur" class="form-label">شهادة الفحص الطبي</label>
                                    <input type="text" class="form-control" name="visite_medical_chauffeur"
                                        id="visite_medical_chauffeur">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_visite_medical" class="form-label">تاريخ انتهاء
                                        شهادة الفحص الطبي </label>
                                    <input type="date" class="form-control" name="date_fin_validite_visite_medical"
                                        id="date_fin_validite_visite_medical">
                                </div>
                            </div>

                            <div class="row mt-3 flex-row-reverse">
                                <div class="col-md-12 text-end">
                                    <h6>نقط المعاينة التي تمت مراقبتها </h6>
                                </div>
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="conformite_type_vehicule" class="form-label">تطابق بين مواصفات
                                            المركبة و
                                            نوع السير المسجل </label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="radio" name="conformite_type_vehicule"
                                            id="conformite_type_vehicule" value="نعم">
                                        <label for="conformite_type_vehicule">نعم</label>
                                        <input type="radio" name="conformite_type_vehicule"
                                            id="conformite_type_vehicule" value="لا">
                                        <label for="conformite_type_vehicule">لا</label>
                                        <label for="observation_conformite_type_vehicule"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_conformite_type_vehicule"
                                            id="observation_conformite_type_vehicule">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="conformite_nombre_places" class="form-label">تطابق عدد المقاعد مع
                                            وثائق
                                            المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="radio" name="conformite_nombre_places"
                                            id="conformite_nombre_places" value="نعم">
                                        <label for="conformite_nombre_places">نعم</label>
                                        <input type="radio" name="conformite_nombre_places"
                                            id="conformite_nombre_places" value="لا">
                                        <label for="conformite_nombre_places">لا</label>
                                        <label for="observation_conformite_nombre_places"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_conformite_nombre_places"
                                            id="observation_conformite_nombre_places">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_roues_avant" class="form-label">العجلات الأمامية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="radio" name="etat_roues_avant" id="etat_roues_avant"
                                            value="حالة جيدة">
                                        <label for="etat_roues_avant">حالة جيدة</label>
                                        <input type="radio" name="etat_roues_avant" id="etat_roues_avant"
                                            value="حالة سيئة">
                                        <label for="etat_roues_avant">حالة سيئة</label>
                                        <label for="observation_etat_roues_avant"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_etat_roues_avant" id="observation_etat_roues_avant">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_roues_arriere" class="form-label">العجلات الخلفية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="radio" name="etat_roues_arriere" id="etat_roues_arriere"
                                            value="حالة جيدة">
                                        <label for="etat_roues_arriere">حالة جيدة</label>
                                        <input type="radio" name="etat_roues_arriere" id="etat_roues_arriere"
                                            value="حالة سيئة">
                                        <label for="etat_roues_arriere">حالة سيئة</label>
                                        <label for="observation_etat_roues_arriere"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_etat_roues_arriere" id="observation_etat_roues_arriere">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="roue_secours" class="form-label">العجلة الاحتياطية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours" value="موجودة">
                                        <label for="roue_secours">موجودة </label>
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours"
                                            value="غير موجودة">
                                        <label for="roue_secours">غير موجودة </label>
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours"
                                            value="حالة جيدة">
                                        <label for="roue_secours">حالة جيدة</label>
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours"
                                            value="حالة سيئة">
                                        <label for="roue_secours">حالة سيئة</label>
                                        <label for="observation_roue_secours" class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-40" dir="rtl"
                                            name="observation_roue_secours" id="observation_roue_secours">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="vitre_protection_avant" class="form-label"> الزجاجة الواقية الأمامية
                                        </label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_good" value="حالة جيدة">
                                        <label for="vitre_protection_avant_good">حالة جيدة</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_bad" value="حالة سيئة">
                                        <label for="vitre_protection_avant_bad">حالة سيئة</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_small_crack" value="شق صغير">
                                        <label for="vitre_protection_avant_small_crack">شق صغير</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_large_crack" value="شق كبير">
                                        <label for="vitre_protection_avant_large_crack">شق كبير</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_broken" value="كسر">
                                        <label for="vitre_protection_avant_broken">كسر</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_insufficient_visibility" value="رؤية غير كافية">
                                        <label for="vitre_protection_avant_insufficient_visibility">رؤية غير
                                            كافية</label>
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="fenetre_secours" class="form-label">نوافذ الإغاثة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_exist"
                                            value="موجودة">
                                        <label for="fenetre_secours_exist">موجودة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_not_exist"
                                            value="غير موجودة">
                                        <label for="fenetre_secours_not_exist">غير موجودة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_good"
                                            value="حالة جيدة">
                                        <label for="fenetre_secours_good">حالة جيدة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_bad"
                                            value="حالة سيئة">
                                        <label for="fenetre_secours_bad">حالة سيئة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_small_crack"
                                            value="شق صغير">
                                        <label for="fenetre_secours_small_crack">شق صغير</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_large_crack"
                                            value="شق كبير">
                                        <label for="fenetre_secours_large_crack">شق كبير</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_broken"
                                            value="كسر">
                                        <label for="fenetre_secours_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الأمامية في اليمين -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_avant_droite" class="form-label">التجهيزات
                                            الزجاجية الأخرى الأمامية في اليمين</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_exist" value="موجودة">
                                        <label for="equipement_vitres_avant_droite_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_not_exist" value="غير موجودة">
                                        <label for="equipement_vitres_avant_droite_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_good" value="حالة جيدة">
                                        <label for="equipement_vitres_avant_droite_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_bad" value="حالة سيئة">
                                        <label for="equipement_vitres_avant_droite_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_small_crack" value="شق صغير">
                                        <label for="equipement_vitres_avant_droite_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_large_crack" value="شق كبير">
                                        <label for="equipement_vitres_avant_droite_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_broken" value="كسر">
                                        <label for="equipement_vitres_avant_droite_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الأمامية في اليسار -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_avant_gauche" class="form-label">التجهيزات
                                            الزجاجية الأخرى الأمامية في اليسار</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_exist" value="موجودة">
                                        <label for="equipement_vitres_avant_gauche_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_not_exist" value="غير موجودة">
                                        <label for="equipement_vitres_avant_gauche_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_good" value="حالة جيدة">
                                        <label for="equipement_vitres_avant_gauche_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_bad" value="حالة سيئة">
                                        <label for="equipement_vitres_avant_gauche_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_small_crack" value="شق صغير">
                                        <label for="equipement_vitres_avant_gauche_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_large_crack" value="شق كبير">
                                        <label for="equipement_vitres_avant_gauche_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_broken" value="كسر">
                                        <label for="equipement_vitres_avant_gauche_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليمين -->
                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليمين -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_arriere_droite" class="form-label">التجهيزات
                                            الزجاجية الأخرى الخلفية في اليمين</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_exist" value="موجودة">
                                        <label for="equipement_vitres_arriere_droite_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_not_exist" value="غير موجودة">
                                        <label for="equipement_vitres_arriere_droite_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_good" value="حالة جيدة">
                                        <label for="equipement_vitres_arriere_droite_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_bad" value="حالة سيئة">
                                        <label for="equipement_vitres_arriere_droite_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_small_crack" value="شق صغير">
                                        <label for="equipement_vitres_arriere_droite_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_large_crack" value="شق كبير">
                                        <label for="equipement_vitres_arriere_droite_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_broken" value="كسر">
                                        <label for="equipement_vitres_arriere_droite_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليسار -->
                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليسار -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_arriere_gauche" class="form-label">التجهيزات
                                            الزجاجية الأخرى الخلفية في اليسار</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_exist" value="موجودة">
                                        <label for="equipement_vitres_arriere_gauche_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_not_exist" value="غير موجودة">
                                        <label for="equipement_vitres_arriere_gauche_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_good" value="حالة جيدة">
                                        <label for="equipement_vitres_arriere_gauche_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_bad" value="حالة سيئة">
                                        <label for="equipement_vitres_arriere_gauche_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_small_crack" value="شق صغير">
                                        <label for="equipement_vitres_arriere_gauche_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_large_crack" value="شق كبير">
                                        <label for="equipement_vitres_arriere_gauche_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_broken" value="كسر">
                                        <label for="equipement_vitres_arriere_gauche_broken">كسر</label>

                                    </div>
                                </div>

                                <!-- المرايا العاكسة الداخلية -->
                                <!-- المرايا العاكسة الداخلية -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="miroirs_reflecteurs_internes" class="form-label">المرايا العاكسة
                                            الداخلية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_exist" value="موجودة">
                                        <label for="miroirs_reflecteurs_internes_exist">موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_not_exist" value="غير موجودة">
                                        <label for="miroirs_reflecteurs_internes_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_good" value="حالة جيدة">
                                        <label for="miroirs_reflecteurs_internes_good">حالة جيدة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_bad" value="حالة سيئة">
                                        <label for="miroirs_reflecteurs_internes_bad">حالة سيئة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_small_crack" value="شق صغير">
                                        <label for="miroirs_reflecteurs_internes_small_crack">شق صغير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_large_crack" value="شق كبير">
                                        <label for="miroirs_reflecteurs_internes_large_crack">شق كبير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_broken" value="كسر">
                                        <label for="miroirs_reflecteurs_internes_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- المرايا العاكسة الامامية في اليمين -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="miroirs_reflecteurs_avant_droite" class="form-label">المرايا العاكسة
                                            الامامية في اليمين</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_exist" value="موجودة">
                                        <label for="miroirs_reflecteurs_avant_droite_exist">موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_not_exist" value="غير موجودة">
                                        <label for="miroirs_reflecteurs_avant_droite_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_good" value="حالة جيدة">
                                        <label for="miroirs_reflecteurs_avant_droite_good">حالة جيدة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_bad" value="حالة سيئة">
                                        <label for="miroirs_reflecteurs_avant_droite_bad">حالة سيئة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_small_crack" value="شق صغير">
                                        <label for="miroirs_reflecteurs_avant_droite_small_crack">شق صغير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_large_crack" value="شق كبير">
                                        <label for="miroirs_reflecteurs_avant_droite_large_crack">شق كبير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_broken" value="كسر">
                                        <label for="miroirs_reflecteurs_avant_droite_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- المرايا العاكسة الامامية في اليسار -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="miroirs_reflecteurs_avant_gauche" class="form-label">المرايا العاكسة
                                            الامامية في اليسار</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_exist" value="موجودة">
                                        <label for="miroirs_reflecteurs_avant_gauche_exist">موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_not_exist" value="غير موجودة">
                                        <label for="miroirs_reflecteurs_avant_gauche_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_good" value="حالة جيدة">
                                        <label for="miroirs_reflecteurs_avant_gauche_good">حالة جيدة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_bad" value="حالة سيئة">
                                        <label for="miroirs_reflecteurs_avant_gauche_bad">حالة سيئة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_small_crack" value="شق صغير">
                                        <label for="miroirs_reflecteurs_avant_gauche_small_crack">شق صغير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_large_crack" value="شق كبير">
                                        <label for="miroirs_reflecteurs_avant_gauche_large_crack">شق كبير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_broken" value="كسر">
                                        <label for="miroirs_reflecteurs_avant_gauche_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- ماسحة الزجاج الامامية -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="essuie_glace_avant" class="form-label">ماسحة الزجاج الامامية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="essuie_glace_avant[]" id="essuie_glace_avant_exist"
                                            value="موجودة">
                                        <label for="essuie_glace_avant_exist">موجودة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]"
                                            id="essuie_glace_avant_not_exist" value="غير موجودة">
                                        <label for="essuie_glace_avant_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]" id="essuie_glace_avant_good"
                                            value="حالة جيدة">
                                        <label for="essuie_glace_avant_good">حالة جيدة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]" id="essuie_glace_avant_bad"
                                            value="حالة سيئة">
                                        <label for="essuie_glace_avant_bad">حالة سيئة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]"
                                            id="essuie_glace_avant_working" value="تشتغل">
                                        <label for="essuie_glace_avant_working">تشتغل</label>
                                        <input type="checkbox" name="essuie_glace_avant[]"
                                            id="essuie_glace_avant_not_working" value="لا تشتغل">
                                        <label for="essuie_glace_avant_not_working">لا تشتغل</label>
                                    </div>
                                </div>

                                <!-- أضواء المركبة -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="lumieres_vehicule" class="form-label">أضواء المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="lumieres_vehicule[]" id="lumieres_vehicule_working"
                                            value="تشتغل">
                                        <label for="lumieres_vehicule_working">تشتغل</label>
                                        <input type="checkbox" name="lumieres_vehicule[]"
                                            id="lumieres_vehicule_not_working" value="لا تشتغل">
                                        <label for="lumieres_vehicule_not_working">لا تشتغل</label>
                                        <input type="checkbox" name="lumieres_vehicule[]" id="lumieres_vehicule_issue"
                                            value="عيب في الاشتغال">
                                        <label for="lumieres_vehicule_issue">عيب في الاشتغال</label>
                                        <label for="observation_lumieres_vehicule"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_lumieres_vehicule" id="observation_lumieres_vehicule">
                                    </div>
                                </div>

                                <!-- زجاجة انعكاس الضوء الخلفية أو الجانبية -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="reflecteurs_arriere_ou_lateraux" class="form-label">زجاجة انعكاس
                                            الضوء الخلفية أو الجانبية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="reflecteurs_arriere_ou_lateraux[]"
                                            id="reflecteurs_arriere_ou_lateraux_exist" value="موجودة">
                                        <label for="reflecteurs_arriere_ou_lateraux_exist">موجودة</label>
                                        <input type="checkbox" name="reflecteurs_arriere_ou_lateraux[]"
                                            id="reflecteurs_arriere_ou_lateraux_not_exist" value="غير موجودة">
                                        <label for="reflecteurs_arriere_ou_lateraux_not_exist">غير موجودة</label>
                                        <label for="observation_reflecteurs_arriere_ou_lateraux"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_reflecteurs_arriere_ou_lateraux"
                                            id="observation_reflecteurs_arriere_ou_lateraux">
                                    </div>
                                </div>

                                <!-- منبه أضواء الضباب -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="signal_lumieres_brouillard" class="form-label">منبه أضواء
                                            الضباب</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_exist" value="موجودة">
                                        <label for="signal_lumieres_brouillard_exist">موجودة</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_not_exist" value="غير موجودة">
                                        <label for="signal_lumieres_brouillard_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_working" value="تشتغل">
                                        <label for="signal_lumieres_brouillard_working">تشتغل</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_not_working" value="لا تشتغل">
                                        <label for="signal_lumieres_brouillard_not_working">لا تشتغل</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_issue" value="عيب في الاشتغال">
                                        <label for="signal_lumieres_brouillard_issue">عيب في الاشتغال</label>
                                    </div>
                                </div>

                                <!-- البنية الفوقية و الهيكل -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_carosserie" class="form-label">البنية الفوقية و الهيكل</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_good"
                                            value="حالة جيدة">
                                        <label for="etat_carosserie_good">حالة جيدة</label>
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_bad"
                                            value="حالة سيئة">
                                        <label for="etat_carosserie_bad">حالة سيئة</label>
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_corroded"
                                            value="تآكل">
                                        <label for="etat_carosserie_corroded">تآكل</label>
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_hole"
                                            value="تآكل محدث لثقب">
                                        <label for="etat_carosserie_hole">تآكل محدث لثقب</label>
                                        <label for="observation_etat_carosserie" class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_etat_carosserie" id="observation_etat_carosserie">
                                    </div>
                                </div>

                                <!-- مقعد حجرة القيادة -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="siege_cabine_conducteur" class="form-label">مقعد حجرة
                                            القيادة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_good" value="حالة جيدة">
                                        <label for="siege_cabine_conducteur_good">حالة جيدة</label>
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_bad" value="حالة سيئة">
                                        <label for="siege_cabine_conducteur_bad">حالة سيئة</label>
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_teared" value="ممزق">
                                        <label for="siege_cabine_conducteur_teared">ممزق</label>
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_steering" value="مقود مكسور">
                                        <label for="siege_cabine_conducteur_steering">مقود مكسور</label>
                                        <label for="observation_siege_cabine_conducteur"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_siege_cabine_conducteur"
                                            id="observation_siege_cabine_conducteur">
                                    </div>
                                </div>

                                <!-- مقعد المركبة -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="sieges_vehicule" class="form-label">مقاعد المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_good"
                                            value="حالة جيدة">
                                        <label for="siege_vehicule_good">حالة جيدة</label>
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_bad"
                                            value="حالة سيئة">
                                        <label for="siege_vehicule_bad">حالة سيئة</label>
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_good_fix"
                                            value="تثبيت جيد">
                                        <label for="siege_vehicule_good_fix">تثبيت جيد</label>
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_bad_fix"
                                            value="تثبيت سيء">
                                        <label for="siege_vehicule_bad_fix">تثبيت سيء</label>
                                        <label for="observation_sieges_vehicule" class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_sieges_vehicule" id="observation_sieges_vehicule">
                                    </div>
                                </div>

                                <!-- أحزمة السلامة -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="ceintures_securite" class="form-label">أحزمة السلامة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="ceintures_securite[]" id="ceinture_securite_good"
                                            value="موجودة">
                                        <label for="ceinture_securite_good">موجودة</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_not_found" value="غير موجودة">
                                        <label for="ceinture_securite_not_found">غير موجودة</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_good_fix" value="تثبيت جيد">
                                        <label for="ceinture_securite_good_fix">تثبيت جيد</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_bad_fix" value="تثبيت سيء">
                                        <label for="ceinture_securite_bad_fix">تثبيت سيء</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_good_work" value="اشتغال جيد">
                                        <label for="ceinture_securite_good_work">اشتغال جيد</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_bad_work" value="اشتغال سيء">
                                        <label for="ceinture_securite_bad_work">اشتغال سيء</label>
                                    </div>
                                </div>

                                <!-- المنبه الصوتي -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="klaxon" class="form-label">المنبه الصوتي</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="klaxon[]" id="klaxon_good" value="يشتغل">
                                        <label for="klaxon_good">يشتغل</label>
                                        <input type="checkbox" name="klaxon[]" id="klaxon_not_working" value="لا يشتغل">
                                        <label for="klaxon_not_working">لا يشتغل</label>
                                        <input type="text" class="form-control w-60" dir="rtl" name="observation_klaxon"
                                            id="observation_klaxon" placeholder="ملاحظات المنبه الصوتي">
                                    </div>
                                </div>

                                <!-- مطفأة الحريق -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="extincteur" class="form-label">مطفأة الحريق</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="extincteur[]" id="extincteur_good"
                                            value="حالة جيدة">
                                        <label for="extincteur_good">حالة جيدة</label>
                                        <input type="checkbox" name="extincteur[]" id="extincteur_bad"
                                            value="حالة سيئة">
                                        <label for="extincteur_bad">حالة سيئة</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_extincteur" id="observation_extincteur"
                                            placeholder="ملاحظات المطفأة">
                                    </div>
                                </div>

                                <!-- علبة الاسعافات الاولية -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="trousse_secours" class="form-label">علبة الاسعافات الاولية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="trousse_secours[]" id="trousse_secours_good"
                                            value="حالة جيدة">
                                        <label for="trousse_secours_good">حالة جيدة</label>
                                        <input type="checkbox" name="trousse_secours[]" id="trousse_secours_bad"
                                            value="حالة سيئة">
                                        <label for="trousse_secours_bad">حالة سيئة</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_trousse_secours" id="observation_trousse_secours"
                                            placeholder="ملاحظات علبة الاسعافات">
                                    </div>
                                </div>

                                <!-- أبواب المركبة -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="portes" class="form-label">أبواب المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="portes[]" id="portes_good" value="حالة جيدة">
                                        <label for="portes_good">حالة جيدة</label>
                                        <input type="checkbox" name="portes[]" id="portes_bad" value="حالة سيئة">
                                        <label for="portes_bad">حالة سيئة</label>
                                        <input type="text" class="form-control w-60" dir="rtl" name="observation_portes"
                                            id="observation_portes" placeholder="ملاحظات الأبواب">
                                    </div>
                                </div>

                                <!-- نظام قفل الابواب الاوتوماتيكي -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="systeme_verrouillage_auto" class="form-label">نظام قفل الابواب
                                            الاوتوماتيكي</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_good" value="موجود">
                                        <label for="systeme_verrouillage_auto_good">موجود</label>
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_not_found" value="غير موجود">
                                        <label for="systeme_verrouillage_auto_not_found">غير موجود</label>
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_working" value="يشتغل">
                                        <label for="systeme_verrouillage_auto_working">يشتغل</label>
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_not_working" value="لا يشتغل">
                                        <label for="systeme_verrouillage_auto_not_working">لا يشتغل</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_systeme_verrouillage_auto"
                                            id="observation_systeme_verrouillage_auto"
                                            placeholder="ملاحظات قفل الأبواب الأوتوماتيكي">
                                    </div>
                                </div>


                                <!-- الحالة الميكانيكية -->
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_mecanique" class="form-label">الحالة الميكانيكية</label>
                                    </div>
                                    <div class="col-md-8 d-flex flex-row-reverse text-end">
                                        <input type="checkbox" name="etat_mecanique[]" id="etat_mecanique_good"
                                            value="حالة جيدة">
                                        <label for="etat_mecanique_good">حالة جيدة</label>
                                        <input type="checkbox" name="etat_mecanique[]" id="etat_mecanique_bad"
                                            value="حالة سيئة">
                                        <label for="etat_mecanique_bad">حالة سيئة</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6> التوصيات الخاصة بالمركبة موضوع المراقبة </h6>
                                </div>
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <textarea class="form-control" dir="rtl" name="recommandations_vehicule"
                                        id="recommandations_vehicule" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6> التوصيات الخاصة بالجولة الميدانية </h6>
                                </div>
                                <div class="col-md-12 text-end d-flex flex-row-reverse mb-2">
                                    <textarea class="form-control" dir="rtl" name="recommandations_vehicule"
                                        id="recommandations_vehicule" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 text-start">
                                    <button type="submit"
                                        class="btn bg-gradient-success text-md w-30 mt-4 mb-0">أضف</button>
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