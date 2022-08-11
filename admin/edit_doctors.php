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
                $doctor = new Doctors();
                if (isset($_GET['doctorid'])) {
                    $doctor = $doctor->find_id(($_GET['doctorid']));
                }
                if (isset($_POST['edit_doctor'])) {
                    $doctor->setEmri($_POST['emri']);
                    $doctor->setMbiemri($_POST['mbiemri']);
                    $doctor->setNr_telefoni($_POST['telefoni']);
                    $doctor->setEmail($_POST['email']);
                    $doctor->setFjalekalimi($_POST['fjalekalimi']);
                    if (!empty($_FILES['image']['name'])) {
                        $doctor->setPhotoImage($_FILES['image']);
                    }
                    $doctor->setPershkrimi($_POST['pershkrimi']);
                    if ($doctor->update()) {
                        header("Location: doctors.php");
                    }
                }


                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Create User</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" id="edit_doctor" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="small mb-1" for="emri">Emri :</label>
                                    <input class="form-control py-4" name="emri" id="emri" type="text" placeholder="Emri" value="<?php if (!empty($doctor->getEmri())) {
                                                                                                                                        echo $doctor->getEmri();
                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="mbiemri">Mbiemri :</label>
                                    <input class="form-control py-4" name="mbiemri" id="mbiemri" type="text" placeholder="Mbiemri" value="<?php if (!empty($doctor->getMbiemri())) {
                                                                                                                                                echo $doctor->getMbiemri();
                                                                                                                                            } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="telefoni">Telefoni :</label>
                                    <input class="form-control py-4" name="telefoni" id="telefoni" type="text" placeholder="Telefoni" value="<?php if (!empty($doctor->getNr_telefoni())) {
                                                                                                                                                    echo $doctor->getNr_telefoni();
                                                                                                                                                } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email :</label>
                                    <input class="form-control py-4" name="email" id="email" type="text" placeholder="Email" value="<?php if (!empty($doctor->getEmail())) {
                                                                                                                                        echo $doctor->getEmail();
                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="fjalekalimi">Fjalekalimi :</label>
                                    <input class="form-control py-4" name="fjalekalimi" id="fjalekalimi" type="password" placeholder="Fjalekalimi" value="<?php if (!empty($doctor->getFjalekalimi())) {
                                                                                                                                                                echo $doctor->getFjalekalimi();
                                                                                                                                                            } ?>" />
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="image">Doctor profile photo:</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" value="<?php if (!empty($doctor->getPhoto())) {
                                                                                                                        echo $doctor->getPhoto();
                                                                                                                    } ?>" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="image">Choose Profile Photo</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="pershkrimi">Pershkrimi :</label>
                                    <input class="form-control py-4" name="pershkrimi" id="pershkrimi" type="text" placeholder="Pershkrimi" value="<?php if (!empty($doctor->getPershkrimi())) {
                                                                                                                                                                echo $doctor->getPershkrimi();
                                                                                                                                                            }  ?>">
                                </div>

                                <input class="btn btn-primary" id="login" value="Create User" type="submit" name="edit_doctor" />
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

    <?php include 'inc/adminfooter.php'; ?>