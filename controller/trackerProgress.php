<?php
include_once(__DIR__ . '/../CONFIG/config.php');

include_once(__DIR__ . '/../modles/progress.php');


class progressController
{
    public function listProgress()
    {
        $sql = "SELECT * FROM progress";
        $db = config::getConnexion();
        try {
            return $db->query($sql);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteProgress($id)
    {
        $sql = "DELETE FROM progress WHERE id = :id";
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
        if (!$progress->getId()) {
            throw new Exception('Progress ID is required');
        }

        $sql = "INSERT INTO progress (id, completion_percentage, starting_date, last_active_date) 
                VALUES (:id, :completion_percentage, :starting_date, :last_active_date)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $result = $query->execute([
                'id' => $progress->getId(),
                'completion_percentage' => $progress->getCompletion_percentage(),
                'starting_date' => $progress->getStarting_date(),
                'last_active_date' => $progress->getLast_active_date()
            ]);
            
            if (!$result) {
                throw new Exception('Failed to insert progress record');
            }
            
            return true;
        } catch (Exception $e) {
            throw new Exception('Error adding progress: ' . $e->getMessage());
        }
    }

    function updateProgress($progress, $id)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE progress SET 
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
        $sql = "SELECT * FROM progress WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);

            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showNote($id)
    {
        $sql = "SELECT * FROM notes WHERE  progressId= :id";
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
