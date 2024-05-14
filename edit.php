<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/edit.css">
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
                        <li class="nav-item"><a class="nav-link active aria-current= page" href="events.php">Events</a></li>
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
            <?php if(isset($_SESSION['update'])): ?>
                                <div class="alert alert-success text-center">
                             <?php echo $_SESSION['update']; ?>
                                 </div>
                             <?php unset($_SESSION['update']); 
                             ?>
                            <?php endif;
                            ?>
                <div class="col-md-12">
                    <div class="form_side">
                        <h3 class="position-relative pb-2 mb-4 text-center mt-5 mb-3">Edit Items</h3>
                        <?php 
if (isset($_GET['id'])) {
    include("database.php");
    $id = $_GET['id'];
    $sql = "SELECT storedata.*, ticketinfo.ticketno 
            FROM storedata 
            LEFT JOIN ticketinfo ON storedata.id = ticketinfo.id 
            WHERE storedata.id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
}
?>

                        <form action="../updates/handelers/handeledit.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-5 justify-content-between">
                                    <input placeholder="Edit Work Shop Name" value="<?php echo $row["name"]; ?>" type="Work Shop Name" name="name" class="w-100 p-2 rounded-5" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                                    <input placeholder="Edit WorkShopDate" value="<?php echo $row["date"]; ?>" type="text" name="WorkShopDay" class="w-100 p-2 rounded-5" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                                    <input placeholder="Numberof tickets Available"  type="number" value="<?php echo $row["ticketno"]; ?>" name="numticket" class="w-100 p-2 rounded-5" >
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                                    <input placeholder="Ticket Price" value="<?php echo $row["price"]; ?>" type="Text" name="TicketPrice" class="w-100 p-2 rounded-5" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex align-items-center gap-3  justify-content-center">
                                    <label for="input-file" class="label1 d-block text-white rounded-5 p-2 mt-2">Upload photo</label>
                                    <input type="file" name="imagetmp" accept="image/jpg, image/png, image/jpeg" id="input-file" class="input1">
                                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                                </div>
                                <div class="col-md-12 text-cnter d-flex justify-content-center">
                                    <button class="btn rounded-5 text-white px-3 bg-color-btn" name="edit" type="submit">Confirm editing</button>
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