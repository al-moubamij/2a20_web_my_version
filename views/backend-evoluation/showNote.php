<?php
include(__DIR__ .'/../../controller/trackerProgress.php');
include(__DIR__ .'/../../modles/note.php');

$c = new progressController();
$note = $c->showNote($_POST["id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Details</title>
    <style>
        .note-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px auto;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-width: 400px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .note-container:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .note-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-family: Arial, sans-serif;
            color: #333;
            font-size: 13px;
        }

        .note-item strong {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            color: #000;
        }

        .note-item span {
            font-size: 13px;
            color: #555;
        }
    </style>
</head>
<body>
    <?php
    if ($note) {
        echo '<div class="note-container">';
        echo '<div class="note-item"><strong>email:</strong> <span>' . htmlspecialchars($note['full_name']) . '</span></div>';
        echo '<div class="note-item"><strong>Matière:</strong> <span>' . htmlspecialchars($note['matiere']) . '</span></div>';
        echo '<div class="note-item"><strong>Note:</strong> <span>' . htmlspecialchars($note['note']) . '</span></div>';
        echo '<div class="note-item"><strong>Commentaire:</strong> <span>' . htmlspecialchars($note['commentaire']) . '</span></div>';
        echo '</div>';
    } else {
        echo '<div class="note-container">Aucune note trouvée.</div>';
    }
    ?>
</body>
</html>
