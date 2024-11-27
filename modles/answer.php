<?php
include_once "C:\xampp\htdocs\projetWeb2A20\CONFIG\config.php";
class Answers {
    public $id;
    public $user_id;
    public $attributes = []; // Array to store 5 attributes
    private $pdo;

    public function __construct($pdo, $id) {
        $this->pdo = $pdo; // Database connection
        $this->id = $id;
        $this->fetchAttributes();
    }

    private function fetchAttributes() {
        $query = "SELECT user_id, attr1, attr2, attr3, attr4, attr5 FROM answers WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$this->id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->user_id = $result['user_id'];
            $this->attributes = [
                $result['attr1'],
                $result['attr2'],
                $result['attr3'],
                $result['attr4'],
                $result['attr5']
            ];
        } else {
            throw new Exception("No answers found for ID {$this->id}");
        }
    }
}

?>