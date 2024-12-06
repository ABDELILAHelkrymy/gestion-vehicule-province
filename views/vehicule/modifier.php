<?php
$date = date('Y-m-d');
$title = "اليوم : " .$date ;
$route = explode('/', $_SERVER['REQUEST_URI'])[2] ?? '';
ob_start();
?>
<div class="container-fluid py-6">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-header pb-0 mb-3">
                    <div class="row">
                        <div class="col-md-4 text-end">
                            <h5> <?= $vehicule->getNumVehicule() ?> تعديل بيانات المركبة</h5>
                        </div>
                        <div class="col-md-8 text-start">
                            <h4 class="mb-0">
                                <a href="/board" class="btn btn-primary"> رجوع </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 text-end">
                                    <label for="num_vehicule" class="form-label"><span class="text-danger">*</span>رقم
                                        المركبة</label>
                                    <input type="text" class="form-control" name="num_vehicule" id="num_vehicule"
                                        value="<?= $vehicule->getNumVehicule() ?>" required>
                                </div>
                                <div class="col-md-4 text-end">
                                    <label for="date_operation" class="form-label">تاريخ العملية</label>
                                    <input type="date" class="form-control" name="date_operation" id="date_operation"
                                        value="<?= $vehicule->getDateOperation() ?>">
                                </div>
                                <div class="col-md-4 text-end">
                                    <label for="heure_operation" class="form-label">وقت العملية</label>
                                    <input type="time" class="form-control" name="heure_operation" id="heure_operation"
                                        value="<?= $vehicule->getHeureOperation() ?>">
                                </div>
                            </div>
                            <?php
                            $typeVehiculeArray = ["النقل الحضري", "النقل المدرسي", "النقل بين الجماعات", "نقل المستخدمين لحساب الغير", "النقل بواسطة سيارة الاجرة"];
                            ?>
                            <div class="row mt-3 d-flex justify-content-start ">
                                <div class="col-md-12 text-end">
                                    <h6>نوع سير المركبة</h6>
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">النقل الحضري</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule" value="النقل الحضري"
                                        <?= $vehicule->getTypeVehicule() == "النقل الحضري" ? 'checked' : '' ?>>
                                </div>

                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">النقل المدرسي</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule" value="النقل المدرسي"
                                        <?= $vehicule->getTypeVehicule() == "النقل المدرسي" ? 'checked' : '' ?>>
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label"> النقل بين الجماعات</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule"
                                        value="النقل بين الجماعات" <?= $vehicule->getTypeVehicule() == "النقل بين الجماعات" ? 'checked' : '' ?>>
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">نقل المستخدمين لحساب الغير</label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule"
                                        value="نقل المستخدمين لحساب الغير" <?= $vehicule->getTypeVehicule() == "نقل المستخدمين لحساب الغير" ? 'checked' : '' ?>>
                                </div>
                                <div class="col-md-3 text-end">
                                    <label for="type_vehicule" class="form-label">النقل بواسطة سيارة الاجرة </label>
                                    <input type="radio" name="type_vehicule" id="type_vehicule"
                                        value="النقل بواسطة سيارة الاجرة" <?= $vehicule->getTypeVehicule() == "النقل بواسطة سيارة الاجرة" ? 'checked' : '' ?>>
                                </div>
                                <div class="col-md-4 d-flex  justify-content-around align-items-center">
                                    <div>
                                        <label for="type_vehicule" class="form-label">اخر</label>
                                        <input type="radio" name="type_vehicule" id="type_vehicule_autre" value="اخر"
                                            <?= !in_array($vehicule->getTypeVehicule(), $typeVehiculeArray) ? 'checked' : '' ?>>
                                    </div>
                                    <input type="text" class="form-control w-60" dir="rtl" name="type_vehicule_autre"
                                        <?= !in_array($vehicule->getTypeVehicule(), $typeVehiculeArray) ? 'value="' . $vehicule->getTypeVehicule() . '"' : 'disabled' ?>
                                        id="type_vehicule_input_autre">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6>الوثائق الخاصة بالمركبة </h6>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-6 text-end">
                                            <label for="carte_grise" class="form-label">البطاقة الرمادية</label>
                                            <input type="checkbox" name="carte_grise" id="carte_grise" value="1"
                                                <?= $vehicule->getCarteGrise() == 1 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <label for="observation_carte_grise" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_carte_grise"
                                                value="<?= $vehicule->getObservationCarteGrise() ?>"
                                                id="assuobservation_carte_griserance">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-6 text-end">
                                            <label for="assurance" class="form-label">شهادة التأمين</label>
                                            <input type="checkbox" name="assurance" id="assurance" value="1"
                                                <?= $vehicule->getAssurance() == 1 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <label for="observation_assurance" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_assurance"
                                                value="<?= $vehicule->getObservationAssurance() ?>"
                                                id="observation_assurance">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-6 text-end">
                                            <label for="visite_technique" class="form-label">شهادة الفحص التقني</label>
                                            <input type="checkbox" name="visite_technique" id="visite_technique"
                                                value="1" <?= $vehicule->getVisiteTechnique() == 1 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <label for="observation_visite_technique" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_visite_technique"
                                                value="<?= $vehicule->getObservationVisiteTechnique() ?>"
                                                id="observation_visite_technique">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-6 text-end">
                                            <label for="taxe" class="form-label">وصل أداء الضريبة</label>
                                            <input type="checkbox" name="taxe" id="taxe" value="1"
                                                <?= $vehicule->getTaxe() == 1 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <label for="observation_taxe" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_taxe"
                                                value="<?= $vehicule->getObservationTaxe() ?>" id="observation_taxe">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-6 text-end">
                                            <label for="feulle_route" class="form-label">ورقة السير</label>
                                            <input type="checkbox" name="feulle_route" id="feulle_route" value="1"
                                                <?= $vehicule->getFeulleRoute() == 1 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <label for="observation_feulle_route" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_feulle_route"
                                                value="<?= $vehicule->getObservationFeulleRoute() ?>"
                                                id="observation_feulle_route">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-6 text-end">
                                            <label for="contrat_ordre_transport" class="form-label">العقد مع الآمر
                                                بالنقل</label>
                                            <input type="checkbox" name="contrat_ordre_transport"
                                                id="contrat_ordre_transport" value="1"
                                                <?= $vehicule->getContratOrdreTransport() == 1 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-6 text-end d-flex">
                                            <label for="observation_contrat_ordre_transport"
                                                class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control"
                                                name="observation_contrat_ordre_transport"
                                                value="<?= $vehicule->getObservationContratOrdreTransport() ?>"
                                                id="observation_contrat_ordre_transport">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6>بيانات المركبة</h6>
                                </div>
                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="matricule" class="form-label">رقم تسجيل المركبة</label>
                                            <input type="text" class="form-control w-60" name="matricule"
                                                value="<?= $vehicule->getMatricule() ?>" id="matricule">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for=" matricule" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="matricule_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="matricule_confirme_cart_grise"
                                                id="matricule_confirme_cart_grise" value="1"
                                                <?= $vehicule->getMatriculeConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="matricule_confirme_cart_grise">لا</label>
                                            <input type="radio" name="matricule_confirme_cart_grise"
                                                id="matricule_confirme_cart_grise" value="0"
                                                <?= $vehicule->getMatriculeConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_matricule" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_matricule"
                                                value="<?= $vehicule->getObservationMatricule() ?>"
                                                id="observation_matricule">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="numero_chassis" class="form-label">رقم الإطار الحديدي</label>
                                            <input type="text" class="form-control w-60" name="numero_chassis"
                                                value="<?= $vehicule->getNumeroChassis() ?>" id="numero_chassis">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="numero_chassis_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="numero_chassis_confirme_cart_grise"
                                                id="numero_chassis_confirme_cart_grise" value="1"
                                                <?= $vehicule->getNumeroChassisConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="numero_chassis_confirme_cart_grise">لا</label>
                                            <input type="radio" name="numero_chassis_confirme_cart_grise"
                                                id="numero_chassis_confirme_cart_grise" value="0"
                                                <?= $vehicule->getNumeroChassisConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_matricule" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_matricule"
                                                value="<?= $vehicule->getObservationNumeroChassis() ?>"
                                                id="observation_matricule">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="nom_fabricant" class="form-label">اسم المصنع</label>
                                            <input type="text" class="form-control w-60" name="nom_fabricant"
                                                value="<?= $vehicule->getNomFabricant() ?>" id="nom_fabricant">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="nom_fabricant_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="nom_fabricant_confirme_cart_grise"
                                                id="nom_fabricant_confirme_cart_grise" value="1"
                                                <?= $vehicule->getNomFabricantConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="nom_fabricant_confirme_cart_grise">لا</label>
                                            <input type="radio" name="nom_fabricant_confirme_cart_grise"
                                                id="nom_fabricant_confirme_cart_grise" value="0"
                                                <?= $vehicule->getNomFabricantConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_nom_fabricant" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_nom_fabricant"
                                                value="<?= $vehicule->getObservationNomFabricant() ?>"
                                                id="observation_nom_fabricant">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="modele" class="form-label">النموذج</label>
                                            <input type="text" class="form-control w-60" name="modele" id="modele"
                                                value="<?= $vehicule->getModele() ?>">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="modele_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="modele_confirme_cart_grise"
                                                id="modele_confirme_cart_grise" value="1"
                                                <?= $vehicule->getModeleConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="modele_confirme_cart_grise">لا</label>
                                            <input type="radio" name="modele_confirme_cart_grise"
                                                id="modele_confirme_cart_grise" value="0"
                                                <?= $vehicule->getModeleConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_modele" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_modele"
                                                value="<?= $vehicule->getObservationModele() ?>"
                                                id="observation_modele">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="nombre_siege" class="form-label">عدد المقاعد</label>
                                            <input type="text" class="form-control w-60" name="nombre_siege"
                                                value="<?= $vehicule->getNombreSiege() ?>" id="nombre_siege">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="nombre_siege_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="nombre_siege_confirme_cart_grise"
                                                id="nombre_siege_confirme_cart_grise" value="1"
                                                <?= $vehicule->getNombreSiegeConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="nombre_siege_confirme_cart_grise">لا</label>
                                            <input type="radio" name="nombre_siege_confirme_cart_grise"
                                                id="nombre_siege_confirme_cart_grise" value="0"
                                                <?= $vehicule->getNombreSiegeConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_nombre_siege" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_nombre_siege"
                                                value="<?= $vehicule->getObservationNombreSiege() ?>"
                                                id="observation_nombre_siege">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="proprietaire" class="form-label">اسم المالك</label>
                                            <input type="text" class="form-control w-60" name="proprietaire"
                                                id="proprietaire" value="<?= $vehicule->getProprietaire() ?>">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="proprietaire_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="proprietaire_confirme_cart_grise"
                                                id="proprietaire_confirme_cart_grise" value="1"
                                                <?= $vehicule->getProprietaireConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="proprietaire_confirme_cart_grise">لا</label>
                                            <input type="radio" name="proprietaire_confirme_cart_grise"
                                                id="proprietaire_confirme_cart_grise" value="0"
                                                <?= $vehicule->getProprietaireConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_proprietaire" class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control" name="observation_proprietaire"
                                                value="<?= $vehicule->getObservationProprietaire() ?>"
                                                id="observation_proprietaire">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 text-end">
                                    <div class="row ">
                                        <div class="col-md-4 text-end d-flex  justify-content-around">
                                            <label for="adresse_proprietaire" class="form-label">عنوان المالك</label>
                                            <input type="text" class="form-control w-60" name="adresse_proprietaire"
                                                id="adresse_proprietaire"
                                                value="<?= $vehicule->getAdresseProprietaire() ?>">
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <label for="" class="form-label">تطابق مع البطاقة
                                                الرمادية</label>
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <label for="adresse_proprietaire_confirme_cart_grise">نعم</label>
                                            <input type="radio" name="adresse_proprietaire_confirme_cart_grise"
                                                id="adresse_proprietaire_confirme_cart_grise" value="1"
                                                <?= $vehicule->getAdresseProprietaireConfirmeCartGrise() == 1 ? 'checked' : '' ?>>
                                            <label for="adresse_proprietaire_confirme_cart_grise">لا</label>
                                            <input type="radio" name="adresse_proprietaire_confirme_cart_grise"
                                                id="adresse_proprietaire_confirme_cart_grise" value="0"
                                                <?= $vehicule->getAdresseProprietaireConfirmeCartGrise() == 0 ? 'checked' : '' ?>>
                                        </div>
                                        <div class="col-md-4 text-end d-flex">
                                            <label for="observation_adresse_proprietaire"
                                                class="form-label">ملاحظات</label>
                                            <input type="text" class="form-control"
                                                name="observation_adresse_proprietaire"
                                                id="observation_adresse_proprietaire"
                                                value="<?= $vehicule->getObservationAdresseProprietaire() ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 ">
                                <div class="col-md-12 text-end">
                                    <h6>سائق المركبة </h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="cin_chauffeur" class="form-label">رقم بطاقة التعريف</label>
                                    <input type="text" class="form-control" name="cin_chauffeur" id="cin_chauffeur"
                                        value="<?= $vehicule->getCinChauffeur() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_cin" class="form-label">تاريخ انتهاء بطاقة
                                        التعريف</label>
                                    <input type="date" class="form-control" name="date_fin_validite_cin"
                                        id="date_fin_validite_cin" value="<?= $vehicule->getDateFinValiditeCin() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="permis_conduire" class="form-label">رخصة السياقة</label>
                                    <input type="text" class="form-control" name="permis_conduire" id="permis_conduire"
                                        value="<?= $vehicule->getPermisConduire() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_permis" class="form-label">تاريخ انتهاء رخصة
                                        السياقة</label>
                                    <input type="date" class="form-control" name="date_fin_validite_permis"
                                        id="date_fin_validite_permis"
                                        value="<?= $vehicule->getDateFinValiditePermis() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="permis_confiance" class="form-label">رخصة الثقة</label>
                                    <input type="text" class="form-control" name="permis_confiance"
                                        id="permis_confiance" value="<?= $vehicule->getPermisConfiance() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_permis_confiance" class="form-label">تاريخ انتهاء
                                        رخصة الثقة</label>
                                    <input type="date" class="form-control" name="date_fin_validite_permis_confiance"
                                        id="date_fin_validite_permis_confiance"
                                        value="<?= $vehicule->getDateFinValiditePermisConfiance() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="carte_conducteur" class="form-label">بطاقة السائق المهني</label>
                                    <input type="text" class="form-control" name="carte_conducteur"
                                        id="carte_conducteur" value="<?= $vehicule->getCarteConducteur() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_carte_conducteur" class="form-label">تاريخ انتهاء
                                        بطاقة السائق المهني</label>
                                    <input type="date" class="form-control" name="date_fin_validite_carte_conducteur"
                                        id="date_fin_validite_carte_conducteur"
                                        value="<?= $vehicule->getDateFinValiditeCarteConducteur() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="visite_medical_chauffeur" class="form-label">شهادة الفحص الطبي</label>
                                    <input type="text" class="form-control" name="visite_medical_chauffeur"
                                        id="visite_medical_chauffeur"
                                        value="<?= $vehicule->getVisiteMedicalChauffeur() ?>">
                                </div>
                                <div class="col-md-6 text-end">
                                    <label for="date_fin_validite_visite_medical" class="form-label">تاريخ انتهاء
                                        شهادة الفحص الطبي </label>
                                    <input type="date" class="form-control" name="date_fin_validite_visite_medical"
                                        id="date_fin_validite_visite_medical"
                                        value="<?= $vehicule->getDateFinValiditeVisiteMedical() ?>">
                                </div>
                            </div>

                            <div class="row mt-3 ">
                                <div class="col-md-12 text-end">
                                    <h6>نقط المعاينة التي تمت مراقبتها </h6>
                                </div>
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="conformite_type_vehicule" class="form-label">تطابق بين مواصفات
                                            المركبة و
                                            نوع السير المسجل </label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="radio" name="conformite_type_vehicule"
                                            id="conformite_type_vehicule" value="نعم"
                                            <?= $vehicule->getConformiteTypeVehicule() == "نعم" ? 'checked' : '' ?>>
                                        <label for="conformite_type_vehicule">نعم</label>
                                        <input type="radio" name="conformite_type_vehicule"
                                            id="conformite_type_vehicule" value="لا"
                                            <?= $vehicule->getConformiteTypeVehicule() == "لا" ? 'checked' : '' ?>>
                                        <label for="conformite_type_vehicule">لا</label>
                                        <label for="observation_conformite_type_vehicule"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_conformite_type_vehicule"
                                            id="observation_conformite_type_vehicule"
                                            value="<?= $vehicule->getObservationConformiteTypeVehicule() ?>">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="conformite_nombre_places" class="form-label">تطابق عدد المقاعد مع
                                            وثائق
                                            المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="radio" name="conformite_nombre_places"
                                            id="conformite_nombre_places" value="نعم"
                                            <?= $vehicule->getConformiteNombrePlaces() == "نعم" ? 'checked' : '' ?>>
                                        <label for="conformite_nombre_places">نعم</label>
                                        <input type="radio" name="conformite_nombre_places"
                                            id="conformite_nombre_places" value="لا"
                                            <?= $vehicule->getConformiteNombrePlaces() == "لا" ? 'checked' : '' ?>>
                                        <label for="conformite_nombre_places">لا</label>
                                        <label for="observation_conformite_nombre_places"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_conformite_nombre_places"
                                            id="observation_conformite_nombre_places"
                                            value="<?= $vehicule->getObservationConformiteNombrePlaces() ?>">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_roues_avant" class="form-label">العجلات الأمامية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="radio" name="etat_roues_avant" id="etat_roues_avant"
                                            value="حالة جيدة" <?= $vehicule->getEtatRouesAvant() == "حالة جيدة" ? 'checked' : '' ?>>
                                        <label for="etat_roues_avant">حالة جيدة</label>
                                        <input type="radio" name="etat_roues_avant" id="etat_roues_avant"
                                            value="حالة سيئة" <?= $vehicule->getEtatRouesAvant() == "حالة سيئة" ? 'checked' : '' ?>>
                                        <label for="etat_roues_avant">حالة سيئة</label>
                                        <label for="observation_etat_roues_avant"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_etat_roues_avant" id="observation_etat_roues_avant"
                                            value="<?= $vehicule->getObservationEtatRouesAvant() ?>">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_roues_arriere" class="form-label">العجلات الخلفية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="radio" name="etat_roues_arriere" id="etat_roues_arriere"
                                            value="حالة جيدة" <?= $vehicule->getEtatRouesArriere() == "حالة جيدة" ? 'checked' : '' ?>>
                                        <label for="etat_roues_arriere">حالة جيدة</label>
                                        <input type="radio" name="etat_roues_arriere" id="etat_roues_arriere"
                                            value="حالة سيئة" <?= $vehicule->getEtatRouesArriere() == "حالة سيئة" ? 'checked' : '' ?>>
                                        <label for="etat_roues_arriere">حالة سيئة</label>
                                        <label for="observation_etat_roues_arriere"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_etat_roues_arriere" id="observation_etat_roues_arriere"
                                            value="<?= $vehicule->getObservationEtatRouesArriere() ?>">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="roue_secours" class="form-label">العجلة الاحتياطية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours" value="موجودة"
                                            <?= $vehicule->getRoueSecours() !== null && in_array("موجودة", explode(",", $vehicule->getRoueSecours())) ? 'checked' : '' ?>>
                                        <label for="roue_secours">موجودة </label>
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours"
                                            value="غير موجودة" <?= $vehicule->getRoueSecours() !== null && in_array("غير موجودة", explode(",", $vehicule->getRoueSecours())) ? 'checked' : '' ?>>
                                        <label for="roue_secours">غير موجودة </label>
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours" value="حالة جيدة"
                                            <?= $vehicule->getRoueSecours() !== null && in_array("حالة جيدة", explode(",", $vehicule->getRoueSecours())) ? 'checked' : '' ?>>
                                        <label for="roue_secours">حالة جيدة</label>
                                        <input type="checkbox" name="roue_secours[]" id="roue_secours" value="حالة سيئة"
                                            <?= $vehicule->getRoueSecours() !== null && in_array("حالة سيئة", explode(",", $vehicule->getRoueSecours())) ? 'checked' : '' ?>>
                                        <label for="roue_secours">حالة سيئة</label>
                                        <label for="observation_roue_secours" class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-40" dir="rtl"
                                            name="observation_roue_secours" id="observation_roue_secours"
                                            value="<?= $vehicule->getObservationRoueSecours() ?>">
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="vitre_protection_avant" class="form-label"> الزجاجة الواقية الأمامية
                                        </label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_good" value="حالة جيدة"
                                            <?= $vehicule->getVitreProtectionAvant() !== null && in_array("حالة جيدة", explode(",", $vehicule->getVitreProtectionAvant())) ? 'checked' : '' ?>>
                                        <label for="vitre_protection_avant_good">حالة جيدة</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_bad" value="حالة سيئة"
                                            <?= $vehicule->getVitreProtectionAvant() !== null && in_array("حالة سيئة", explode(",", $vehicule->getVitreProtectionAvant())) ? 'checked' : '' ?>>
                                        <label for="vitre_protection_avant_bad">حالة سيئة</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_small_crack" value="شق صغير"
                                            <?= $vehicule->getVitreProtectionAvant() !== null && in_array("شق صغير", explode(",", $vehicule->getVitreProtectionAvant())) ? 'checked' : '' ?>>
                                        <label for="vitre_protection_avant_small_crack">شق صغير</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_large_crack" value="شق كبير"
                                            <?= $vehicule->getVitreProtectionAvant() !== null && in_array("شق كبير", explode(",", $vehicule->getVitreProtectionAvant())) ? 'checked' : '' ?>>
                                        <label for="vitre_protection_avant_large_crack">شق كبير</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_broken" value="كسر"
                                            <?= $vehicule->getVitreProtectionAvant() !== null && in_array("كسر", explode(",", $vehicule->getVitreProtectionAvant())) ? 'checked' : '' ?>>
                                        <label for="vitre_protection_avant_broken">كسر</label>

                                        <input type="checkbox" name="vitre_protection_avant[]"
                                            id="vitre_protection_avant_insufficient_visibility" value="رؤية غير كافية"
                                            <?= $vehicule->getVitreProtectionAvant() !== null && in_array("رؤية غير كافية", explode(",", $vehicule->getVitreProtectionAvant())) ? 'checked' : '' ?>>
                                        <label for="vitre_protection_avant_insufficient_visibility">رؤية غير
                                            كافية</label>
                                    </div>
                                </div>

                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="fenetre_secours" class="form-label">نوافذ الإغاثة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_exist"
                                            value="موجودة" <?= $vehicule->getFenetreSecours() !== null && in_array("موجودة", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_exist">موجودة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_not_exist"
                                            value="غير موجودة" <?= $vehicule->getFenetreSecours() !== null && in_array("غير موجودة", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_not_exist">غير موجودة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_good"
                                            value="حالة جيدة" <?= $vehicule->getFenetreSecours() !== null && in_array("حالة جيدة", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_good">حالة جيدة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_bad"
                                            value="حالة سيئة" <?= $vehicule->getFenetreSecours() !== null && in_array("حالة سيئة", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_bad">حالة سيئة</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_small_crack"
                                            value="شق صغير" <?= $vehicule->getFenetreSecours() !== null && in_array("شق صغير", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_small_crack">شق صغير</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_large_crack"
                                            value="شق كبير" <?= $vehicule->getFenetreSecours() !== null && in_array("شق كبير", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_large_crack">شق كبير</label>

                                        <input type="checkbox" name="fenetre_secours[]" id="fenetre_secours_broken"
                                            value="كسر" <?= $vehicule->getFenetreSecours() !== null && in_array("كسر", explode(",", $vehicule->getFenetreSecours())) ? 'checked' : '' ?>>
                                        <label for="fenetre_secours_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الأمامية في اليمين -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_avant_droite" class="form-label">التجهيزات
                                            الزجاجية الأخرى الأمامية في اليمين</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_exist" value="موجودة"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("موجودة", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_not_exist" value="غير موجودة"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("غير موجودة", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_good" value="حالة جيدة"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_bad" value="حالة سيئة"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_small_crack" value="شق صغير"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("شق صغير", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_large_crack" value="شق كبير"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("شق كبير", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_droite[]"
                                            id="equipement_vitres_avant_droite_broken" value="كسر"
                                            <?= $vehicule->getEquipementVitresAvantDroite() !== null && in_array("كسر", explode(",", $vehicule->getEquipementVitresAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_droite_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الأمامية في اليسار -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_avant_gauche" class="form-label">التجهيزات
                                            الزجاجية الأخرى الأمامية في اليسار</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_exist" value="موجودة"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("موجودة", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_not_exist" value="غير موجودة"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("غير موجودة", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_good" value="حالة جيدة"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_bad" value="حالة سيئة"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_small_crack" value="شق صغير"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("شق صغير", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_large_crack" value="شق كبير"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("شق كبير", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_avant_gauche[]"
                                            id="equipement_vitres_avant_gauche_broken" value="كسر"
                                            <?= $vehicule->getEquipementVitresAvantGauche() !== null && in_array("كسر", explode(",", $vehicule->getEquipementVitresAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_avant_gauche_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليمين -->
                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليمين -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_arriere_droite" class="form-label">التجهيزات
                                            الزجاجية الأخرى الخلفية في اليمين</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_exist" value="موجودة"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("موجودة", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_not_exist" value="غير موجودة"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("غير موجودة", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_good" value="حالة جيدة"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_bad" value="حالة سيئة"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_small_crack" value="شق صغير"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("شق صغير", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_large_crack" value="شق كبير"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("شق كبير", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_droite[]"
                                            id="equipement_vitres_arriere_droite_broken" value="كسر"
                                            <?= $vehicule->getEquipementVitresArriereDroite() !== null && in_array("كسر", explode(",", $vehicule->getEquipementVitresArriereDroite())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_droite_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- التجهيزات الزجاجية الأخرى الخلفية في اليسار -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="equipement_vitres_arriere_gauche" class="form-label">التجهيزات
                                            الزجاجية الأخرى الخلفية في اليسار</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_exist" value="موجودة"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("موجودة", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_exist">موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_not_exist" value="غير موجودة"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("غير موجودة", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_good" value="حالة جيدة"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_good">حالة جيدة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_bad" value="حالة سيئة"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_bad">حالة سيئة</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_small_crack" value="شق صغير"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("شق صغير", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_small_crack">شق صغير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_large_crack" value="شق كبير"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("شق كبير", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_large_crack">شق كبير</label>
                                        <input type="checkbox" name="equipement_vitres_arriere_gauche[]"
                                            id="equipement_vitres_arriere_gauche_broken" value="كسر"
                                            <?= $vehicule->getEquipementVitresArriereGauche() !== null && in_array("كسر", explode(",", $vehicule->getEquipementVitresArriereGauche())) ? 'checked' : '' ?>>
                                        <label for="equipement_vitres_arriere_gauche_broken">كسر</label>

                                    </div>
                                </div>

                                <!-- المرايا العاكسة الداخلية -->
                                <!-- المرايا العاكسة الداخلية -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="miroirs_reflecteurs_internes" class="form-label">المرايا العاكسة
                                            الداخلية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_exist" value="موجودة">
                                        <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("موجودة", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>
                                        <label for="miroirs_reflecteurs_internes_exist">موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_not_exist" value="غير موجودة"
                                            <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("غير موجودة", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_internes_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_good" value="حالة جيدة"
                                            <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("حالة جيدة", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_internes_good">حالة جيدة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_bad" value="حالة سيئة"
                                            <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("حالة سيئة", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_internes_bad">حالة سيئة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_small_crack" value="شق صغير"
                                            <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("شق صغير", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_internes_small_crack">شق صغير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_large_crack" value="شق كبير"
                                            <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("شق كبير", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_internes_large_crack">شق كبير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_internes[]"
                                            id="miroirs_reflecteurs_internes_broken" value="كسر"
                                            <?= $vehicule->getMiroirsReflecteursInternes() !== null && in_array("كسر", explode(",", $vehicule->getMiroirsReflecteursInternes())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_internes_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- المرايا العاكسة الامامية في اليمين -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="miroirs_reflecteurs_avant_droite" class="form-label">المرايا العاكسة
                                            الامامية في اليمين</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_exist" value="موجودة"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("موجودة", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_exist">موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_not_exist" value="غير موجودة"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("غير موجودة", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_good" value="حالة جيدة"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("حالة جيدة", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_good">حالة جيدة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_bad" value="حالة سيئة"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("حالة سيئة", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_bad">حالة سيئة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_small_crack" value="شق صغير"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("شق صغير", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_small_crack">شق صغير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_large_crack" value="شق كبير"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("شق كبير", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_large_crack">شق كبير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_droite[]"
                                            id="miroirs_reflecteurs_avant_droite_broken" value="كسر"
                                            <?= $vehicule->getMiroirsReflecteursAvantDroite() !== null && in_array("كسر", explode(",", $vehicule->getMiroirsReflecteursAvantDroite())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_droite_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- المرايا العاكسة الامامية في اليسار -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="miroirs_reflecteurs_avant_gauche" class="form-label">المرايا العاكسة
                                            الامامية في اليسار</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_exist" value="موجودة"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("موجودة", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_exist">موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_not_exist" value="غير موجودة"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("غير موجودة", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_good" value="حالة جيدة"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("حالة جيدة", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_good">حالة جيدة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_bad" value="حالة سيئة"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("حالة سيئة", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_bad">حالة سيئة</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_small_crack" value="شق صغير"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("شق صغير", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_small_crack">شق صغير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_large_crack" value="شق كبير"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("شق كبير", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_large_crack">شق كبير</label>
                                        <input type="checkbox" name="miroirs_reflecteurs_avant_gauche[]"
                                            id="miroirs_reflecteurs_avant_gauche_broken" value="كسر"
                                            <?= $vehicule->getMiroirsReflecteursAvantGauche() !== null && in_array("كسر", explode(",", $vehicule->getMiroirsReflecteursAvantGauche())) ? 'checked' : '' ?>>
                                        <label for="miroirs_reflecteurs_avant_gauche_broken">كسر</label>
                                    </div>
                                </div>

                                <!-- ماسحة الزجاج الامامية -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="essuie_glace_avant" class="form-label">ماسحة الزجاج الامامية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="essuie_glace_avant[]" id="essuie_glace_avant_exist"
                                            value="موجودة" <?= $vehicule->getEssuieGlaceAvant() !== null && in_array("موجودة", explode(",", $vehicule->getEssuieGlaceAvant())) ? 'checked' : '' ?>>
                                        <label for="essuie_glace_avant_exist">موجودة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]"
                                            id="essuie_glace_avant_not_exist" value="غير موجودة"
                                            <?= $vehicule->getEssuieGlaceAvant() !== null && in_array("غير موجودة", explode(",", $vehicule->getEssuieGlaceAvant())) ? 'checked' : '' ?>>
                                        <label for="essuie_glace_avant_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]" id="essuie_glace_avant_good"
                                            value="حالة جيدة" <?= $vehicule->getEssuieGlaceAvant() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEssuieGlaceAvant())) ? 'checked' : '' ?>>
                                        <label for="essuie_glace_avant_good">حالة جيدة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]" id="essuie_glace_avant_bad"
                                            value="حالة سيئة" <?= $vehicule->getEssuieGlaceAvant() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEssuieGlaceAvant())) ? 'checked' : '' ?>>
                                        <label for="essuie_glace_avant_bad">حالة سيئة</label>
                                        <input type="checkbox" name="essuie_glace_avant[]"
                                            id="essuie_glace_avant_working" value="تشتغل"
                                            <?= $vehicule->getEssuieGlaceAvant() !== null && in_array("تشتغل", explode(",", $vehicule->getEssuieGlaceAvant())) ? 'checked' : '' ?>>
                                        <label for="essuie_glace_avant_working">تشتغل</label>
                                        <input type="checkbox" name="essuie_glace_avant[]"
                                            id="essuie_glace_avant_not_working" value="لا تشتغل"
                                            <?= $vehicule->getEssuieGlaceAvant() !== null && in_array("لا تشتغل", explode(",", $vehicule->getEssuieGlaceAvant())) ? 'checked' : '' ?>>
                                        <label for="essuie_glace_avant_not_working">لا تشتغل</label>
                                    </div>
                                </div>

                                <!-- أضواء المركبة -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="lumieres_vehicule" class="form-label">أضواء المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="lumieres_vehicule[]" id="lumieres_vehicule_working"
                                            value="تشتغل" <?= $vehicule->getLumieresVehicule() !== null && in_array("تشتغل", explode(",", $vehicule->getLumieresVehicule())) ? 'checked' : '' ?>>
                                        <label for="lumieres_vehicule_working">تشتغل</label>
                                        <input type="checkbox" name="lumieres_vehicule[]"
                                            id="lumieres_vehicule_not_working" value="لا تشتغل"
                                            <?= $vehicule->getLumieresVehicule() !== null && in_array("لا تشتغل", explode(",", $vehicule->getLumieresVehicule())) ? 'checked' : '' ?>>
                                        <label for="lumieres_vehicule_not_working">لا تشتغل</label>
                                        <input type="checkbox" name="lumieres_vehicule[]" id="lumieres_vehicule_issue"
                                            value="عيب في الاشتغال" <?= $vehicule->getLumieresVehicule() !== null && in_array("عيب في الاشتغال", explode(",", $vehicule->getLumieresVehicule())) ? 'checked' : '' ?>>
                                        <label for="lumieres_vehicule_issue">عيب في الاشتغال</label>
                                        <label for="observation_lumieres_vehicule"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_lumieres_vehicule" id="observation_lumieres_vehicule"
                                            value="<?= $vehicule->getObservationLumieresVehicule() ?>">
                                    </div>
                                </div>

                                <!-- زجاجة انعكاس الضوء الخلفية أو الجانبية -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="reflecteurs_arriere_ou_lateraux" class="form-label">زجاجة انعكاس
                                            الضوء الخلفية أو الجانبية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="reflecteurs_arriere_ou_lateraux[]"
                                            id="reflecteurs_arriere_ou_lateraux_exist" value="موجودة"
                                            <?= $vehicule->getReflecteursArriereOuLateraux() !== null && in_array("موجودة", explode(",", $vehicule->getReflecteursArriereOuLateraux())) ? 'checked' : '' ?>>
                                        <label for="reflecteurs_arriere_ou_lateraux_exist">موجودة</label>
                                        <input type="checkbox" name="reflecteurs_arriere_ou_lateraux[]"
                                            id="reflecteurs_arriere_ou_lateraux_not_exist" value="غير موجودة"
                                            <?= $vehicule->getReflecteursArriereOuLateraux() !== null && in_array("غير موجودة", explode(",", $vehicule->getReflecteursArriereOuLateraux())) ? 'checked' : '' ?>>
                                        <label for="reflecteurs_arriere_ou_lateraux_not_exist">غير موجودة</label>
                                        <label for="observation_reflecteurs_arriere_ou_lateraux"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_reflecteurs_arriere_ou_lateraux"
                                            id="observation_reflecteurs_arriere_ou_lateraux"
                                            value="<?= $vehicule->getObservationReflecteursArriereOuLateraux() ?>">
                                    </div>
                                </div>

                                <!-- منبه أضواء الضباب -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="signal_lumieres_brouillard" class="form-label">منبه أضواء
                                            الضباب</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_exist" value="موجودة"
                                            <?= $vehicule->getSignalLumieresBrouillard() !== null && in_array("موجودة", explode(",", $vehicule->getSignalLumieresBrouillard())) ? 'checked' : '' ?>>
                                        <label for="signal_lumieres_brouillard_exist">موجودة</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_not_exist" value="غير موجودة"
                                            <?= $vehicule->getSignalLumieresBrouillard() !== null && in_array("غير موجودة", explode(",", $vehicule->getSignalLumieresBrouillard())) ? 'checked' : '' ?>>
                                        <label for="signal_lumieres_brouillard_not_exist">غير موجودة</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_working" value="تشتغل"
                                            <?= $vehicule->getSignalLumieresBrouillard() !== null && in_array("تشتغل", explode(",", $vehicule->getSignalLumieresBrouillard())) ? 'checked' : '' ?>>
                                        <label for="signal_lumieres_brouillard_working">تشتغل</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_not_working" value="لا تشتغل"
                                            <?= $vehicule->getSignalLumieresBrouillard() !== null && in_array("لا تشتغل", explode(",", $vehicule->getSignalLumieresBrouillard())) ? 'checked' : '' ?>>
                                        <label for="signal_lumieres_brouillard_not_working">لا تشتغل</label>
                                        <input type="checkbox" name="signal_lumieres_brouillard[]"
                                            id="signal_lumieres_brouillard_issue" value="عيب في الاشتغال"
                                            <?= $vehicule->getSignalLumieresBrouillard() !== null && in_array("عيب في الاشتغال", explode(",", $vehicule->getSignalLumieresBrouillard())) ? 'checked' : '' ?>>
                                        <label for="signal_lumieres_brouillard_issue">عيب في الاشتغال</label>
                                    </div>
                                </div>

                                <!-- البنية الفوقية و الهيكل -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_carosserie" class="form-label">البنية الفوقية و الهيكل</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_good"
                                            value="حالة جيدة" <?= $vehicule->getEtatCarosserie() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEtatCarosserie())) ? 'checked' : '' ?>>
                                        <label for="etat_carosserie_good">حالة جيدة</label>
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_bad"
                                            value="حالة سيئة" <?= $vehicule->getEtatCarosserie() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEtatCarosserie())) ? 'checked' : '' ?>>
                                        <label for="etat_carosserie_bad">حالة سيئة</label>
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_corroded"
                                            value="تآكل" <?= $vehicule->getEtatCarosserie() !== null && in_array("تآكل", explode(",", $vehicule->getEtatCarosserie())) ? 'checked' : '' ?>>
                                        <label for="etat_carosserie_corroded">تآكل</label>
                                        <input type="checkbox" name="etat_carosserie[]" id="etat_carosserie_hole"
                                            value="تآكل محدث لثقب" <?= $vehicule->getEtatCarosserie() !== null && in_array("تآكل محدث لثقب", explode(",", $vehicule->getEtatCarosserie())) ? 'checked' : '' ?>>
                                        <label for="etat_carosserie_hole">تآكل محدث لثقب</label>
                                        <label for="observation_etat_carosserie" class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_etat_carosserie" id="observation_etat_carosserie"
                                            value="<?= $vehicule->getObservationEtatCarosserie() ?>">
                                    </div>
                                </div>

                                <!-- مقعد حجرة القيادة -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="siege_cabine_conducteur" class="form-label">مقعد حجرة
                                            القيادة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_good" value="حالة جيدة"
                                            <?= $vehicule->getSiegeCabineConducteur() !== null && in_array("حالة جيدة", explode(",", $vehicule->getSiegeCabineConducteur())) ? 'checked' : '' ?>>
                                        <label for="siege_cabine_conducteur_good">حالة جيدة</label>
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_bad" value="حالة سيئة"
                                            <?= $vehicule->getSiegeCabineConducteur() !== null && in_array("حالة سيئة", explode(",", $vehicule->getSiegeCabineConducteur())) ? 'checked' : '' ?>>
                                        <label for="siege_cabine_conducteur_bad">حالة سيئة</label>
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_teared" value="ممزق"
                                            <?= $vehicule->getSiegeCabineConducteur() !== null && in_array("ممزق", explode(",", $vehicule->getSiegeCabineConducteur())) ? 'checked' : '' ?>>
                                        <label for="siege_cabine_conducteur_teared">ممزق</label>
                                        <input type="checkbox" name="siege_cabine_conducteur[]"
                                            id="siege_cabine_conducteur_steering" value="مقود مكسور"
                                            <?= $vehicule->getSiegeCabineConducteur() !== null && in_array("مقود مكسور", explode(",", $vehicule->getSiegeCabineConducteur())) ? 'checked' : '' ?>>
                                        <label for="siege_cabine_conducteur_steering">مقود مكسور</label>
                                        <label for="observation_siege_cabine_conducteur"
                                            class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_siege_cabine_conducteur"
                                            id="observation_siege_cabine_conducteur"
                                            value="<?= $vehicule->getObservationSiegeCabineConducteur() ?>">
                                    </div>
                                </div>

                                <!-- مقعد المركبة -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="sieges_vehicule" class="form-label">مقاعد المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_good"
                                            value="حالة جيدة" <?= $vehicule->getSiegesVehicule() !== null && in_array("حالة جيدة", explode(",", $vehicule->getSiegesVehicule())) ? 'checked' : '' ?>>
                                        <label for="siege_vehicule_good">حالة جيدة</label>
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_bad"
                                            value="حالة سيئة" <?= $vehicule->getSiegesVehicule() !== null && in_array("حالة سيئة", explode(",", $vehicule->getSiegesVehicule())) ? 'checked' : '' ?>>
                                        <label for="siege_vehicule_bad">حالة سيئة</label>
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_good_fix"
                                            value="تثبيت جيد" <?= $vehicule->getSiegesVehicule() !== null && in_array("تثبيت جيد", explode(",", $vehicule->getSiegesVehicule())) ? 'checked' : '' ?>>
                                        <label for="siege_vehicule_good_fix">تثبيت جيد</label>
                                        <input type="checkbox" name="sieges_vehicule[]" id="siege_vehicule_bad_fix"
                                            value="تثبيت سيء" <?= $vehicule->getSiegesVehicule() !== null && in_array("تثبيت سيء", explode(",", $vehicule->getSiegesVehicule())) ? 'checked' : '' ?>>
                                        <label for="siege_vehicule_bad_fix">تثبيت سيء</label>
                                        <label for="observation_sieges_vehicule" class="form-label px-3">ملاحظات</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_sieges_vehicule" id="observation_sieges_vehicule"
                                            value="<?= $vehicule->getObservationSiegesVehicule() ?>">
                                    </div>
                                </div>

                                <!-- أحزمة السلامة -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="ceintures_securite" class="form-label">أحزمة السلامة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="ceintures_securite[]" id="ceinture_securite_good"
                                            value="موجودة" <?= $vehicule->getCeinturesSecurite() !== null && in_array("موجودة", explode(",", $vehicule->getCeinturesSecurite())) ? 'checked' : '' ?>>
                                        <label for="ceinture_securite_good">موجودة</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_not_found" value="غير موجودة"
                                            <?= $vehicule->getCeinturesSecurite() !== null && in_array("غير موجودة", explode(",", $vehicule->getCeinturesSecurite())) ? 'checked' : '' ?>>
                                        <label for="ceinture_securite_not_found">غير موجودة</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_good_fix" value="تثبيت جيد"
                                            <?= $vehicule->getCeinturesSecurite() !== null && in_array("تثبيت جيد", explode(",", $vehicule->getCeinturesSecurite())) ? 'checked' : '' ?>>
                                        <label for="ceinture_securite_good_fix">تثبيت جيد</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_bad_fix" value="تثبيت سيء"
                                            <?= $vehicule->getCeinturesSecurite() !== null && in_array("تثبيت سيء", explode(",", $vehicule->getCeinturesSecurite())) ? 'checked' : '' ?>>
                                        <label for="ceinture_securite_bad_fix">تثبيت سيء</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_good_work" value="اشتغال جيد"
                                            <?= $vehicule->getCeinturesSecurite() !== null && in_array("اشتغال جيد", explode(",", $vehicule->getCeinturesSecurite())) ? 'checked' : '' ?>>
                                        <label for="ceinture_securite_good_work">اشتغال جيد</label>
                                        <input type="checkbox" name="ceintures_securite[]"
                                            id="ceinture_securite_bad_work" value="اشتغال سيء"
                                            <?= $vehicule->getCeinturesSecurite() !== null && in_array("اشتغال سيء", explode(",", $vehicule->getCeinturesSecurite())) ? 'checked' : '' ?>>
                                        <label for="ceinture_securite_bad_work">اشتغال سيء</label>
                                    </div>
                                </div>

                                <!-- المنبه الصوتي -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="klaxon" class="form-label">المنبه الصوتي</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="klaxon[]" id="klaxon_good" value="يشتغل"
                                            <?= $vehicule->getKlaxon() !== null && in_array("يشتغل", explode(",", $vehicule->getKlaxon())) ? 'checked' : '' ?>>
                                        <label for="klaxon_good">يشتغل</label>
                                        <input type="checkbox" name="klaxon[]" id="klaxon_not_working" value="لا يشتغل"
                                            <?= $vehicule->getKlaxon() !== null && in_array("لا يشتغل", explode(",", $vehicule->getKlaxon())) ? 'checked' : '' ?>>
                                        <label for="klaxon_not_working">لا يشتغل</label>
                                        <input type="text" class="form-control w-60" dir="rtl" name="observation_klaxon"
                                            id="observation_klaxon" placeholder="ملاحظات المنبه الصوتي"
                                            value="<?= $vehicule->getObservationKlaxon() ?>">
                                    </div>
                                </div>

                                <!-- مطفأة الحريق -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="extincteur" class="form-label">مطفأة الحريق</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="extincteur[]" id="extincteur_good"
                                            value="حالة جيدة" <?= $vehicule->getExtincteur() !== null && in_array("حالة جيدة", explode(",", $vehicule->getExtincteur())) ? 'checked' : '' ?>>
                                        <label for="extincteur_good">حالة جيدة</label>
                                        <input type="checkbox" name="extincteur[]" id="extincteur_bad" value="حالة سيئة"
                                            <?= $vehicule->getExtincteur() !== null && in_array("حالة سيئة", explode(",", $vehicule->getExtincteur())) ? 'checked' : '' ?>>
                                        <label for="extincteur_bad">حالة سيئة</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_extincteur" id="observation_extincteur"
                                            placeholder="ملاحظات المطفأة"
                                            value="<?= $vehicule->getObservationExtincteur() ?>">
                                    </div>
                                </div>

                                <!-- علبة الاسعافات الاولية -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="trousse_secours" class="form-label">علبة الاسعافات الاولية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="trousse_secours[]" id="trousse_secours_good"
                                            value="حالة جيدة" <?= $vehicule->getTrousseSecours() !== null && in_array("حالة جيدة", explode(",", $vehicule->getTrousseSecours())) ? 'checked' : '' ?>>
                                        <label for="trousse_secours_good">حالة جيدة</label>
                                        <input type="checkbox" name="trousse_secours[]" id="trousse_secours_bad"
                                            value="حالة سيئة" <?= $vehicule->getTrousseSecours() !== null && in_array("حالة سيئة", explode(",", $vehicule->getTrousseSecours())) ? 'checked' : '' ?>>
                                        <label for="trousse_secours_bad">حالة سيئة</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_trousse_secours" id="observation_trousse_secours"
                                            placeholder="ملاحظات علبة الاسعافات"
                                            value="<?= $vehicule->getObservationTrousseSecours() ?>">
                                    </div>
                                </div>

                                <!-- أبواب المركبة -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="portes" class="form-label">أبواب المركبة</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="portes[]" id="portes_good" value="حالة جيدة"
                                            <?= $vehicule->getPortes() !== null && in_array("حالة جيدة", explode(",", $vehicule->getPortes())) ? 'checked' : '' ?>>
                                        <label for="portes_good">حالة جيدة</label>
                                        <input type="checkbox" name="portes[]" id="portes_bad" value="حالة سيئة"
                                            <?= $vehicule->getPortes() !== null && in_array("حالة سيئة", explode(",", $vehicule->getPortes())) ? 'checked' : '' ?>>
                                        <label for="portes_bad">حالة سيئة</label>
                                        <input type="text" class="form-control w-60" dir="rtl" name="observation_portes"
                                            id="observation_portes" placeholder="ملاحظات الأبواب"
                                            value="<?= $vehicule->getObservationPortes() ?>">
                                    </div>
                                </div>

                                <!-- نظام قفل الابواب الاوتوماتيكي -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="systeme_verrouillage_auto" class="form-label">نظام قفل الابواب
                                            الاوتوماتيكي</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_good" value="موجود"
                                            <?= $vehicule->getSystemeVerrouillageAuto() !== null && in_array("موجود", explode(",", $vehicule->getSystemeVerrouillageAuto())) ? 'checked' : '' ?>>
                                        <label for="systeme_verrouillage_auto_good">موجود</label>
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_not_found" value="غير موجود"
                                            <?= $vehicule->getSystemeVerrouillageAuto() !== null && in_array("غير موجود", explode(",", $vehicule->getSystemeVerrouillageAuto())) ? 'checked' : '' ?>>
                                        <label for="systeme_verrouillage_auto_not_found">غير موجود</label>
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_working" value="يشتغل"
                                            <?= $vehicule->getSystemeVerrouillageAuto() !== null && in_array("يشتغل", explode(",", $vehicule->getSystemeVerrouillageAuto())) ? 'checked' : '' ?>>
                                        <label for="systeme_verrouillage_auto_working">يشتغل</label>
                                        <input type="checkbox" name="systeme_verrouillage_auto[]"
                                            id="systeme_verrouillage_auto_not_working" value="لا يشتغل"
                                            <?= $vehicule->getSystemeVerrouillageAuto() !== null && in_array("لا يشتغل", explode(",", $vehicule->getSystemeVerrouillageAuto())) ? 'checked' : '' ?>>
                                        <label for="systeme_verrouillage_auto_not_working">لا يشتغل</label>
                                        <input type="text" class="form-control w-60" dir="rtl"
                                            name="observation_systeme_verrouillage_auto"
                                            id="observation_systeme_verrouillage_auto"
                                            placeholder="ملاحظات قفل الأبواب الأوتوماتيكي"
                                            value="<?= $vehicule->getObservationSystemeVerrouillageAuto() ?>">
                                    </div>
                                </div>


                                <!-- الحالة الميكانيكية -->
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <div class="col-md-4 text-end">
                                        <label for="etat_mecanique" class="form-label">الحالة الميكانيكية</label>
                                    </div>
                                    <div class="col-md-8 d-flex  text-end">
                                        <input type="checkbox" name="etat_mecanique[]" id="etat_mecanique_good"
                                            value="حالة جيدة" <?= $vehicule->getEtatMecanique() !== null && in_array("حالة جيدة", explode(",", $vehicule->getEtatMecanique())) ? 'checked' : '' ?>>
                                        <label for="etat_mecanique_good">حالة جيدة</label>
                                        <input type="checkbox" name="etat_mecanique[]" id="etat_mecanique_bad"
                                            value="حالة سيئة" <?= $vehicule->getEtatMecanique() !== null && in_array("حالة سيئة", explode(",", $vehicule->getEtatMecanique())) ? 'checked' : '' ?>>
                                        <label for="etat_mecanique_bad">حالة سيئة</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6> التوصيات الخاصة بالمركبة موضوع المراقبة </h6>
                                </div>
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <textarea class="form-control" dir="rtl" name="recommandations_vehicule"
                                        id="recommandations_vehicule" rows="3">
                                        <?= $vehicule->getRecommandationsVehicule() ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <h6> التوصيات الخاصة بالجولة الميدانية </h6>
                                </div>
                                <div class="col-md-12 text-end d-flex  mb-2">
                                    <textarea class="form-control" dir="rtl" name="recommandations_groupe_field"
                                        id="recommandations_groupe_field" rows="3">
                                        <?= $vehicule->getRecommandationsGroupeField() ?>
                                    </textarea>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">ملفات</p>
                            <div class="row">
                                <?php
                                foreach ($attachements as $attachement) {
                                    if($attachement!=""){
                                    ?>
                                    <div class="col-md-12 mb-1">
                                        <ul class="list-group">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center text-success">
                                                <div class="col-8">
                                                    <?= basename($attachement) ?>
                                                </div>
                                                <!-- download piece_jointe pdf not as html -->
                                                <div class="col-2">
                                                    <a href="javascript:;"
                                                        class="download-file btn btn-link text-dark d-flex text-sm mb-0 px-0 ms-4"
                                                        data-file-name="<?= basename($attachement) ?>"
                                                        data-file-path="<?= APP_ROOT . $attachement ?>">
                                                        <i class='bx bx-download bx-flashing text-lg mx-1 mt-1'></i>
                                                        <span>PDF</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                }
                                ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Pièce jointe</label>
                                        <input type="file" class="form-control" name="pieces_jointe[]" id="files" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul id="file-list" class="list-group"></ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($_SESSION['userrole'] === 'gouve') {
                                echo '';
                            } else {
                                ?>
                                <div class="row mt-3">
                                    <div class="col-md-6 text-start">
                                        <button type="submit"
                                            class="btn bg-gradient-success text-md w-30 mt-4 mb-0">تعديل</button>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

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