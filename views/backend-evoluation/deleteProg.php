<?php
include __DIR__ . '/../../controller/trackerProgress.php';
$c = new progressController();

if (isset($_POST["id"])) {
    try {
        // Debugging: Verify ID received
        var_dump($_POST["id"]); // Remove this after testing
        $c->deleteProgress($_POST["id"]);

        // Redirect after deletion
        header('Location: listProgress.php');
        exit;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
} else {
    die('No ID provided for deletion.');
}
?>
