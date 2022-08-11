<?php

use Admin\Libs\Departaments;
use Admin\Libs\Patients;

include 'inc/sidebar.php'; ?>
<?php include 'inc/topbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Departaments</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departaments</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $departaments = new Departaments();
                if (isset($_GET['departamentid'])) {
                    $departaments = $departaments->find_id(($_GET['departamentid']));
                }
                if (isset($_POST['delete_departament'])) {
                    if ($departaments->delete()) {
                        header("Location: departaments.php");
                    }
                }

                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Delete Departaments</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label class="small mb-1" for="docemri">Doctor :</label>
                                    <input class="form-control py-4" readonly name="docemri" id="docemri" type="text" placeholder="Doctor" value="<?php if (!empty($departaments->getDoktorri_Emri())) {
                                                                                                                                                        echo $departaments->getDoktorri_Emri();
                                                                                                                                                    } ?>" />
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label class="small mb-1" for="emri">Emri :</label>
                                            <input class="form-control py-4" readonly name="emri" id="emri" type="text" placeholder="Name" value="<?php if (!empty($departaments->getDepartamenti_Emri())) {
                                                                                                                                                        echo $departaments->getDepartamenti_Emri();
                                                                                                                                                    } ?>" />
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                                    <input class="form-control py-4" readonly name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi" value="<?php if (!empty($departaments->getPershkrimi())) {
                                                                                                                                                                                echo $departaments->getPershkrimi();
                                                                                                                                                                            } ?>" />
                                                </div>

                                                <input class="btn btn-primary" id="login" value="Delete Departament" type="submit" name="delete_departament" />
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


    <?php include 'inc/adminfooter.php'; ?>