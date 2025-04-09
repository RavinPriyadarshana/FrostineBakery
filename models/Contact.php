<?php
class Contact
{

    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    public function saveFeedback($userId, $name, $email, $phone, $message)
    {
        $status = 'Pending';

        $stmt = $this->db->prepare("INSERT INTO feedback (customer_id, status, message, created_at) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $status, $message, date('Y-m-d')]);

    }
}
