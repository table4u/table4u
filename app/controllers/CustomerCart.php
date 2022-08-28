<?php
class CustomerCart extends Controller
{
    public function __construct()
    {
        $this->customerOrderModel = $this->model('CustomerOrder');
    }

    public function index()
    {
        $data = [
            'product_id' => "",
            'product_name' => ""
        ];
        $this->view('customerCart', $data);
    }

    public function loadCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'product_id' => trim($_POST['product_id']),
                'product_name' => trim($_POST['product_name']),
                'product_small' => trim($_POST['product_small']),
                'product_medium' => trim($_POST['product_medium']),
                'product_large' => trim($_POST['product_large']),
                'product_description' => trim($_POST['product_description']),
                'product_picture' => trim($_POST['product_picture']),

            ];
            $this->view('customerCart', $data);
        }
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // die('successful');
            // Init data
            $data = [
                'product_id' => trim($_POST['product_id']),
                'product_name' => trim($_POST['product_name']),
                'product_small' => trim($_POST['product_small']),
                'product_medium' => trim($_POST['product_medium']),
                'product_large' => trim($_POST['product_large']),
                'product_description' => trim($_POST['product_description']),
                'product_picture' => trim($_POST['product_picture']),
                'product_amount' => trim($_POST['amount']),
                'product_size' => trim($_POST['product_size']),
                'special_instructions' => trim($_POST['instructions']),
                'order_id' => trim($_POST['order_id'])

            ];
            // var_dump($data);
            // die();
            $product_price = 'product_' . strtolower($data['product_size']);
            $data['product_price'] = $data[$product_price];
            // print_r($data);
            // echo '<br>';
            // foreach ($_SESSION['cart'] as $p) {
            //     print_r($p);
            //     echo '<br>';
            // }
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
                // $item_arr_id = array_column($_SESSION['cart'], 'product_id');
                //product in
                $t = 0; // t = 1 -> item new t = 2-> item already in

                foreach ($_SESSION['cart'] as $p) {
                    //check if sizes are equal
                    if (
                        $p['product_id'] == $data['product_id'] &&
                        $p['product_size'] == $data['product_size']
                    ) {
                        $t = 2;
                        break;
                    } elseif (
                        ($p['product_id'] != $data['product_id'])
                    ) {
                        $t = 1;
                    } elseif (($p['product_id'] == $data['product_id'] && $p['product_size'] != $data['product_size'])) {
                        $t = 1;
                    }
                }
                if ($t == 1) {
                    $count = max(array_keys($_SESSION['cart'])) + 1;
                    // print_r($_SESSION['cart']);
                    // die();
                    $item_array = array(
                        'product_id' => $data['product_id'],
                        'product_name' => $data['product_name'],
                        'product_amount' =>  $data['product_amount'],
                        'product_size' =>  $data['product_size'],
                        'product_price' => $data['product_price'],
                        'product_special_instructions' => $data['special_instructions']

                    );
                    $_SESSION['cart'][$count] = $item_array;
                    $_SESSION['success'] = "The item is added to the cart";
                    header("Location: " . URLROOT . '/customerMenu/menu');
                    exit();
                } elseif ($t == 2) {
                    $_SESSION['itemAlreadyIn'] = "The item is already in the cart";
                    header("Location: " . URLROOT . '/customerMenu/menu');
                    exit();
                }
            } else {
                $item_array = array(
                    'product_id' => $data['product_id'],
                    'product_name' => $data['product_name'],
                    'product_amount' =>  $data['product_amount'],
                    'product_price' => $data['product_price'],
                    'product_size' =>  $data['product_size'],
                    'product_special_instructions' => $data['special_instructions']
                );
                //create session variable for the cart
                $_SESSION['cart'][0] = $item_array;
                $_SESSION['success'] = "The item is added to the cart";
                header("Location: " . URLROOT . '/customerMenu/menu');
                exit();
            }
        }
    }

    public function removeItemFromCart($id, $size)
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $id && $value['product_size'] == $size) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['deletedItem'] = "The Item was deleted successfully";

                // break;
            }
        }
        // return false;
        echo json_encode(true);
    }

    public function displayCart()
    {
        $this->view('customerCartFull');
    }
}
