<?php
class Pages extends Controller{
    public function __construct(){
        $this->doctorModel = $this->model('doctor');
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
   
}
