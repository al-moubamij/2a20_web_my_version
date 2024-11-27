<?php
class progress {
    private int $id;
    private float $completion_percentage;
    private DateTime $starting_date;
    private DateTime $last_active_date;

    public function __construct(int $id, float $completion_percentage, DateTime $starting_date, DateTime $last_active_date) {
        
        $this->id = $id;
        $this->completion_percentage = $completion_percentage;
        $this->starting_date = $starting_date;
        $this->last_active_date = $last_active_date;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getCompletion_percentage(): float {
        return $this->completion_percentage;
    }

    public function getStarting_date(): string {
        return $this->starting_date->format('Y-m-d');
    }

    public function getLast_active_date(): string {
        return $this->last_active_date->format('Y-m-d');
    }

    // Setters
   

    // Show method
    public function show(): void {
        echo "ID: {$this->id}\n";
        echo "completion_percentage: {$this->completion_percentage}\n";
        echo "Starting Date: {$this->starting_date->format('Y-m-d')}\n";
        echo "Last Active Date: {$this->last_active_date->format('Y-m-d')}\n";
    }
}
?>
