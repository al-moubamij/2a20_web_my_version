<?php

include(__DIR__ .'/../../controller/trackerProgress.php');
$controller = new progressController();
$id = null;
$completion_percentage = $starting_date = $last_active_date  = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['id'])) {
        echo "ID not received.";
        return;
    } else {
        $id = (int)$_POST['id'];
    }


    if (
        isset($_POST["completion_percentage"]) && isset($_POST["starting_date"]) && isset($_POST["last_active_date"])
        ) {
        if (
            !empty($_POST["completion_percentage"]) && !empty($_POST["starting_date"]) && !empty($_POST["last_active_date"]) 
            ) {
            $prog = new progress(
                $id,
                $_POST['completion_percentage'],
                new DateTime($_POST['starting_date']),
                new DateTime($_POST['last_active_date'])
            );

            $controller->updateProgress($prog, $id);
            header('Location:listProgress.php');
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
    <title>Update Progress</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .dashboard-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .alert {
            margin-bottom: 15px;
        }
        label {
            margin-top: 10px;
        }
        .footerr {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Update Progress</h1>

        <?php if ($error != ""): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form name="upd-prog" action="" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <label for="completion_percentage">Completion Percentage:</label>
            <input type="number" name="completion_percentage" id="completion_percentage" min="0" max="100" class="form-control"
                   value="<?php echo htmlspecialchars($completion_percentage); ?>" required>

            <label for="starting_date">Starting Date:</label>
            <input type="date" name="starting_date" id="starting_date" class="form-control"
                   value="<?php echo htmlspecialchars($starting_date); ?>" required>

            <label for="last_active_date">Last Active Date:</label>
            <input type="date" name="last_active_date" id="last_active_date" class="form-control"
                   value="<?php echo htmlspecialchars($last_active_date); ?>" required>

            <button type="submit" class="btn btn-primary mt-3">Update Progress</button>
        </form>
    </div>

    <div class="footerr">
        <section class="footer">
            <p>Copyright &copy; 2024 Instruvia</p>
        </section>
    </div>
</body>
</html>

