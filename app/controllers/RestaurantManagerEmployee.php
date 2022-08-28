<?php

class RestaurantManagerEmployee extends Controller{

public function __construct(){
    isValidUser('Restaurant Manager');
   // echo "RestaurantManagerEmployee constructor";
   $this->postModel = $this->model('RMgetempDetails');

}

    public function index(){
       // echo "This is Restaurant manager index function";
       $getdata = $this->postModel->getEmpData();
      //print_r($getdata)
    
        $this->view('resManagerEmployee',$getdata);
    }

    public function addNewEmp(){
        $data = [
            'name' =>'' ,
            'username' =>'' ,
            'password' => '',
            'designation' =>'' ,
            'email' => '',
            'nic' => '',
            'address' =>'' ,      
            'dob' => '',
            'mobile' => '',
            //'EM_name' => trim($_POST['emergency_contact_name']),
           // 'EM_mobile' => trim($_POST['emergency_contact_mobile']),
            //'EM_relation' => trim($_POST['emergency_contact_relation']),
            'name_err'=>'',
            'username_err'=>'',
            'pw_err' => '',
            'email_err' => '',
            'nic_err' => '',
            'mobile_err'=>'',
            'dob_err'=>''

        ];
        $this->view('resManager_addnewemp',$data);
    }

    public function seeMoreDetails($rowID){
        $getdataRow = $this->postModel->getEmpDataByRow($rowID);
        //print_r($getdataRow);
        $this->view('resManager_seeMoreEmp', $getdataRow);
    }

    public function enterEmployeeData(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
    
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['p_word']),
                    'designation' => trim($_POST['designation']),
                    'email' => trim($_POST['email']),
                    'nic' => trim($_POST['nic']),
                    'address' => trim($_POST['address']),      
                    'dob' => trim($_POST['dob']),
                    'mobile' => trim($_POST['mobile_number']),
                    //'EM_name' => trim($_POST['emergency_contact_name']),
                   // 'EM_mobile' => trim($_POST['emergency_contact_mobile']),
                    //'EM_relation' => trim($_POST['emergency_contact_relation']),
                    'name_err'=>'',
                    'username_err'=>'',
                    'pw_err' => '',
                    'email_err' => '',
                    'nic_err' => '',
                    'mobile_err'=>'',
                    'dob_err'=>''

                ];
                if(empty($data['name'])){
                    $data['name_err'] = 'Please Enter the Name';
                    
                }
               $data['name_err'] = ( nameValidation($data['name']));
               
               $data['mobile_err'] = mobileValidation($data['mobile']);

               if(!empty($data['dob'])){
                $date = date("Y-m-d", strtotime($data['dob']));
                $todayDate = date("Y-m-d");

                if ($date > $todayDate){
                    $data['dob_err'] = 'Please Enter the valid birthday';
                    
                }

                
               }
               

                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please Enter the NIC Number';
                    
                }else{
                    if( $this->postModel->getEmpByNIC($data['nic'])){
                        $data['nic_err'] = "NIC is already taken";
                        
                    }

                }
               $data['nic_err'] = nicValidation($data['nic']);
               

                if(empty($data['username'])){
                    $data['username_err'] = 'Please Enter the userName';
                    
                }else{
                    if( $this->postModel->getEmpByUsername($data['username'])){
                        $data['username_err'] = "Username is already taken";
                       
                    }
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter the email';
                }else{
                   if( $this->postModel->getEmpByEmail($data['email']))
                   {
                       $data['email_err'] = 'Email is already taken';
                       
                   }
                }

            
    
                //validate the strength of the password
                if (strlen($data['password']) < 6) {
                    $data['pw_err'] = 'Password must be at least 6 characters';
                   
                }

                if(empty($data['name_err']) && empty($data['username_err']) && empty($data['pw_err']) && empty($data['email_err']) && empty($data['nic_err']) && empty($data['mobile_err']) && empty($data['dob_err']))
                {   
                    //hash the password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->postModel->registerEmp($data)){
                       $this->index();
                       
                        
                    }else{
                        die('Something is wrong');
                    }
                    
                }else{
                    $this->view('resManager_addnewemp',$data);
                }
                // Validate Confirm Password
                // if ($data['password'] != $data['confirm_password']) {
                //     $data['confirm_password_err'] = 'Passwords do not match';
                // }
            } else {
    
                $data = [
                    'name' => '',
                    'username' => '',
                    'password' => '',
                    'designation' => '',
                    'email' => '',
                    'nic' => '',
                    'address' => '',      
                    'dob' => '',
                    'mobile' => '',
                    'EM_name' => '',
                    'EM_mobile' => '',
                    'EM_relation' => '',
                    'name_err'=>'',
                    'username_err'=>'',
                    'pw_err' => '',
                    'email_err' => '',
                    'nic_err' => '',
                    'mobile_err'=>'',
                    'dob_err' => ''
                    
                ];
    
                // Load view
                $this->view('resManager_addnewemp',$data);
            }
        }

//update of the employee details
public function updateEmployeeData(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // Init data
        $data = [
            'empID' => trim($_POST['empID']),
            'name' => trim($_POST['name']),
            'username' => trim($_POST['username']),
            'designation' => trim($_POST['designation']),
            'email' => trim($_POST['email']),
            'nic' => trim($_POST['nic']),
            'address' => trim($_POST['address']),      
            'dob' => trim($_POST['DoB']),
            'mobile' => trim($_POST['mobile']),
            //'EM_name' => trim($_POST['emergency_contact_name']),
           // 'EM_mobile' => trim($_POST['emergency_contact_mobile']),
            //'EM_relation' => trim($_POST['emergency_contact_relation']),
            'name_err'=>'',
            'username_err'=>'',
            'email_err' => '',
            'nic_err' => '',
            'mobile_err'=>'',
            'dob_err'=>''

        ];
        if(empty($data['name'])){
            $data['name_err'] = 'Please Enter the Name';
            
        }
       $data['name_err'] = ( nameValidation($data['name']));
       
     //  $data['mobile_err'] = mobileValidation($data['mobile']);

       if(!empty($data['dob'])){
        $date = date("Y-m-d", strtotime($data['dob']));
        $todayDate = date("Y-m-d");

        if ($date > $todayDate){
            $data['dob_err'] = 'Please Enter the valid birthday';
            
        }

        
       }
       

        if(empty($data['nic'])){
            $data['nic_err'] = 'Please Enter the NIC Number';
            
         }//else{
        //     if( $this->postModel->getEmpByNIC($data['nic'])){
        //         $data['nic_err'] = "NIC is already taken";
                
        //     }

        // }
       $data['nic_err'] = nicValidation($data['nic']);
       

        if(empty($data['username'])){
            $data['username_err'] = 'Please Enter the userName';
            
        }//else{
        //     if( $this->postModel->getEmpByUsername($data['username'])){
        //         $data['username_err'] = "Username is already taken";
               
        //     }
        // }

        if(empty($data['email'])){
            $data['email_err'] = 'Please Enter the email';
        }//else{
        //    if( $this->postModel->getEmpByEmail($data['email']))
        //    {
        //        $data['email_err'] = 'Email is already taken';
               
        //    }
        // }

    


        if(empty($data['name_err']) && empty($data['username_err']) && empty($data['email_err']) && empty($data['nic_err']) && empty($data['mobile_err']) && empty($data['dob_err']))
        {   
           

            if($this->postModel->updateEmp($data)){
               // echo "success";
               $this->index();
               
                
            }else{
                die('Something is wrong');
            }
            
        }else{
            echo $data['name_err'];
            echo $data['username_err'];
            echo $data['email_err'];
            echo $data['nic_err'];
            echo $data['mobile_err'];
            echo $data['dob_err'];

           // $this->view('resManager_addnewemp',$data);
        }
        // Validate Confirm Password
        // if ($data['password'] != $data['confirm_password']) {
        //     $data['confirm_password_err'] = 'Passwords do not match';
        // }
    } else {

        $data = [
            'name' => '',
            'username' => '',
            'designation' => '',
            'email' => '',
            'nic' => '',
            'address' => '',      
            'dob' => '',
            'mobile' => '',
            'EM_name' => '',
            'EM_mobile' => '',
            'EM_relation' => '',
            'name_err'=>'',
            'username_err'=>'',
            'email_err' => '',
            'nic_err' => '',
            'mobile_err'=>'',
            'dob_err' => ''
            
        ];

        // Load view
       // $this->view('resManager_addnewemp',$data);
    }
}

    public function DeleteEmp(){
        $data  = $this->postModel->DeleteEmp($_POST['_NIC']);
        echo json_encode($data);
    }
    public function searchEmployee(){
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $data = $this->postModel->searchEmployee($filtervalues);
            $this->view('resManagerEmployee',$data); 
        }
    }


        
    


    


    
}








?>