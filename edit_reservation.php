<?php

use Admin\Libs\Departaments;
use Admin\Libs\Doctors;
use Admin\Libs\Patients;
use Admin\Libs\Reservations;

include 'inc/header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Doctors</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Doctors</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $reservation = new Admin\Libs\Reservations();
                if (isset($_GET['reservationid'])) {
                    $reservation = $reservation->find_id(($_GET['reservationid']));
                }
                if (isset($_POST['edit_reservation'])) {
                    $reservation->setDid($_POST['demri']);
                    $reservation->setPid($_POST['pemri']);
                    $reservation->setData_e_rezervimit($_POST['data']);
                    $reservation->setPershkrimi($_POST['pershkrimi']);
                    if ($reservation->update()) {
                        header("Location: reservations.php");
                    }
                }


                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Edit Reservation</h3>
                        </div>


                        <div class="card-body">
                            <form method="post" id="edit_reservation" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="demri">Doctor</label>
                                    <select name="demri" id="demri">
                                        <option value="">Choose Doctor :</option>
                                        <?php

                                        $doctor = new Admin\Libs\Doctors();
                                        foreach ($doctor->find_all() as $doc) {
                                            echo  '<option value="' . $doc->getId() . '">' . $doc->getEmri() . '</option>';
                                        }



                                        ?>
                                    </select>
                                </div>

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
                                    <input id="datetimepicker" name="data" type="text" placeholder="Data" required data-disablethese="<?= json_encode($disablethese) ?>">
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
                                    <input class="form-control py-4" name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi" value="<?php if (!empty($reservation->getPershkrimi())) {
                                                                                                                                                        echo $reservation->getPershkrimi();
                                                                                                                                                    }  ?>">
                                </div>

                                <input class="btn btn-primary" id="login" value="Edit Departament" type="submit" name="edit_reservation" />
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

    <?php include 'inc/footer.php'; ?>