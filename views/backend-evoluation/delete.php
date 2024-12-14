<?php
include __DIR__ . '/../../controller/noteController.php';
$c = new noteController();

if (isset($_POST["id"])) {
    try {
        // Debugging: Verify ID received
        var_dump($_POST["id"]); // Remove this after testing
        $c->deleteNote($_POST["id"]);

        // Redirect after deletion
        header('Location: listNote.php');
        exit;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
} else {
    die('No ID provided for deletion.');
}
?>
