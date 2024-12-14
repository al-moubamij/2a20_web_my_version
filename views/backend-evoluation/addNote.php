<?php
//include 'C:\xampp\htdocs\projetWeb2A20\controller\noteController.php';
include __DIR__ . '/../../controller/noteController.php';
include __DIR__ . '/../../controller/trackerProgress.php';
$error = "";
$note = NULL;
// create an instance of the controller
$noteController = new noteController();
$progressController = new progressController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate each input field
    $id = $_POST["id"];
    $full_name = $_POST["full_name"];
    $matiere = $_POST["matiere"];
    $note_value = $_POST["note"];
    $commentaire = $_POST["commentaire"];
    $progressId= $id.$full_name;

        // Check if the fields are not empty
    if (empty($full_name) || empty($matiere) || empty($note_value) || empty($commentaire)) {
        $error = "All fields are required!";
    } elseif (is_numeric($matiere)) {
        // Check if the subject is a number
        $error = "The subject cannot be a number.";
    } elseif (!is_numeric($note_value) || $note_value < 0 || $note_value > 100) {
        // Check if the grade is a number between 0 and 100
        $error = "The grade must be a number between 0 and 100.";
    } else {
        // If all checks pass, create the Note object and add it
        /**/

       $progress = new progress(
            $progressId,
            0.0,
            new DateTime(),
            new DateTime()
        );
        $note = new Note(
            $id,
            $full_name,
            $matiere,
            $note_value,
            $commentaire,
            $progressId
        );
        // Call the addNote method of noteController
        
        $progressController->addProgress($progress);
        $noteController->addNote($note);
        
        // Redirect to the list of notes
        header('Location:listNote.php');
        exit;
        //$t=$noteController->show($note);echo t["id"];
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
   <script>
    function validateForm() {
    var valid = true;
    var full_name = document.forms["gradeForm"]["full_name"].value;
    var matiere = document.forms["gradeForm"]["matiere"].value;
    var note = document.forms["gradeForm"]["note"].value;
    var commentaire = document.forms["gradeForm"]["commentaire"].value;

    // Clear previous error messages and remove error borders
    document.getElementById('full_name_error').innerHTML = '';
    document.getElementById('matiere_error').innerHTML = '';
    document.getElementById('note_error').innerHTML = '';
    document.getElementById('commentaire_error').innerHTML = '';
    document.getElementById('student').classList.remove('error-border');

    // Check if any field is empty
    if (full_name == "" || matiere == "" || note == "" || commentaire == "") {
        if (full_name == "") {
            document.getElementById('full_name_error').innerHTML = 'Email is required.';
            document.getElementById('student').classList.add('error-border');
        }
        if (matiere == "") document.getElementById('matiere_error').innerHTML = 'Subject is required.';
        if (note == "") document.getElementById('note_error').innerHTML = 'Grade is required.';
        if (commentaire == "") document.getElementById('commentaire_error').innerHTML = 'Comment is required.';
        valid = false;
    }

    // Check if full_name is a valid email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(full_name)) {
        document.getElementById('full_name_error').innerHTML = 'Please enter a valid email address.';
        document.getElementById('student').classList.add('error-border');
        valid = false;
    }

    // Check if subject (matiere) is a number
    if (!isNaN(matiere)) {
        document.getElementById('matiere_error').innerHTML = 'The subject cannot be a number.';
        valid = false;
    }

    // Check if grade is a valid number between 0 and 100
    if (isNaN(note) || note < 0 || note > 100) {
        document.getElementById('note_error').innerHTML = 'The grade must be a number between 0 and 100.';
        valid = false;
    }

    // Check if comment (commentaire) is a number
    if (!isNaN(commentaire)) {
        document.getElementById('commentaire_error').innerHTML = 'The comment cannot be a number.';
        valid = false;
    }

    return valid;  // Proceed with form submission if valid
}

</script>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-navigation hidde-sm hidden-xs">
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
            <h1>Assign Grades and Comments</h1>
            <form name="gradeForm" action="" method="POST" onsubmit="return validateForm()">
                
            
                <label for="student Id">Id</label>
                <input type="text" name="id" id="id" required>
                <span id="id_error" class="error-message"></span>
            
                <label for="student name">full name</label>
                <input type="text" name="full_name" id="student" required>
                <span id="full_name_error" class="error-message"></span>
        
                <label for="subject">Subject</label>
                <input type="text" name="matiere" id="subject" required>
                <span id="matiere_error" class="error-message"></span>
        
                <label for="grade">Grade:</label>
                <input type="number" name="note" id="grade" min="0" max="100" required>
                <span id="note_error" class="error-message"></span>
        
                <label for="comment">Comment:</label>
                <textarea name="commentaire" id="commentaire" rows="4" placeholder="Enter comment"></textarea>
                <span id="commentaire_error" class="error-message"></span>
        
                <button type="submit">Submit Grade</button>
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
