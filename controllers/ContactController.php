<?php
require_once 'models/Contact.php';


class ContactController {

    private $contactModel;

    public function __construct($pdo) {
        $this->contactModel = new Contact($pdo);
    }

    public function saveContactDetails() {
        // Check if the form is submitted via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize user inputs
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $message = htmlspecialchars($_POST['message']);
            
            $isSaved = $this->contactModel->saveContactDetails($name, $email, $phone, $message);
            
            // If successful, redirect to the thank you page
            if ($isSaved) {
                header('Location: thank_you.php');
                exit();
            } else {
                echo "There was an error saving your message. Please try again.";
            }
            // Redirect to a thank you or confirmation page after submission
            header('Location: thank_you.php');
            exit();
        }
    }
}
