<?php

use Admin\Libs\Departaments;
use Admin\Libs\Doctors;
use Admin\Libs\Patients;
use Admin\Libs\Reservations;

include 'inc/header.php'; ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Reservations</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Reservation</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $reservation = new Admin\Libs\Reservations();
                if (isset($_GET['reservationid'])) {
                    $reservation = $reservation->find_id(($_GET['reservationid']));
                }

                // $doctors = new Doctors();
                // if (isset($_GET['doctorid'])) {
                //     $doctors = $doctors->find_id(($_GET['doctorid']));
                // }

                // $patients = new Patients();
                // if (isset($_GET['patientid'])) {
                //     $patients = $patients->find_id(($_GET['patientid']));
                // }

                if (isset($_POST['delete_reservation'])) {
                    if ($reservation->delete()) {
                        header("Location: reservation.php");
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
                                    <input class="form-control py-4" readonly name="docemri" id="docemri" type="text" placeholder="Doctor" value="<?php if (!empty($reservation->getDoktorrat_emri())) {
                                                                                                                                                        echo $reservation->getDoktorrat_emri();
                                                                                                                                                    } ?>" />
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label class="small mb-1" for="emri">Emri :</label>
                                            <input class="form-control py-4" readonly name="emri" id="emri" type="text" placeholder="Patient" value="<?php if (!empty($reservation->getPacientet_emri())) {
                                                                                                                                                            echo $reservation->getPacientet_emri();
                                                                                                                                                        } ?>" />
                                        </div>

                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                                    <input class="form-control py-4" readonly name="data" id="data" type="date" placeholder="Data" value="<?php if (!empty($reservation->getData_e_rezervimit())) {
                                                                                                                                                                echo $reservation->getData_e_rezervimit();
                                                                                                                                                            } ?>" />
                                                </div>

                                                <div class="card-body">
                                                    <form method="post" action="">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                                            <input class="form-control py-4" readonly name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi" value="<?php if (!empty($reservation->getPershkrimi())) {
                                                                                                                                                                                        echo $reservation->getPershkrimi();
                                                                                                                                                                                    } ?>" />
                                                        </div>

                                                        <input class="btn btn-primary" id="login" value="Delete Departament" type="submit" name="delete_reservation" />
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


    <?php include 'inc/footer.php'; ?>