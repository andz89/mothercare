
<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
<div  style="height: 40px;">
        <div class="alert-flash text-center"> <?php flash('contact_update'); ?></div>

        </div>

  <div class="login  " style ="height:350px; margin-bottom:200px;">
    <div class="col-md-4 mx-auto ">
      
      <div class="card card-body bg-light mt-3 mb-5 ">
  

        <h2>Update Contact</h2>
       
        <form action="<?php echo URLROOT; ?>/admin/contact" method="post">
        <input type="hidden" name='id' value="<?php echo $data['id'] ?>">
       
        <div class="form-group mt-2">
            <label for="telephone">Telephone: <sup>*</sup></label>
            <input type="tel" name="telephone" class="form-control form-control-lg <?php echo (!empty($data['telephone_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['telephone'] ?>">
            <span class="invalid-feedback"><?php echo $data['telephone_err']; ?></span>
          </div>
          <div class="form-group mt-2">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['email'] ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group mt-4">
            <label for="address">Address: <sup>*</sup></label>
            <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['address'] ?>">
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
          </div>
          <div class="row mt-4">
            <div class="col">
              <input type="submit" value="Update Contact" id="contact_btn_admin" class="btn btn-success btn-block">
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  <?php echo alert_flash(); ?>

  </script>
  <?php require APPROOT . '/views/inc/footer.php';?>
  
