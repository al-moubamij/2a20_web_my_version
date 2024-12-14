<?php
include(__DIR__ .'/../../controller/trackerProgress.php');

$error = "";
$progress = NULL;
// create an instance of the controller
$progressController = new progressController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate each input field
    $completion_percentage = $_POST["completion_percentage"];
    $starting_date = $_POST["starting_date"];
    $last_active_date = $_POST["last_active_date"];
    $id = $_POST["id"];
    // Check if the fields are not empty
    if (empty($completion_percentage) || empty($starting_date) || empty($last_active_date)) {
        $error = "All fields are required!";
    } else {
        
            $progress = new progress(
                $id,
                $completion_percentage,
                new DateTime($starting_date), // Format it to 'YYYY-MM-DD HH:MM:SS'
                new DateTime($last_active_date) // Format it to 'YYYY-MM-DD HH:MM:SS'
            );

        
        // Call the addNote method of noteController
        $progressController->addProgress($progress);

        // Redirect to the list of notes
        header('Location:listProgress.php');
        exit;
    }
    
}

// Display error message if there's an error
if ($error) {
    echo "<div class='error'>$error</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/light-box.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
 

<body>
   
    <!-- Content -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/light-box.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-navigation hidden-sm hidden-xs">
            <div class="logo">
                <a href="#">Sen<em>tra</em></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#top">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Home
                        </a>
                    </li>
                </ul>
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

    <!-- Content -->
    <div class="content">
        <div class="dashboard-container">
            <h1>Track Progress</h1>
            <form name="progressForm" action="" method="POST">

                <!-- Completion Percentage -->
                <label for="completion_percentage">Id</label>
                <input type="number" name="id" id="completion_percentage"  required>
                <span id="completion_percentage_error" class="error-message"></span>

                <label for="completion_percentage">Completion Percentage:</label>
                <input type="number" name="completion_percentage" id="completion_percentage"  required>
                <span id="completion_percentage_error" class="error-message"></span>

                <!-- Starting Date -->
                <label for="starting_date">Starting Date:</label>
                <input type="date" name="starting_date" id="starting_date" required>
                <span id="starting_date_error" class="error-message"></span>

                <!-- Last Active Date -->
                <label for="last_active_date">Last Active Date:</label>
                <input type="date" name="last_active_date" id="last_active_date" required>
                <span id="last_active_date_error" class="error-message"></span>

                <!-- Submit Button -->
                <button type="submit">Submit Progress</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footerr">
        <section class="footer">
            <p>Copyright &copy; 2024 Instruvia</p>
        </section>
    </div>
</body>
</html>

    </div>

    <!-- Footer -->
    <div class="footerr">
        <section class="footer">
            <p>Copyright &copy; 2024 Instruvia</p>
        </section>
    </div>
</body>
</html>
