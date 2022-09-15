<?php
  class User {
    private $db;


    public function __construct(){
      $this->db = new Database;
    }



     // Find user by email
     public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Regsiter user
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, password,role,contact_number) VALUES(:name, :email, :password, :role, :contact_number)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':contact_number', $data['contact_number']);


  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
        // Regsiter user
    public function add_booking($data){
      $this->db->query('INSERT INTO booking (booking_id, user_id, user_name,user_email,contact_number,doctor_name,date,time,note) VALUES(:booking_id, :user_id, :user_name, :user_email, :contact_number,:doctor_name,:date, :time, :note)');
      
      // Bind values
      $this->db->bind(':booking_id', $data['booking_id']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':user_name', $data['user_name']);
      $this->db->bind(':user_email', $data['user_email']);
      $this->db->bind(':contact_number', $data['contact_number']);
      $this->db->bind(':note', $data['note']);
      $this->db->bind(':doctor_name', $data['doctor_name']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':time', $data['time']);



      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
            //login user 
            public function login($email, $password){
              $this->db->query('SELECT * FROM users WHERE email = :email');
              $this->db->bind(':email', $email);
        
              $row = $this->db->single();
        
              $hashed_password = $row->password;
              if(password_verify($password, $hashed_password)){
                return $row;
              } else {
                return false;
              }
      
            }
               //login user 
        public function login_admin($email, $password){
          $this->db->query('SELECT * FROM admin WHERE email = :email');
          $this->db->bind(':email', $email);
    
          $row = $this->db->single();
    
          $hashed_password = $row->password;
          if($password == $hashed_password){
            return $row;
          } else {
            return false;
          }
  
        }
        // Find user by email
 public function findUserByEmail_admin($email){
  $this->db->query('SELECT * FROM admin WHERE email = :email');
  $this->db->bind(':email', $email);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
} 

public function getAllBookings_as_user($id){
    
  $this->db->query('SELECT * FROM booking WHERE user_id = :user_id');
  $this->db->bind(':user_id', $id);
 
  $results = $this->db->resultSet();
 
  return $results;
 
}
public function getAllBookings_as_admin(){
  $this->db->query('SELECT * FROM booking');
  $results = $this->db->resultSet();

  return $results;
}

public function getcontact(){
    
  $this->db->query('SELECT * FROM contact');

  $row = $this->db->single();
  return $row;
 
}


public function update_contact($data){

  $this->db->query('UPDATE contact SET telephone = :telephone, email = :email, address = :address WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':telephone', $data['telephone']);
  $this->db->bind(':email', $data['email']);
  $this->db->bind(':address', $data['address']);

  // $this->db->bind(':image_thumbnail', $data['image_thumbnail']);



  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
 
}

public function delete_doctor($id){
print_r($id);
  $this->db->query('DELETE FROM doctors WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $id);

  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
 
}
}