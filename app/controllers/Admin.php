<?php
class Admin extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('user');
    $this->doctorModel = $this->model('doctor');

    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'user') {
      redirect('index');
      return false;
    }
  }

  public function index()
  {
    $data =  ['title' => 'PHP MVC',];

    if (isset($_SESSION['user_role'])) {

      $this->view('admin/index', $data);
    } else {

      // Check for POST
      // Check for POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',
        ];
        // Validate Email
        if (empty($data['email'])) {
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if (empty($data['password'])) {
          $data['password_err'] = 'Please enter password';
        }

        //check for user/email
        if ($this->userModel->findUserByEmail_admin($data['email'])) {
          //user found

        } else {
          //No user found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if (empty($data['email_err']) && empty($data['password_err'])) {
          // Validated
          // check and set logged in user
          $loggedInUser = $this->userModel->login_admin($data['email'], $data['password']);

          if ($loggedInUser) {
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';


            $this->view('users/login-admin', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login-admin', $data);
        }
      } else {
        // Init data
        $data = [
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

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_doctor_name'] = $user->doctor_name;
    $_SESSION['user_role'] = $user->role;
    $_SESSION['user_created'] = $user->date;
    $_SESSION['user_contact_number'] = $user->contact_number;
    redirect('admin/index');
  }


  public function doctors()
  {
    userRoleEqualtoAdmin('index');
    $doctors = $this->doctorModel->getAllDoctors();
    $count =  $this->doctorModel->getCountDoctors();
    $data =  [
      'added-doctors' => $count,
      'doctors' => $doctors,
    ];

    $this->view('admin/doctors', $data);
  }

  public function add_doctor()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Process form
      // sanitize post data

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


      $fileName = $_FILES['doctor_image']['name'];
      $fileTempName = $_FILES['doctor_image']['tmp_name'];

      $fileType = $_FILES['doctor_image']['type'];
      $fileError = $_FILES['doctor_image']['error'];


      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg', 'jpeg', 'png');
      // init data
      $data = [
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
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      }

      // Validate doctor_name
      if (empty($data['doctor_name'])) {
        $data['doctor_name_err'] = 'Pleae enter doctor_name';
      }
      //validate number
      if (empty($data['contact_number'])) {
        $data['contact_number_err'] = 'Pleae enter contact number';
      }

      // Validate enter description
      if (empty($data['description_1'])) {
        $data['description_1_err'] = 'Pleae enter description';
      }

      // Validate enter description
      if (empty($data['description_2'])) {
        $data['description_2_err'] = 'Pleae enter description';
      }
      //validae image
      if (!in_array($fileActualExt, $allowed)) {
        $data['doctor_image_err'] = 'Wrong type of file';
      }
      if ($fileError != 0) {
        $data['doctor_image_err'] = 'there was an error uploading your photo';
      }
      // Make sure errors are empty
      if (empty($data['doctor_image_err']) && empty($data['email_err']) && empty($data['doctor_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err'])  && empty($data['contact_number_err'])) {
        $fileNewName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination =   'images/' . $fileNewName;
        move_uploaded_file($fileTempName, $fileDestination);
        $data['image_path'] = URLROOT . '/' . 'images/' . $fileNewName;

        if ($this->doctorModel->add_doctor($data)) {
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
      $data = [
        'doctor_name' => '',
        'email' => '',
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

  public function user_bookings()
  {
    $bookings = $this->userModel->getAllBookings_as_admin();
    $total_bookings =  $this->userModel->getCountBookings();
    $data = [
      'booking' => $bookings,
      'total_bookings' => $total_bookings
    ];
    $this->view('admin/user_bookings', $data);
  }


  public function contact()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      // Init data
      $data = [
        'id' => trim($_POST['id']),
        'email' => trim($_POST['email']),
        'telephone' => trim($_POST['telephone']),
        'address' =>  trim($_POST['address']),


      ];
      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      }

      // Validate Password
      if (empty($data['telephone'])) {
        $data['telephone_err'] = 'Please enter telephone';
      }
      // Validate address
      if (empty($data['address'])) {
        $data['address_err'] = 'Please enter telephone';
      }



      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['telephone_err']) && empty($data['address_err'])) {
        if ($this->userModel->update_contact($data)) {
          flash('contact_update', 'Contact updated successfuly');
          redirect('admin/contact');
        } else {
          die('something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
    } else {
      $contact =  $this->userModel->getContact();
      $data = [
        'id' => $contact->id,
        'telephone' => $contact->telephone,
        'email' => $contact->email,
        'address' => $contact->address

      ];
      $this->view('admin/contact', $data);
    }
  }

  public function edit_doctor()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


      $fileName = $_FILES['image_big']['name'];
      $fileTempName = $_FILES['image_big']['tmp_name'];
      print_r($fileTempName);
      $fileType = $_FILES['image_big']['type'];
      $fileError = $_FILES['image_big']['error'];


      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg', 'jpeg', 'png');

      $data =  [
        'id' => trim($_GET['id']),
        'doctor_name' => trim($_POST['doctor_name']),
        'description_1' => trim($_POST['description_1']),
        'description_2' => trim($_POST['description_2']),
        'image_path' => trim($_POST['image_path']),
        'email' => trim($_POST['email']),
        'contact_number' => trim($_POST['contact_number']),
        'doctor_name_err' => '',
        'description_1_err' => '',
        'description_2_err' => '',
        'image_big_err' => '',
        'email_err' => '',
        'contact_number_err' => ''


      ];
      //validate inputs
      if (empty($data['doctor_name'])) {
        $data['doctor_name_err'] = 'Please enter room name';
      }
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter room name';
      }
      if (empty($data['contact_number'])) {
        $data['contact_number_err'] = 'Please enter room name';
      }
      if (empty($data['description_1'])) {
        $data['description_1_err'] = 'Please enter room description';
      }
      if (empty($data['description_2'])) {
        $data['description_2_err'] = 'Please enter room description';
      }
      if ($fileName == true) {

        if (!in_array($fileActualExt, $allowed)) {
          $data['image_big_err'] = 'Wrong type of file';
        }
        if ($fileError != 0) {
          $data['image_big_err'] = 'there was an error uploading your photo';
        }
      }

      // Make sure errors are empty
      if ((empty($data['image_big_err']) && empty($data['email_err']) && empty($data['contact_number_err']) && empty($data['room_name_err']) && empty($data['description_1_err']) && empty($data['description_2_err'])

      )) {


        if ($fileName == true) {
          $fileNewName = uniqid('', true) . "." . $fileActualExt;
          $fileDestination =   'images/' . $fileNewName;
          move_uploaded_file($fileTempName, $fileDestination);
          $data['image_path'] = URLROOT . '/' . 'images/' . $fileNewName;
        }

        if ($this->doctorModel->update_doctor($data)) {
          flash('update', 'Update successfuly');
          redirect('admin/doctors');
        } else {
          die('something went wrong');
        }
      } else {
        $this->view('admin/edit_doctors', $data);
      }
    } else {


      if ($_GET['id'] == null) {
        redirect('admin');
      }
      $doctor =  $this->doctorModel->getDoctor($_GET['id']);

      if ($doctor->id) {
        $data =  [
          'id' => $doctor->id,
          'doctor_name' => $doctor->doctor_name,
          'description_1' => $doctor->description_1,
          'description_2' =>  $doctor->description_2,
          'image_path' => $doctor->image_path,
          'email' => $doctor->email,
          'contact_number' => $doctor->contact_number



        ];
      } else {
        redirect('admin/doctors');
      }



      $this->view('admin/edit_doctors', $data);
    }
  }

  public function delete()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if ($this->userModel->delete_doctor($_GET['id'])) {
        redirect('admin/doctors');
      }
    }
  }

  public function schedule()
  {
    $doctor =  $this->doctorModel->getDoctor($_GET['id']);
    $sched =  $this->userModel->getSched($_GET['id']);



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $data = [
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'reminders' => $_POST['reminders'],
        'doctor_id' => $doctor->id,
        'patient_limit' => $_POST['patient_limit'],
        'date_err' => '',
        'time_err' => '',
        'reminders_err' => '',
        'patient_limit_err' => '',
        //not included

        'doctor' => $doctor->doctor_name,
        'sched' => $sched,


      ];
      // Validate date
      if (empty($data['date'])) {
        $data['date_err'] = 'Pleae enter date';
      }
      // patient_limit
      if (empty($data['patient_limit'])) {
        $data['patient_limit_err'] = 'Pleae enter limit';
      }
      // Validate time
      if (empty($data['time'])) {
        $data['time_err'] = 'Pleae enter time';
      }
      // Validate reminders
      if (empty($data['reminders'])) {
        $data['reminders_err'] = 'Please enter reminders';
      }

      // Make sure errors are empty
      if (
        empty($data['date_err']) && empty($data['time_err']) && empty($data['reminders_err'])
        && empty($data['patient_limit_err'])
      ) {
        // Validated



        if ($this->userModel->schedule($data)) {
          flash('add_sched', 'shedule added successfuly');
          redirect('admin/schedule?id=' . $_GET['id']);
        } else {
          die('Something went wrong');
        }
      } else {

        // Load view with errors
        $this->view('admin/schedule', $data);
      }
    } else {


      $data = [
        'date' => '',
        'time' => '08:00',
        'reminders' => '',
        'patient_limit' => '',
        'doctor' => $doctor->doctor_name,

        'sched' => $sched,

      ];
      $this->view('admin/schedule', $data);
    }
  }
  public function edit_schedule()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $data = [
        'time' => $_POST['time'],
        'reminders' => $_POST['reminders'],
        'sched-id' =>  $_GET['id'],
        //not included
        'doctor_id' => $_POST['doctor_id']
      ];
      // Validate edit time
      if (empty($data['time'])) {
        $data['time_err'] = 'Pleae enter time';
      }
      // Validate edit -reminders
      if (empty($data['reminders'])) {
        $data['reminders_err'] = 'Pleae enter time';
      }
      // Make sure errors are empty
      if (empty($data['time_err']) &&  empty($data['reminders_err'])) {
        if ($this->userModel->edit_schedule($data)) {
          // flash('edit_sched', 'update shedule  successfuly');
          redirect('admin/schedule?id=' . $data['doctor_id']);
        } else {
          die('Something went wrong');
        }
      };
    }
  }

  public function announcement()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $data = [
        'announcement' => $_POST['announcement'],
        'doctor_id' => $_POST['doctor_id'],
        'sched-id' =>  $_GET['id'],


      ];
      if ($this->userModel->announcement($data)) {
        // flash('edit_sched', 'update shedule  successfuly');
        redirect('admin/schedule?id=' . $data['doctor_id']);
      }
    }
  }

  public function list_patients()
  {
    $count_patients =  $this->userModel->getCountPatients($_GET['id'], $_GET['date']);
    $doctor =  $this->doctorModel->getDoctor($_GET['id']);



    if (!$_SESSION['user_id']) {
      if ($_SESSION['user_id'] != 'admin') {
        redirect('index');
        return false;
      }
    };

    $patients  = $this->userModel->patients($_GET['id'], $_GET['date']);
    // $paidPaymentDetails  = $this->userModel->getPaidPaymentDetails($_GET['booking_id']);

    // print_r($paidPaymentDetails);

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //   $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //   $data = [
    //     'announcement' => $_POST['announcement'],
    //     'doctor_id' => $_POST['doctor_id'],
    //     'sched-id' =>  $_GET['id'],


    //   ];
    //   if ($this->userModel->announcement($data)) {
    //     // flash('edit_sched', 'update shedule  successfuly');
    //     redirect('admin/schedule?id=' . $data['doctor_id']);
    //   }
    // } else {
    // }
    $arr = [];
    foreach ($patients as $i) {
      array_push($arr, $i->payment);
    };

    $data =  [
      'patient' => $patients,
      'patient_count' => $count_patients,
      'doctor_name' =>  $doctor->doctor_name,
      'total_payment' =>  array_sum($arr),

    ];

    $this->view('admin/list_patients', $data);
  }

  public function payment()
  {
    $user_data =  $this->userModel->getUserBookingForPayment($_GET['booking_id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $data = [
        'patient_id' => $user_data->id,
        'patient_name' => $user_data->user_name,
        'email' => $user_data->user_email,
        'booking_date' => $user_data->date,
        'doctor_name' => $user_data->doctor_name,
        'booking_id' => $user_data->booking_id,

        'payment' => $_POST['payment'],
        'payment_date' => $_POST['date'],
        'payment_err' => ''
      ];
      // validate payment

      if (empty($data['payment'])) {
        $data['payment_err'] = 'Pleae enter payment';
      }

      // Make sure errors are empty
      if (empty($data['payment_err'])) {
        if ($this->userModel->savePayment($data)) {
          // flash('edit_sched', 'payment  successfuly');
          redirect('admin/list_patients?id=' . $_GET['id']  . '&date=' . $_GET['date']);
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('admin/payment', $data);
      }
    } else {
      $data =  [
        'patient_id' => $user_data->id,
        'patient_name' => $user_data->user_name,
        'email' => $user_data->user_email,
        'booking_date' => $user_data->date,
        'doctor_name' => $user_data->doctor_name,


      ];

      $this->view('admin/payment', $data);
    }
  }

  public function payment_successful()
  {
    $this->view('admin/payment_successful');
  }
}
