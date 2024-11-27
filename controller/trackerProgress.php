<?php
include(__DIR__ . '/../CONFIG/config.php');
include_once(__DIR__ . '/../modles/progress.php');


class progressController
{
    public function listProgress()
    {
        $sql = "SELECT * FROM track_progress";
        $db = config::getConnexion();
        try {
            return $db->query($sql);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteProgress($id)
    {
        $sql = "DELETE FROM track_progress WHERE id = :id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function addProgress($progress)
    {
        // Validation: Ensure progress object contains valid data
        if (empty($progress->getCompletion_percentage()) || empty($progress->getStarting_date()) || empty($progress->getLast_active_date())) {
            echo 'All fields are required.';
            return;
        }

        $sql = "INSERT INTO track_progress (completion_percentage, starting_date, last_active_date) 
                VALUES (:completion_percentage, :starting_date, :last_active_date)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'completion_percentage' => $progress->getCompletion_percentage(),
                'starting_date' => $progress->getStarting_date(),
                'last_active_date' => $progress->getLast_active_date(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateProgress($progress, $id)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE track_progress SET 
                    completion_percentage = :completion_percentage,
                    starting_date = :starting_date,
                    last_active_date = :last_active_date
                    WHERE id = :id";
            
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'completion_percentage' => $progress->getCompletion_percentage(),
                'starting_date' => $progress->getStarting_date(),
                'last_active_date' => $progress->getLast_active_date(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function show($id)
    {
        $sql = "SELECT * FROM track_progress WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);

            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
