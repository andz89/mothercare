<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_admin.php'; ?>
<div class="container-sm my-3" style="min-height:700px;">
  <a href="<?php echo URLROOT; ?>/admin/list_patients?patient_id=<?php echo $data['patient_id'] ?>&id=<?php echo $_GET['id'] ?>&date=<?php echo $data['booking_date'] ?>" class="btn btn-md btn-dark mb-3">Back </a>

  <form class="row g-3" action="<?php echo URLROOT; ?>/admin/payment?booking_id=<?php echo $_GET['booking_id'] ?>" method="POST">
    <h3>Payment</h3>
    <div class="col-md-4">
      <label for="validationDefault02" class="form-label">Patient ID no.</label>
      <input type="text" class="form-control" id="validationDefault02" value="<?php echo $data['patient_id'] ?>" readonly>
    </div>
    <div class="col-md-4">
      <label for="validationDefault01" class="form-label">Full name</label>
      <input type="text" class="form-control" id="validationDefault01" value="<?php echo $data['patient_name'] ?>" readonly>
    </div>

    <div class="col-md-4">
      <label for="validationDefault02" class="form-label">Email address</label>
      <input type="text" class="form-control" id="validationDefault02" value="<?php echo $data['email'] ?>" readonly>
    </div>


    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">Date of Booking</label>
      <input type="text" class="form-control" id="validationDefault05" value="<?php echo $data['booking_date'] ?>" readonly>
    </div>
    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">Physician</label>
      <input type="text" class="form-control" id="validationDefault05" value="<?php echo $data['doctor_name'] ?>" readonly>
    </div>

    <input type="text" class="form-control" id="payment_date" name='date' value="" hidden>
    <script>
      document.querySelector('#payment_date').value = new Date().toLocaleString();
    </script>

    <div class="col-md-3">
      <label for="validationDefault05" class="form-label">Amount recieved</label>
      <input type="text" name="payment" id="validationDefault05" class="form-control <?php echo (!empty($data['payment_err'])) ? 'is-invalid' : ''; ?>" placeholder="Php 500.00">
      <span class="invalid-feedback"><?php echo $data['payment_err']; ?></span>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit payment</button>
    </div>
  </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>