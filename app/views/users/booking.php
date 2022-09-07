<?php 
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>

<div class="col-md-5 mx-auto mt-3 mb-5  ">
      <div class="card card-body bg-light  ">
        <p >
        <a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/pages/doctors"> <b>&#8592;</b> Back</a>

        </p>

        <h2 class="mt-1">Book Appointment</h2>
        <p>Please fill out this form to book appointment with us</p>

        <span><span class="fw-bold">Patient Name: </span><?php echo  $_SESSION['user_name'] ?></span>
        <span><span class="fw-bold">Email: </span><?php echo  $_SESSION['user_email']?></span>
        <span><span class="fw-bold">Contact No. : </span><?php echo   $_SESSION['user_contact_number'] ?></span>
        <span><span  class="fw-bold">Doctor : </span><?php echo $data['doctor_name']; ?></span>
 
        <form action="<?php echo URLROOT; ?>/users/booking?id=<?php echo $data['doctor_id']?>" method="post">
   
          <div class="form-group mt-3">
            <label for="date">date: <sup>*</sup></label>
            <input type="date" name="date" class="form-control form-control-lg <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date']; ?>">
            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
          </div>
          <div class="form-group mt-3">
            <label for="time">Time: <sup>*</sup></label>
            <input type="time" name="time" class="form-control form-control-lg <?php echo (!empty($data['time_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['time']; ?>">
            <span class="invalid-feedback"><?php echo $data['time_err']; ?></span>
          </div>
  
      
      
          
          
          <div class="form-group mt-3">
            <label for="note">Note: <sup>*</sup></label>
            <textarea  name="note" class="form-control form-control-lg <?php echo (!empty($data['note_err'])) ? 'is-invalid' : ''; ?>" ><?php echo $data['note']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['note_err']; ?></span>
          </div>
          <br>

          <div class=" d-flex justify-content-between">
            <div class="">
              <input type="submit" value="Submit"  style="background-color:#EE6983;" class="btn  btn-block text-white">
            </div>
         
          </div>
        </form>
      </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>