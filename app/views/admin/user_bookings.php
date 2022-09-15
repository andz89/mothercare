<?php 
require APPROOT . '/views/inc/header.php';

userRoleEqualtoAdmin_display_navbar();
//navbar as user
require APPROOT . '/views/inc/navbar.php'; 
?>


<div class="container col-md-8 mx-auto my-3">
    
<div class="list-group ">
    <div class="p-4 text-white" style="background-color:#EE6983;">
        <h4>List of Bookings</h4>
        <hr class="my-4 bg-white p-0 m-0">
        <!-- <span>Total no. of bookings: <b><?php echo $data['total_bookings'] ?> </b></span> -->
        <span>Total no. of bookings: <b>4 </b></span>

    </div>
<?php foreach($data['booking'] as  $bookings): ?>
    <div>
              <li class="list-group-item mt-4 ">
            <!-- <span class="btn btn-info btn-sm">Status: <?php echo $bookings->booking_status ?></span><br> -->
            <span><b> Booking ID:</b>  <?php echo $bookings->booking_id ?></span><br>
            <span><b> Patient Name:</b>  <?php echo $bookings->user_name ?></span><br>
            <span><b>User Email:  </b> <?php echo $bookings->user_email?></span><br>
            <span><b>Contact: </b>  <?php echo $bookings->contact_number?></span><br>
            <span><b> Your Doctor:</b> <?php echo $bookings->doctor_name ?></span><br>
            <span><b> Schedule: </b> <?php echo $bookings->date ?></span> @ <?php echo $bookings->time ?><br>
            <b> note: </b><br>
            <p > <?php echo $bookings->note ?></p>
            </li>
              </div>

<?php endforeach; ?>


</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
