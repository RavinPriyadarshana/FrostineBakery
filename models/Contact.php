<?php
class Contact {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function saveContactDetails($name, $email, $phone, $message) {
        // Prepare the SQL statement to insert the contact details
        $sql = "INSERT INTO feedback (name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        // Execute the query with user data
        try {
            $stmt->execute([$name, $email, $phone, $message]);
            return true; // Data inserted successfully
        } catch (Exception $e) {
            // Handle any errors here
            return false;
        }
    }
}
