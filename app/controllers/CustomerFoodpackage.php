<?php

class CustomerFoodpackage extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->foodpackageModel = $this->model('FoodPackage');
    }

    public function index()
    {
        $result = $this->foodpackageModel->getFoodPackageIDs($_SESSION['user_id']);
        $data = [];
        if (empty($result))
            $data['createdfoodpackage'] = 0;
        foreach ($result as $r) {
            // print_r($r);
            $items = $this->foodpackageModel->getFoodPackageItems($r->foodPackageID);
            // print_r($items);
            foreach ($items as $i) {
                // print_r($i);
                // echo '<br>';
                $data['createdfoodpackage'][$r->foodPackageID][$i->menuItemID] = $i;
            }
        }

        $this->view('customerFoodpackage', $data);
    }
    public function loadAdd()
    {
        $this->view('createNewFoodpkg');
    }

    public function addItems()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // die('successful');
            // Init data
            $data = [
                'product_id' => trim($_POST['menuItemID']),
                'product_name' => trim($_POST['productName']),
                'product_small' => trim($_POST['priceSmall']),
                'product_medium' => trim($_POST['priceMedium']),
                'product_large' => trim($_POST['priceLarge']),
                'product_amount' => trim($_POST['amount']),
                'product_size' => trim($_POST['product_size'])
            ];
            // var_dump($data);
            // die();
            $product_price = 'product_' . strtolower($data['product_size']);
            $data['product_price'] = $data[$product_price];
            // print_r($data);
            // echo '<br>';
            // foreach ($_SESSION['foodPackage'] as $p) {
            //     print_r($p);
            //     echo '<br>';
            // }
            // die();
            if (isset($_SESSION['foodPackage']) && count($_SESSION['foodPackage']) != 0) {
                // $item_arr_id = array_column($_SESSION['cart'], 'product_id');
                //product in
                $t = 0; // t = 1 -> item new t = 2-> item already in

                foreach ($_SESSION['foodPackage'] as $p) {
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
                    $count = max(array_keys($_SESSION['foodPackage'])) + 1;
                    // print_r($_SESSION['cart']);
                    // die();
                    $item_array = array(
                        'product_id' => $data['product_id'],
                        'product_name' => $data['product_name'],
                        'product_amount' =>  $data['product_amount'],
                        'product_size' =>  $data['product_size'],
                        'product_price' => $data['product_price']

                    );
                    $_SESSION['foodPackage'][$count] = $item_array;
                    $_SESSION['success'] = "The item is added to the food package";
                    header("Location: " . URLROOT . '/customerFoodpackage/loadAdd');
                    exit();
                } elseif ($t == 2) {
                    $_SESSION['itemAlreadyIn'] = "The item is already in the package";
                    header("Location: " . URLROOT . '/customerFoodpackage/loadAdd');
                    exit();
                }
            } else {
                $item_array = array(
                    'product_id' => $data['product_id'],
                    'product_name' => $data['product_name'],
                    'product_amount' =>  $data['product_amount'],
                    'product_price' => $data['product_price'],
                    'product_size' =>  $data['product_size']
                );
                //create session variable for the cart
                $_SESSION['foodPackage'][0] = $item_array;
                $_SESSION['success'] = "The item is added to the package";
                header("Location: " . URLROOT . '/customerFoodpackage/loadAdd');
                exit();
            }
        }
    }

    public function createNewPackage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // echo "submitted";
            // die('successful');
            // Init data
            $data = [
                'package_name' => trim($_POST['pkgname']),
                'customerID' => trim($_SESSION['user_id'])
            ];

            if ($this->foodpackageModel->insertFoodPackage($data)) {
                foreach ($_SESSION['foodPackage'] as $p) {
                    $data['menuItemID'] = $p['product_id'];
                    $data['portionSize'] = $p['product_size'];
                    $data['amount'] = $p['product_amount'];
                    if ($this->foodpackageModel->insertFoodItems($data)) {
                        continue;
                    } else {
                        $_SESSION['unsuccess'] = "Something went wrong in creating the package";
                        header("Location: " . URLROOT . '/customerFoodpackage/index');
                    }
                }
                unset($_SESSION['foodpackageID']);
                unset($_SESSION['foodPackage']);
                $_SESSION['success'] = "Successfully Created the Package";
                header("Location: " . URLROOT . '/customerFoodpackage/index');
            } else {
                unset($_SESSION['foodpackageID']);
                unset($_SESSION['foodPackage']);
                $_SESSION['unsuccess'] = "Something went wrong in creating the package";
                header("Location: " . URLROOT . '/customerFoodpackage/index');
            }
        }
    }

    public function deleteFoodpackage($id)
    {
        $res = $this->foodpackageModel->deleteFoodPackage($id);
        if ($res) {
            $_SESSION['successDelete'] = "Successfully Deleted the FoodPackage";
        } else {
            $_SESSION['unsuccessDelete'] = "Successfully Deleted the FoodPackage";
        }
        $result = $this->foodpackageModel->getFoodPackageIDs($_SESSION['user_id']);
        $data = [];
        if (empty($result))
            $data['createdfoodpackage'] = 0;
        foreach ($result as $r) {
            // print_r($r);
            $items = $this->foodpackageModel->getFoodPackageItems($r->foodPackageID);
            // print_r($items);
            foreach ($items as $i) {
                // print_r($i);
                // echo '<br>';
                $data['createdfoodpackage'][$r->foodPackageID][$i->menuItemID] = $i;
            }
        }
        echo json_encode($res);
        // $this->view('customerFoodpackage', $data);
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // die('successful');
            // Init data
            $data = [
                'package_id' => trim($_POST['packageID'])
            ];
            $items = $this->foodpackageModel->getFoodPackageItems($data['package_id']);
            foreach ($items as $i) {
                $product_price = 'price' . strtoupper($i->portionSize)[0] . substr($i->portionSize, 1);
                print_r($i->$product_price);

                if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
                    //product in
                    $t = 0; // t = 1 -> item new t = 2-> item already in

                    foreach ($_SESSION['cart'] as $p) {
                        //check if sizes are equal
                        if (
                            $p['product_id'] == $i->menuItemID &&
                            $p['product_size'] == $i->portionSize
                        ) {
                            $t = 2;
                            break;
                        } elseif (
                            ($p['product_id'] != $i->menuItemID)
                        ) {
                            $t = 1;
                        } elseif (($p['product_id'] == $i->menuItemID && $p['product_size'] != $i->portionSize)) {
                            $t = 1;
                        }
                    }
                    if ($t == 1) {
                        $count = max(array_keys($_SESSION['cart'])) + 1;
                        // print_r($_SESSION['cart']);
                        // die();
                        $item_array = array(
                            'product_id' =>$i->menuItemID,
                            'product_name' =>  $i->ItemName,
                            'product_amount' =>  $i->noOfServings,
                            'product_size' =>  $i->portionSize,
                            'product_price' => $i->$product_price,
                            'product_special_instructions' => ""

                        );
                        // print_r($item_array);
                        // die();
                        $_SESSION['cart'][$count] = $item_array;
                        // $_SESSION['success'] = "The item is added to the cart";
                        // header("Location: " . URLROOT . '/customerMenu/menu');
                        // exit();
                    } elseif ($t == 2) {
                        // $_SESSION['itemAlreadyIn'] = "The item is already in the cart";
                        // header("Location: " . URLROOT . '/customerMenu/menu');
                        // exit();
                    }
                } else {
                    $item_array = array(
                        'product_id' => $i->menuItemID,
                        'product_name' =>  $i->ItemName,
                        'product_amount' =>  $i->noOfServings,
                        'product_size' =>  $i->portionSize,
                        'product_price' => $i->$product_price,
                        'product_special_instructions' => ""

                    );
                    //create session variable for the cart
                    $_SESSION['cart'][0] = $item_array;
                    
                }
            }
            $_SESSION['success'] = "The foodpackage is added to the cart";
            header("Location: " . URLROOT . '/customerMenu/menu');
            exit();
            
        }
    }
}
