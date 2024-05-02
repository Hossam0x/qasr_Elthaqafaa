<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['auth'])) {
    // Redirect to login page if not authenticated
    header("Location: login.php");
    exit;
}
include "database.php";

include "handelers/handelProfile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your-profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-color" aria-label="Offcanvas navbar large">
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

    <header class="p-5 ">
        <div class="container shadow-lg bg-white z-2  rounded-2">
            <div class="row ">
                <div class="col-md-6">
                    <div class="upload_photo d-flex w-100 align-items-center justify-content-center h-100 flex-column gap-4">
                        <div class="card  bg-white p-5 rounded-2 text-center border-0 shadow-sm align-items-center justify-content-center  ">
                            <h1><?php echo $user['name']; ?></h1>
                            <p><?php echo $user['username']; ?></p>
                            <img src="user.jpg" id="profilepic" alt="user_img" class="rounded-circle text-center">
                            <label for="input-file" class="label1 d-block text-white rounded-5 p-2 mt-2 " >Edit photo</label>
                            <input type="file" accept="image/jpg, image/png, image/jpeg" id="input-file" class="input1 ">
                        </div>
                        <div class="go_button">
                            <button class="btn btn3  rounded-5 bg-color text-white"><a href="Reservations.php" class="text-decoration-none text-white"><i class="fa-solid fa-arrow-left text-white"></i> Reservations</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form_side">
                        <h5 class="position-relative pb-2 mb-4 mt-4">My Account</h5>
                        <div class="form">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <input placeholder="Your Name" type="text" class="w-100 p-2 rounded-5" name="name" value="<?php echo $user['name']; ?>" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input placeholder="Your Email" type="email" class="w-100 p-2 rounded-5 mt-4" name="email" value="<?php echo $user['email']; ?>">
                                        <div class="change-mail position-absolute">
                                            <a href="#" class="text-decoration-none">Change your email address</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input placeholder="Password" type="password" class="w-100 p-2 rounded-5 position-relative mt-4" name="password" value="<?php echo $user['password']; ?>">
                                        <div class="change-pass position-absolute">
                                            <a href="#" class="text-decoration-none">Change password</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input placeholder="@Username" type="text" class="w-100 p-2 rounded-5 mt-4" name="username" value="<?php echo $user['username']; ?>">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input placeholder="Your phone number" type="tel" maxlength="11" class="w-100 p-2 rounded-5 mt-4">
                                    </div>
                                    <div class="col-md-12 link">
                                        <!-- Form for deleting the account -->
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                                            <button type="submit" class="btn btn-danger" name="delete">Delete Your Account</button>
                                        </form>
                                        <p class="lead text-danger fs-6">Note that if you delete your account you will lose your data</p>
                                    </div>
                                    <div class="col-md-12 text-center p-3 ">
                                        <button class="btn btn1 rounded-1  text-white me-3 rounded-5" type="submit" name="save">Save</button>
                                        <button class="btn btn2 rounded-1  text-white rounded-5" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <script>
        let profilepic = document.getElementById("profilepic");
        let inputfile = document.getElementById("input-file");
        inputfile.onchange =function(){
            profilepic.src = URL.createObjectURL(inputfile.files[0]);
        }
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>


