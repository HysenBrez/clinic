<?php

use Admin\Libs\Departaments;
use Admin\Libs\Doctors;
use Admin\Libs\Patients;
use Admin\Libs\Reservations;


ob_start();
include 'inc/header.php';  ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Reservations</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Reservations</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                if (isset($_POST['add_reservation'])) {
                    $reservation = new Reservations();
                    $reservation->setDid($_POST['demri']);
                    $reservation->setPid($_POST['pemri']);
                    $reservation->setData_e_rezervimit($_POST['data']);
                    $reservation->setPershkrimi($_POST['pershkrimi']);
                    if ($reservation->create()) {
                        header("Location: reservation.php");
                    }
                }
                ?>

                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Create Reservation</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" id="add_departament" action="" enctype="multipart/form-data">
                                <?php
                                $reservation = new Reservations();
                                if (isset($_GET['reservationid'])) {
                                    $reservation = $reservation->find_id(($_GET['reservationid']));
                                ?>
                                    <div class="form-group">
                                        <label class="small mb-1" for="demri">Doctor :</label>
                                        <input class="form-control py-4" readonly name="demri" id="demri" type="text" placeholder="Emri" value="<?php if (isset($_GET['reservationid'])) echo $_GET['reservationid']   ?>">

                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="card-body">
                                        <form method="post" id="add_reservation" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="demri">Doctor</label>
                                                <select name="demri" id="demri">
                                                    <option value="">Choose Doctor :</option>
                                                    <?php

                                                    $doctor = new Doctors();
                                                    foreach ($doctor->find_all() as $doc) {
                                                        echo  '<option value="' . $doc->getId() . '">' . $doc->getEmri() . '</option>';
                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        <?php  } ?>
                                        <?php if (isset($_SESSION['userId'])) { ?>
                                            <div class="form-group">
                                                <label for="pemri">Patient</label>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="pemri">Patient :</label>
                                                    <input class="form-control py-4" readonly name="pemri" id="pemri" type="text" placeholder="Emri" value="<?php if (isset($_SESSION['userId'])) echo $_SESSION['userId'];  ?>">

                                                </div>
                                            </div>
                                        <?php  } else { ?>
                                            <div class="form-group">
                                                <label for="pemri">Patient</label>
                                                <select name="pemri" id="pemri">
                                                    <option value="">Choose Patient :</option>
                                                    <?php

                                                    $patient = new Patients();
                                                    foreach ($patient->find_all() as $pat) {
                                                        echo  '<option value="' . $pat->getId() . '">' . $pat->getEmri() . '</option>';
                                                    }



                                                    ?>
                                                </select>
                                            </div>
                                        <?php  } ?>
                                        <div class="form-group">
                                            <input id="datetimepicker" name="data" class="dateEnd" type="text" placeholder="Data" required data-disablethese="<?= json_encode($disablethese) ?>">
                                        </div>
                                        <script type="text/javascript">
                                            jQuery('#datetimepicker').datetimepicker({
                                                datepicker: true,
                                                allowTimes: [
                                                    '9:00', '10:00', '11:00', '12:00', '13:00', '15:00',
                                                    '17:00', '17:05', '17:20', '19:00', '20:00'
                                                ],

                                                onGenerate: function(ct) {
                                                    jQuery(this).find('.xdsoft_date.xdsoft_weekend')
                                                        .addClass('xdsoft_disabled');
                                                },
                                                weekends: ['01.01.2014', '02.01.2014', '03.01.2014', '04.01.2014', '05.01.2014', '06.01.2014'],
                                                timepicker: true,


                                                minDate: 0,
                                                // today

                                                minDate: '2013/12/03',

                                                minDate: '-1970/01/02',
                                                // yesterday

                                                minDate: '05.12.2013',
                                                formatDate: 'Y.m.d'


                                            });
                                        </script>

                                        <div class="form-group">
                                            <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                            <input class="form-control py-4" name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi">
                                        </div>

                                        <input class="btn btn-primary" id="login" value="Create Reservation" type="submit" name="add_reservation" />
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
    <script src="/path/to/cdn/jquery.min.js"></script>
    <script src="jquery.datetimepicker.js"></script>
    <?php include 'inc/footer.php'; ?>