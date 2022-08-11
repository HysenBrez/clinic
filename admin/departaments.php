<?php

use Admin\Libs\Departaments;
use Admin\Libs\Doctors;

include 'libs/Database.php';
include 'inc/sidebar.php'; ?>

<?php include 'inc/topbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of Departaments</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departaments</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Departaments Data</div>
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
                                    <th>Doktorret</th>
                                    <th>Emri</th>
                                    <th>Pershkrimi</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Doktorret</th>
                                    <th>Emri</th>
                                    <th>Pershkrimi</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $departament = new Departaments();
                                foreach ($departament->queryInner() as $d) {
                                    echo "<tr>";
                                    echo "<td>" . $d->getDoktorri_Emri() . "</td>";
                                    echo "<td>" . $d->getDepartamenti_Emri() . "</td>";
                                    echo "<td>" . $d->getPershkrimi() . "</td>";
                                    echo "<td><a href='edit_departaments.php?departamentid=" . $d->getDepartamenti_Id() . "'>Edit</td>";
                                    echo "<td><a href='delete_departaments.php?departamentid=" . $d->getDepartamenti_Id() . "'>Delete</a></td>";
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