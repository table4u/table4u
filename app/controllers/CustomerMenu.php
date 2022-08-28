<?php

class CustomerMenu extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->menuCatModel = $this->model('MenuCategories');
        $this->menuItemModel = $this->model('MenuItems');
    }

    public function index()
    {
        $data = $this->menuCatModel->getMenuCategories();
        $this->view('customerMenu', $data);
    }

    public function menu()
    {
        $data = $this->menuCatModel->getMenuCategories();
        $this->view('customerMenu', $data);
    }

    public function payment()
    {
        $this->view('customerPayment');
    }

    public function loadMenuItems()
    {
        $this->menuItems = $this->menuItemModel->getMenuItems();
        
        header('Content-Type: application/json; charset=utf-8');
        print_r(json_encode($this->menuItems));
        // json_encode($this->menuItems);
        // print_r($this->menuItems);
        // die();
    }

    public function getMenuItems()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'search' => trim($_POST['search']),
            ];
        }
        $result = '';
        $res = $this->menuItemModel->getMenuItemsByName($data);
        if ($res) {
            foreach ($res as $r) {
                // foreach ($r as $d) {
                // print_r($r->ItemName);
                // }
                $result .= '
                    <form action="' . URLROOT . '/customerFoodPackage/addItems" method="POST">
                    
                    <div class="box" style="padding-bottom:0.5rem">
                    <img src="' . URLROOT . '/public/images/' .  $r->picture . '" alt="">

                    <div class="content-container">
                        <h3 style="display: inline;">' . $r->ItemName . '</h3>
                    </div>

                    <div class="sizes">

                        <input class="hidebtn" type="radio" class="product_size" name="product_size" id="small" value="small" required>
                        <label for="small" class="lbl-radio">
                            <div class="display-box">
                                <div class="size">
                                    Small
                                </div>
                                <div class="price">' . $r->priceSmall  . ' LKR
                                </div>
                            </div>
                        </label>

                        <input class="hidebtn" type="radio" class="product_size" name="product_size" id="medium" value="medium" required>
                        <label for="medium" class="lbl-radio">
                            <div class="display-box">
                                <div class="size">
                                    Medium
                                </div>
                                <div class="price">' . $r->priceMedium . ' LKR </div>
                            </div>
                        </label>

                        <input class="hidebtn" type="radio" class="product_size" name="product_size" id="large" value="large" required>
                        <label for="large" class="lbl-radio">
                            <div class="display-box">
                                <div class="size">
                                    Large
                                </div>
                                <div class="price">' . $r->priceLarge . ' LKR </div>
                            </div>
                        </label>
                    </div>
                    <div id="amount" class="amount">
                        <label for="quant">Amount: </label>
                        <input type="number" name= "amount" value="1" min="1" max="10">
                    </div>
                    
                    <input type="hidden" name="menuItemID" value="' . $r->menuItemID . '">
                    <input type="hidden" name="productName" value="' . $r->ItemName . '">
                    <input type="hidden" name="priceSmall" value="' . $r->priceSmall . '">
                    <input type="hidden" name="priceMedium" value="' . $r->priceMedium . '">
                    <input type="hidden" name="priceLarge" value="' . $r->priceLarge . '">
                    <div id="addToCart">
                        <input style="background-color:white;" class="btn addToCart" type="submit" value="Add to Food Package"> 
                    </div>
                    </form>
                </div>';
            }
            echo $result;
        } else {
            echo 'No Menu Items';
            // print_r($res);
        }
    }

    public function createNewPackage()
    {
    }
}
