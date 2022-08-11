<?php

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
                $doctors = new Doctors();
                if (isset($_GET['doctorid'])) {
                    $doctors = $doctors->find_id(($_GET['doctorid']));
                }
                if (isset($_POST['delete_doctor'])) {
                    if ($doctors->delete()) {
                        header("Location: doctors.php");
                    }
                }

                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Delete Doctor</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label class="small mb-1" for="firstname">Emri :</label>
                                    <input class="form-control py-4" readonly name="emri" id="emri" type="text" placeholder="Emri" value="<?php if (!empty($doctors->getEmri())) {
                                                                                                                                                echo $doctors->getEmri();
                                                                                                                                            } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="mbiemri">Mbiemri :</label>
                                    <input class="form-control py-4" readonly name="mbiemri" id="mbiemri" type="text" placeholder="Mbiemri" value="<?php if (!empty($doctors->getMbiemri())) {
                                                                                                                                                        echo $doctors->getMbiemri();
                                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="telefoni">Telefoni :</label>
                                    <input class="form-control py-4" readonly name="telefoni" id="telefoni" type="text" placeholder="Telefoni" value="<?php if (!empty($doctors->getNr_telefoni())) {
                                                                                                                                                            echo $doctors->getNr_telefoni();
                                                                                                                                                        } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email :</label>
                                    <input class="form-control py-4" readonly name="email" id="email" type="text" placeholder="Email" value="<?php if (!empty($doctors->getEmail())) {
                                                                                                                                                    echo $doctors->getEmail();
                                                                                                                                                } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="photo">Profile Photo :</label>
                                    <img class="photoimg col-md-5" src="uploads/<?php if (!empty($doctors->getPhoto())) {
                                                                                    echo $doctors->getPhoto();
                                                                                } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                    <input class="form-control py-4" readonly name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi" value="<?php if (!empty($doctors->getPershkrimi())) {
                                                                                                                                                                echo $doctors->getPershkrimi();
                                                                                                                                                            }  ?>">
                                </div>
                                <input class="btn btn-primary" id="login" value="Delete User" type="submit" name="delete_doctor" />
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