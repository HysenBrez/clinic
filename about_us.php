<?php

use Admin\Libs\Doctors;

include 'inc/header.php'; ?>

<!--  ************************* Page Title Starts Here ************************** -->
<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2>About Dil Homeopathy Clinic</h2>
            <ul>
                <li> <a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><i class="fas fa-angle-double-right"></i> About Us</li>
            </ul>
        </div>
    </div>
</div>

<!-- ######## Page  Title End ####### -->

<!-- ################# With Medical Starts Here#######################--->

<section class="with-medical">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 txtr">
                <h4>Why choos Health Care with <br>
                    <span>Medical Hospital</span>
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer neque libero, pulvinar et elementum quis, facilisis eu ante. Mauris non placerat sapien. Pellentesque tempor arcu non odio scelerisque ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.</p>
                <p>Ut ultricies lacus a rutrum mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed porta dolor quis felis pulvinar dignissim. Etiam nisl ligula, ullamcorper non metus vitae, maximus efficitur mi. Vivamus ut ex ullamcorper, scelerisque lacus nec, commodo dui. Proin massa urna, volutpat vel augue eget, iaculis tristique dui. </p>
            </div>
            <div class="col-lg-6 col-md-12">
                <img src="assets/images/why.jpg" alt="">
            </div>
        </div>
    </div>
</section>

<!-- ################# Key Features Starts Here#######################--->

<section class="key-features">
    <div class="row no-margin">
        <div class="col-md-3 kvxol col-sm-6">
            <div class="single-key ky-1">
                <i class="fas fa-hospital-alt"></i>
                <h5>Newest Technologies</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
            </div>
        </div>

        <div class="col-md-3 kvxol  col-sm-6">
            <div class="single-key ky-2">
                <i class="fas fa-user-md"></i>
                <h5>Experianced Doctors</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
            </div>
        </div>

        <div class="col-md-3 kvxol col-sm-6">
            <div class="single-key ky-1">
                <i class="fas fa-briefcase-medical"></i>
                <h5>High Customer Satisfaction</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
            </div>
        </div>

        <div class="col-md-3 kvxol col-sm-6">
            <div class="single-key ky-2">
                <i class="fas fa-capsules"></i>
                <h5>Pharma Pipeline</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
            </div>
        </div>



    </div>
</section>

<!-- ################# Our Team Starts Here#######################--->


<section class="our-team">
    <div class="container">
        <div class="inner-title">
            <h2>Meet our Team</h2>
            <p>Take a look at our innovative and experiance team</p>
        </div>
        <div class="row team-member">
            <?php
            $doctor = new \Admin\Libs\Doctors;
            $i = 0;
            foreach ($doctor->find_all() as $d) {
                echo "<div class='col-md-3 col-sm-6'>";
                echo   "<div class='user-card'>";
                echo    "<div class='userar'>";
                echo    "<img class='teammempic card-image' alt='photo' src='admin/uploads/{$d->getPhoto()}'>";
                echo "</div>";
                echo "<div class='detfs'>";
                echo "<p>{$d->getEmri()} {$d->getMbiemri()}<i> - MD</i></p>";
                echo "<ul>";
                echo  "<li><a href='#'><i class='fab fa-facebook-f fa-lg'></i></a></li>";
                echo   "<li><a href='#'><i class='fab fa-twitter fa-lg'></i></a></li>";
                echo "<li><a href='#'><i class='fab fa-google-plus-g fa-lg'></i></a></li>";
                echo "<li><a href='#'><i class='fab fa-github fa-lg'></i></a></li>";
                echo "<li><a href='#'><i class='fab fa-pinterest-p fa-lg'></i></a></li>";
                echo  "</ul>";
                echo "<br>";
                echo "<p >{$d->getPershkrimi()}</p>";

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


<!-- ################# Footer Starts Here#######################--->


<?php include 'inc/footer.php'; ?>