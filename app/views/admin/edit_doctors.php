<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
<div class="container my-5">

  <a href="<?php echo URLROOT; ?>/admin/doctors" class="btn btn-md btn-primary mb-3">Back </a>
  <h3>Edit Doctor Profile</h3>

  <form action="<?php echo URLROOT; ?>/admin/edit_doctor?id=<?php echo $data['id'] ?> " method="post" enctype="multipart/form-data">
    <div class="d-flex justify-content-start gap-5 align-center" style="width: 100%;">
      <div class="mt-4 d-flex flex-column">
        <img id="blah" src="<?php echo $data['image_path'] ?>" width="100%" alt="">

        <div class="form-group mt-3">
          <label for="imgInput" class="btn btn-secondary">Change Image</label> <span id="file-name" style="font-size:20px;"></span>
          <input type="file" name="image_big" id="imgInput" style="display:none ;" class=" form-control form-control-lg <?php echo (!empty($data['image_big_err'])) ? 'is-invalid' : ''; ?>">

          <span class="invalid-feedback"><?php echo $data['image_big_err']; ?></span>

        </div>
      </div>
      <!-- if there is no new image uploaded -->
      <input type="hidden" name="image_path" value="<?php echo $data['image_path'] ?>">
      <div style="width:100%" class="mt-3">




        <div class="form-group">
          <label for="doctor_name">Doctor Name</label>
          <input type="text" name="doctor_name" class="form-control form-control-lg <?php echo (!empty($data['doctor_name_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['doctor_name'] ?>">
          <span class="invalid-feedback"><?php echo $data['doctor_name_err']; ?></span>
        </div>

        <div class="form-group mt-4">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['email'] ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group mt-4">
          <label for="contact_number">Contact number</label>
          <input type="contact_number" name="contact_number" class="form-control form-control-lg <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['contact_number'] ?>">
          <span class="invalid-feedback"><?php echo $data['contact_number_err']; ?></span>
        </div>

        <div class="form-group mt-4">
          <label for="description_1">Room description 1</label>
          <textarea name="description_1" rows="4" class="form-control form-control-lg <?php echo (!empty($data['description_1_err'])) ? 'is-invalid' : ''; ?>"> <?php echo $data['description_1'] ?> </textarea>
          <span class="invalid-feedback"><?php echo $data['description_1_err']; ?></span>

        </div>
      </div>


    </div>



    <div class="form-group mt-4">

      <label for="description_2">Room description 2</label>
      <textarea name="description_2" rows="8" class="form-control form-control-lg <?php echo (!empty($data['description_2_err'])) ? 'is-invalid' : ''; ?>"> <?php echo $data['description_2'] ?> </textarea>
      <span class="invalid-feedback"><?php echo $data['description_2_err']; ?></span>
    </div>




    <div class="d-flex justify-content-center mt-3">
      <input type="submit" style="width:40% ;" value="Submit" class="btn btn-success ">
    </div>

  </form>
</div>
<script>
  <?php echo script_edit_rooms_admin(); ?>
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>