<?php 
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>
<div class="col-md-6 mx-auto " style="height:350px; margin-top: 70px;">
<div class="booking-header p-2 text-white" style="background-color:#EE6983;" >
<h5>Your Account</h5>
        
        </div>
      <div class="card card-body bg-light ">

       
        <div class="mb-1"><b>User Name:</b>  <?php echo $_SESSION['user_name'] ?></div>
        <div class="mb-1"><b>Email:</b>  <?php echo $_SESSION['user_email']?></div>
        <div class="mb-1"><b>Contact Number:</b>  <?php echo $_SESSION['user_contact_number']?></div>
        <div class="mb-1"><b>Date Created:</b>  <?php echo $_SESSION['user_created']?></div>
     
      
          

      </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php';?>