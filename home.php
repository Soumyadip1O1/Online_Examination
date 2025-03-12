<?php
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION["username"]))
{
  ?>
  <script type="text/javascript">
  window.location="login.php";
  </script>
  <?php
}
?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">A online examination system</h1>
      <h2 data-aos="fade-up" data-aos-delay="400">Offering examinations with a vast no of subjects.</h2>
      <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
          <a href="select_exam.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Get Started</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assetss/img/hero-img.png" class="img-fluid" alt="">
    </div>
    </div>
  </div>
</div>

</section><!-- End Hero -->
<main id="main">
<?php
include "footer.php";
?>