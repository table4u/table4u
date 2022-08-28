<?php

class CustomerFeedback extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->feedbackModel = $this->model('Feedback');
        $this->selfRegisteredModel = $this->model('SelfRegistered');
    }
    public function addFeedback()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            die("feedback");
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'comment' => trim($_POST['comment']),
                'user_id' => trim($_SESSION['user_id']),
                
            ];

            if ($this->feedbackModel->addFeedback($_SESSION['user_id'])) {
                $this->user = $this->selfRegisteredModel->getUserDetails($data);
                $_SESSION['successFeedback'] = "Feedback added successfully";
                $this->view('customerProfile', $this->user);
            }
            else{
                $this->user = $this->selfRegisteredModel->getUserDetails($data);
                $_SESSION['unsuccessFeedback'] = "Feedback was not added";
                $this->view('customerProfile', $this->user);
            }
        }
        
        
    }
}
