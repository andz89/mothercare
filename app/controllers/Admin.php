<?php
class Admin extends Controller{
    public function __construct(){
        $this->userModel = $this->model('user');
        $this->doctorModel = $this->model('doctor');

      if(isset( $_SESSION['user_role']) && $_SESSION['user_role'] == 'user'){
      redirect('index');
      return false;
      };
   
    }

    public function index(){
        $data =  ['title' => 'PHP MVC',];

        if(isset($_SESSION['user_role'])){
          
        $this->view('admin/index', $data);

        }else{
        
             // Check for POST
          // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
       // Init data
       $data =[
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',      
      ];
        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        //check for user/email
        if($this->userModel->findUserByEmail_admin($data['email'])){
          //user found
          
        }else{
          //No user found
          $data['email_err']= 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
         // check and set logged in user
         $loggedInUser = $this->userModel->login_admin($data['email'], $data['password']);
          
         if($loggedInUser){
          // Create Session
          $this->createUserSession($loggedInUser);
         }else{
           $data['password_err'] = 'Password incorrect';
      

           $this->view('users/login-admin', $data);
         }
        }else{
          // Load view with errors
          $this->view('users/login-admin', $data);
        }
      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',         
        ];

        // Load view
        $this->view('users/login-admin', $data);
      }
       

        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_doctor_name'] = $user->doctor_name;
        $_SESSION['user_role'] = $user->role;
        $_SESSION['user_created'] = $user->date;
        $_SESSION['user_contact_number'] = $user->contact_number;
        redirect('admin/index');
      }


      public function doctors(){
        userRoleEqualtoAdmin();
        $doctors = $this->doctorModel->getAllDoctors();
        $count =  $this->doctorModel->getCountDoctors();
        $data =  [
        'added-doctors'=>$count,
        'doctors'=> $doctors,
            ];   
     
        $this->view('admin/doctors', $data);
  
        }

        public function add_doctor(){
      
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
              // Process form
              // sanitize post data
              
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              
              print_r($_FILES['doctor_image']);
              $fileName = $_FILES['doctor_image']['name'];
              $fileTempName = $_FILES['doctor_image']['tmp_name'];
              
              $fileType = $_FILES['doctor_image']['type'];
              $fileError = $_FILES['doctor_image']['error'];

  
              $fileExt = explode('.',$fileName);
              $fileActualExt = strtolower(end($fileExt));
              $allowed = array('jpg', 'jpeg', 'png');
              // init data
              $data =[
                'doctor_name' => trim($_POST['doctor_name']),
                'email' => trim($_POST['email']),
                'contact_number' => trim($_POST['contact_number']),
                'description_1' => trim($_POST['description_1']),
                'description_2' => trim($_POST['description_2']),
                'image_path' => '',

                'doctor_name_err' => '',
                'email_err' => '',
                'contact_number_error' => '',
                'description_1_error' => '',
                'description_2_error' => '',
              ];
        
              // validate email
              if(empty($data['email'])){
                $data['email_err'] = 'Pleae enter email';
              } 
              
               // Validate doctor_name
            if(empty($data['doctor_name'])){
              $data['doctor_name_err'] = 'Pleae enter doctor_name';
            }
            //validate number
            if(empty($data['contact_number'])){
              $data['contact_number_err'] = 'Pleae enter contact number';
            }
         
            // Validate enter description
            if(empty($data['description_1'])){
               $data['description_1_err'] = 'Pleae enter description';
            } 
            
            // Validate enter description
            if(empty($data['description_2'])){
            $data['description_2_err'] = 'Pleae enter description';
            } 
            //validae image
            if(!in_array($fileActualExt, $allowed)){
              $data['doctor_image_err'] = 'Wrong type of file';
    
            }
            if($fileError != 0){
              $data['doctor_image_err'] = 'there was an error uploading your photo';
    
            }
            // Make sure errors are empty
            if(empty($data['doctor_image_err']) && empty($data['email_err']) && empty($data['doctor_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err'])  && empty($data['contact_number_err'])){
              $fileNewName = uniqid('',true)."." .$fileActualExt;
              $fileDestination =   'images/'.$fileNewName;  
              move_uploaded_file($fileTempName, $fileDestination);
              $data['image_path'] = URLROOT . '/'. 'images/'.$fileNewName;

                 if($this->doctorModel->add_doctor($data)){
                  flash('register_success', 'You are registered and can log in');
                
                  redirect('admin/doctors');
                } else {
                  die('Something went wrong');
                }
    
            } else {
      
              // Load view with errors
               $this->view('admin/add_doctor', $data);
            }
    
    
            } else {
            
              // Init data
              $data =[
                'doctor_name' => '',
                'email' =>'',
                'contact_number' => '',
                'description_1' => '',
                'description_2' => '',
                'image' => '',

                'doctor_name_err' => '',
                'email_err' => '',
                'contact_number_error' => '',
                'description_1_error' => '',
                'description_2_error' => '',
                'image_err' => '',
    
              ];
      
              // Load view
              $this->view('admin/add_doctor', $data);
      
            }
    
          
          }
}
