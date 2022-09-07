
<?php
  class Doctor {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

 public function getAllDoctors(){
    
    $this->db->query('SELECT * FROM doctors');
   
    $results = $this->db->resultSet();
   
    return $results;
   
  }
          // Find user by email
 public function getDoctor($id){
  $this->db->query('SELECT * FROM doctors WHERE id = :id');
  $this->db->bind(':id', $id);


  // // Check row
  // if($this->db->rowCount() > 0){
  //   return true;
  // } else {
  //   return false;
  // }
  $row = $this->db->single();
  return $row;
} 
  public function getCountDoctors(){
    
    $this->db->query('SELECT * FROM doctors');
   
    $results = $this->db->resultSet();
   
    return $this->db->rowCount();
   

  }
  public function add_doctor($data){

    $this->db->query('INSERT INTO doctors (doctor_name, description_1, description_2, image_path, contact_number, email) VALUES(:doctor_name, :description_1, :description_2,:image_path, :contact_number, :email)');
    // Bind values
    $this->db->bind(':doctor_name', $data['doctor_name']);
    $this->db->bind(':description_1', $data['description_1']);
    $this->db->bind(':description_2', $data['description_2']);
    $this->db->bind(':image_path', $data['image_path']);
    $this->db->bind(':contact_number', $data['contact_number']);
    $this->db->bind(':email', $data['image_path']);
   



    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
   
  }
}
