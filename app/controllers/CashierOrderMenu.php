<?php
class CashierOrderMenu extends Controller
{
    public function __construct()
    {
        isValidUser('Cashier');
        $this->orderModel = $this->model('MenuItems');
        $this->menuCatModel = $this->model('Menu_Categories');
    }

    public function index()
    {
        $data = $this->orderModel->showmenuItems();
        $this->view('cashierOrderMenu', $data);
        // $this->view('cashierOrderMenu');
    }

    public function showOrderDetails()
    {
        $this->view('cashierOrderDetails');
    }
    public function searchMenuItem($filtervalues)
    {
        $this->db->query("SELECT * FROM menu_item
        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
        WHERE CONCAT(menu_item.name,menu_item.veg_NonVeg ) LIKE '%$filtervalues%' ");
        $row = $this->db->resultSet();
        //print_r($row);
        //die();
        return $row;
    }


    public function loadMenuItems()
    {
        $this->menuItem = $this->orderModel->getMenuItems();

        header('Content-Type: application/json; charset=utf-8');
        print_r(json_encode($this->menuItem));
    }

    public function addOrderMenuItems()
    {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        if ($this->orderModel->addOrderMenuItems($id, $size, $quantity)) {
            return true;
        } else {
            return false;
        }
    }


    public function showMaincourse()
    {
        $data = $this->orderModel->getMaincourse();
        // $this->view('cashierOrderMenu_maincourse', $data);
        $this->view('cashierMaincourse1', $data);
    }

    public function showDessert()
    {
        $data = $this->orderModel->getDessert();
        $this->view('cashierOrders_dessert', $data);
    }

    public function showDrinks()
    {
        $data = $this->orderModel->getDrinks();
        $this->view('cashierOrders_dessert', $data);
    }

    public function showOrderDetailsDeleted()
    {
        $this->view('cashierOrderDetails_del');
    }

    public function backtoHome()
    {
        $this->view('cashierHome');
    }

    public function paybyCash($total, $recived)
    {
        $data = [
            'total' => $total,
            'recived' => $recived
        ];
        $this->view('cashierCashPay', $data);
    }

    public function paybyCard()
    {
        $this->view('cashierCardPay');
    }

    public function gotoProfile()
    {
        // $this->view('');  
    }

    public function showApertizers()
    {
        $data = $this->orderModel->showApertizers();
        $this->view('cashierOrderMenu', $data);
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header("Location: " . URLROOT . '/login');
    }
}
