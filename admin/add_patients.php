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
                if (isset($_POST['add_patient'])) {
                    $patients = new Patients();
                    $patients->setEmri($_POST['emri']);
                    $patients->setMbiemri($_POST['mbiemri']);
                    $patients->setNr_telefoni($_POST['telefoni']);
                    $patients->setEmail($_POST['email']);
                    $patients->setFjalekalimi($_POST['fjalekalimi']);

                    if($patients->create()){
                        header("Location: patients.php");
                    }
                }

                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Create Patient</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" id="add_patient" action="">
                                <div class="form-group">
                                    <label class="small mb-1" for="emri">Emri :</label>
                                    <input class="form-control py-4" name="emri" id="emri" type="text" placeholder="Emri" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="mbiemri">Mbiemri :</label>
                                    <input class="form-control py-4" name="mbiemri" id="mbiemri" type="text" placeholder="Mbiemri" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="telefoni">Telefoni :</label>
                                    <input class="form-control py-4" name="telefoni" id="telefoni" type="text" placeholder="Telefoni" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email :</label>
                                    <input class="form-control py-4" name="email" id="email" type="text" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="fjalekalimi">Fjalekalimi :</label>
                                    <input class="form-control py-4" name="fjalekalimi" id="fjalekalimi" type="password" placeholder="Fjalekalimi" />
                                </div>
                                <input class="btn btn-primary" id="login" value="Create Patient" type="submit" name="add_patient" />
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