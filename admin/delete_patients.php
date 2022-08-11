<?php

use Admin\Libs\Patients;

  include 'inc/sidebar.php'; ?>
<?php  include 'inc/topbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Patients</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Patients</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $patient = new Patients();
                if (isset($_GET['patientid'])) {
                    $patient = $patient->find_id(($_GET['patientid']));
                }
                if (isset($_POST['delete_patient'])) {
                    if($patient->delete()){
                        header("Location: patients.php");
                    }
                }

                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Delete Patient</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label class="small mb-1" for="firstname">Emri :</label>
                                    <input class="form-control py-4" readonly name="emri" id="emri" type="text" 
                                    placeholder="Emri" value="<?php if(!empty($patient->getEmri())){ echo $patient->getEmri();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="mbiemri">Mbiemri :</label>
                                    <input class="form-control py-4" readonly name="mbiemri" id="mbiemri" type="text" 
                                    placeholder="Mbiemri" value="<?php if(!empty($patient->getMbiemri())){ echo $patient->getMbiemri();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="telefoni">Telefoni :</label>
                                    <input class="form-control py-4" readonly name="telefoni" id="telefoni" type="text" 
                                    placeholder="Telefoni" value="<?php if(!empty($patient->getNr_telefoni())){ echo $patient->getNr_telefoni();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email :</label>
                                    <input class="form-control py-4" readonly name="email" id="email" type="text" 
                                    placeholder="Email" value="<?php if(!empty($patient->getEmail())){ echo $patient->getEmail();} ?>"  />
                                </div>
                                <input class="btn btn-primary" id="login" value="Delete Patient" type="submit" name="delete_patient" />
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


<?php  include 'inc/adminfooter.php'; ?>