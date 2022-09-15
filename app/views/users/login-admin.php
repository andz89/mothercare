<?php require APPROOT . '/views/inc/header.php';?>  
<div  class="" style="background-color:#EE6983;height:550px" >
<div class="login "  style="padding-top:100px">
    <div class="col-md-5 mx-auto " >
      <div class="card card-body bg-light mb-0">
 
        <h2>Login as Admin</h2>
        <p>Please fill in your credentials to log in</p>
        <form action="<?php echo URLROOT; ?>/admin/index" method="post">
          <div class="form-group ">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"  value=" <?php echo $data['email'] ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group mt-3">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="d-flex justify-content-between mt-3">
            <div>
              <input type="submit" value="Login" class="btn btn-block text-white" style="background-color:#EE6983;">
            </div>
        
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 
  <?php require APPROOT . '/views/inc/footer.php'; ?>