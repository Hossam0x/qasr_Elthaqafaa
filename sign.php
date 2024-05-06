<?php
session_start();

// Redirect to login page if user is not authenticated
if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ss.css">
    <style>
        .alert {
            padding: 19px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            font-size: 18px;
            border-radius: 20px; /* Adjust the border-radius value to make it more or less rounded */
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>
<body>
    <div class="container p-5 bg-white mt-5 position-relative rounded-5 shadow-lg">
        <!-- Display success message if it exists -->
        <?php
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
        <div class="form_side">
            <form action="handelers/handelsign.php<?php if(isset($_GET['id'])) { echo '?id=' . $_GET['id']; } ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <!-- First Name Input -->
                        <div class="col-md-12 mb-3 d-flex align-items-center gap-3 me-2">
                            <label for="name" class="me-auto">FirstName</label>
                            <input placeholder="firstName" type="text" name="fname" class="w-100 p-2 rounded-5" id="firstname" required>
                        </div>
                        <!-- Last Name Input -->
                        <div class="col-md-12 mb-3 d-flex align-items-center gap-3 me-2">
                            <label for="lastname">LastName</label>
                            <input placeholder="lastname" type="text" name="lname" class="w-100 p-2 rounded-5" id="lastname" required>
                        </div>
                        <!-- Email Input -->
                        <!-- <div class="col-md-12 mb-3 d-flex align-items-center gap-5 me-2">
                            <label for="email">Email</label> -->
                            <input type="hidden" name="email" class="w-100 p-2 rounded-5" id="email" required value="<?php echo $_SESSION['auth'][1]?>">
                        <!-- </div> -->
                        <!-- Phone Input -->
                        <div class="col-md-12 mb-3 d-flex align-items-center gap-5 me-2">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" class="w-100 p-2 rounded-5" id="phone" required placeholder="PhoneNumber">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <!-- Visa Image -->
                        <div class="col-md-6 visa">
                            <img src="images/visa.jpg" class="rounded-5 w-100 img-fluid shadow-lg position-relative">
                        </div>
                        <div class="col-md-6 ">
                            <?php 
                            include 'database.php';
                            // Check if 'id' is set in the URL
                            $id = isset($_GET['id']) ? $_GET['id'] : null;
                            // Fetch price if id is valid
                            if ($id !== null) {
                                $sqll="SELECT * from storedata where id='$id'";
                                $result = mysqli_query($con, $sqll);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $price = $row['price'];
                                }
                            } else {
                                echo "ID not found";
                                exit();
                            }
                            ?>
                            
                            <p class="lead">TotalPrice: <span class="text-success"><?php echo isset($price) ? $price : ''; ?></span></p>
                            <!-- Card Number Input -->
                            <label for="visa-num">
                                <p class="lead">CardNum: </p>
                            </label>
                            <input class="rounded-5" name="cardnum" id="visa-num" required type="number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn" type="submit">Confirm Payment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
