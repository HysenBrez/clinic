<?php

use Admin\Libs\Doctors;

  include 'inc/sidebar.php'; ?>

 <?php include 'inc/topbar.php'; ?>

 <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of Doctors</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Doctors</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Doctors Data</div>
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
                                    <th>Pershkrimi</th>
                                    <th>Photo</th>
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
                                    <th>Pershkrimi</th>
                                    <th>Photo</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $doctor = new Doctors();
                                foreach ($doctor->find_all() as $d) {
                                    echo "<tr>";
                                    echo "<td>". $d->getEmri() . "</td>";
                                    echo "<td>". $d->getMbiemri() . "</td>";
                                    echo "<td>". $d->getNr_telefoni() . "</td>";
                                    echo "<td>". $d->getEmail() . "</td>";
                                    echo "<td>". $d->getPershkrimi() . "</td>";
                                    echo "<td><img class='col-md-3 px-0' src='uploads/". 
                                    $d->getPhoto() . "' alt='post image' /> </a></td>";
                                    echo "<td><a href='edit_doctors.php?doctorid=". $d->getId() ."'>Edit</td>";
                                    echo "<td><a href='delete_doctors.php?doctorid=". $d->getId() ."'>Delete</a></td>";
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