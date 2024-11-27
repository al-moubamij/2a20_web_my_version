<?php 
class Score {
    private $questions;
    private $answers;
    private $score = 0;

    public function __construct(Questions $questions, Answers $answers) {
        $this->questions = $questions->attributes; // Extract question attributes
        $this->answers = $answers->attributes;     // Extract answer attributes
    }

    public function calculateScore() {
        $i = 0;
        $j = 0;
        
        while ($i < 5 && $j < 5) { // Loop through attributes
            if ($this->questions->attributes[$i] == $this->answers->attributes[$j]) {
                $this->score++; // Increment score for each correct match
            }
            $i++;
            $j++;
        }

        
    }

    public function getScore() {
        return $this->score; // Return the calculated score
    }
}



?>