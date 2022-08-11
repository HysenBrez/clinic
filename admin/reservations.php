<?php

use Admin\Libs\Doctors;
use Admin\Libs\Reservations;

include 'inc/sidebar.php'; ?>

<?php include 'inc/topbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of Reservations</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Reservations</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Reservations Data</div>
                <div class="card-body">
                    <h5 class="bg-info pl-3">
                        <?php
                        if (!empty($session->message)) {
                            echo $session->message;
                        }
                        ?>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Doctor Lastname</th>
                                    <th>Patient Name</th>
                                    <th>Patient Lastname</th>
                                    <th>Reservation Date</th>
                                    <th>Summary</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Doctor Lastname</th>
                                    <th>Patient Name</th>
                                    <th>Patient Lastname</th>
                                    <th>Reservation Date</th>
                                    <th>Summary</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $reservation = new Reservations();
                                foreach ($reservation->ResQuery() as $r) {
                                    echo "<tr>";
                                    echo "<td>" . $r->getDoktorrat_emri() . "</td>";
                                    echo "<td>" . $r->getDoktorrat_mbiemri() . "</td>";
                                    echo "<td>" . $r->getPacientet_emri() . "</td>";
                                    echo "<td>" . $r->getPacientet_mbiemri() . "</td>";
                                    echo "<td>" . $r->getData_e_rezervimit() . "</td>";
                                    echo "<td>" . $r->getPershkrimi() . "</td>";
                                    echo "<td><a href='edit_reservations.php?reservationid=" . $r->getId() . "'>Edit</td>";
                                    echo "<td><a href='delete_reservations.php?reservationid=" . $r->getId() . "'>Delete</a></td>";
                                    echo "</tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'inc/adminfooter.php';  ?>