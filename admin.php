<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding-items</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-color" aria-label="Offcanvas navbar large">
        <div class="container ">
            <h2><a class="navbar-brand" href="index.php"> Qasr AlTHaqafa</a></h2>
            <?php if(isset($_SESSION['auth'])): ?>
                <a class="navbar-item text-decoration-none me-2 text-white" href="logout.php">Log Out</a>
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
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link active aria-current= page" href="#courses">WorkShops</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bazar">Bazar</a></li>
                        <li class="nav-item"><a class="nav-link" href="#concerts">Concerts</a></li>
                        <li class="nav-item"><a class="nav-link" href="#plays">Plays</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about-us">Who we are?</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php">Adding Items</a></li>
                        <?php if(!isset($_SESSION['auth'])): ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <?php else: ?>
                            <a href="profile.php" class="text-decoration-none p-2 text-white"><?php echo $_SESSION['auth'][0]?></a>
                        <?php endif; ?>
                    </ul>      
                </div>
            </div>
        </div>
    </nav>
    <section class="add-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form_side">
                        <h3 class="position-relative pb-2 mb-4 text-center mt-5 mb-3">Adding New WorkShop</h3>
                        <form action="../updates/handelers/handeladminpage.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-5 justify-content-between">
                                    <input placeholder="Work Shop Name" type="Work Shop Name" name="name" class="w-100 p-2 rounded-5" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                                    <input placeholder="WorkShopDate" type="text" name="WorkShopDay" class="w-100 p-2 rounded-5" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                                    <input placeholder="Ticket Price" type="Text" name="TicketPrice" class="w-100 p-2 rounded-5" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                                <select class="form-select rounded-5 p-2 border-secondary " aria-label="Default select example">
  <option selected>Select the type </option>
  <option value="1">Work shop</option>
  <option value="2">Party</option>
  <option value="3">book gallery</option>
  <option value="3">plays</option>
</select>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3  justify-content-center">
                                    <label for="input-file" class="label1 d-block text-white rounded-5 p-2 mt-2">Upload photo</label>
                                    <input type="file" name="image" accept="image/jpg, image/png, image/jpeg" id="input-file" class="input1">
                                </div>
                                <div class="col-md-12 text-cnter d-flex justify-content-center">
                                    <button class="btn rounded-5 text-white px-3 bg-color-btn" name="add" type="submit">Add a new workshop</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <script src="js/bootstrap.bundle.min.js"></script>    
</body>
</html>
