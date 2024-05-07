<?php session_start();
if(!isset($_SESSION['auth'])){
  header('Location: ../updates/login.php');
  exit();
}
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/profile.css"> -->
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
                        <li class="nav-item"><a class="nav-link active aria-current= page" href="#workshops">WorkShops</a></li>
                        <li class="nav-item"><a class="nav-link "href="#party">Party</a></li>
                        <li class="nav-item"><a class="nav-link "href="#bookgallery">book gallery</a></li>
                        <li class="nav-item"><a class="nav-link "href="#plays">Plays</a></li>
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
   <main>
    <section class="heading text-center">
      <h3 class="position-relative mt-3">Our events</h3>
      <?php if(isset($_SESSION['delete'])): ?>
    <div class="alert alert-success text-center">
        <?php echo $_SESSION['delete']; ?>
    </div>
    <?php unset($_SESSION['delete']); ?>
<?php endif; ?>
    </section>
    <section class="workshops" id="workshops">
        <div class="container mt-5 ">
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">Work Shops</h3>
          </div>
          <div class="row me-0 ms-0  g-4">
          <?php
            include('database.php');
            $sqlSelect = "SELECT storedata.*, ticketinfo.ticketno 
              FROM storedata 
              LEFT JOIN ticketinfo ON storedata.id = ticketinfo.id 
              WHERE storedata.type='Workshop'";

            $result = mysqli_query($con,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
                ?>
            <div class="col-md-4">
              <div class="card border-0 rounded-5 shadow-lg hovering" ">
                <div class="img overflow-hidden">
                  <img src="<?php echo $data['image']?>" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                  <!-- <?php echo $data['image']?> -->
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary"><?php echo $data['name'] ?></span> / <?php echo $data['date'] ?></p>
                    <p class="card-text">Ticket price <span class="text-success"><?php echo $data['price'] ?></span></p>
                    <p class="card-text">Tickets Available <span class="text-info"><?php echo $data['ticketno']?></span></p>
                  </div>
                  <div class="icon d-flex align-items-center gap-3">
                    
                    <?php if($isadmin==1):?>
                    <button class="btn bg-danger"><a href="handelers/handeldelete.php?id=<?php echo $data['id'];?>"class="text-white text-decoration-none">Delete</a></button>
                    <button class="btn btn-ico bg-primary"><a href="edit.php?id=<?php echo $data['id'];?>"class="text-white text-decoration-none">Edit</a></button>
                    <?php else:?>
                    <?php if (intval($data['ticketno']) > 0): ?>
                        <button class="btn btn-ico bg-warning">
                            <a href="sign.php?id=<?php echo $data['id']; ?>" class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a>
                        </button>
                    <?php else: ?>
                        <p class="text-danger">Tickets are sold out</p> <!-- أو رسالة أخرى تناسب الحالة -->
                    <?php endif; ?>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>            
          <?php } ?> <!-- Close the while loop here -->
          </div>
        </div>
      </section>
    <section class="Party" id="party">
        <div class="container mt-5 ">
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">Parties</h3>
          </div>
          <div class="row me-0 ms-0  g-4">
          <?php
            include('database.php');
            $sqlSelect = "SELECT storedata.*, ticketinfo.ticketno 
              FROM storedata 
              LEFT JOIN ticketinfo ON storedata.id = ticketinfo.id 
              WHERE storedata.type='party'";

            $result = mysqli_query($con,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
                ?>
            <div class="col-md-4">
              <div class="card border-0 rounded-5 shadow-lg hovering" >
                <div class="img overflow-hidden">
                  <img src="<?php echo $data['image'] ?>" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary"><?php echo $data['name'] ?></span> / <?php echo $data['date'] ?></p>
                    <p class="card-text">Ticket price <span class="text-success"><?php echo $data['price'] ?></span></p>
                    <p class="card-text">Tickets Available <span class="text-info"><?php echo $data['ticketno']?></span></p>
                  </div>
                  <div class="icon d-flex align-items-center gap-3">
                  <button class="btn bg-danger"><a href="events.php"class="text-white text-decoration-none">Delete</a></button>
                  <?php if ($isadmin == 1): ?>
                    <button class="btn btn-ico bg-primary">
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="text-white text-decoration-none">Edit</a>
                    </button>
                <?php else: ?>
                    <?php if (intval($data['ticketno']) > 0): ?>
                        <button class="btn btn-ico bg-warning">
                            <a href="sign.php?id=<?php echo $data['id']; ?>" class="text-white text-decoration-none">Book Now <i class="fa-solid fa-arrow-right text-white"></i></a>
                        </button>
                    <?php else: ?>
                        <p class="text-danger">Tickets are sold out</p> <!-- أو رسالة أخرى تناسب الحالة -->
                    <?php endif; ?>
                <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      
      <section class="books" id="bookgallery">
        <div class="container mt-5 ">
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">book gallery</h3>
          </div>
          <div class="row me-0 ms-0  g-4">
          <?php
            include('database.php');
            $sqlSelect = "SELECT storedata.*, ticketinfo.ticketno 
              FROM storedata 
              LEFT JOIN ticketinfo ON storedata.id = ticketinfo.id 
              WHERE storedata.type='book gallery'";

            $result = mysqli_query($con,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
                ?>
            <div class="col-md-4">
              <div class="card border-0 rounded-5 shadow-lg hovering" >
                <div class="img overflow-hidden">
                  <img src="<?php echo $data['image'] ?>" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary"><?php echo $data['name'] ?></span> / <?php echo $data['date'] ?></p>
                    <p class="card-text">Ticket price <span class="text-success"><?php echo $data['price'] ?></span></p>
                    <p class="card-text">Tickets Available <span class="text-info"><?php echo $data['ticketno']?></span></p>
                  </div>
                  <div class="icon d-flex align-items-center gap-3">
                  <button class="btn bg-danger"><a href="events.php"class="text-white text-decoration-none">Delete</a></button>
                  <?php if($isadmin==1):?>
                    <button class="btn btn-ico bg-primary"><a href="edit.php?id=<?php echo $data['id'];?>"class="text-white text-decoration-none">Edit</a></button>
                    <?php else:?>
                    <button class="btn btn-ico bg-warning"><a href="sign.php?id=<?php echo $data['id']; ?>"class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a></button>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <section class="plays" id="plays">
        <div class="container mt-5 "> 
          <div class="heading-title mb-5">
            <h3 class="position-relative px-5">plays</h3>
          </div>
          <div class="row me-0 ms-0  g-4 ">
          <?php
            include('database.php');
            $sqlSelect = "SELECT storedata.*, ticketinfo.ticketno 
              FROM storedata 
              LEFT JOIN ticketinfo ON storedata.id = ticketinfo.id 
              WHERE storedata.type='plays'";

            $result = mysqli_query($con,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
                ?>
            <div class="col-md-6">
              <div class="card border-0 rounded-5 shadow-lg hovering">
                <div class="img overflow-hidden">
                  <img src="<?php echo $data['image']?>" class="card-img-top rounded-top-5 img-fluid " alt="tablet">
                </div>
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="info_text">
                    <p class="card-text lead fs-6"><span class="text-primary"><?php echo $data['name'] ?></span> / <?php echo $data['date'] ?></p>
                    <p class="card-text">Ticket price <span class="text-success"><?php echo $data['price'] ?></span></p>
                    <p class="card-text">Tickets Available <span class="text-info"><?php echo $data['ticketno']?></span></p>
                  </div>
                  <div class="icon">
                  <button class="btn bg-danger"><a href="events.php"class="text-white text-decoration-none">Delete</a></button>
                  <?php if($isadmin==1):?>
                    <button class="btn btn-ico bg-primary"><a href="edit.php?id=<?php echo $data['id'];?>"class="text-white text-decoration-none">Edit</a></button>
                    <?php else:?>
                    <button class="btn btn-ico bg-warning"><a href="sign.php?id=<?php echo $data['id']; ?>"class="text-white text-decoration-none">Book Now  <i class="fa-solid fa-arrow-right text-white"></i></a></button>
                    <?php endif;?>  
                                  
                  </div>
                </div>

              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section> 
   </main> 
   <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
