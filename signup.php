<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/ss.css">
    <style>
        .alert.alert-danger {
            background-color: #f8d7da; 
            border: 1px solid #f5c6cb; 
            border-radius: 20px; 
            padding: 10px; 
            margin-bottom: 20px; 
            text-align: center;
            font-size: 16px; 
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
            <div class="row d-flex align-items-center">
                <div class="col-md-6 ">
                    <div class="form_side">
                        <h5 class="position-relative pb-2 mb-4 text-center" style="font-size:32px; font-weight:700;">SignUp</h5>
                        <form action="handelers/handelRegister.php" method="POST" >
                <div class="row">
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-5 justify-content-between">
                    <label for="name" class="me-auto">Name</label>
                    <input placeholder="Your Name" type="text" name="name" class="w-100 p-2 rounded-5" id="name" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                    <label for="username" >UserName</label>
                    <input placeholder="@userName" type="text" name="username" class="w-100 p-2 rounded-5" id="username" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-5 me-2" >
                    <label for="email">Email</label>
                    <input placeholder="Your Email" type="email" name="email" class="w-100 p-2 rounded-5" id="email" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-3 me-2" >
                    <label for="pass">Password</label>
                    <input placeholder="Password" type="password" name="password" class="w-100 p-2 rounded-5 ms-2" id="pass" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-2 " >
                    <label for="conf-pass">ConfirmPass</label>
                    <input placeholder="Confirm pass" name="confirm-password" type="password" class="w-100 p-2 rounded-5 " id="conf-pass" required>
                  </div>
                  <div class="col-md-12 text-center">
                    <button class="btn rounded-5  text-white px-3" type="submit">Confirm</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
      <img src="images/Welcome-sign.png" class="img-fluid w-75">
    </div>
          </div>
        </div>
      </div>
    </form>
    </body>
</html>
