<?php

use Admin\Libs\Admins;
use Admin\Libs\Patients;

include 'inc/sidebar.php'; ?>
<?php include 'inc/topbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Settings</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Settings</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $adminid = new Admins();
                if (isset($_GET['adminid'])) {
                    $adminid = $adminid->find_id(($_GET['adminid']));
                }
                if (isset($_POST['edit_admin'])) {
                    $adminid->setEmri($_POST['emri']);
                    $adminid->setMbiemri($_POST['mbiemri']);
                    $adminid->setEmail($_POST['email']);
                    $adminid->setFjalekalimi($_POST['fjalekalimi']);
                    if ($adminid->update()) {
                        header("Location: index.php");
                    }
                }


                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Settings</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" id="settings" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="small mb-1" for="emri">Emri :</label>
                                    <input class="form-control py-4" name="emri" id="emri" type="text" placeholder="Emri" value="<?php if (!empty($adminid->getEmri())) {
                                                                                                                                        echo $adminid->getEmri();
                                                                                                                                    } ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="mbiemri">Mbiemri :</label>
                                    <input class="form-control py-4" name="mbiemri" id="mbiemri" type="text" placeholder="Mbiemri" value="<?php if (!empty($adminid->getMbiemri())) {
                                                                                                                                                echo $adminid->getMbiemri();
                                                                                                                                            } ?>" />
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Email :</label>
                                        <input class="form-control py-4" name="email" id="email" type="text" placeholder="Email" value="<?php if (!empty($adminid->getEmail())) {
                                                                                                                                            echo $adminid->getEmail();
                                                                                                                                        } ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="fjalekalimi">Fjalekalimi :</label>
                                        <input class="form-control py-4" name="fjalekalimi" id="fjalekalimi" type="text" placeholder="Fjalekalimi" value="<?php if (!empty($adminid->getFjalekalimi())) {
                                                                                                                                                                echo $adminid->getFjalekalimi();
                                                                                                                                                            } ?>" />
                                    </div>
                                    <input class="btn btn-primary" id="login" value="Save" type="submit" name="edit_admin" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    </main>

    <?php include 'inc/adminfooter.php'; ?>