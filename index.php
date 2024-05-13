<?php session_start(); 
if(isset($_SESSION['auth'])){
include 'database.php';
$email = $_SESSION['auth'][1]; 
$sql = "SELECT isadmin FROM user WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $isadmin);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/testing.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Qasr Elthaqafa</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-color position-fixed w-100 z-2" aria-label="Offcanvas navbar  large">
        <div class="container ">
            <h2><a class="navbar-brand" href="index.php"> Qasr AlTHaqafa</a></h2>
            <?php if(isset($_SESSION['auth'])):?>
                <a class="navbar-item text-decoration-none me-2 text-white" href="logout.php">Log Out </a>
                <?php endif; ?>  
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start text-bg-color" tabindex="-1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <!-- <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5> -->
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" >
                        <li class="nav-item"><a class="nav-link active aria-current= page"href="#about-us"> Who we are?</a></li>
                        <li class="nav-item"><a class="nav-link"href="#our-services"> Our Services</a></li>
                        <li class="nav-item"><a class="nav-link"href="#location"> Location</a></li>

                        <?php
                        if(isset($_SESSION['auth']))
                         if ($isadmin == 1) :?>
                        <li class="nav-item"><a class="nav-link "href="admin.php">adding-items</a></li>
                        <?php endif;?>
                        <?php if(!isset($_SESSION['auth'])):?>
                        <li class="nav-item"><a class="nav-link "href="login.php">login</a></li>
                        <?php else: ?>
                            <a href="profile.php" class="text-decoration-none p-2 text-white"><?php echo $_SESSION['auth'][0]?></a>
                        <?php endif; ?>
                    </ul>      
                </div>
            </div>
        </div>
    </nav>
<header>
    <div
      class="caption_header container d-flex align-items-center justify-content-center text-white flex-column text-center ">
      <h3 class="text-white">Welcome To Palace of Culture</h3>
      <div>
        <button class="btn btng text-white"><a class="text-decoration-none" href="events.php">Click to see our events</a></button>
      </div>
    </div>
  </header>
<main>
    <section id="about-us" class="about-us  p-5 my-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 ">
                  <h3>Palace of culture </h3>  
                  <h6 class="text-muted display-6 fs-5" data-aos="fade-right">
                  <span class="text-warning">Culture Palaces</span>  is one of the cultural institutions affiliated with the General Authority for Culture Palaces, which is an Egyptian body that aims to provide cultural and artistic services and participate in raising the cultural level and directing the national awareness of the masses in the fields of cinema, theatre, music, literature, folk and plastic arts, and in children, women and youth activities and library services in the governorates, as it It provides performances by artistic groups, plastic arts exhibitions, children’s folk arts performances, and children’s choirs, in addition to training courses to teach the art of embroidery and drawing, in addition to many different arts.
                  </h6>
                </div>
                <div class="col-md-6 ">
                            <img src="images/main_photo1.jpg" class="img-fluid border border-secondary border-5">
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio" id="works">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h3 class=" position-relative z-1 fs-1">OUR Services.</h3>
      </div>
    </div>
    <ul class="nav nav-underline mb-3 justify-content-center" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-secondary fw-bold" id="pills-home-tab" data-bs-toggle="pill"
          data-bs-target="#all" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-secondary fw-bold" id="pills-profile-tab" data-bs-toggle="pill"
          data-bs-target="#brand" type="button" role="tab" aria-controls="pills-profile"
          aria-selected="false">Work Shops</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-secondary fw-bold" id="pills-contact-tab" data-bs-toggle="pill"
          data-bs-target="#design" type="button" role="tab" aria-controls="pills-contact"
          aria-selected="false">Bazar</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-secondary fw-bold" id="pills-disabled-tab" data-bs-toggle="pill"
          data-bs-target="#concert" type="button" role="tab" aria-controls="pills-disabled"
          aria-selected="false">Concerts</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-secondary fw-bold" id="pills-disabled-tab" data-bs-toggle="pill"
          data-bs-target="#plays" type="button" role="tab" aria-controls="pills-disabled"
          aria-selected="false">Plays</button>
      </li>
    </ul>
    <div class="container">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active animate__animated animate__backInLeft" id="all" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          <div class="row g-4">
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/image1.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class="text-uppercase text-secondary display-6 fs-4">Workshops</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/image1.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i>
                      </a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative ">
                <img src="uploads/image2.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Work shops</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/image2.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/image3.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Work Shops</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/image3.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/book_1.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class="text-uppercase display-6 fs-4">Bazar</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/book_1.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/play3.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class="text-uppercase display-6 fs-4">play</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/play2.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/party2.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Concert</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/party2.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade animate__animated animate__backInDown" id="brand" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/image1.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Workshops</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/image1.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i>
                      </a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/image2.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Work shops</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/image2.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/image3.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Work Shops</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/image3.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade animate__animated animate__backInRight" id="design" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/book_1.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Bazar</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/book_1.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade animate__animated animate__backInUp" id="concert" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/party2.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class=" text-uppercase display-6 fs-4">Concert</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/party2.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade animate__animated animate__backInLeft" id="plays" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="porfolio-img position-relative">
                <img src="uploads/play3.jpg" class="w-100">
                <div
                  class="porfolio-layer d-flex justify-content-center align-items-center text-center bg-colo flex-column gap-2">
                  <h6 class="text-uppercase display-6 fs-4">play</h6>
                  <ul class="list-unstyled d-flex gap-3 ">
                    <a href="#"
                    class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                    class="fa-solid fa-link-slash"></i></a>
                    <a href="uploads/play2.jpg"
                    data-lightbox="models"
                      class="text-white text-decoration-none d-flex text-center justify-content-center align-items-center"><i
                        class="fa-solid fa-magnifying-glass-plus"></i></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </section>
    <section class="find-us my-5" id="location">
         <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <h3>Our <span>Location !</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="google-map text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3404.1035805801416!2d31.674011475116142!3d31.438815251167718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f9e3ac81f51371%3A0xb99d0c2bc5640f96!2z2YLYtdixINir2YLYp9mB2Kkg2K_ZhdmK2KfYtyDYp9mE2KzYr9mK2K_YqQ!5e0!3m2!1sen!2seg!4v1714742056533!5m2!1sen!2seg" width="600" height="500"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="  w-100 mb-5"></iframe>
                    </div>
                </div>
            </div>
         </div>               
    </section>
</main>
<footer class="bg-color text-white">
    <div class="container p-3">
      <div class="copy_right d-flex align-items-center justify-content-center">
        <i class="fa-regular fa-copyright fa-xs"></i>
        <p class="pt-2">Copyright <span class ="text-white">Qasr AlTHqafa</span>. All Rights Reserved</p>
      </div>
      <div class="designed_by text-center">
        <p>Follow us <a href= "https://www.facebook.com/engalaa9093"><i class="fa-brands fa-facebook text-white"></i></a></p>
      </div>
    </div>
  </footer>
<script src="js/bootstrap.bundle.min.js"></script>
<div class="icon-bottom " dir="rtl">
<a href=# class="fixed-bottom ">
  <i class="fa-solid fa-arrow-up text-white rounded-circle p-2 bg-color mb-3 me-3"></i>
</a>
</div>
<script src="js/lightbox-plus-jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>