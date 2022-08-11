<?php

use Admin\Libs\Admins;

include 'admin/autoloader.php';  ?>
<?php ob_start();  ?>
<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Free Medical Hospital Website Template | Smarteyeapps.com</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin/qq/jquery.datetimepicker.css">
    <script src="admin/qq/jquery.js"></script>
    <script src="admin/qq/build/jquery.datetimepicker.full.min.js"></script>
</head>

<body>

    <!-- ################# Header Starts Here#######################--->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 left-item">
                        <ul>
                            <li><i class="fas fa-envelope-square"></i> clinic@gmail.com</li>
                            <li><i class="fas fa-phone-square"></i> +383 49 111 222</li>
                        </ul>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block right-item">
                        <ul>
                            <li><a><i class="fab fa-github"></i></a></li>
                            <li><a><i class="fab fa-google-plus-g"></i></a></li>
                            <li> <a><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a><i class="fab fa-twitter"></i></a></li>
                            <li> <a><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                        <img src="assets/images/logo.jpg" alt="">
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <?php if (isset($_SESSION['userId'])) { ?>
                            <ul class="nav">
                                <li class="nav-item"><a href="index.php">Home</a></li>
                                <li class="nav-item"><a href="about_us.php">About Us</a></li>
                                <li class="nav-item"><a href="departament.php">Departaments</a></li>
                                <li class="nav-item"><a href="reservation.php">Reservations</a></li>
                                <li class="nav-item dropdownnav">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?>
                                        <i class="fas fa-user fa-sm fa-fw mr-1 text-gray-400"></i>
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>

                            </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <button class="btn btn-info"><a href="add_reservation.php">Rezervo</a></button>
                    </div>
                <?php  } ?>

                <?php if (isset($_SESSION['adminId'])) { ?>
                    <ul>
                        <li class="nav-item"><a href="index.php">Home</a></li>
                        <li class="nav-item"><a href="about_us.php">About Us</a></li>
                        <li class="nav-item"><a href="departament.php">Departaments</a></li>
                        <li class="nav-item"><a href="reservation.php">Reservations</a></li>
                        <li class="nav-item dropdownnav">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?>
                                <i class="fas fa-user fa-sm fa-fw mr-1 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-2 d-none d-lg-block appoint">
                    <button class="btn btn-info"><a href="admin/index.php">Admin Page</a></button>
                </div>
            <?php  } ?>

            <?php if (isset($_SESSION['doctorId'])) { ?>
                <ul>
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="about_us.php">About Us</a></li>
                    <li class="nav-item"><a href="departament.php">Departaments</a></li>
                    <li class="nav-item"><a href="reservation.php">Reservations</a></li>
                    <li class="nav-item dropdownnav">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?>
                            <i class="fas fa-user fa-sm fa-fw mr-1 text-gray-400"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            <?php  } ?>

            <?php if (!isset($_SESSION['userId']) && !isset($_SESSION['doctorId']) && !isset($_SESSION['adminId'])) { ?>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="departament.php">Departaments</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>

                </ul>
            <?php  } ?>


            </div>
        </div>

        </div>
        </div>

    </header>