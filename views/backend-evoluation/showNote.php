<?php
include(__DIR__ .'/../../controller/trackerProgress.php');
include(__DIR__ .'/../../modles/note.php');


$c = new progressController();
$note = $c->showNote($_POST["id"]);

if ($note) {
    echo $note['full_name']; // Remplace 'full_name' par le nom exact de ta colonne
} else {
    echo 'Aucune note trouvée.';
}


?>