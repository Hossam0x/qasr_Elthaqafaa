<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ss.css">
    <style>
        .alert {
            padding: 19px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            font-size: 18px;
            border-radius: 20px; 
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
        <div class="arrows-icon d-flex align-items-center justify-content-between mb-5">
            <a href="events.php" class="text-black"><i class="fa-solid fa-arrow-left"></i></a>
            <a href="Reservations.php" class="text-black"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
   
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
            <form id="paymentForm" action="handelers/handelsign.php<?php if(isset($_GET['id'])) { echo '?id=' . $_GET['id']; } ?>" method="post">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-md-6 ">
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
                            <input type="tel" name="phone" class="w-100 p-2  rounded-5" id="phone" required placeholder="PhoneNumber">
                        </div>
            <div class="col-md-6 mb-3 d-flex align-items-center gap-5 me-2">
                <label for="ticketCounter">Number of Tickets</label>
                     <div class="input-group">
                         <button type="button" class="btn btn-outline-secondary" onclick="decrement()" style="margin-right: 5px;">
                              <i class="fa-solid fa-minus"></i>
                          </button>
                         <input type="number" name="num_tickets" id="ticketCounter" class="form-control ticket-input" value="1" min="1">
                         <button type="button" class="btn btn-outline-secondary" onclick="increment()" style="margin-left: 5px;">
                              <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
            </div>

                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <!-- Visa Image -->
                       <img src="images/Credit card.png" class="img-fluid w-50">
                        <div class="col-md-6 ">
                            <?php 
                            include 'database.php';
                            $id = isset($_GET['id']) ? $_GET['id'] : null;
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
                            <label for="visa-num">
                                <p class="lead">CardNum: </p>
                            </label>
                            <input class="rounded-5" name="cardnum" id="visa-num" required type="number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mt-5">
                            <button class="btn text-white rounded-5" type="submit">Confirm Payment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function increment() {
            var input = document.getElementById('ticketCounter');
            input.value = parseInt(input.value) + 1;
        }

        function decrement() {
            var input = document.getElementById('ticketCounter');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
</body>
</html>
