<?php include 'inc/header.php';  ?>


<section class="our-team">
    <div class="container">
        <div class="inner-title">


            <br><br><br><br>


            <h2>Meet our Cardiology Team</h2>
            <p>Take a look at our innovative and experiance team</p>
        </div>
        <div class="row team-member">
            <?php
            $doctor = new \Admin\Libs\Reservations;
            $i = 0;
            foreach ($doctor->Cardiology() as $d) {
                echo "<div class='col-md-3 col-sm-6'>";
                echo   "<div class='user-card'>";
                echo    "<div class='userar'>";
                echo    "<img class='teammempic card-image' alt='photo' src='admin/uploads/{$d->getDoktorrat_photo()}'>";
                echo "</div>";
                echo "<div class='detfs'>";
                echo "<p>{$d->getDoktorrat_emri()} {$d->getDoktorrat_mbiemri()}<i> - MD</i></p>";
                if (isset($_SESSION['userId'])) {
                    echo "<div><a class='btn btn-info' href='add_reservation.php?reservationid=" . $d->getId() . "'>Rezervo</div>";
                }
                echo "<ul>";
                echo  "<li><a href='#'><i class='fab fa-facebook-f fa-lg'></i></a></li>";
                echo   "<li><a href='#'><i class='fab fa-twitter fa-lg'></i></a></li>";
                echo "<li><a href='#'><i class='fab fa-google-plus-g fa-lg'></i></a></li>";
                echo "<li><a href='#'><i class='fab fa-github fa-lg'></i></a></li>";
                echo "<li><a href='#'><i class='fab fa-pinterest-p fa-lg'></i></a></li>";
                echo  "</ul>";
                echo "<br>";
                echo "<p >{$d->getDoktorrat_pershkrimi()}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $i++;
                if ($i == 4) break;
            }
            ?>

        </div>
    </div>
</section>















<?php include 'inc/footer.php';  ?>