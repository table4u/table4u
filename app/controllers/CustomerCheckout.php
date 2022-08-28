<?php
class CustomerCheckout extends Controller
{
    public function __construct()
    {
        $this->customerOrderModel = $this->model('CustomerOrder');
        $this->menuItemModel = $this->model('MenuItems');
    }

    public function index()
    {
        $data = [
            'product_id' => "",
            'product_name' => ""
        ];
        $this->view('customerCart', $data);
    }

    public function checkTableReservation()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // echo "hello in";
            // die();
            // if(isset($_SESSION['']))
            // $this->view('customerCart');
            if (isset($_SESSION['reservationID'])) {
                // $this->view('customerTableLayout');  

                $this->placeOrder();
            } else {
                $_SESSION['noReservation'] = "Please reserve a table before checking out";
                // header("Location: " . URLROOT . '/customerReservations/reservationDetails');
                $this->view('custTableLayout');
            }
        }
    }

    public function placeOrder()
    {
        // $data['reservationID'] = $_SESSION['reservationID'];
        if ($this->checkAvailabiltyOfItems() == false) {
            header("Location: " . URLROOT . '/customerMenu/menu');
            exit();
        }
        if ($this->customerOrderModel->addOrder()) {
            $data['orderID'] = $_SESSION['orderID'];

            foreach ($_SESSION['cart'] as $c) {
                print_r($c);
                $data['menuItemID'] = $c['product_id'];
                $data['noOfServings'] = $c['product_amount'];
                $data['portionSize'] = $c['product_size'];
                $data['specialNotes'] = $c['product_special_instructions'];
                if ($this->customerOrderModel->addOrderItemDetails($data)) {
                    continue;
                } else {
                    // unset($_SESSION['reservationID']);
                    unset($_SESSION['orderID']);
                    // unset($_SESSION['cart']);
                    $_SESSION['unsuccess'] = "Something went wrong in checking out";
                    header("Location: " . URLROOT . '/customerHome');
                }
            }
            $total = $this->calculateTotal();
            // echo $total;
            // die();
            $this->customerOrderModel->addPayment($total);
            unset($_SESSION['orderID']);
            unset($_SESSION['reservationID']);
            unset($_SESSION['cart']);
            $_SESSION['success'] = "Successfully placed the order";
            header("Location: " . URLROOT . '/customerMenu/menu');
            // header("Location: " . URLROOT . '/customerFoodpackage/index');
        } else {
            $_SESSION['unsuccess'] = "Something went wrong in checking out";
            header("Location: " . URLROOT . '/customerHome');
        }
    }

    public function checkAvailabiltyOfItems()
    {
        $t = 0;
        // print_r("in meyhod");
        // die();
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($this->menuItemModel->checkAvailability($value['product_id'])) {
                continue;
            } else {
                unset($_SESSION['cart'][$key]);
                if ($t)
                    $_SESSION['notAvailable'] .= 'The item ' . $value['product_name'] . " is no longer available. ";
                else
                    $_SESSION['notAvailable'] = 'The item ' . $value['product_name'] . " is no longer available. ";

                $t = 1;
            }
        }

        if ($t == 0) {
            return true;
        } else {
            return false;
        }
    }

    private function calculateTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $c) {
            // print_r($c);
            $total += $c['product_amount'] * $c['product_price'];
        }
        $tax = $total * 0.05;
        $total = $total + $tax;
        return $total;
    }
}
