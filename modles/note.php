<?php
class Note {
    private string $id;
    private string $full_name;
    private string $matiere;
    private int $note;
    private string $commentaire;
    private string $progress;

    public function __construct(string $id, string $full_name, string $matiere, int $note, string $commentaire,string $progress) {
        if ($note < 0 || $note > 100) {
            throw new InvalidArgumentException("Grade must be between 0 and 100.");
        }
        $this->id = $id;
        $this->full_name = $full_name;
        $this->matiere = $matiere;
        $this->note = $note;
        $this->commentaire = $commentaire;
        $this->progress = $progress;
    }

    // Getters
    public function getId(): string {
        return $this->id;
    }

    public function getFullName(): string {
        return $this->full_name;
    }

    public function getMatiere(): string {
        return $this->matiere;
    }

    public function getNote(): int {
        return $this->note;
    }

    public function getCommentaire(): string {
        return $this->commentaire;
        }

    public function getProgressId(): string {
        return $this->progress;
    }

    // Setters
    public function setNote(int $note): void {
        if ($note < 0 || $note > 100) {
            throw new InvalidArgumentException("Grade must be between 0 and 100.");
        }
        $this->note = $note;
    }

    public function setCommentaire(string $commentaire): void {
        $this->commentaire = $commentaire;
        }

    // Show method
    public function show(): void {
        echo "ID: {$this->id}\n";
        echo "Full Name: {$this->full_name}\n";
        echo "Subject: {$this->matiere}\n";
        echo "Grade: {$this->note}\n";
        echo "Comment: {$this->commentaire}\n";
        echo "Progress: {$this->progress}\n";
    }
}
?>
