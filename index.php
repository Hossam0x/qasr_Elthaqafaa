<?php session_start(); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link rel="styleshhet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Qasr Elthaqafa</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top" aria-label="Offcanvas navbar large" dir="rtl">
        <div class="container ">
            <?php if(isset($_SESSION['auth'])):?>
                <a class="navbar-item text-decoration-none me-2 text-white" href="logout.php">تسجيل الخروج</a>
                <?php endif; ?>  
            <h2><a class="navbar-brand" href="index.php">قصر الثقافه</a></h2>
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
                        <li class="nav-item"><a class="nav-link active aria-current= page" href="#courses">ورش</a></li>
                        <li class="nav-item"><a class="nav-link "href="#bazar">معارض</a></li>
                        <li class="nav-item"><a class="nav-link "href="#concerts">معارض</a></li>
                        <li class="nav-item"><a class="nav-link "href="#plays">مسرحيات</a></li>
                        <li class="nav-item"><a class="nav-link "href="#about-us">من نحن؟</a></li>
                        <?php if(!isset($_SESSION['auth'])):?>
                        <li class="nav-item"><a class="nav-link "href="login.php">تسجيل</a></li>
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
      <div>
        <button class="btn btng text-white"> <a class="text-decoration-none" href="events.php">Click to see our events</a></button>
      </div>
    </div>
  </header>
</body>
</html>