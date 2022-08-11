<?php

use Admin\Libs\Departaments;
use Admin\Libs\Doctors;

include 'inc/sidebar.php'; ?>
<?php include 'inc/topbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Doctors</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Doctors</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $departament = new Departaments();
                if (isset($_GET['departamentid'])) {
                    $departament = $departament->find_id(($_GET['departamentid']));
                }
                if (isset($_POST['edit_departament'])) {
                    $departament->setDoktorrat_Id($_POST['docemri']);
                    $departament->setDepartamenti_Emri($_POST['emri']);
                    $departament->setPershkrimi($_POST['pershkrimi']);
                    if ($departament->update()) {
                        header("Location: departaments.php");
                    }
                }


                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Edit Departament</h3>
                        </div>


                        <div class="card-body">
                            <form method="post" id="add_departament" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="emri">Doctor</label>
                                    <select name="docemri" id="docemri">
                                        <option value="">Choose Doctor :</option>
                                        <?php

                                        $doctor = new Doctors();
                                        foreach ($doctor->find_all() as $doc) {
                                            echo  '<option value="' . $doc->getId() . '">' . $doc->getEmri() . '</option>';
                                        }



                                        ?>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <form method="post" id="edit_doctor" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="small mb-1" for="emri">Emri :</label>
                                            <input class="form-control py-4" name="emri" id="emri" type="text" placeholder="Doctor" value="<?php if (!empty($departament->getDepartamenti_Emri())) {
                                                                                                                                                echo $departament->getDepartamenti_Emri();
                                                                                                                                            } ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                            <input class="form-control py-4" name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi" value="<?php if (!empty($departament->getPershkrimi())) {
                                                                                                                                                                echo $departament->getPershkrimi();
                                                                                                                                                            }  ?>">
                                        </div>

                                        <input class="btn btn-primary" id="login" value="Edit Departament" type="submit" name="edit_departament" />
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