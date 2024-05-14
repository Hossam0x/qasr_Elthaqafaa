<?php
session_start();
include 'core/function.php';

if (!isset($_SESSION['auth'])) {
    redirect("login.php");
    exit;
}

include 'database.php';

$name = $_SESSION['auth'][0];
$email = $_SESSION['auth'][1];

$sql = "SELECT isadmin FROM user WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $isadmin);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reservation.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-color" aria-label="Offcanvas navbar  large">
        <div class="container ">
            <h2><a class="navbar-brand" href="index.php"> Qasr AlTHaqafa</a></h2>
            <?php if (isset($_SESSION['auth'])) : ?>
                <a class="navbar-item text-decoration-none me-2 text-white" href="logout.php">Log Out </a>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start text-bg-color" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link active aria-current= page" href="index.php"> Who we are?</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php"> Our Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php"> Location</a></li>
                        
                        <?php if (isset($_SESSION['auth']) && $isadmin == 1) : ?>
                            <li class="nav-item"><a class="nav-link" href="admin.php">adding-items</a></li>
                        <?php endif; ?>
                        <?php if (!isset($_SESSION['auth'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                        <?php else : ?>
                            <a href="profile.php" class="text-decoration-none p-2 text-white"><?php echo $_SESSION['auth'][0] ?></a>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <table class="table text-center container shadow-lg rounded-5  position-relative">
        <caption class="text-center position-absolute">Your Reservation</caption>
        <thead class="bg-color-table">
            <tr>
                <?php if ($isadmin == 1) : ?>
                    <th>UserEmail</th>
                <?php endif; ?>
                <th>Type</th>
                <th>Name</th>
                <th>Date</th>
                <th>Price</th>
                <th>Num of tickets</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($email) {
                if ($isadmin == 1) {
                    $sql = "SELECT * FROM reservations";
                } else {
                    $sql = "SELECT * FROM reservations WHERE user_email = '$email'";
                }

                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <?php if ($isadmin == 1) : ?>
                            <td><?php echo $row['user_email'] ?></td>
                        <?php endif; ?>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['price'] ?>L.E</td>
                        <td><?php echo $row['ticketnum'] ?></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn text-danger"><i class="fa-solid fa-trash fa-2x"></i></a></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'><h3>No tickets found</h3></td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
