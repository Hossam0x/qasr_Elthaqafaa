<?php session_start(); 
if(isset($_SESSION['auth'])){
include 'database.php';
$email = $_SESSION['auth'][1]; 
$sql = "SELECT isadmin FROM user WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $isadmin);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Qasr Elthaqafa</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top" aria-label="Offcanvas navbar  large">
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
                        <?php
                        if(isset($_SESSION['auth']))
                         if ($isadmin == 1) :?>
                        <li class="nav-item"><a class="nav-link "href="admin.php">adding-items</a></li>
                        <li class="nav-item"><a class="nav-link" href="edit.php">Edit</a></li>
                        <?php endif;?>
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
<header>
    <div
      class="caption_header container d-flex align-items-center justify-content-center text-white flex-column text-center ">
      <div>
        <button class="btn btng text-white"><a class="text-decoration-none" href="events.php">Click to see our events</a></button>
      </div>
    </div>
  </header>
<main>
    <section id="about-us" class="about-us mt-5 p-5 mb-5 gy-5">
        <div class="container">
            <div class="row " dir="rtl">
                <div class="col-md-6 ">
                  <h3>قصر الثقافه</h3>  
                  <p class="lead">
                  قصور الثقافة هي إحدى المؤسسات الثقافية التابعة للهئية العامة لقصور الثقافة وهي هيئة مصرية تهدف إلى تقديم الخدمات الثقافية والفنية و المشاركة في رفع المستوى الثقافي وتوجيه الوعي القومي للجماهير في مجالات السينما والمسرح والموسيقى والآداب والفنون الشعبية والتشكيلية وفي نشاط الطفل والمرأة والشباب وخدمات المكتبات في المحافظات حيث انها تقوم بتقديم عروض للفرق الفنيه ومعارض فنون تشكيليه وعروض فنون شعبيه أطفال وكورال الاطفال بالاضافة الى دورات   تدريبية لتعليم فن التطريز والرسم بالاضافة الى العديد من الفنون المختلفة
                  </p>
                </div>
                <div class="col-md-6 ">
                            <img src="images/main_photo1.jpg" class="img-fluid rounded-5">
                </div>
            </div>
        </div>
    </section>
    <section id="courses" class="courses mt-5 p-5 mb-5">
        <div class="container">
            <div class="row " dir="rtl">
                <div class="col-md-6 ">
                            <img src="images/courses.jpeg" class="img-fluid rounded-5">
                </div>
                <div class="col-md-6 ">
                  <h3> الورش المقامة في قصور الثقافة</h3>  
                  <p class="lead">
                  تعتبر قصور الثقافة في مصر محاوراً رئيسية لتعزيز الحياة الثقافية والفنية في البلاد حيث توفر مجموعة متنوعة من الورش والكورسات التي تهدف إلى تطوير المهارات وتنمية القدرات الإبداعية للمشاركين. يشهد هذا الجانب الثقافي والتعليمي العديد من الفعاليات والبرامج التي تستهدف فئات متنوعة من المجتمع المصري، من الشباب والطلاب إلى المحترفين وهواة الفنون والثقافة. يُعَدّ هذا المقال استكشافاً لتنوع وأهمية الورش والكورسات التي تُقام 
                  في قصور الثقافة المصرية، وكيفية تأثيرها على الثقافة والتنمية الشخصية للمشاركين
                  </p>
                </div>
            </div>
        </div>
    </section>
    <section id="bazar" class="bazar mt-5 p-5 mb-5">
        <div class="container">
            <div class="row " dir="rtl">
                <div class="col-md-6 ">
                    <h3> المعارض المقامة في قصور الثقافة</h3>  
                    <p class="lead">
                    تعتبر المعارض الفنية والثقافية التي تستضيفها قصور الثقافة المصرية مناسبة مهمة لعرض أعمال الفنانين المحليين والعالميين وتبادل الثقافات والأفكار بين الفنانين والمعنيين بالفن.تشمل المعارض في قصور الثقافة مجموعة متنوعة من الفنون مثل الرسم، والنحت، والفنون التشكيلية الحديثة، والفنون الجرافيكية والتصوير الفوتوغرافي، وغيرها. تتيح هذه المعارض فرصة للفنانين لعرض أعمالهم أمام جمهور واسع من الزوار والمهتمين بالفن، كما تُعتبر فرصة لبناء شبكات علاقات وتبادل الخبرات بين الفنانين والنقاد والمتخصصين. تعكس المعارض في قصور الثقافة مجموعة متنوعة من الثقافات والتجارب الفنية ما يسهم في إثراء الحوار الثقافي وتوسيع آفاق الجمهور المصري وتعزيز فهمهم للفنون المختلفة وتطوراتها الحديثة. بالإضافة إلى ذلك، تعمل قصور الثقافة على تنظيم معارض ذات طابع خاص وموضوع محدد مثل معارض الفن الشعبي، والفن التشكيلي التقليدي والمعارض الفنية التعليمية، وغيرها مما يساهم في تلبية اهتمامات الجمهور المتنوعة وتقديم محتوى ثقافي متنوع ومثير للاهتمام.

                    </p>
                </div>
                <div class="col-md-6 ">
                            <img src="images/activity.jpg" class="img-fluid rounded-5">
                </div>
            </div>
        </div>
    </section>
    <section id="concerts" class="concerts mt-5 p-5 mb-5">
        <div class="container">
            <div class="row " dir="rtl">
                <div class="col-md-6 ">
                            <img src="images/masrah.jfif" class="img-fluid rounded-5">
                </div>
                <div class="col-md-6 ">
                  <h3> لحفلات المقامة في قصور الثقافة</h3>  
                  <p class="lead">
                  تعدّ قصور الثقافة في مصر منصة مهمة لتنظيم الفعاليات الثقافية والفنية بما في ذلك الحفلات الموسيقية والعروض الفنية المتنوعة. تقام هذه الحفلات في أماكن فسيحة ومجهزة بالتقنيات الصوتية والضوئية المتطورة، ما يضمن تجربة ممتعة ومثيرة للحضور. تتنوع الحفلات التي تُقام في قصور الثقافة بشكل كبير حيث تشمل مختلف أنواع الموسيقى مثل الموسيقى الكلاسيكية والموسيقى الشعبية، والموسيقى العالمية، بالإضافة إلى العروض المسرحية والرقص والعروض الفنية الأخرى. تعمل قصور الثقافة على جذب فنانين محليين وعالميين لإحياء الحفلات تعمل قصور الثقافة على جذب فنانين محليين وعالميين لإحياء الحفلات بفضل دور قصور الثقافة في تنظيم هذه الحفلات، يتاح للمجتمع فرصة للاستمتاع بفضل دور قصور الثقافة في تنظيم هذه الحفلات، يتاح للمجتمع فرصة للاستمتاع
                  </p>
                </div>
            </div>
        </div>
    </section>
    <section id="plays" class="plays mt-5 p-5 mb-5">
        <div class="container">
            <div class="row " dir="rtl">
                <div class="col-md-6 ">
                    <h3>  المسرحيات المقامة في قصور الثقافة </h3>  
                    <p class="lead">
                    تعد المسرحيات التي تُقام في قصور الثقافة المصرية جزءًا لا يتجزأ من الحياة الثقافية والفنية في مصر، حيث تمثل منصة هامة لعرض الإبداعات المسرحية المحلية والعالمية أمام جمهور متنوع وعريض.تتنوع المسرحيات المُعرضة في قصور الثقافة بشكل واسع حيث تشمل الأعمال الكلاسيكية والمعاصرة على حد سواء يُقام في هذه القصور مجموعة متنوعة من العروض المسرحية بما في ذلك المسرحيات الدرامية والكوميدية والتاريخية والاجتماعية مما يسمح للجمهور بالاختيار من بين مجموعة متنوعة من الأساليب والمواضيع المسرحية بفضل دور قصور الثقافة في تنظيم هذه المسرحيات، يتاح للفنانين والمسرحين فرصة لعرض أعمالهم وتواصلهم مع الجمهور المصري. كما تُعتبر هذه المسرحيات مناسبة مثالية لنقل رسائل وقضايا اجتماعية وثقافية مهمة، مما يعزز التواصل والحوار الثقافي في المجتمع. بجانب العروض المحلية، تستضيف قصور الثقافة أيضًا عروضًا مسرحية عالمية مما يثري المشهد المسرحي في مصر ويسمح للجمهور بتجربة مختلف الأساليب والثقافات المسرحية من جميع أنحاء العالم
                    </p>
                </div>
                <div class="col-md-6 ">
                            <img src="images/plays.jpg" class="img-fluid rounded-5">
                </div>
            </div>
        </div>
    </section>
    <section class="find-us">
         <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <h3>Find<span class="text-danger">US</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="google-map text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3404.1035805801416!2d31.674011475116142!3d31.438815251167718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f9e3ac81f51371%3A0xb99d0c2bc5640f96!2z2YLYtdixINir2YLYp9mB2Kkg2K_ZhdmK2KfYtyDYp9mE2KzYr9mK2K_YqQ!5e0!3m2!1sen!2seg!4v1714742056533!5m2!1sen!2seg" width="600" height="500"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="  w-100 mb-5"></iframe>
                    </div>
                </div>
            </div>
         </div>               
    </section>
</main>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>