<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit; 
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
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
        <div class="row">
                <div class="col-md-6 ">
                    <div class="form_side">
                        <!-- <h5 class="position-relative pb-2 mb-4 text-center">SignUp</h5> -->
                        <form action="handelers/handelsign.php" method="POST" >
                <div class="row">
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                    <label for="name" class="me-auto">FirstName</label>
                    <input placeholder="firstName" type="text" class="w-100 p-2 rounded-5" id="name" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-3 justify-content-between">
                    <label for="lastname" >LastName</label>
                    <input placeholder="lastname" type="text" class="w-100 p-2 rounded-5" id="lastname" required>
                  </div>
                  <div class="col-md-12 mb-3 d-flex align-items-center gap-5 me-2" >
                    <label for="email">Email</label>
                    <input type="email" class="w-100 p-2 rounded-5" id="email" required placeholder="<?php echo $_SESSION['auth'][1]?>">
                  </div>
<div class="col-md-12 d-flex align-items-center gap-5 me-2 mb-3">
<label class="select">Select</label>
            <select id="firstSelect" class="w-100 p-2 rounded-5" name="firstselect" onchange="populateSecondSelect()">
                <option value="">Select an option</option>
                <option value="ورش">ورش</option>
                <option value="معارض">معارض</option>
                <option value="حفلات">حفلات</option>
                <option value="مسرحيات">مسرحيات</option>
            </select>

            <select id="secondSelect" class="w-100 p-2 rounded-5" name="secondselect">
                
            </select>

            <script>
                function populateSecondSelect() {
                    var firstSelect = document.getElementById("firstSelect");
                    var secondSelect = document.getElementById("secondSelect");
                    var selectedValue = firstSelect.value;

                    // Clear existing options
                    secondSelect.innerHTML = "";

                    // Populate options based on the selected value
                    if (selectedValue === "ورش") {
                        addOption(secondSelect,  "رسم : الاحد - الاربعاء 5 مساءا");
                        addOption(secondSelect, "نحت : الاثنين - الخميس 12 ظهرا");
                        addOption(secondSelect, "تفصيل : السبت - الثلاثاء 10 صباحا");
                    } else if (selectedValue === "معارض") {
                        addOption(secondSelect,  "معرض الكتاب :الخميس 22/6");
                        addOption(secondSelect,  "معرض الكتاب : الجمعة 23/6");
                        addOption(secondSelect,  "معرض الكتاب : السبت 24/6");
                    } else if (selectedValue === "حفلات") {
                        addOption(secondSelect,  "مينا عطالله : الجمعة 12/10");
                        addOption(secondSelect,  "ياسمين علي : الجمعة 22/12");
                        addOption(secondSelect,  "محمد شاهين : الجمعة 1/1");
                    } else if (selectedValue === "مسرحيات") {
                        addOption(secondSelect, " علي بابا : الخميس 25/7");
                        addOption(secondSelect,  " المنافقون  : الخميس 26/8");
                    }
                }

                function addOption(select, text) {
                    var option = document.createElement("option");
                    option.text = text;
                    select.add(option);
                }
            </script>
</div>
             <div class="col-md-12 mb-3 d-flex align-items-center gap-5 me-2" >
                    <label for="phone">Phone</label>
                    <input type="tel" class="w-100 p-2 rounded-5" id="phone" required placeholder="PhoneNumber">
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-center ">
              <div class="row">
                <div class="container shadow-lg bg-white rounded-5  d-flex align-items-center mb-5">
                  <div class="col-md-6 visa">
                    <img src="images/visa.jpg" class="rounded-5 w-100 img-fluid shadow-lg position-relative">
                  </div>
                  <div class="col-md-6 ">
                  <p class="lead ">TotalPrice: <span class="text-success">totalprice</span></p>
                    <form action="Post">
                    <label for="visa-num">
                    <p class="lead ">CardNum: </p>
                    </label>
                    <input class="rounded-5" id="visa-num" required type="number">
                    </form>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn rounded-5  text-white px-3 py-2" type="submit">Confirm Payment</button>
                  </div>
              </div>
            </div>
</body>
</html>
