<?php 
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>

<div class="container booking-page">
        <ul class="list-group  m-5 ">
        <div class="booking-header p-2 text-white" style="background-color:#EE6983;" >
        <h4> Booking of <?php echo $_SESSION['user_name'] ?></h4> 
        
        </div>
     
        <?php foreach($data['booking'] as  $bookings): ?>
       
        
              <div>
              <li class="list-group-item mt-4 ">
              
                <?php foreach($data['sched'] as  $sched): ?>
          <?php if( $sched->date == $bookings->date):  ?>
                  <?php if($sched->announcement && ctype_space($sched->announcement) == 0):  ?>
                    
                    <?php echo ctype_space($sched->announcement)  ?>

                  <div class="alert alert-warning  card p-2 mb-1">
                  <span><b>Announcement:</b></span>
                  <?php echo  $sched->announcement ?>
                  </div>
                  <?php endif; ?>
          <?php endif; ?>

          <?php endforeach; ?>

                <div class="">
                <span><b> Things to Bring:</b></span>
                <?php echo $bookings->reminders ?>
                </div>
             
            <!-- <span class="btn btn-info btn-sm">Status: <?php echo $bookings->booking_status ?></span><br> -->
            <span><b> Booking ID:</b>  <?php echo $bookings->booking_id ?></span><br>
            <span><b> Patient Name:</b>  <?php echo $bookings->user_name ?></span><br>
            <span><b>User Email:  </b> <?php echo $bookings->user_email?></span><br>
            <span><b>Contact: </b>  <?php echo $bookings->contact_number?></span><br>
            <span><b> Your Doctor:</b> <?php echo $bookings->doctor_name ?></span><br>
            <span><b> Schedule: </b> <?php echo $bookings->date ?></span> @ <?php echo $bookings->time ?><br>
            <b> Your note to mothercare: </b><br>
            <p > <?php echo $bookings->note ?></p>
           

       
         
            <?php endforeach; ?>
            </li>
              </div>
        </ul>
        </div>
        <?php require APPROOT . '/views/inc/footer.php';?>
