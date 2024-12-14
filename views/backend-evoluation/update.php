<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../phpmailer/src/Exception.php';
require_once __DIR__ . '/../../phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../../phpmailer/src/SMTP.php';
include __DIR__ . '/../../controller/noteController.php';

$id = null;
$full_name = $matiere = $note = $commentaire = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo "<br>received post request<br>";


    $c = new noteController();
    if (!isset($_POST['id'])) {
        echo "ID not received.";
        return;
    } else {
        $id = $_POST['id'];
        $list = $c->show($id);
    }

    // create an instance of the controller
    

    if (
        isset($_POST["full_name"]) && isset($_POST["matiere"]) && isset($_POST["note"]) && isset($_POST["commentaire"])
    ) {
        if (
            !empty($_POST["full_name"]) && !empty($_POST["matiere"]) && !empty($_POST["note"]) && !empty($_POST["commentaire"])
        ) {
            $note = new Note(
                "a" ,
                $_POST['full_name'],
                $_POST['matiere'],
                $_POST['note'],
                $_POST['commentaire'],
                "b"
            );

            $c->updateNote($note, $id);

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth =true;
            $mail->Username = 'mohamedwassim.tlili@utctunisie.com';
            $mail->Password = 'w d k e e l n q r t y x i j p b';    
            $mail->SMTPSecure  = 'ssl';  
            $mail->Port       = '465';      


            $mail->SetFrom('mohamedwassim.tlili@utctunisie.com');

            $mail->addAddress($_POST["full_name"]);
            
            $mail->isHTML(true);
            $mail->Subject = 'GRADES';
            $mail->Body = "SUBJECT :"." ".$_POST["matiere"]."<br>"."GRADE : ".$_POST["note"]."<br>".$_POST["commentaire"];
            $mail->send();
            header('Location:listNote.php');
            
            
            
            exit(); // Always call exit after a redirect
        } else {
            $error = "Missing information";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evaluation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/light-box.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<script>
    function validateForm() {
        var valid = true;
        var full_name = document.forms["gradeForm"]["full_name"].value;
        var matiere = document.forms["gradeForm"]["matiere"].value;
        var note = document.forms["gradeForm"]["note"].value;
        var commentaire = document.forms["gradeForm"]["commentaire"].value;

        // Clear previous error messages
        document.getElementById('full_name_error').innerHTML = '';
        document.getElementById('matiere_error').innerHTML = '';
        document.getElementById('note_error').innerHTML = '';
        document.getElementById('commentaire_error').innerHTML = '';

        // Check if any field is empty
        if (full_name == "" || matiere == "" || note == "" || commentaire == "") {
            if (full_name == "") document.getElementById('full_name_error').innerHTML = 'Full name is required.';
            if (matiere == "") document.getElementById('matiere_error').innerHTML = 'Subject is required.';
            if (note == "") document.getElementById('note_error').innerHTML = 'Grade is required.';
            if (commentaire == "") document.getElementById('commentaire_error').innerHTML = 'Comment is required.';
            valid = false;
        }

        // Check if student name is a number
        if (!isNaN(full_name)) {
            document.getElementById('full_name_error').innerHTML = 'The student name cannot be a number.';
            valid = false;
        }

        // Check if subject (matiere) is a number
        if (!isNaN(matiere)) {
            document.getElementById('matiere_error').innerHTML = 'The subject cannot be a number.';
            valid = false;
        }

        // Check if grade is a valid number between 0 and 100, or if it's text
        if (isNaN(note)) {
            document.getElementById('note_error').innerHTML = 'The grade must be a number.';
            valid = false;
        } else if (note < 0 || note > 100) {
            document.getElementById('note_error').innerHTML = 'The grade must be between 0 and 100.';
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

    <div class="content">
        <div class="dashboard-container">
            <h1>Assign Grades and Comments</h1>

            <?php if ($error != ""): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form name="gradeForm" action="" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <label for="full_name">Student Name:</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($list["full_name"]); ?>" required>
                <span id="full_name_error" style="color: red;"></span>

                <label for="matiere">Subject:</label>
                <input type="text" name="matiere" id="matiere" value="<?php echo htmlspecialchars($list["matiere"]); ?>" required>
                <span id="matiere_error" style="color: red;"></span>

                <label for="note">Grade:</label>
                <input type="number" name="note" id="note" min="0" max="100" value="<?php echo htmlspecialchars($list["note"]); ?>" required>
                <span id="note_error" style="color: red;"></span>

                <label for="commentaire">Comment:</label>
                <textarea name="commentaire" id="commentaire" rows="4" required><?php echo htmlspecialchars($list["commentaire"]); ?></textarea>
                <span id="commentaire_error" style="color: red;"></span>

                <button type="submit" class="btn btn-primary mt-3">Submit Grade</button>
            </form>
        </div>
    </div>

    <div class="footerr">
        <section class="footer">
            <p>Copyright &copy; 2024 Instruvia</p>
        </section>
    </div>
</body>
</html>
