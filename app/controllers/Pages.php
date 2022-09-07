<?php
class Pages extends Controller{
    public function __construct(){
        $this->doctorModel = $this->model('doctor');
        $this->userModel = $this->model('user');

    }

    public function index(){
        $data =  ['title' => 'PHP MVC',];
        $this->view('pages/index', $data);
    }


    public function about(){

        $data =  ['title' => 'About us'];
        $this->view('pages/about',  $data);
       
    }
    public function doctors(){
        $doctors = $this->doctorModel->getAllDoctors();
        $data =  ['doctors' => $doctors];
        $this->view('pages/doctor',  $data);
       
    }
    public function contact(){
        $contact =  $this->userModel->getContact();
        $data= ['contact' => $contact->telephone,
        'email' => $contact->email,
        'address' => $contact->address
                   
      ];
      $this->view('pages/contact', $data);
 
      
    }
}
