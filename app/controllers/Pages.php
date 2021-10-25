<?php
class Pages extends Controller
{
    public function __construct()
    {

        $this->OrderModel = $this->model('order');
        $this->MenuModel = $this->model('menu');
        $this->DashModel = $this->model('dashboard');
        $this->ResModel = $this->model('reservation');
        isValidUser('Kitchen Manager');
    }

    public function index()
    {
        $rescount = $this->DashModel->getResCount();
        $ordcount = $this->DashModel->getOrdCount();
        $data = [
            'rescount' => $rescount,
            'ordcount' => $ordcount
        ];
        $this->view('pages/index', $data);
    }

    public function orders()
    {
        $orders = $this->OrderModel->getorders();
        $data = [
            'orders' => $orders
        ];
        $this->view('pages/orders', $data);
    }

    public function menu()
    {
        $menu = $this->MenuModel->getmenu();
        $data = [
            'menu' => $menu
        ];
        $this->view('pages/menu', $data);
    }

    public function recipe($id)
    {
        $menu_item = $this->MenuModel->getmenuitem();
        $data = [
            'menu_item' => $menu_item,
            'id' => $id
        ];
        $this->view('pages/recipe', $data);
    }

    public function order_details($id)
    {
        $order_details = $this->OrderModel->getOrderDetails();
        $data = [
            'order_details' => $order_details,
            'id' => $id
        ];
        $this->view('pages/order_details', $data);
    }

    public function reservations()
    {
        $res = $this->ResModel->getreservations();
        $data = [
            'res' => $res
        ];
        $this->view('pages/reservations', $data);
    }

    public function update_menu_item($id)
    {
        $menu_item = $this->MenuModel->getmenuitem();
        $data = [
            'menu_item' => $menu_item,
            'id' => $id
        ];
        $this->view('pages/update_menu_item', $data);
    }

    public function add_menu_item()
    {

        $this->view('pages/add_menu_item');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'i_name' => trim($_POST['I_name']),
                'i_ingredients' => trim($_POST['I_ingredients']),
                'i_recipe' => trim($_POST['I_recipe'])
            ];
            $this->MenuModel->add_menu_item($data);
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->MenuModel->deleteMI($id)) {
                redirect('menu');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('menu');
        }
    }

    public function updateStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'status' => trim($_POST['status']),
                'order_id' => $id
            ];
            $this->OrderModel->updateStatus($data);
        }
        $this->order_details($id);
    }
}
