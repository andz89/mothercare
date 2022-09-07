<?php 
require APPROOT . '/views/inc/header.php';
userRoleEqualtoAdmin_display_navbar();
require APPROOT . '/views/inc/navbar.php'; 
?>


<div class="container col-md-10 mx-auto my-0 py-0">
    
<div class="list-group my-0 py-0">
    <div class="jumbutron my-0 py-0">
    <section class="text-center container my-0 py-0">
    <div class="row py-lg-2 my-0 py-0">
      <div class="col-md-12 mx-auto my-0 py-0">
        <h1 class="fw-light">Meet Our MotherCare Doctors</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
        </p> -->
      </div>
    </div>
  </section>
    </div>
    <?php foreach($data['doctors'] as  $doctors): ?>
    
            <div class="  align-items-start  ">
              <div class="list-group-item py-3 mt-3 ">
              <div class="d-flex justify-content-start gap-3">
                    <div class="" style="width:30%">
                    <img class="" src="<?php echo $doctors->image_path ?>" width="100%"  alt="" >
                    </div>

                    <div class="" style="width:100%">
                        <div class="">
                            <div class="d-flex justify-content-between">
                            <div>
                            <h6 class="text-body fs-4"><?php echo $doctors->doctor_name ?></h6>
                            </div>
                           
                            <div>
                            <span  class="btn btn-secondary btn-sm m-0" data-bs-toggle="collapse" href="#a<?php echo $doctors->id ?>" role="button" aria-expanded="false" aria-controls="a<?php echo $doctors->id ?>">
                            View More
                            </span>
                            </div>
                            </div>
                            <p class="lead fs-5 pt-2">
                            <?php echo $doctors->description_1 ?>
                            </p>    
                        <form action="" method="post" class="">
                        <a href="<?php echo URLROOT;?>/users/booking?id=<?php echo $doctors->id ?>" class="btn btn-sm text-white float-right " style="background-color:#EE6983;">
                      Book Appointment</a>
                        </form>
                        </div>
                       
                    </div>
                        <!-- <small class="mt-2">12/21/22 </small> -->
                 </div>
                  <!-- hide area -->
            <div class="collapse mt-3" id="a<?php echo $doctors->id ?>">
            <div class="">
            <p class="fs-6" style="text-indent:40px ;">
            <?php echo $doctors->description_2 ?>
            </p>
       
            
            </div>
         
            </div>
              </div>
        
            
            
           
           
</div>

<?php endforeach; ?>








</div>
</div>









<?php require APPROOT . '/views/inc/footer.php';?>