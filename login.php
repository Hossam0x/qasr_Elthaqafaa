<?php
// Start the session
session_start();

// Check if there are any previous login errors stored in the session
if(isset($_SESSION['login_error'])) {
    // Clear the login error session variable
    unset($_SESSION['login_error']);
}

// Remaining HTML code for the login page
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ss.css">
    <link rel="stylesheet" href="css/log.css">
    <style>
        /* Custom styles for alert box */
        .alert.alert-danger {
            background-color: #f8d7da; /* Red background color */
            border: 1px solid #f5c6cb; /* Border color */
            border-radius: 20px; /* Rounded corners */
            padding: 10px; /* Add padding to the content */
            margin-bottom: 6px; /* Add margin to separate from other elements */
            text-align: center; /* Center-align the text */
            font-size: 18px;
            max-width: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container p-5 bg-white mt-5 position-relative rounded-5 shadow-lg">
    <?php 
            if(isset($_SESSION['errors'])):
            foreach($_SESSION['errors'] as $error) :?>
                <div class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </div>
        <?php  
                endforeach;
                unset($_SESSION['errors']);
            endif; 
        ?>
        <div class="row d-flex align-items-center text-center">
                <div class="col-md-6 ">
                    <div class="form_side">
                        <h5 class="position-relative pb-2 mb-4 text-center">Login</h5>
                        <form action="handelers/handelLogin.php" method="POST" >
                <div class="row">
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-5 me-2" >
                    <label for="email">Email</label>
                    <input placeholder="Your Email" type="email" name="email" class="w-100 p-2 rounded-5" id="email" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-3 me-2" >
                    <label for="pass">Password</label>
                    <input placeholder="Password" type="password" name="password" class="w-100 p-2 rounded-5 ms-2" id="password" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-2 " >
                  <div class="col-md-12 text-center d-flex justify-content-center align-items-center">
                    <button class="btn rounded-5  text-white px-3 " type="submit" name="login">Confirm</button>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
              <a href="signup.php" class="col">Create new account</a>
                  </div>
            </div>
    </div>
    <div class="col-md-6">
      <img src="images/Welcome-bro.png" class="img-fluid w-75">
    </div>
          </div>
          </div>
        
</body>
</html>
