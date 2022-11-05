<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-3 mb-0 border-bottom">
  <div class="d-flex align-items-center  mb-2 mb-md-0 text-dark col-md-3 ">
    <a href="<?php echo URLROOT; ?>" class=" text-decoration-none">
      <h3 style="font-family:'Dancing Script', cursive; color:#EE6983; font-weight:600;"> MotherCare </h3>
    </a>
  </div>


  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="<?php echo URLROOT; ?>/pages/index" class="nav-link px-2 link-secondary">Home</a></li>
    <li><a href="<?php echo URLROOT; ?>/pages/doctors" class="nav-link px-2 link-dark">Doctors</a></li>
    <li><a href="<?php echo URLROOT; ?>/pages/contact" class="nav-link px-2 link-dark">Contact</a></li>
    <li><a href="<?php echo URLROOT; ?>/pages/about" class="nav-link px-2 link-dark">About</a></li>
    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') : ?>
      <li><a href="<?php echo URLROOT; ?>/users/myBooking" class="nav-link px-2 link-dark">Booking</a></li>
      <li><a href="<?php echo URLROOT; ?>/users/account" class="nav-link px-2 link-dark">My Account</a></li>
      <li><a href="<?php echo URLROOT; ?>/users/logout" class="nav-link px-2 link-dark">Logout</a></li>

    <?php endif; ?>
  </ul>

  <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'user') : ?>

  <?php else : ?>
    <div class="col-md-3 text-end">
      <a href="<?php echo URLROOT; ?>/users/login">
        <button type="button" class="btn btn-default btn-md" style="border: 1px solid #EE6983;">Login</button></a>
      <a href="<?php echo URLROOT; ?>/users/register">
        <button type="button" class="btn text-white" style="background-color:#EE6983;">Sign-up</button>
      </a>
    </div>

  <?php endif; ?>

</header>