<?php
require_once 'models/User.php';
require_once 'models/BranchOrderRequest.php';

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


      public function showOrderRequestForm()
    {
        // Get the list of products and branches
        $productModel = new Product();
        $products = $productModel->getAllProducts();

        $userModel = new User();
        $branches = $userModel->getAllBranches();

        // Load the view for order request form
        require 'views/branch_manager/order_request_form.php';
    }

    // Save the branch order request
    public function saveOrderRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $branchId = $_POST['branch_id'];
            

            // Create a new BranchOrderRequest model instance and save the order
            $branchOrderRequestModel = new BranchOrderRequest();
            $branchOrderRequestModel->createOrderRequest($productId, $quantity, $branchId);

            // Redirect after saving the request
            header('Location: index.php?page=branch-manager-orders');
            exit;
        }
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
        $orders = $orderModel->getDailyOrders(); 
        $this->sendOrdersToHeadOffice($orders);
    }

    private function sendOrdersToHeadOffice($orders)
    {
        echo "Sending the following orders to the Head Office: ";
        print_r($orders);
    }

 
}
