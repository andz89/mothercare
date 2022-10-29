<?php 
require APPROOT . '/views/inc/header.php';

// userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>
<div class="col-md-6 mx-auto " style="height:410px; margin-top: 70px;">
<div class="booking-header p-2 text-white d-flex justify-content-between" style="background-color:#EE6983;" >
<h5>Your Account</h5>

<span  class="btn btn-sm btn-secondary" >
  <a class="text-white text-decoration-none" href="<?php echo URLROOT; ?>/users/update_account">  Edit Profile</a>
</span>

        </div>
      <div class="card card-body bg-light ">

       
        <div class="mb-1"><b>User Name:</b>  <?php echo $data['name'] ?></div>
        <div class="mb-1"><b>Email:</b>  <?php echo $data['email']?></div>
        <div class="mb-1"><b>Contact Number:</b>  <?php echo $data['contact_number']?></div>
    
     
      
          

      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php';?>