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
                  <h6 class="text-muted lead">
                  Culture Palaces is one of the cultural institutions affiliated with the General Authority for Culture Palaces, which is an Egyptian body that aims to provide cultural and artistic services and participate in raising the cultural level and directing the national awareness of the masses in the fields of cinema, theatre, music, literature, folk and plastic arts, and in children, women and youth activities and library services in the governorates, as it It provides performances by artistic groups, plastic arts exhibitions, children’s folk arts performances, and children’s choirs, in addition to training courses to teach the art of embroidery and drawing, in addition to many different arts.
                  </h6>
                </div>
                <div class="col-md-6 ">
                            <img src="images/main_photo1.jpg" class="img-fluid rounded-5">
                </div>
            </div>
        </div>
    </section>
    <div class="our-services my-5" id="our-services" >
        <heading class="text-center">
            <h3>Our Services</h3>
        </heading>
    <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="bg-white p-2">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item"><a class="nav-link active" href="#All" data-bs-toggle="tab">All Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#WorkShops" data-bs-toggle="tab">Work Shops</a></li>
            <li class="nav-item"><a class="nav-link" href="#Bazar" data-bs-toggle="tab">Bazar</a></li>
            <li class="nav-item"><a class="nav-link" href="#Concerts" data-bs-toggle="tab">Concerts</a></li>
            <li class="nav-item"><a class="nav-link" href="#plays" data-bs-toggle="tab">Plays</a></li>
          </ul>
          <div class="tab-content">
            <div id="All" class="active tab-pane fade in show">
              <div class="row">
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/image3.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">WorkShop</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/image1.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">WorkShop</h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-3 my-3">
                  <div class="card w-100">
                    <img src="images/image2.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">WorkShop</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/book1_.jpeg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">Bazar</h5>

                    </div>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="card w-75">
                    <img src="images/play1.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">Plays</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="card w-75">
                    <img src="images/party1_.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">Concert</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="WorkShops" class=" tab-pane fade ">
              <div class="row">
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/image3.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">WorkShop</h5>
                      <p class="lead">
We have educational workshops for tailoring clothes</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/image1.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">WorkShop</h5>
                            <p class="lead">We have drawing workshops from an early age</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 my-3">
                  <div class="card w-100">
                    <img src="images/image2.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">WorkShop</h5>
                      <p class="lead">
We have workshops to teach sculpture </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="Bazar" class=" tab-pane fade ">
              <div class="row">
                <div class="col-md-4">
                  <div class="card w-75">
                    <img src="images/book1_.jpeg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">Bazar</h5>
                      <p class="lead">Every year we hold a book fair. You should attend and you will definitely benefit</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="Concerts" class=" tab-pane fade">
              <div class="row">
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/party1_.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">Concert</h5>
                      <p class="lead">Our parties are like no other, you must experience them for yourself</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="plays" class=" tab-pane fade ">
              <div class="row">
                <div class="col-md-4 my-3">
                  <div class="card w-75">
                    <img src="images/play1.jpg" class="card-img-top rounded-2" alt="book-reading">
                    <div class="card-body">
                      <h5 class="card-title">Plays</h5>
                      <p class="lead">We have a variety of plays for adults and children. What are you waiting for? You must come so that you do not miss this fun.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>

  </div>
    </div>
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
<<<<<<< HEAD
<footer class="bg-color text-white ">
=======
<footer class="bg-color text-white">
>>>>>>> 3e3879a9cd67d0407b0cbd801801807981b04017
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
</body>
</html>