<?php
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php';
?>

<div class="jumbutron my-4 py-0">

  <section class="text-center container my-0 py-0">
    <div class="row py-lg-2 my-0 py-0">
      <div class="col-md-12 mx-auto my-0 py-0">
        <h1 class="fw-light">MotherCare</h1>
        <p class="lead text-dark">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam cupiditate aliquid et corporis soluta pariatur laboriosam possimus, repellat perspiciatis, hic quia quis dolorum.</p>
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
        </p> -->
      </div>
    </div>
  </section>
  <section class="text-center container my-0 py-0">
    <img class="mx-auto mb-3" src="<?php echo URLROOT; ?>/images/pregnant.jpg" width="50%" alt="">

    <div class="row py-lg-2 my-0 py-0">
      <div class="col-md-12 mx-auto my-0 py-0">
        <h1 class="fw-light">Vision</h1>
        <p class="lead text-dark">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum cum consequuntur aspernatur neque nihil. Error, repudiandae..</p>
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
        </p> -->
      </div>
    </div>
  </section>
  <section class="text-center container my-0 py-0">
    <div class="row py-lg-2 my-0 py-0">
      <div class="col-md-12 mx-auto my-0 py-0">
        <h1 class="fw-light text-dark">Mission</h1>
        <p class="lead text-dark">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, vero!.</p>
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
        </p> -->
      </div>
    </div>
  </section>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>