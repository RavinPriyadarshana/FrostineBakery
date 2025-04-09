<?php
require_once 'models/User.php';

class BranchManagerController
{
    // View list of cashiers
    public function viewCashiers()
    {
        $userModel = new User();
        $cashiers = $userModel->getCashiers(); // A method to get all cashiers based on role 'Cashier'
        require 'views/branch_manager/cashier_list.php';
    }

    // View a specific cashier
    public function viewCashier($id)
    {
        $userModel = new User();
        $cashier = $userModel->getUserById($id); // Fetch the cashier's details
        require 'views/branch_manager/view_cashier.php';
    }

    // CRUD operations for Cashier
    public function manageCashier($action, $id = null)
    {
        $userModel = new User();
        switch ($action) {
            case 'create':
                require 'views/branch_manager/add_cashier.php';
                break;
            case 'edit':
                $cashier = $userModel->getUserById($id);
                require 'views/branch_manager/edit_cashier.php';
                break;
            case 'delete':
                $userModel->deleteUser($id);
                header('Location: index.php?page=view-cashiers');
                break;
        }
    }

    // View all customers
    public function viewCustomers()
    {
        $userModel = new User();
        $customers = $userModel->getCustomers(); // A method to get all customers
        require 'views/branch_manager/customer_list.php';
    }

    // View a specific customer's orders
    public function viewCustomerOrders($customerId)
    {
        $orderModel = new Order();
        $orders = $orderModel->getOrdersByCustomer($customerId); // Get orders of a customer
        require 'views/branch_manager/customer_orders.php';
    }

    // Send daily branch orders to the head office
    public function sendDailyOrders()
    {
        $orderModel = new Order();
        $orders = $orderModel->getDailyOrders(); // Get the daily orders for the branch
        // Process or send these orders to the head office (e.g., via email or API)
        // Here you can add a method that sends the data
        $this->sendOrdersToHeadOffice($orders);
    }

    private function sendOrdersToHeadOffice($orders)
    {
        // Example function to simulate sending the orders
        // This can be an email, API call, or database entry for the head office
        // For now, we'll simulate that the orders are sent successfully
        echo "Sending the following orders to the Head Office: ";
        print_r($orders);
    }

    public function sendDailyOrders()
    {
        $orderModel = new Order();
        $orders = $orderModel->getDailyOrders(); // Get the daily orders for the branch
        $this->sendOrdersToHeadOffice($orders);
    }
}
