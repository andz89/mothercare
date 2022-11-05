<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>

<div class="col-md-5 mx-auto my-5 ">
  <div class="card card-body bg-light ">
    <h2>Add Doctor</h2>`

    <form action="<?php echo URLROOT; ?>/admin/add_doctor" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="doctor_name">Name: <sup>*</sup></label>
        <input type="text" name="doctor_name" class="form-control form-control-lg <?php echo (!empty($data['doctor_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['doctor_name']; ?>">
        <span class="invalid-feedback"><?php echo $data['doctor_name_err']; ?></span>
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
      <div class="form-group mt-3">
        <label for="description_1">description 1: <sup>*</sup></label>
        <input type="tel" name="description_1" class="form-control form-control-lg <?php echo (!empty($data['description_1_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description_1']; ?> ">
        <span class="invalid-feedback"><?php echo $data['description_1_err']; ?></span>
      </div>
      <div class="form-group mt-3">
        <label for="description_2">description 2: <sup>*</sup></label>
        <input type="tel" name="description_2" class="form-control form-control-lg <?php echo (!empty($data['description_2_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description_2']; ?>">
        <span class="invalid-feedback"><?php echo $data['description_2_err']; ?></span>
      </div>
      <br>
      <div>
        <label for="doctor_image">Image</label>
        <input type="file" id="imgInput" name="doctor_image" class="form-control form-control-lg <?php echo (!empty($data['doctor_image_err'])) ? 'is-invalid' : ''; ?>" value="">
        <span class="invalid-feedback"><?php echo $data['doctor_image_err']; ?></span>
      </div>



      <br>

      <div>
        <div class="form-group">
          <input type="submit" value="Submit" style="background-color:#EE6983;" class="btn  btn-block text-white form-control form-control-lg">
        </div>

      </div>
    </form>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>