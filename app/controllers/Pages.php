<?php
    class Pages extends Controller{
        public function __construct(){ 
            $this->OrderModel = $this->model('order');
            $this->MenuModel = $this->model('menu');
            $this->ResModel = $this->model('reservation');
            $this->DashModel = $this->model('dashboard');
        }

        public function index(){
            $rescount = $this->DashModel->getResCount();
            $ordcount = $this->DashModel->getOrdCount();
            $upordcount = $this->DashModel->getUpOrdCount();
            $preordcount = $this->DashModel->getPreOrdCount();
            $finordcount = $this->DashModel->getFinOrdCount();
            $data = [
                'rescount' => $rescount ,
                'ordcount' =>$ordcount,
                'upordcount' => $upordcount,
                'preordcount' => $preordcount,
                'finordcount' => $finordcount,
                'title' => "Dashboard"
            ];
            $this->view('pages/index', $data);
        }


        public function orders(){
            $orders = $this->OrderModel->getorders();
            $finished = $this->OrderModel->getfinishedorders();
            $ASAP = $this->OrderModel->getASAPorders(); 
            $prep = $this->OrderModel->getpreporders();
            $urgordcount = $this->OrderModel->getUrgOrdCount();
            $data = [
                'orders' => $orders,
                'finished' => $finished,
                'ASAP' => $ASAP,
                'prep' => $prep,
                'urgordcount' => $urgordcount,
                'title' => "Orders"
            ];
            $this->view('pages/orders', $data);
        }

        public function menu(){
            $menu = $this->MenuModel->getmenu();
            $menuT = $this->MenuModel->get_menu();
            $data = [
                'menu' => $menu,
                'menuT' => $menuT,
                'title' => "Menu"
            ];
            $this->view('pages/menu', $data);
        }

        public function recipe($id){
            $menu_item = $this->MenuModel->getmenuitem();
            $data = [
                'menu_item' => $menu_item,
                'id' => $id,
                'title' => "Recipe"
            ];
            $this->view('pages/recipe', $data);
        }
        public function recipe_O($id,$OID,$Ostatus){
            $menu_item = $this->MenuModel->getmenuitem();
            $data = [
                'menu_item' => $menu_item,
                'id' => $id,
                'OID' => $OID,
                'Ostatus' => $Ostatus,
                'title' => "Recipe"
            ];
            $this->view('pages/recipe_O', $data);
        }
        
        public function order_details($id,$status){
            $order_details = $this->OrderModel->getOrderDetails();
            $data = [
                'order_details' =>$order_details,
                'id' => $id,
                'status' => $status,
                'title' => "Order Details"
            ];
            $this->view('pages/order_details', $data);
        }

        public function reservations(){
            $res = $this->ResModel->getreservations();
            $resOrd = $this->OrderModel->getOrd();
            $data = [
                'res' => $res,
                'resOrd' => $resOrd,
                'title' => "Reservations"
            ];
            $this->view('pages/reservations', $data);
        }

        public function update_menu_item($id){
            $menu_item = $this->MenuModel->getmenuitem();
            $menuT = $this->MenuModel->get_menu();
            $menu_type = $this->MenuModel->get_menuT($id);

             $data = [
                'menu_item' => $menu_item,
                'id' => $id,
                'menuT' => $menuT,
                'menu_type' => $menu_type,
                'title' => "Update"
            ];
            
            $this->view('pages/update_menu_item', $data);
        }

        public function add_menu_item(){

            $menuT = $this->MenuModel->get_menu();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $avail = "3";
                // if(!isset($_POST['I_avail'])){
                //     $avail="0";
                // } else {
                //     $avail = trim($_POST['I_avail']);
                // }
                $filename = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];    
                $folder = "images/".$filename;
                move_uploaded_file($tempname, $folder);
                $data = [
                    'i_name' => trim($_POST['I_name']),
                    'i_ingredients' => trim($_POST['I_ingredients']),
                    'i_recipe' => trim($_POST['I_recipe']),
                    'i_veg' => trim($_POST['I_veg']),
                    'i_menuT' => trim($_POST['I_menuT']),
                    'i_cost_s' => trim($_POST['I_cost_s']),
                    'i_cost_m' => trim($_POST['I_cost_m']),
                    'i_cost_l' => trim($_POST['I_cost_l']),
                    'i_avail' => $avail,
                    'i_image' => $filename,
                    'title' => "Add Menu Item",
                    'menuT' => $menuT
                ];
                if($this->MenuModel->checkFoodName($data['i_name'])){
                    if(is_numeric($data['i_cost_s']) && is_numeric($data['i_cost_m']) && is_numeric($data['i_cost_l'])){
                    if($this->MenuModel->add_menu_item($data)){
                        // popup_success();
                        // $_SESSION['successMsg'] = "New Item Added successfully";
                        // popup($_SESSION['successMsg']);
                        echo '<script type="text/javascript">
    
                window.onload = function () { alert("waiting for restaurent manager to accept"); }
    
    </script>';
                        $this->MenuModel->add_menu_type($data);
                    } else {
                        // $_SESSION['successMsg'] = "Failed to insert new item";
                        // popup($_SESSION['successMsg']);
                        echo '<script type="text/javascript">
    
                window.onload = function () { alert("Failed to insert new item"); }
    
    </script>';
                        die('something went wrong');
                    } 
                } else {
                    echo '<script type="text/javascript">
    
                    window.onload = function () { alert("Enter valid cost"); }
        
        </script>'; 
                }
                } else {
                    echo '<script type="text/javascript">
    
                    window.onload = function () { alert("Menu Item already exsist"); }
        
        </script>'; 
                }
                
            } else {
                $data = [
                    'title' => "Add Menu Item",
                    'menuT' => $menuT
                ];
            }
            $this->view('pages/add_menu_item', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                if($this->MenuModel->deleteMI($id)){
                    echo '<script type="text/javascript">

            window.onload = function () { alert("Menu item Removed"); }

</script>';
                    $this->menu();
                } else {
                    echo '<script type="text/javascript">

            window.onload = function () { alert("something went wrong"); }

</script>';
                    die('something went wrong');
                }
            } else {
                $this->menu();
            }
        }

        public function updateStatus($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'status' => trim($_POST['status']),
                    'order_id' => $id
                ];
                $this->OrderModel->updateStatus($data);
            }
            $this->order_details($id,$data['status']);
        }

        public function update($id,$current_availability){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($_POST['I_avail'])){
                    $avail = trim($_POST['I_avail']);
                } else {
                    if($current_availability == "1"){
                        $avail = "1";
                    } else {
                        $avail = "0";
                    }
                }
                $image = $_FILES["I_image"]["name"];
                $tempname = $_FILES["I_image"]["tmp_name"];    
                $folder = "images/".$image;
                move_uploaded_file($tempname, $folder);

                if($image == NULL){
                    $image = trim($_POST['img']);
                }
                // if(trim($_POST['I_veg'])=="Non_Veg"){
                //     $veg = "Non Veg";
                // } else {
                //     $veg = trim($_POST['I_veg']);
                // }
                $data = [
                    'i_ingredients' => trim($_POST['I_ingredients']),
                    'i_recipe' => trim($_POST['I_recipe']),
                    'i_veg' => trim($_POST['I_veg']),
                    'i_menuT' => trim($_POST['I_menuT']),
                    'i_cost_s' => trim($_POST['I_cost_s']),
                    'i_cost_m' => trim($_POST['I_cost_m']),
                    'i_cost_l' => trim($_POST['I_cost_l']),
                    'i_image' => $image,
                    'i_avail' => $avail
                ];
                if(!isset($_POST['I_ingredients'])){
                    unset($data['i_ingredients']);
                }
                if(!isset($_POST['I_recipe'])){
                    unset($data['i_recipe']);
                }
                if(!isset($_POST['I_veg'])){
                    unset($data['i_veg']);
                }
                if(!isset($_POST['I_menuT'])){
                    unset($data['i_menuT']);
                }
                if(!isset($_POST['I_cost_s'])){
                    unset($data['i_cost_s']);
                }
                if(!isset($_POST['I_cost_m'])){
                    unset($data['i_cost_m']);
                }
                if(!isset($_POST['I_cost_l'])){
                    unset($data['i_cost_l']);
                }
                // if(!isset($_POST['I_image'])){
                //     unset($data['i_image']);
                // }
                
                if($this->MenuModel->update($data,$id) && $this->MenuModel->updatemenutype($data,$id)){
                    echo '<script type="text/javascript">

            window.onload = function () { alert("Updated"); }

</script>';
                    
                } else {
                    
                    echo '<script type="text/javascript">

            window.onload = function () { alert("Failed"); }

</script>';
                    die('something went wrong');
                }
            }
            $this->recipe($id);
        }

        public function updateAvail($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(trim($_POST['I_avail'])=="Make Unavailable"){
                    $avail="0";
                } elseif(trim($_POST['I_avail'])=="Make Available"){
                    $avail="1";
                }
                // if(isset($_POST['I_avail'])){
                //     $avail = "1";
                // } else {
                //     $avail = "0";
                // }
                $data = [
                    'avail' => $avail,
                    'id' => $id
                ];
                $this->MenuModel->updateAvail($data);
            }
            $this->menu();
        }

        public function ChangeStatus($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(trim($_POST['status'])=="Start Preparation"){
                    $status = "Preparing";
                } else {
                    $status = trim($_POST['status']);
                }
                $data = [
                    'status' => $status,
                    'order_id' => $id
                ];
               if($this->OrderModel->updateStatus($data)){
                    $this->orders();
                } else {
                    die('something went wrong');
                }
            } else {
                $this->orders();
            }
        }

        public function cusDetails($resid,$cusid){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $cus_name = $this->OrderModel->getcusname($cusid);
                $table = $this->OrderModel->gettableNo($resid);

                $data=[
                    'cusname' => $cus_name,
                    'tableNo' => $table
                ];
            }
        }
        
    } ?>