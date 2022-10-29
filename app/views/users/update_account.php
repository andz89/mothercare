
<?php 
require APPROOT . '/views/inc/header.php';

// userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>
  <div class="col-md-5 mx-auto my-5 ">
      <div class="card card-body bg-light ">
        <h3>Edit Account</h3>
<form action="<?php echo URLROOT; ?>/users/update_account" method="post">
        <div class="form-group">
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group mt-3">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group mt-3">
            <label for="contact_number">Contact Number: <sup>*</sup></label>
            <input type="tel" name="contact_number" class="form-control form-control-lg <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_number']; ?>">
            <span class="invalid-feedback"><?php echo $data['contact_number_err']; ?></span>
          </div>

      
          

          <br>
          <div class=" d-flex justify-content-end">
            <div class="">
              <input type="submit" value="Update"  style="background-color:#EE6983;" class="btn  btn-block text-white">
            </div>
          
           
          </div>
</form>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>