<?php

include_once(__DIR__ . '/../CONFIG/config.php');
include_once(__DIR__ . '/../modles/note.php');
class noteController
{
    public function listNote()
    {
        $sql = "SELECT * FROM notes";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteNote($id)
    {
        $sql = "DELETE FROM notes WHERE id = :id";
        $db = config::getConnexion();
        /*$req = $db->prepare($sql);
        $req->bindValue(':id', $id);*/

        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addNote($Note)
    {
        // Validation: Ensure Note object contains valid data
        if (empty($Note->getFullName()) || empty($Note->getMatiere()) || empty($Note->getNote())) {
            echo 'All fields are required.';
            return;
        }

        

        var_dump($Note);
        $sql = "INSERT INTO notes  (id, full_name,matiere, note, commentaire, progressId)
        VALUES (:id, :full_name,:matiere, :note, :commentaire ,:progressId)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $Note->getId(),
                'full_name' => $Note->getFullName(),
                'matiere' => $Note->getMatiere(),
                'note' => $Note->getNote(), 
                'commentaire' => $Note->getCommentaire(),
                'progressId' => $Note->getProgressId()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateNote($note, $id)
{
    var_dump($note);
    try {   
        echo "updating<br>";
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE notes SET 
                full_name = :full_name,
                matiere = :matiere,
                note = :note,
                commentaire = :commentaire
                
            WHERE id = :id'
        );

        $query->execute([
            'id' => $id,
            'full_name' => $note->getFullName(),
            'matiere' => $note->getMatiere(),
             'note'=>$note->getNote(),
                'commentaire'=>$note->getCommentaire()
            
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "159 Error: " . $e->getMessage(); 
    }
}

function show($id)
    {
        $sql = "SELECT * from notes where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $note = $query->fetch();
            return $note;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showProgress($id)
    {
        $sql = "SELECT * from notes where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $note = $query->fetch();
            return $note;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}


