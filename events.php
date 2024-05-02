<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/events.css">
    <title>events</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-color " aria-label="Offcanvas navbar large">
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
                        <li class="nav-item"><a class="nav-link active aria-current= page" href="#courses">WorkShops</a></li>
                        <li class="nav-item"><a class="nav-link "href="#bazar">Bazar</a></li>
                        <li class="nav-item"><a class="nav-link "href="#concerts">Concerts</a></li>
                        <li class="nav-item"><a class="nav-link "href="#plays">Plays</a></li>
                        <li class="nav-item"><a class="nav-link "href="#about-us"> Who we are?</a></li>
                        <li class="nav-item"><a class="nav-link "href="admin.php">adding-items</a></li>
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
   <main>
    <section class="heading text-center">
      <h3>Our events</h3>
    </section>
    <section class="workshops">
        <div class="container mt-5 ">
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">Work Shops</h3>
          </div>
          <div class="row me-0 ms-0  g-4">
            <div class="col-md-4">
              <div class="card border-0 rounded-5 shadow-lg hovering" ">
                <div class="img overflow-hidden">
                  <img src="images/image1.jpg" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary">Drawing</span> / Wednesday At 5 pm</p>
                    <p class="card-text">Ticket price <span class="text-success">$100</span></p>
                  </div>
                  <div class="icon">
                    <button class="btn btn-ico bg-danger"><a href="sign.php" class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a></button>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </section>
    <section class="Party">
        <div class="container mt-5 ">
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">Parties</h3>
          </div>
          <div class="row me-0 ms-0  g-4">
            <div class="col-md-4">
              <div class="card border-0 rounded-5 shadow-lg hovering" >
                <div class="img overflow-hidden">
                  <img src="images/party1.jpg" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary">Mina 3atallah</span> / Friday 10/12</p>
                    <p class="card-text">Ticket price <span class="text-success">$100</span></p>
                  </div>
                  <div class="icon">
                    <button class="btn btn-ico bg-danger"><a href="sign.php" class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="books">
        <div class="container mt-5 ">
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">book gallery</h3>
          </div>
          <div class="row me-0 ms-0  g-4">
            <div class="col-md-4">
              <div class="card border-0 rounded-5 shadow-lg hovering" >
                <div class="img overflow-hidden">
                  <img src="images/book1.jpeg" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary">book gallery</span> / Thursday 22/6</p>
                    <p class="card-text">Ticket price <span class="text-success">$100</span></p>
                  </div>
                  <div class="icon">
                    <button class="btn btn-ico bg-danger"><a href="sign.php" class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="plays">
        <div class="container mt-5 "> 
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">plays</h3>
          </div>
          <div class="row me-0 ms-0  g-4 ">
            <div class="col-md-6">
              <div class="card border-0 rounded-5 shadow-lg hovering">
                <div class="img overflow-hidden">
                  <img src="images/play1.jpg" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary">Drawing</span> / Wednesday At 5 pm</p>
                    <p class="card-text">Ticket price <span class="text-success">$100</span></p>
                  </div>
                  <div class="icon">
                    <button class="btn btn-ico bg-danger"><a href="sign.php" class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> 
   </main> 
   <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>