<?php

use Admin\Libs\Patients;

  include 'inc/sidebar.php'; ?>
<?php  include 'inc/topbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of Patients</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Patients</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Patients Data</div>
                <div class="card-body">
                <h5 class="bg-info pl-3">
					<?php
						if(!empty($session->message)){
							echo $session->message;
						}
					?>
				</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $patient = new Patients();
                                foreach ($patient->find_all() as $p) {
                                    echo "<tr>";
                                    echo "<td>". $p->getEmri() . "</td>";
                                    echo "<td>". $p->getMbiemri() . "</td>";
                                    echo "<td>". $p->getNr_telefoni() . "</td>";
                                    echo "<td>". $p->getEmail() . "</td>";
                                    echo "<td><a href='edit_patients.php?patientid=". $p->getId() ."'>Edit</td>";
                                    echo "<td><a href='delete_patients.php?patientid=". $p->getId() ."'>Delete</a></td>";
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

 <?php include 'inc/adminfooter.php'; ?>