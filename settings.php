<?php

use Admin\Libs\Patients;

include 'inc/sidebar.php'; ?>
<?php include 'inc/topbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Settings</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Settings</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $patient = new Patients();
                if (isset($_GET['patientid'])) {
                    $patient = $patient->find_id(($_GET['patientid']));
                }
                if (isset($_POST['edit_patient'])) {
                    $patient->setEmri($_POST['emri']);
                    $patient->setMbiemri($_POST['mbiemri']);
                    $patient->setNr_telefoni($_POST['telefoni']);
                    $patient->setEmail($_POST['email']);
                    $patient->setFjalekalimi($_POST['fjalekalimi']);
                    if ($patient->update()) {
                        header("Location: patients.php");
                    }
                }


                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Settings</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" id="edit_patient" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="small mb-1" for="emri">Emri :</label>
                                    <input class="form-control py-4" name="emri" id="emri" type="text" placeholder="Emri" value="<?php if (!empty($patient->getEmri())) {
                                                                                                                                        echo $patient->getEmri();
                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="mbiemri">Mbiemri :</label>
                                    <input class="form-control py-4" name="mbiemri" id="mbiemri" type="text" placeholder="Mbiemri" value="<?php if (!empty($patient->getMbiemri())) {
                                                                                                                                                echo $patient->getMbiemri();
                                                                                                                                            } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="telefoni">Telefoni :</label>
                                    <input class="form-control py-4" name="telefoni" id="telefoni" type="text" placeholder="Telefoni" value="<?php if (!empty($patient->getNr_telefoni())) {
                                                                                                                                                    echo $patient->getNr_telefoni();
                                                                                                                                                } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email :</label>
                                    <input class="form-control py-4" name="email" id="email" type="text" placeholder="Email" value="<?php if (!empty($patient->getEmail())) {
                                                                                                                                        echo $patient->getEmail();
                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="fjalekalimi">Fjalekalimi :</label>
                                    <input class="form-control py-4" name="fjalekalimi" id="fjalekalimi" type="password" placeholder="Fjalekalimi" value="<?php if (!empty($patient->getFjalekalimi())) {
                                                                                                                                                                echo $patient->getFjalekalimi();
                                                                                                                                                            } ?>" />
                                </div>
                                <input class="btn btn-primary" id="login" value="Edit Patient" type="submit" name="edit_patient" />
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small">
                                <a href="register.html">
                                    Have an account? Go to login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    </main>

    <?php include 'inc/adminfooter.php'; ?>