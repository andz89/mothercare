<?php 
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>



<div class="p-0 mb-5  text-center">
    <img class="mx-auto mb-3" src="<?php echo URLROOT;?>/images/mothercare_1.png" width="100%"  alt="" >
    <h1 class="display-6 fw-bold text-secondary" style="font-family: 'Dancing Script', cursive;">MotherCare for you baby</h1>
    <div class="col-lg-9 mx-auto">
      <p class="lead mb-3">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="text-white btn btn-md px-4 gap-3" style="background-color:#EE6983;">Book for appointment</button>
    
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php';?>