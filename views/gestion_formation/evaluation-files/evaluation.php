<?php
include 'C:\xampp\htdocs\projetWeb2A20\controller\noteController.php';
$noteController = new noteController();
$list = $noteController->listNote();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>INSTRUVIA - notetek</title>
        
<!-- 

Sentra Template

https://templatemo.com/tm-518-sentra

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>

    <div class="sidebar">
        <div class="sidebar-navigation hidde-sm hidden-xs">
        <div class="logo">
            <a href="#">Sen<em>tra</em></a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="../index.php">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        Home
                    </a>
                </li>
                
        </nav>
        <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
    </div>
</div>
    <div class="content">
        <div>
            <h1 style="text-align: center;">Your Grades</h1>
            <table>
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row; these rows would be dynamically generated in a real application -->
                    <tr>
                        <td>Mathematics</td>
                        <td>85</td>
                        <td class="grade-pass">Pass</td>
                    </tr>
                    <tr>
                        <td>Science</td>
                        <td>72</td>
                        <td class="grade-pass">Pass</td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td>58</td>
                        <td class="grade-fail">Fail</td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>91</td>
                        <td class="grade-pass">Pass</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        foreach ($list as $offer) {
        ?> 
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                    
                    <img class="img-fluid" src="assets/img/circus.png" alt="..." />
                </div>
                <div class="portfolio-caption" align="center">
            <h4><?php echo $offer['full_name']; ?></h4>
            <p class="text-muted"><?php echo $offer['destination']; ?></p>
            <p class="text-muted">Price: <?php echo $offer['price']; ?> $</p>
          </div>
            </div>
      
            <?php
    }
    ?>

    <div class="footerr">
        <section class="footer">
            <p>Copyright &copy; 2024 Instruvia 
             </p>
        </section>
    </div>

    
</body>
</html>